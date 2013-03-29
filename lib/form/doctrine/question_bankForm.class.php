<?php

/**
 * question_bank form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class question_bankForm extends Basequestion_bankForm
{
  /**
   * @see questionForm
   */
  public function configure()
  {
    parent::configure();    
    
    $this->widgetSchema['question_text'] = new sfWidgetFormTextarea();
    $this->widgetSchema['help_message']  = new sfWidgetFormTextarea();
    $this->widgetSchema['answer_type'] = widgetHelper::getWidget(widgetHelper::WIDGET_ANSWER_TYPE);    
    
    $this->widgetSchema['category_id'] = widgetHelper::getWidget(widgetHelper::WIDGET_QUESTION_CATEGORY, $this->widgetSchema['category_id']->getOptions() );
    
    $this->widgetSchema['parent_question_id']->setOption('table_method','getQuestionGroupsQuery');
    $this->widgetSchema['parent_question_id']->setOption('model','question_bank');
    $this->validatorSchema['parent_question_id']->setOption('model','question_bank');
    
    $this->setDefault("disabled",null);
    
    $options = new questionBankOptionsCollectionForm(null, array("question_bank"=>$this->getObject()) );
    $this->embedForm("options", $options);
  }
  
  public function bind(array $taintedValues = null, array $taintedFiles = null) 
  {
      if(isset($taintedValues['options']))
      {
          foreach ($taintedValues["options"] as $key=>$form)
          {  
            if(false === $this->embeddedForms["options"]->offsetExists($key))
            {
                $subform = $this->embeddedForms["options"];

                $subform->addDetailRow($key);
                $this->embedForm("options", $subform);
            }
          }
      }
      parent::bind($taintedValues, $taintedFiles);
  }
  
  public function saveEmbeddedForms($con = null, $forms = null) 
  {      
      if(null === $forms)
      {
          $del_ids = array();
          $items = $this->getValue('options');
          $forms = $this->embeddedForms;
          
          foreach($this->embeddedForms['options'] as $name=>$form)
          {
              if($form instanceof sfFormFieldSchema)
              {
                  #$values = $form->getValue();
                  $id     = $form['id'];
                  
                  if(!isset($items[$name]))
                  {                 
                      if($id) $del_ids[] = $id->getValue();
                      unset($forms['options'][$name]);
                  }
              }
          }           
          
          if(count($del_ids) ) $this->getObject ()->unlinkInDb  ("question_option", $del_ids);
      }
      return parent::saveEmbeddedForms($con, $forms);
  }
}

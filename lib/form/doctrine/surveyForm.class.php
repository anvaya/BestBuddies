<?php

/**
 * survey form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class surveyForm extends BasesurveyForm
{
  public function configure()
  {           
      $this->widgetSchema['start_date'] = widgetHelper::getWidget(widgetHelper::WIDGET_DATE, array("date_widget"=>$this->widgetSchema['start_date']) );
      $this->widgetSchema['end_date'] = widgetHelper::getWidget(widgetHelper::WIDGET_DATE, array("date_widget"=>$this->widgetSchema['end_date']) );
      
      $questionsForm = new surveyQuestionsCollectionForm(null, array("survey"=>$this->getObject()));
      $this->embedForm("questions", $questionsForm);
      
      $this->widgetSchema['status'] = widgetHelper::getWidget(widgetHelper::WIDGET_SURVEY_STATUS);
      $this->validatorSchema['status']=  widgetHelper::getValidator(widgetHelper::WIDGET_SURVEY_STATUS);
      
      $this->setDefault("start_date", date('Y-m-d') );
      
      unset($this['created_at'],$this['updated_at']);
  }
  
  public function bind(array $taintedValues = null, array $taintedFiles = null) 
  {
      if(isset($taintedValues['questions']))
      {
          foreach ($taintedValues["questions"] as $key=>$form)
          {  
            if(false === $this->embeddedForms["questions"]->offsetExists($key))
            {
                $subform = $this->embeddedForms["questions"];

                $subform->addDetailRow($key);
                $this->embedForm("questions", $subform);
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
          $items = $this->getValue('questions');
          $forms = $this->embeddedForms;
          
          foreach($this->embeddedForms['questions'] as $name=>$form)
          {
              if($form instanceof sfFormFieldSchema)
              {
                  #$values = $form->getValue();
                  $id     = $form['id'];
                  
                  if(!isset($items[$name]))
                  {                 
                      if($id) $del_ids[] = $id->getValue();
                      unset($forms['questions'][$name]);
                  }
              }
          }           
          
          if(count($del_ids) ) $this->getObject ()->unlinkInDb  ("survey_question", $del_ids);
      }
      return parent::saveEmbeddedForms($con, $forms);
  }
}

<?php

/**
 * question_option form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class question_optionForm extends Basequestion_optionForm
{
  public function configure()
  {
      $this->widgetSchema['display_order']->setAttribute('size',2);
      $this->widgetSchema['option_text'] =  new sfWidgetFormTextarea(array(), array("rows"=>3,"cols"=>40));   
      $this->validatorSchema['remove'] = new sfValidatorPass();      
      $this->setDefault('pre_selected', null);
      
      unset($this['question_id']);
  }
}

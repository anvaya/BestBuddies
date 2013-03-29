<?php

/**
 * application form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class applicationForm extends BaseapplicationForm
{
  public function configure()
  {
      $choices = array_merge(array("0"=>"Select"), applicationTable::$APPLICATION_STATUS_VALUES);      
      $this->widgetSchema["status"] = new sfWidgetFormChoice(array("choices"=>$choices));
      $this->validatorSchema["status"]=new sfValidatorChoice(array("choices"=>array_keys($choices),"required"=>false));
      
      
      unset($this['created_at'],$this['updated_at'],$this['submission_id']);
      
  }
}

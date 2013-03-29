<?php

/**
 * survey_submission filter form.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class survey_submissionFormFilter extends Basesurvey_submissionFormFilter
{
  public function configure()
  {
      $choices = survey_submissionTable::$STATUS_CHOICES;      
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array("choices"=>$choices));
      $this->validatorSchema['status'] = new sfValidatorChoice(array("choices"=>array_keys($choices), "required"=>false));
  }
  
  public function getFields() 
  {
     $fields =  parent::getFields();
     $fields['status'] = 'ForeignKey';
     return $fields;
  }
  
}

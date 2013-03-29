<?php

/**
 * survey_question form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class survey_questionForm extends Basesurvey_questionForm
{
  public function configure()
  {
      $this->validatorSchema['remove'] = new sfValidatorPass();
      $this->widgetSchema['question_id'] = new sfWidgetFormInputHidden();
      
      $this->setDefault('mandatory', $this->getObject()->getMandatory()?true:null );
      $this->setDefault('disabled', $this->getObject()->getDisabled()?true:null );
      
      unset($this['survey_id']);
  }
}

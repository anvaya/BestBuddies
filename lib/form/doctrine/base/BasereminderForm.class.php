<?php

/**
 * reminder form base class.
 *
 * @method reminder getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasereminderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'member_id'          => new sfWidgetFormInputText(),
      'submission_form_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('submission_form'), 'add_empty' => false)),
      'start_date'         => new sfWidgetFormDateTime(),
      'alert_type'         => new sfWidgetFormInputText(),
      'show_onscreen'      => new sfWidgetFormInputCheckbox(),
      'send_email'         => new sfWidgetFormInputCheckbox(),
      'displayed'          => new sfWidgetFormInputCheckbox(),
      'emailed'            => new sfWidgetFormInputCheckbox(),
      'alert_title'        => new sfWidgetFormInputText(),
      'alert_content'      => new sfWidgetFormInputText(),
      'record_id'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'member_id'          => new sfValidatorInteger(array('required' => false)),
      'submission_form_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('submission_form'))),
      'start_date'         => new sfValidatorDateTime(),
      'alert_type'         => new sfValidatorInteger(array('required' => false)),
      'show_onscreen'      => new sfValidatorBoolean(array('required' => false)),
      'send_email'         => new sfValidatorBoolean(array('required' => false)),
      'displayed'          => new sfValidatorBoolean(array('required' => false)),
      'emailed'            => new sfValidatorBoolean(array('required' => false)),
      'alert_title'        => new sfValidatorPass(array('required' => false)),
      'alert_content'      => new sfValidatorPass(array('required' => false)),
      'record_id'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('reminder[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'reminder';
  }

}

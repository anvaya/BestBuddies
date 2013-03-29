<?php

/**
 * survey_invitation form base class.
 *
 * @method survey_invitation getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basesurvey_invitationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'survey_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey'), 'add_empty' => true)),
      'member_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member'), 'add_empty' => true)),
      'email_address' => new sfWidgetFormInputText(),
      'sent'          => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'survey_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('survey'), 'required' => false)),
      'member_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('member'), 'required' => false)),
      'email_address' => new sfValidatorPass(),
      'sent'          => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('survey_invitation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'survey_invitation';
  }

}

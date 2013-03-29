<?php

/**
 * survey_invitation filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basesurvey_invitationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'survey_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey'), 'add_empty' => true)),
      'member_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member'), 'add_empty' => true)),
      'email_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sent'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'survey_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('survey'), 'column' => 'id')),
      'member_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('member'), 'column' => 'id')),
      'email_address' => new sfValidatorPass(array('required' => false)),
      'sent'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('survey_invitation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'survey_invitation';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'survey_id'     => 'ForeignKey',
      'member_id'     => 'ForeignKey',
      'email_address' => 'Text',
      'sent'          => 'Boolean',
    );
  }
}

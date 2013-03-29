<?php

/**
 * event_member form base class.
 *
 * @method event_member getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Baseevent_memberForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'event_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('calendar_event'), 'add_empty' => true)),
      'member_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'event_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('calendar_event'), 'required' => false)),
      'member_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('member'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('event_member[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'event_member';
  }

}

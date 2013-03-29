<?php

/**
 * calendar_event form base class.
 *
 * @method calendar_event getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basecalendar_eventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'member_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member'), 'add_empty' => true)),
      'event_type_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('event_type'), 'add_empty' => true)),
      'from_date'      => new sfWidgetFormDateTime(),
      'to_date'        => new sfWidgetFormDateTime(),
      'title'          => new sfWidgetFormInputText(),
      'description'    => new sfWidgetFormInputText(),
      'address'        => new sfWidgetFormInputText(),
      'city'           => new sfWidgetFormInputText(),
      'state'          => new sfWidgetFormInputText(),
      'zip'            => new sfWidgetFormInputText(),
      'contact_person' => new sfWidgetFormInputText(),
      'phone_number'   => new sfWidgetFormInputText(),
      'email_address'  => new sfWidgetFormInputText(),
      'website'        => new sfWidgetFormInputText(),
      'status'         => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'member_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('member'), 'required' => false)),
      'event_type_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('event_type'), 'required' => false)),
      'from_date'      => new sfValidatorDateTime(array('required' => false)),
      'to_date'        => new sfValidatorDateTime(array('required' => false)),
      'title'          => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'address'        => new sfValidatorPass(array('required' => false)),
      'city'           => new sfValidatorPass(array('required' => false)),
      'state'          => new sfValidatorPass(array('required' => false)),
      'zip'            => new sfValidatorPass(array('required' => false)),
      'contact_person' => new sfValidatorPass(array('required' => false)),
      'phone_number'   => new sfValidatorPass(array('required' => false)),
      'email_address'  => new sfValidatorPass(array('required' => false)),
      'website'        => new sfValidatorPass(array('required' => false)),
      'status'         => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('calendar_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'calendar_event';
  }

}

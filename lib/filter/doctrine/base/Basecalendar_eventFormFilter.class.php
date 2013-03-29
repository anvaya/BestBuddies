<?php

/**
 * calendar_event filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basecalendar_eventFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member'), 'add_empty' => true)),
      'event_type_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('event_type'), 'add_empty' => true)),
      'from_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'to_date'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'title'          => new sfWidgetFormFilterInput(),
      'description'    => new sfWidgetFormFilterInput(),
      'address'        => new sfWidgetFormFilterInput(),
      'city'           => new sfWidgetFormFilterInput(),
      'state'          => new sfWidgetFormFilterInput(),
      'zip'            => new sfWidgetFormFilterInput(),
      'contact_person' => new sfWidgetFormFilterInput(),
      'phone_number'   => new sfWidgetFormFilterInput(),
      'email_address'  => new sfWidgetFormFilterInput(),
      'website'        => new sfWidgetFormFilterInput(),
      'status'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'member_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('member'), 'column' => 'id')),
      'event_type_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('event_type'), 'column' => 'id')),
      'from_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'to_date'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
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
      'status'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('calendar_event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'calendar_event';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'member_id'      => 'ForeignKey',
      'event_type_id'  => 'ForeignKey',
      'from_date'      => 'Date',
      'to_date'        => 'Date',
      'title'          => 'Text',
      'description'    => 'Text',
      'address'        => 'Text',
      'city'           => 'Text',
      'state'          => 'Text',
      'zip'            => 'Text',
      'contact_person' => 'Text',
      'phone_number'   => 'Text',
      'email_address'  => 'Text',
      'website'        => 'Text',
      'status'         => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}

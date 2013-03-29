<?php

/**
 * application filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseapplicationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_type_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member_type'), 'add_empty' => true)),
      'status'          => new sfWidgetFormFilterInput(),
      'title'           => new sfWidgetFormFilterInput(),
      'first_name'      => new sfWidgetFormFilterInput(),
      'last_name'       => new sfWidgetFormFilterInput(),
      'email_address'   => new sfWidgetFormFilterInput(),
      'submission_id'   => new sfWidgetFormFilterInput(),
      'program_year_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('program_year'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'member_type_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('member_type'), 'column' => 'id')),
      'status'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'           => new sfValidatorPass(array('required' => false)),
      'first_name'      => new sfValidatorPass(array('required' => false)),
      'last_name'       => new sfValidatorPass(array('required' => false)),
      'email_address'   => new sfValidatorPass(array('required' => false)),
      'submission_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'program_year_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('program_year'), 'column' => 'id')),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('application_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'application';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'member_type_id'  => 'ForeignKey',
      'status'          => 'Number',
      'title'           => 'Text',
      'first_name'      => 'Text',
      'last_name'       => 'Text',
      'email_address'   => 'Text',
      'submission_id'   => 'Number',
      'program_year_id' => 'ForeignKey',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}

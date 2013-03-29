<?php

/**
 * reminder filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasereminderFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'          => new sfWidgetFormFilterInput(),
      'submission_form_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('submission_form'), 'add_empty' => true)),
      'start_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'alert_type'         => new sfWidgetFormFilterInput(),
      'show_onscreen'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'send_email'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'displayed'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'emailed'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'alert_title'        => new sfWidgetFormFilterInput(),
      'alert_content'      => new sfWidgetFormFilterInput(),
      'record_id'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'member_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'submission_form_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('submission_form'), 'column' => 'id')),
      'start_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'alert_type'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'show_onscreen'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'send_email'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'displayed'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'emailed'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'alert_title'        => new sfValidatorPass(array('required' => false)),
      'alert_content'      => new sfValidatorPass(array('required' => false)),
      'record_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('reminder_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'reminder';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'member_id'          => 'Number',
      'submission_form_id' => 'ForeignKey',
      'start_date'         => 'Date',
      'alert_type'         => 'Number',
      'show_onscreen'      => 'Boolean',
      'send_email'         => 'Boolean',
      'displayed'          => 'Boolean',
      'emailed'            => 'Boolean',
      'alert_title'        => 'Text',
      'alert_content'      => 'Text',
      'record_id'          => 'Number',
    );
  }
}

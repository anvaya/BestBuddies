<?php

/**
 * survey filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesurveyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'status'                   => new sfWidgetFormFilterInput(),
      'title'                    => new sfWidgetFormFilterInput(),
      'start_date'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_date'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'template_name'            => new sfWidgetFormFilterInput(),
      'css_file'                 => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'survey_member_types_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'member_type')),
    ));

    $this->setValidators(array(
      'user_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'status'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'                    => new sfValidatorPass(array('required' => false)),
      'start_date'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'end_date'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'template_name'            => new sfValidatorPass(array('required' => false)),
      'css_file'                 => new sfValidatorPass(array('required' => false)),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'survey_member_types_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'member_type', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('survey_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addSurveyMemberTypesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.survey_membertype survey_membertype')
      ->andWhereIn('survey_membertype.member_type_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'survey';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'user_id'                  => 'ForeignKey',
      'status'                   => 'Number',
      'title'                    => 'Text',
      'start_date'               => 'Date',
      'end_date'                 => 'Date',
      'template_name'            => 'Text',
      'css_file'                 => 'Text',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'survey_member_types_list' => 'ManyKey',
    );
  }
}

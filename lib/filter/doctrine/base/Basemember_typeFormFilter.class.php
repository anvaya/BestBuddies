<?php

/**
 * member_type filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basemember_typeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'   => new sfWidgetFormFilterInput(),
      'survey_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'survey')),
      'resource_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'resource')),
    ));

    $this->setValidators(array(
      'type_name'     => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'survey_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'survey', 'required' => false)),
      'resource_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'resource', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('member_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addSurveyListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('survey_membertype.survey_id', $values)
    ;
  }

  public function addResourceListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.resource_membertype resource_membertype')
      ->andWhereIn('resource_membertype.resource_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'member_type';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'type_name'     => 'Text',
      'description'   => 'Text',
      'survey_list'   => 'ManyKey',
      'resource_list' => 'ManyKey',
    );
  }
}

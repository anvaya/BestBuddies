<?php

/**
 * resource filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseresourceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'resource_type'              => new sfWidgetFormFilterInput(),
      'members_only'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'program_year_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('program_year'), 'add_empty' => true)),
      'disabled'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'download_file_name'         => new sfWidgetFormFilterInput(),
      'file_name'                  => new sfWidgetFormFilterInput(),
      'resource_member_types_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'member_type')),
    ));

    $this->setValidators(array(
      'title'                      => new sfValidatorPass(array('required' => false)),
      'resource_type'              => new sfValidatorPass(array('required' => false)),
      'members_only'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'program_year_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('program_year'), 'column' => 'id')),
      'disabled'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'download_file_name'         => new sfValidatorPass(array('required' => false)),
      'file_name'                  => new sfValidatorPass(array('required' => false)),
      'resource_member_types_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'member_type', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('resource_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addResourceMemberTypesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('resource_membertype.member_type_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'resource';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'title'                      => 'Text',
      'resource_type'              => 'Text',
      'members_only'               => 'Boolean',
      'program_year_id'            => 'ForeignKey',
      'disabled'                   => 'Boolean',
      'download_file_name'         => 'Text',
      'file_name'                  => 'Text',
      'resource_member_types_list' => 'ManyKey',
    );
  }
}

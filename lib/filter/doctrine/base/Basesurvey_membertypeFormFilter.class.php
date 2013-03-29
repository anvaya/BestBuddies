<?php

/**
 * survey_membertype filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basesurvey_membertypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'survey_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey'), 'add_empty' => true)),
      'member_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member_type'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'survey_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('survey'), 'column' => 'id')),
      'member_type_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('member_type'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('survey_membertype_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'survey_membertype';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'survey_id'      => 'ForeignKey',
      'member_type_id' => 'ForeignKey',
    );
  }
}

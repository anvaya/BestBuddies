<?php

/**
 * survey_question filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basesurvey_questionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'survey_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey'), 'add_empty' => true)),
      'parent_question_id' => new sfWidgetFormFilterInput(),
      'question_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('question_bank'), 'add_empty' => true)),
      'mandatory'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'page_id'            => new sfWidgetFormFilterInput(),
      'disabled'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'display_order'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'survey_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('survey'), 'column' => 'id')),
      'parent_question_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'question_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('question_bank'), 'column' => 'id')),
      'mandatory'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'page_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'disabled'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'display_order'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('survey_question_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'survey_question';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'survey_id'          => 'ForeignKey',
      'parent_question_id' => 'Number',
      'question_id'        => 'ForeignKey',
      'mandatory'          => 'Boolean',
      'page_id'            => 'Number',
      'disabled'           => 'Boolean',
      'display_order'      => 'Number',
    );
  }
}

<?php

/**
 * survey_data filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basesurvey_dataFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'submission_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey_submission'), 'add_empty' => true)),
      'survey_question_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey_question'), 'add_empty' => true)),
      'question_bank_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('question_bank'), 'add_empty' => true)),
      'answer_text'        => new sfWidgetFormFilterInput(),
      'selected_options'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'submission_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('survey_submission'), 'column' => 'id')),
      'survey_question_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('survey_question'), 'column' => 'id')),
      'question_bank_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('question_bank'), 'column' => 'id')),
      'answer_text'        => new sfValidatorPass(array('required' => false)),
      'selected_options'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('survey_data_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'survey_data';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'submission_id'      => 'ForeignKey',
      'survey_question_id' => 'ForeignKey',
      'question_bank_id'   => 'ForeignKey',
      'answer_text'        => 'Text',
      'selected_options'   => 'Text',
    );
  }
}

<?php

/**
 * survey_data form base class.
 *
 * @method survey_data getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basesurvey_dataForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'submission_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey_submission'), 'add_empty' => true)),
      'survey_question_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey_question'), 'add_empty' => true)),
      'question_bank_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('question_bank'), 'add_empty' => true)),
      'answer_text'        => new sfWidgetFormInputText(),
      'selected_options'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'submission_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('survey_submission'), 'required' => false)),
      'survey_question_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('survey_question'), 'required' => false)),
      'question_bank_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('question_bank'), 'required' => false)),
      'answer_text'        => new sfValidatorPass(array('required' => false)),
      'selected_options'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('survey_data[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'survey_data';
  }

}

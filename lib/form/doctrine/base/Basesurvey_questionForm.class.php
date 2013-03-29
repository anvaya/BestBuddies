<?php

/**
 * survey_question form base class.
 *
 * @method survey_question getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basesurvey_questionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'survey_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey'), 'add_empty' => true)),
      'parent_question_id' => new sfWidgetFormInputText(),
      'question_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('question_bank'), 'add_empty' => true)),
      'mandatory'          => new sfWidgetFormInputCheckbox(),
      'page_id'            => new sfWidgetFormInputText(),
      'disabled'           => new sfWidgetFormInputCheckbox(),
      'display_order'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'survey_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('survey'), 'required' => false)),
      'parent_question_id' => new sfValidatorInteger(array('required' => false)),
      'question_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('question_bank'), 'required' => false)),
      'mandatory'          => new sfValidatorBoolean(array('required' => false)),
      'page_id'            => new sfValidatorInteger(array('required' => false)),
      'disabled'           => new sfValidatorBoolean(array('required' => false)),
      'display_order'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('survey_question[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'survey_question';
  }

}

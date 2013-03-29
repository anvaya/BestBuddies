<?php

/**
 * survey_membertype form base class.
 *
 * @method survey_membertype getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basesurvey_membertypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'survey_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('survey'), 'add_empty' => true)),
      'member_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member_type'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'survey_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('survey'), 'required' => false)),
      'member_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('member_type'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('survey_membertype[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'survey_membertype';
  }

}

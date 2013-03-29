<?php

/**
 * program_year form base class.
 *
 * @method program_year getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Baseprogram_yearForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'type_name' => new sfWidgetFormInputText(),
      'from_date' => new sfWidgetFormDate(),
      'to_date'   => new sfWidgetFormDate(),
      'is_active' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type_name' => new sfValidatorPass(),
      'from_date' => new sfValidatorDate(),
      'to_date'   => new sfValidatorDate(),
      'is_active' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'program_year', 'column' => array('type_name')))
    );

    $this->widgetSchema->setNameFormat('program_year[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'program_year';
  }

}

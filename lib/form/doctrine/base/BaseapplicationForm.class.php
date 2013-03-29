<?php

/**
 * application form base class.
 *
 * @method application getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseapplicationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'member_type_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('member_type'), 'add_empty' => true)),
      'status'          => new sfWidgetFormInputText(),
      'title'           => new sfWidgetFormInputText(),
      'first_name'      => new sfWidgetFormInputText(),
      'last_name'       => new sfWidgetFormInputText(),
      'email_address'   => new sfWidgetFormInputText(),
      'submission_id'   => new sfWidgetFormInputText(),
      'program_year_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('program_year'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'member_type_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('member_type'), 'required' => false)),
      'status'          => new sfValidatorInteger(array('required' => false)),
      'title'           => new sfValidatorPass(array('required' => false)),
      'first_name'      => new sfValidatorPass(array('required' => false)),
      'last_name'       => new sfValidatorPass(array('required' => false)),
      'email_address'   => new sfValidatorPass(array('required' => false)),
      'submission_id'   => new sfValidatorInteger(array('required' => false)),
      'program_year_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('program_year'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('application[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'application';
  }

}

<?php

/**
 * event_file form base class.
 *
 * @method event_file getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Baseevent_fileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'event_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('calendar_event'), 'add_empty' => true)),
      'file_name'     => new sfWidgetFormInputText(),
      'photo_title'   => new sfWidgetFormInputText(),
      'display_order' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'event_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('calendar_event'), 'required' => false)),
      'file_name'     => new sfValidatorPass(),
      'photo_title'   => new sfValidatorPass(array('required' => false)),
      'display_order' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event_file[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'event_file';
  }

}

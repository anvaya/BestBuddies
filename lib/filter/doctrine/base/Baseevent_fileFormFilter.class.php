<?php

/**
 * event_file filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Baseevent_fileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'event_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('calendar_event'), 'add_empty' => true)),
      'file_name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo_title'   => new sfWidgetFormFilterInput(),
      'display_order' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'event_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('calendar_event'), 'column' => 'id')),
      'file_name'     => new sfValidatorPass(array('required' => false)),
      'photo_title'   => new sfValidatorPass(array('required' => false)),
      'display_order' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('event_file_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'event_file';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'event_id'      => 'ForeignKey',
      'file_name'     => 'Text',
      'photo_title'   => 'Text',
      'display_order' => 'Number',
    );
  }
}

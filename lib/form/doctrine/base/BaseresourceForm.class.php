<?php

/**
 * resource form base class.
 *
 * @method resource getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseresourceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'title'                      => new sfWidgetFormInputText(),
      'resource_type'              => new sfWidgetFormInputText(),
      'members_only'               => new sfWidgetFormInputCheckbox(),
      'program_year_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('program_year'), 'add_empty' => true)),
      'disabled'                   => new sfWidgetFormInputCheckbox(),
      'download_file_name'         => new sfWidgetFormInputText(),
      'file_name'                  => new sfWidgetFormInputText(),
      'resource_member_types_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'member_type')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'                      => new sfValidatorString(array('max_length' => 255)),
      'resource_type'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'members_only'               => new sfValidatorBoolean(array('required' => false)),
      'program_year_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('program_year'), 'required' => false)),
      'disabled'                   => new sfValidatorBoolean(array('required' => false)),
      'download_file_name'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'file_name'                  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'resource_member_types_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'member_type', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('resource[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'resource';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['resource_member_types_list']))
    {
      $this->setDefault('resource_member_types_list', $this->object->resourceMemberTypes->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveresourceMemberTypesList($con);

    parent::doSave($con);
  }

  public function saveresourceMemberTypesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['resource_member_types_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->resourceMemberTypes->getPrimaryKeys();
    $values = $this->getValue('resource_member_types_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('resourceMemberTypes', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('resourceMemberTypes', array_values($link));
    }
  }

}

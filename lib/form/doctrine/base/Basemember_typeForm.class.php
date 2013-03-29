<?php

/**
 * member_type form base class.
 *
 * @method member_type getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basemember_typeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'type_name'     => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormInputText(),
      'survey_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'survey')),
      'resource_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'resource')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type_name'     => new sfValidatorPass(),
      'description'   => new sfValidatorPass(array('required' => false)),
      'survey_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'survey', 'required' => false)),
      'resource_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'resource', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'member_type', 'column' => array('type_name')))
    );

    $this->widgetSchema->setNameFormat('member_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'member_type';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['survey_list']))
    {
      $this->setDefault('survey_list', $this->object->survey->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['resource_list']))
    {
      $this->setDefault('resource_list', $this->object->resource->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savesurveyList($con);
    $this->saveresourceList($con);

    parent::doSave($con);
  }

  public function savesurveyList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['survey_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->survey->getPrimaryKeys();
    $values = $this->getValue('survey_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('survey', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('survey', array_values($link));
    }
  }

  public function saveresourceList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['resource_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->resource->getPrimaryKeys();
    $values = $this->getValue('resource_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('resource', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('resource', array_values($link));
    }
  }

}

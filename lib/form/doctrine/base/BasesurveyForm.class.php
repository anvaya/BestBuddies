<?php

/**
 * survey form base class.
 *
 * @method survey getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesurveyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'user_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'status'                   => new sfWidgetFormInputText(),
      'title'                    => new sfWidgetFormInputText(),
      'start_date'               => new sfWidgetFormDate(),
      'end_date'                 => new sfWidgetFormDate(),
      'template_name'            => new sfWidgetFormInputText(),
      'css_file'                 => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'survey_member_types_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'member_type')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'status'                   => new sfValidatorInteger(array('required' => false)),
      'title'                    => new sfValidatorPass(array('required' => false)),
      'start_date'               => new sfValidatorDate(array('required' => false)),
      'end_date'                 => new sfValidatorDate(array('required' => false)),
      'template_name'            => new sfValidatorPass(array('required' => false)),
      'css_file'                 => new sfValidatorPass(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
      'survey_member_types_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'member_type', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('survey[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'survey';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['survey_member_types_list']))
    {
      $this->setDefault('survey_member_types_list', $this->object->surveyMemberTypes->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savesurveyMemberTypesList($con);

    parent::doSave($con);
  }

  public function savesurveyMemberTypesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['survey_member_types_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->surveyMemberTypes->getPrimaryKeys();
    $values = $this->getValue('survey_member_types_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('surveyMemberTypes', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('surveyMemberTypes', array_values($link));
    }
  }

}

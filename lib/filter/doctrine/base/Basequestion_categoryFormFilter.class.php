<?php

/**
 * question_category filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basequestion_categoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'parent_category_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'category_name'      => new sfValidatorPass(array('required' => false)),
      'parent_category_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('question_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'question_category';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'category_name'      => 'Text',
      'parent_category_id' => 'Number',
    );
  }
}

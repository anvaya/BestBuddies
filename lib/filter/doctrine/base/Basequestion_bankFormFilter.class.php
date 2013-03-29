<?php

/**
 * question_bank filter form base class.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Basequestion_bankFormFilter extends questionFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['category_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('question_category'), 'add_empty' => true));
    $this->validatorSchema['category_id'] = new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('question_category'), 'column' => 'id'));

    $this->widgetSchema->setNameFormat('question_bank_filters[%s]');
  }

  public function getModelName()
  {
    return 'question_bank';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'category_id' => 'ForeignKey',
    ));
  }
}

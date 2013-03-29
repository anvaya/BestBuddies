<?php

/**
 * question_bank form base class.
 *
 * @method question_bank getObject() Returns the current form's model object
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Basequestion_bankForm extends questionForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['category_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('question_category'), 'add_empty' => true));
    $this->validatorSchema['category_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('question_category'), 'required' => false));

    $this->widgetSchema->setNameFormat('question_bank[%s]');
  }

  public function getModelName()
  {
    return 'question_bank';
  }

}

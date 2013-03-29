<?php

/**
 * question_bank filter form.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class question_bankFormFilter extends Basequestion_bankFormFilter
{
  /**
   * @see questionFormFilter
   */
  public function configure()
  {
    parent::configure();
    
    $this->widgetSchema['answer_type'] = widgetHelper::getWidget(widgetHelper::WIDGET_ANSWER_TYPE);
    $this->validatorSchema['answer_type'] = widgetHelper::getValidator(widgetHelper::WIDGET_ANSWER_TYPE);
    $this->widgetSchema['category_id'] = widgetHelper::getWidget(widgetHelper::WIDGET_QUESTION_CATEGORY, $this->widgetSchema['category_id']->getOptions() );
    unset($this['parent_question_id']);
  }
}

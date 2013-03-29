<?php

/**
 * blog filter form.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class blogFormFilter extends BaseblogFormFilter
{
  public function configure()
  {
      $choices = blogTable::$status_choices;
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array("choices"=>$choices));
      $this->validatorSchema['status'] = new sfValidatorChoice(array("choices"=> array_keys($choices) ));
  }
}

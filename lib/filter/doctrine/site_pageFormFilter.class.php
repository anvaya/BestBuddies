<?php

/**
 * site_page filter form.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class site_pageFormFilter extends Basesite_pageFormFilter
{
  public function configure()
  { 
      $choices = array_merge(array(""=>"Select"),site_pageTable::$page_status_choices);
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array("choices"=>$choices));
      $this->validatorSchema['status'] = new sfValidatorChoice(array("choices"=> array_keys(site_pageTable::$page_status_choices),"required"=>false ));

  }
}

<?php

/**
 * site_page form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class site_pageForm extends Basesite_pageForm
{
  public function configure()
  {
      
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array("choices"=>  site_pageTable::$page_status_choices));
      $this->validatorSchema['status'] = new sfValidatorChoice(array("choices"=> array_keys(site_pageTable::$page_status_choices) ));
      
      $this->widgetSchema['page_content'] = new sfWidgetFormTextareaTinyMCE(array(
  'width'  => 550,
  'height' => 350,
  'config' => 'theme_advanced_disable: "anchor,image,cleanup,help"',));
  }
}

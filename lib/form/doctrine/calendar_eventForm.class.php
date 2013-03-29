<?php

/**
 * calendar_event form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendar_eventForm extends Basecalendar_eventForm
{
  public function configure()
  {
      $status_choices = array("1"=>"Active","2"=>"Completed","3"=>"Cancelled");
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array("choices"=>$status_choices));
      $this->validatorSchema['status']=new sfValidatorChoice(array("choices"=>array_keys($status_choices)));
      
      $this->widgetSchema['address'] = new sfWidgetFormTextarea();
      $this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE(array(
  'width'  => 550,
  'height' => 350,
  'config' => 'theme_advanced_disable: "anchor,image,cleanup,help"',));
      
      unset($this['created_at'],$this['updated_at'],$this['member_id']);
  }
}

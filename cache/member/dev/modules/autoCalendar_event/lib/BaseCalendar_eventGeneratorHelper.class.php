<?php

/**
 * calendar_event module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage calendar_event
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCalendar_eventGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'calendar_event' : 'calendar_event_'.$action;
  }
}

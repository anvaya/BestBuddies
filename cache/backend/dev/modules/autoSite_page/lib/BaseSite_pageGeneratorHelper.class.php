<?php

/**
 * site_page module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage site_page
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSite_pageGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'site_page' : 'site_page_'.$action;
  }
}

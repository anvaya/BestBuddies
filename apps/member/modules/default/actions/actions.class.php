<?php
include sfConfig::get('sf_lib_dir')."/vendor/anvaya/util.php";
/**
 * default actions.
 *
 * @package    BestBuddies
 * @subpackage default
 * @author     Anvaya Technologies
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $to_encrypt = serialize(array(1, 2));
      $data = RIJNDAEL_encrypt($to_encrypt, sfConfig::get('sf_survey_encryption_key'));
      #die(urlencode($data));
  }
}

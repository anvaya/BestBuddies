<?php

require_once dirname(__FILE__).'/../lib/profileGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/profileGeneratorHelper.class.php';

/**
 * profile actions.
 *
 * @package    BestBuddies
 * @subpackage profile
 * @author     Anvaya Technologies
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends autoProfileActions
{
    public function executeIndex(sfWebRequest $request)
    {       
        
        $this->forward("profile","edit");
    }
    
  public function executeEdit(sfWebRequest $request)
  {
    $user_id = $this->getUser()->getGuardUser()->getId();
      
    $this->member = Doctrine::getTable('member')->find($user_id);
    $this->form = $this->configuration->getForm($this->member);
  }
    
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $member = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $member)));

     
      $this->getUser()->setFlash('notice', $notice);

      $this->redirect(array('sf_route' => 'default'));     
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}

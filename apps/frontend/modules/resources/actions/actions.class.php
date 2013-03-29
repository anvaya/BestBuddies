<?php

/**
 * resources actions.
 *
 * @package    BestBuddies
 * @subpackage resources
 * @author     Anvaya Technologies
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class resourcesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->resources = Doctrine_Core::getTable('resource')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new resourceForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new resourceForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($resource = Doctrine_Core::getTable('resource')->find(array($request->getParameter('id'))), sprintf('Object resource does not exist (%s).', $request->getParameter('id')));
    $this->form = new resourceForm($resource);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($resource = Doctrine_Core::getTable('resource')->find(array($request->getParameter('id'))), sprintf('Object resource does not exist (%s).', $request->getParameter('id')));
    $this->form = new resourceForm($resource);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($resource = Doctrine_Core::getTable('resource')->find(array($request->getParameter('id'))), sprintf('Object resource does not exist (%s).', $request->getParameter('id')));
    $resource->delete();

    $this->redirect('resources/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $resource = $form->save();

      $this->redirect('resources/edit?id='.$resource->getId());
    }
  }
}

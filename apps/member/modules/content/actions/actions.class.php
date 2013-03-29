<?php

require_once dirname(__FILE__).'/../lib/contentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/contentGeneratorHelper.class.php';

/**
 * content actions.
 *
 * @package    BestBuddies
 * @subpackage content
 * @author     Anvaya Technologies
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends autoContentActions
{
    public function executeShow(sfWebRequest $request)
    {
        $this->page = $this->getRoute()->getObject();        
    }
    
    public function executeResource(sfWebRequest $request)
    {
        $resource_id = $request->getParameter('rid',false);
        $resource = Doctrine::getTable('resource')->find($resource_id);
        
        if(!$resource) $this->forward404();               
        
        /* @var $resource resource  */
        
        $url = sfConfig::get('sf_data_dir')."/resources/".$resource->getFileName();
        
        $mimeType ="application/octet-stream";        
        $response = $this->getResponse();
        $response->setContentType($mimeType);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename="'.$resource->getDownloadFileName().'"');
        $response->setHttpHeader('Content-Length', filesize($url));
        $response->sendHttpHeaders();
        readfile($url);
        return sfView::NONE;
    }
}

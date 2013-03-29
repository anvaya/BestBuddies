<?php

/**
 * application
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class application extends Baseapplication
{
    public function getStatusName()
    {     
        $status = $this->getStatus();
        $status_vals = applicationTable::$APPLICATION_STATUS_VALUES;
        if($this->getStatus())
        {
            return $status_vals[$status];
        }        
        return applicationTable::$APPLICATION_STATUS_VALUES[applicationTable::STATUS_PENDING];
    }
}
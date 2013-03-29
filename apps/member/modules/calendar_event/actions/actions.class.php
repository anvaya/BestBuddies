<?php

require_once dirname(__FILE__).'/../lib/calendar_eventGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/calendar_eventGeneratorHelper.class.php';
require_once sfConfig::get('sf_lib_dir')."/vendor/anvaya/util.php";
/**
 * calendar_event actions.
 *
 * @package    BestBuddies
 * @subpackage calendar_event
 * @author     Anvaya Technologies
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendar_eventActions extends autoCalendar_eventActions
{
    public function executeCalendar(sfWebRequest $request)
    {
        
        if($request->getMethod()==sfWebRequest::POST)
        {
            $type    = $request->getParameter('viewtype');
            $jsdate  = $request->getParameter('showdate');
            $phpTime = js2PhpTime($jsdate);        

            switch($type)
            {
                case "month":
                    $st = mktime(0, 0, 0, date("m", $phpTime), 1, date("Y", $phpTime));
                    $et = mktime(0, 0, -1, date("m", $phpTime)+1, 1, date("Y", $phpTime));                
                    break;
                case "week":
                    //suppose first day of a week is monday 
                    $monday  =  date("d", $phpTime) - date('N', $phpTime) + 1;
                    //echo date('N', $phpTime);
                    $st = mktime(0,0,0,date("m", $phpTime), $monday, date("Y", $phpTime));
                    $et = mktime(0,0,-1,date("m", $phpTime), $monday+7, date("Y", $phpTime));

                    break;
                case "day":
                    $st = mktime(0, 0, 0, date("m", $phpTime), date("d", $phpTime), date("Y", $phpTime));
                    $et = mktime(0, 0, -1, date("m", $phpTime), date("d", $phpTime)+1, date("Y", $phpTime));                
                    break;
            }
            
            $events = calendar_eventTable::getEventListForPeriod(date('Y-m-d', $st), date('Y-m-d', $et));
            $ret = array('events'=>array(),'issort'=>true, 'start'=>php2JsTime($st), 'end'=>php2JsTime($et),'error'=>null);
            
            $datetime1 = date_create(date('Y-m-d h:i:s', $st));
            $datetime2 = date_create(date('Y-m-d h:i:s', $et));
            $interval = date_diff($datetime1, $datetime2);           
            $date_diff = intval($interval->format('%a'));
            
            foreach($events as $event)
            {
                /* @var $event calendar_event */
                $ret['events'][] = array
                                    (
                                        $event->getId(),
                                        $event->getTitle(),
                                        php2JsTime(mySql2PhpTime($event->getFromDate())),
                                        php2JsTime(mySql2PhpTime($event->getToDate())),
                                        0, //All Day
                                        ($date_diff>0?1:0), //more than one day event                                        
                                        0, //Recurring event                                        
                                        0, //Recurring event                                        
                                        0, //editable
                                        $event->getAddress().", ".$event->getCity(),
                                        ''//$attends                                        
                                    );
            }
            echo json_encode($ret);
            return sfView::NONE;            
        }       
        
    }
}

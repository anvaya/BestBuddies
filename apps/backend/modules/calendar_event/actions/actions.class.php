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
            if($request->hasParameter("method"))
            {
               $method = $request->getParameter('method');
               switch($method)
               {
                   case "add":
                       $from_time     = $request->getParameter('CalendarStartTime');
                       $to_time       = $request->getParameter('CalendarEndTime');
                       $title         = $request->getParameter('CalendarTitle');
                       $all_day_event = $request->getParameter('IsAllDayEvent');
                       $timezone      = $request->getParameter('timezone');

                       $php_fromtime = js2PhpTime($from_time);
                       $php_totime   = js2PhpTime($to_time);


                       break;
               }
            }

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

    public function executeQuickadd(sfWebRequest $request)
    {
        if($request->getMethod()==sfWebRequest::POST)
        {
          $start_time = date('Y-m-d H:i:s',js2PhpTime($request->getParameter('CalendarStartTime')));
          $end_time = date('Y-m-d H:i:s',js2PhpTime($request->getParameter('CalendarEndTime')));
          /*echo $request->getParameter('IsAllDayEvent');
          echo $request->getParameter('timezone');
          echo $request->getParameter('event_type');
          echo $request->getParameter('event_description');
          echo $request->getParameter('event_address');
          echo $request->getParameter('event_city');
          echo $request->getParameter('event_zip');
          exit;*/
          $ret = array();
          try
          {
            $calendar_event = new calendar_event();
            $calendar_event->setTitle($request->getParameter('CalendarTitle'));
            $calendar_event->setFromDate($start_time);
            $calendar_event->setToDate($end_time);
            
            $event_type = $request->getParameter('event_type');
            if($event_type == 'null')
            {
                $event_type = null;
            }
            $calendar_event->setEventTypeId($event_type);
            $calendar_event->setDescription($request->getParameter('event_description'));
            $calendar_event->setAddress($request->getParameter('event_address'));
            $calendar_event->setCity($request->getParameter('event_city'));
            $calendar_event->setZip($request->getParameter('event_zip'));
            $calendar_event->save();
            $ret['IsSuccess'] = true;
            $ret['Msg'] = 'add success';
            $ret['Data'] = $calendar_event->getId();
          }catch(Exception $e)
          {
            $ret['IsSuccess'] = false;
          }

          echo json_encode($ret);
          return sfView::NONE;

        }
    }

    public function executeEventtype(sfWebRequest $request)
    {
      $records = Doctrine_Query::create()
        ->from('event_type')
        ->execute();
      $str = "";
      foreach ($records as $record)
      {
        $str .= "<option value='".$record->getId()."'>".$record->getTypeName()."</option>";
      }
      //$str .= "</select>";
      echo $str;
      return sfView::NONE;
    }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->calendar_event = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->calendar_event);

    $this->editSuccess= false;
    $this->processForm($request, $this->form);

    if($this->editSuccess)
            $this->setTemplate('editajax');
    else
      $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->calendar_event = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->calendar_event);
    if($request->hasParameter('calendar'))
      $this->getUser()->setAttribute('calendar_event_id',$this->calendar_event->getId());
  }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
        $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

        try {
          $calendar_event = $form->save();
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

        $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $calendar_event)));

        if ($request->hasParameter('_save_and_add'))
        {
          $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

          $this->redirect('@calendar_event_new');
        }
        else
        {
          $this->getUser()->setFlash('notice', $notice);

          if($this->getUser()->getAttribute('calendar_event_id',0)  == $calendar_event->getId())
          {
            $this->getUser()->getAttributeHolder()->remove('calendar_event_id');
            $this->editSuccess = true;
          }
          else
            $this->redirect(array('sf_route' => 'calendar_event_edit', 'sf_subject' => $calendar_event));
        }
      }
      else
      {
        $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
      }
    }

}

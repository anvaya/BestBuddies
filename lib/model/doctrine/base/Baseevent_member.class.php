<?php

/**
 * Baseevent_member
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $event_id
 * @property integer $member_id
 * @property calendar_event $calendar_event
 * @property member $member
 * 
 * @method integer        getEventId()        Returns the current record's "event_id" value
 * @method integer        getMemberId()       Returns the current record's "member_id" value
 * @method calendar_event getCalendarEvent()  Returns the current record's "calendar_event" value
 * @method member         getMember()         Returns the current record's "member" value
 * @method event_member   setEventId()        Sets the current record's "event_id" value
 * @method event_member   setMemberId()       Sets the current record's "member_id" value
 * @method event_member   setCalendarEvent()  Sets the current record's "calendar_event" value
 * @method event_member   setMember()         Sets the current record's "member" value
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Baseevent_member extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('event_member');
        $this->hasColumn('event_id', 'integer', 8, array(
             'type' => 'integer',
             'size' => 8,
             'unsigned' => true,
             'notnull' => false,
             'length' => 8,
             ));
        $this->hasColumn('member_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('calendar_event', array(
             'local' => 'event_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
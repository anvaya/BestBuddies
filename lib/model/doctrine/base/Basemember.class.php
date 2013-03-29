<?php

/**
 * Basemember
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property member_type $member_type
 * @property application $application
 * @property Doctrine_Collection $survey_invitation
 * @property Doctrine_Collection $survey_submission
 * @property Doctrine_Collection $calendar_event
 * @property Doctrine_Collection $event_member
 * @property Doctrine_Collection $blog
 * @property Doctrine_Collection $blog_comment
 * 
 * @method member_type         getMemberType()        Returns the current record's "member_type" value
 * @method application         getApplication()       Returns the current record's "application" value
 * @method Doctrine_Collection getSurveyInvitation()  Returns the current record's "survey_invitation" collection
 * @method Doctrine_Collection getSurveySubmission()  Returns the current record's "survey_submission" collection
 * @method Doctrine_Collection getCalendarEvent()     Returns the current record's "calendar_event" collection
 * @method Doctrine_Collection getEventMember()       Returns the current record's "event_member" collection
 * @method Doctrine_Collection getBlog()              Returns the current record's "blog" collection
 * @method Doctrine_Collection getBlogComment()       Returns the current record's "blog_comment" collection
 * @method member              setMemberType()        Sets the current record's "member_type" value
 * @method member              setApplication()       Sets the current record's "application" value
 * @method member              setSurveyInvitation()  Sets the current record's "survey_invitation" collection
 * @method member              setSurveySubmission()  Sets the current record's "survey_submission" collection
 * @method member              setCalendarEvent()     Sets the current record's "calendar_event" collection
 * @method member              setEventMember()       Sets the current record's "event_member" collection
 * @method member              setBlog()              Sets the current record's "blog" collection
 * @method member              setBlogComment()       Sets the current record's "blog_comment" collection
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basemember extends sfGuardUser
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('member_type', array(
             'local' => 'member_type_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('application', array(
             'local' => 'application_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('survey_invitation', array(
             'local' => 'id',
             'foreign' => 'member_id'));

        $this->hasMany('survey_submission', array(
             'local' => 'id',
             'foreign' => 'member_id'));

        $this->hasMany('calendar_event', array(
             'local' => 'id',
             'foreign' => 'member_id'));

        $this->hasMany('event_member', array(
             'local' => 'id',
             'foreign' => 'member_id'));

        $this->hasMany('blog', array(
             'local' => 'id',
             'foreign' => 'author_id'));

        $this->hasMany('blog_comment', array(
             'local' => 'id',
             'foreign' => 'author_id'));
    }
}
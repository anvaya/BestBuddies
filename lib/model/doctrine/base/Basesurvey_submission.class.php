<?php

/**
 * Basesurvey_submission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $survey_id
 * @property integer $status
 * @property integer $member_id
 * @property integer $page_number
 * @property survey $survey
 * @property member $member
 * @property Doctrine_Collection $survey_data
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method integer             getSurveyId()    Returns the current record's "survey_id" value
 * @method integer             getStatus()      Returns the current record's "status" value
 * @method integer             getMemberId()    Returns the current record's "member_id" value
 * @method integer             getPageNumber()  Returns the current record's "page_number" value
 * @method survey              getSurvey()      Returns the current record's "survey" value
 * @method member              getMember()      Returns the current record's "member" value
 * @method Doctrine_Collection getSurveyData()  Returns the current record's "survey_data" collection
 * @method survey_submission   setId()          Sets the current record's "id" value
 * @method survey_submission   setSurveyId()    Sets the current record's "survey_id" value
 * @method survey_submission   setStatus()      Sets the current record's "status" value
 * @method survey_submission   setMemberId()    Sets the current record's "member_id" value
 * @method survey_submission   setPageNumber()  Sets the current record's "page_number" value
 * @method survey_submission   setSurvey()      Sets the current record's "survey" value
 * @method survey_submission   setMember()      Sets the current record's "member" value
 * @method survey_submission   setSurveyData()  Sets the current record's "survey_data" collection
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basesurvey_submission extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('survey_submission');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'size' => 8,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('survey_id', 'integer', 4, array(
             'type' => 'integer',
             'size' => 4,
             'unsigned' => true,
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'size' => 1,
             'notnull' => false,
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('member_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('page_number', 'integer', 2, array(
             'type' => 'integer',
             'size' => 2,
             'unsigned' => true,
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('survey', array(
             'local' => 'survey_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasMany('survey_data', array(
             'local' => 'id',
             'foreign' => 'submission_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
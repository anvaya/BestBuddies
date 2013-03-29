<?php

/**
 * Basesurvey
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property integer $status
 * @property varchar $title
 * @property date $start_date
 * @property date $end_date
 * @property varchar $template_name
 * @property varchar $css_file
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $surveyMemberTypes
 * @property Doctrine_Collection $survey_membertype
 * @property Doctrine_Collection $survey_question
 * @property Doctrine_Collection $survey_invitation
 * @property Doctrine_Collection $survey_submission
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method integer             getUserId()            Returns the current record's "user_id" value
 * @method integer             getStatus()            Returns the current record's "status" value
 * @method varchar             getTitle()             Returns the current record's "title" value
 * @method date                getStartDate()         Returns the current record's "start_date" value
 * @method date                getEndDate()           Returns the current record's "end_date" value
 * @method varchar             getTemplateName()      Returns the current record's "template_name" value
 * @method varchar             getCssFile()           Returns the current record's "css_file" value
 * @method sfGuardUser         getSfGuardUser()       Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getSurveyMemberTypes() Returns the current record's "surveyMemberTypes" collection
 * @method Doctrine_Collection getSurveyMembertype()  Returns the current record's "survey_membertype" collection
 * @method Doctrine_Collection getSurveyQuestion()    Returns the current record's "survey_question" collection
 * @method Doctrine_Collection getSurveyInvitation()  Returns the current record's "survey_invitation" collection
 * @method Doctrine_Collection getSurveySubmission()  Returns the current record's "survey_submission" collection
 * @method survey              setId()                Sets the current record's "id" value
 * @method survey              setUserId()            Sets the current record's "user_id" value
 * @method survey              setStatus()            Sets the current record's "status" value
 * @method survey              setTitle()             Sets the current record's "title" value
 * @method survey              setStartDate()         Sets the current record's "start_date" value
 * @method survey              setEndDate()           Sets the current record's "end_date" value
 * @method survey              setTemplateName()      Sets the current record's "template_name" value
 * @method survey              setCssFile()           Sets the current record's "css_file" value
 * @method survey              setSfGuardUser()       Sets the current record's "sfGuardUser" value
 * @method survey              setSurveyMemberTypes() Sets the current record's "surveyMemberTypes" collection
 * @method survey              setSurveyMembertype()  Sets the current record's "survey_membertype" collection
 * @method survey              setSurveyQuestion()    Sets the current record's "survey_question" collection
 * @method survey              setSurveyInvitation()  Sets the current record's "survey_invitation" collection
 * @method survey              setSurveySubmission()  Sets the current record's "survey_submission" collection
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basesurvey extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('survey');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'size' => 4,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'size' => 1,
             'length' => 1,
             ));
        $this->hasColumn('title', 'varchar', 400, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 400,
             ));
        $this->hasColumn('start_date', 'date', null, array(
             'type' => 'date',
             'notnull' => false,
             ));
        $this->hasColumn('end_date', 'date', null, array(
             'type' => 'date',
             'notnull' => false,
             ));
        $this->hasColumn('template_name', 'varchar', 100, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 100,
             ));
        $this->hasColumn('css_file', 'varchar', 100, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('member_type as surveyMemberTypes', array(
             'refClass' => 'survey_membertype',
             'local' => 'survey_id',
             'foreign' => 'member_type_id'));

        $this->hasMany('survey_membertype', array(
             'local' => 'id',
             'foreign' => 'survey_id'));

        $this->hasMany('survey_question', array(
             'local' => 'id',
             'foreign' => 'survey_id'));

        $this->hasMany('survey_invitation', array(
             'local' => 'id',
             'foreign' => 'survey_id'));

        $this->hasMany('survey_submission', array(
             'local' => 'id',
             'foreign' => 'survey_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
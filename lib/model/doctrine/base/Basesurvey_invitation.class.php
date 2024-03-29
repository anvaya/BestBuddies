<?php

/**
 * Basesurvey_invitation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $survey_id
 * @property integer $member_id
 * @property varchar $email_address
 * @property boolean $sent
 * @property survey $survey
 * @property member $member
 * 
 * @method integer           getId()            Returns the current record's "id" value
 * @method integer           getSurveyId()      Returns the current record's "survey_id" value
 * @method integer           getMemberId()      Returns the current record's "member_id" value
 * @method varchar           getEmailAddress()  Returns the current record's "email_address" value
 * @method boolean           getSent()          Returns the current record's "sent" value
 * @method survey            getSurvey()        Returns the current record's "survey" value
 * @method member            getMember()        Returns the current record's "member" value
 * @method survey_invitation setId()            Sets the current record's "id" value
 * @method survey_invitation setSurveyId()      Sets the current record's "survey_id" value
 * @method survey_invitation setMemberId()      Sets the current record's "member_id" value
 * @method survey_invitation setEmailAddress()  Sets the current record's "email_address" value
 * @method survey_invitation setSent()          Sets the current record's "sent" value
 * @method survey_invitation setSurvey()        Sets the current record's "survey" value
 * @method survey_invitation setMember()        Sets the current record's "member" value
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basesurvey_invitation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('survey_invitation');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'size' => 4,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('survey_id', 'integer', 4, array(
             'type' => 'integer',
             'size' => 4,
             'unsigned' => true,
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('member_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('email_address', 'varchar', 80, array(
             'type' => 'varchar',
             'notnull' => true,
             'length' => 80,
             ));
        $this->hasColumn('sent', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
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
             'onDelete' => 'CASCADE'));
    }
}
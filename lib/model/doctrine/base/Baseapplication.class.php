<?php

/**
 * Baseapplication
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $member_type_id
 * @property integer $status
 * @property varchar $title
 * @property varchar $first_name
 * @property varchar $last_name
 * @property varchar $email_address
 * @property integer $submission_id
 * @property integer $program_year_id
 * @property member_type $member_type
 * @property program_year $program_year
 * @property Doctrine_Collection $member
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getMemberTypeId()    Returns the current record's "member_type_id" value
 * @method integer             getStatus()          Returns the current record's "status" value
 * @method varchar             getTitle()           Returns the current record's "title" value
 * @method varchar             getFirstName()       Returns the current record's "first_name" value
 * @method varchar             getLastName()        Returns the current record's "last_name" value
 * @method varchar             getEmailAddress()    Returns the current record's "email_address" value
 * @method integer             getSubmissionId()    Returns the current record's "submission_id" value
 * @method integer             getProgramYearId()   Returns the current record's "program_year_id" value
 * @method member_type         getMemberType()      Returns the current record's "member_type" value
 * @method program_year        getProgramYear()     Returns the current record's "program_year" value
 * @method Doctrine_Collection getMember()          Returns the current record's "member" collection
 * @method application         setId()              Sets the current record's "id" value
 * @method application         setMemberTypeId()    Sets the current record's "member_type_id" value
 * @method application         setStatus()          Sets the current record's "status" value
 * @method application         setTitle()           Sets the current record's "title" value
 * @method application         setFirstName()       Sets the current record's "first_name" value
 * @method application         setLastName()        Sets the current record's "last_name" value
 * @method application         setEmailAddress()    Sets the current record's "email_address" value
 * @method application         setSubmissionId()    Sets the current record's "submission_id" value
 * @method application         setProgramYearId()   Sets the current record's "program_year_id" value
 * @method application         setMemberType()      Sets the current record's "member_type" value
 * @method application         setProgramYear()     Sets the current record's "program_year" value
 * @method application         setMember()          Sets the current record's "member" collection
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Baseapplication extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('application');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'size' => 4,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('member_type_id', 'integer', 2, array(
             'type' => 'integer',
             'size' => 2,
             'unsigned' => true,
             'notnull' => false,
             'length' => 2,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'size' => 1,
             'notnull' => false,
             'length' => 1,
             ));
        $this->hasColumn('title', 'varchar', 6, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 6,
             ));
        $this->hasColumn('first_name', 'varchar', 20, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 20,
             ));
        $this->hasColumn('last_name', 'varchar', 20, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 20,
             ));
        $this->hasColumn('email_address', 'varchar', 80, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 80,
             ));
        $this->hasColumn('submission_id', 'integer', 8, array(
             'type' => 'integer',
             'size' => 8,
             'notnull' => false,
             'length' => 8,
             ));
        $this->hasColumn('program_year_id', 'integer', 2, array(
             'type' => 'integer',
             'size' => 2,
             'notnull' => false,
             'unsigned' => true,
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('member_type', array(
             'local' => 'member_type_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('program_year', array(
             'local' => 'program_year_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('member', array(
             'local' => 'id',
             'foreign' => 'application_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
<?php

/**
 * Basesubmission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $form_id
 * @property integer $user_id
 * @property integer $submission_ip
 * @property boolean $archieved
 * @property sfGuardUser $sfGuardUser
 * @property submission_form $submission_form
 * @property Doctrine_Collection $submission_data
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getFormId()          Returns the current record's "form_id" value
 * @method integer             getUserId()          Returns the current record's "user_id" value
 * @method integer             getSubmissionIp()    Returns the current record's "submission_ip" value
 * @method boolean             getArchieved()       Returns the current record's "archieved" value
 * @method sfGuardUser         getSfGuardUser()     Returns the current record's "sfGuardUser" value
 * @method submission_form     getSubmissionForm()  Returns the current record's "submission_form" value
 * @method Doctrine_Collection getSubmissionData()  Returns the current record's "submission_data" collection
 * @method submission          setId()              Sets the current record's "id" value
 * @method submission          setFormId()          Sets the current record's "form_id" value
 * @method submission          setUserId()          Sets the current record's "user_id" value
 * @method submission          setSubmissionIp()    Sets the current record's "submission_ip" value
 * @method submission          setArchieved()       Sets the current record's "archieved" value
 * @method submission          setSfGuardUser()     Sets the current record's "sfGuardUser" value
 * @method submission          setSubmissionForm()  Sets the current record's "submission_form" value
 * @method submission          setSubmissionData()  Sets the current record's "submission_data" collection
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basesubmission extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('submission');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'size' => 8,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('form_id', 'integer', 4, array(
             'type' => 'integer',
             'size' => 4,
             'unsigned' => true,
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('submission_ip', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('archieved', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
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

        $this->hasOne('submission_form', array(
             'local' => 'form_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('submission_data', array(
             'local' => 'id',
             'foreign' => 'submission_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}
<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('sfGuardUser', 'doctrine');

/**
 * BasesfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property string $username
 * @property string $algorithm
 * @property string $salt
 * @property string $password
 * @property boolean $is_active
 * @property boolean $is_super_admin
 * @property timestamp $last_login
 * @property integer $is_member
 * @property integer $member_type_id
 * @property varchar $country
 * @property integer $application_id
 * @property varchar $timezone
 * @property varchar $culture
 * @property Doctrine_Collection $Groups
 * @property Doctrine_Collection $Permissions
 * @property Doctrine_Collection $sfGuardUserPermission
 * @property Doctrine_Collection $sfGuardUserGroup
 * @property sfGuardRememberKey $RememberKeys
 * @property sfGuardForgotPassword $ForgotPassword
 * @property Doctrine_Collection $submission
 * @property Doctrine_Collection $survey
 * 
 * @method string                getFirstName()             Returns the current record's "first_name" value
 * @method string                getLastName()              Returns the current record's "last_name" value
 * @method string                getEmailAddress()          Returns the current record's "email_address" value
 * @method string                getUsername()              Returns the current record's "username" value
 * @method string                getAlgorithm()             Returns the current record's "algorithm" value
 * @method string                getSalt()                  Returns the current record's "salt" value
 * @method string                getPassword()              Returns the current record's "password" value
 * @method boolean               getIsActive()              Returns the current record's "is_active" value
 * @method boolean               getIsSuperAdmin()          Returns the current record's "is_super_admin" value
 * @method timestamp             getLastLogin()             Returns the current record's "last_login" value
 * @method integer               getIsMember()              Returns the current record's "is_member" value
 * @method integer               getMemberTypeId()          Returns the current record's "member_type_id" value
 * @method varchar               getCountry()               Returns the current record's "country" value
 * @method integer               getApplicationId()         Returns the current record's "application_id" value
 * @method varchar               getTimezone()              Returns the current record's "timezone" value
 * @method varchar               getCulture()               Returns the current record's "culture" value
 * @method Doctrine_Collection   getGroups()                Returns the current record's "Groups" collection
 * @method Doctrine_Collection   getPermissions()           Returns the current record's "Permissions" collection
 * @method Doctrine_Collection   getSfGuardUserPermission() Returns the current record's "sfGuardUserPermission" collection
 * @method Doctrine_Collection   getSfGuardUserGroup()      Returns the current record's "sfGuardUserGroup" collection
 * @method sfGuardRememberKey    getRememberKeys()          Returns the current record's "RememberKeys" value
 * @method sfGuardForgotPassword getForgotPassword()        Returns the current record's "ForgotPassword" value
 * @method Doctrine_Collection   getSubmission()            Returns the current record's "submission" collection
 * @method Doctrine_Collection   getSurvey()                Returns the current record's "survey" collection
 * @method sfGuardUser           setFirstName()             Sets the current record's "first_name" value
 * @method sfGuardUser           setLastName()              Sets the current record's "last_name" value
 * @method sfGuardUser           setEmailAddress()          Sets the current record's "email_address" value
 * @method sfGuardUser           setUsername()              Sets the current record's "username" value
 * @method sfGuardUser           setAlgorithm()             Sets the current record's "algorithm" value
 * @method sfGuardUser           setSalt()                  Sets the current record's "salt" value
 * @method sfGuardUser           setPassword()              Sets the current record's "password" value
 * @method sfGuardUser           setIsActive()              Sets the current record's "is_active" value
 * @method sfGuardUser           setIsSuperAdmin()          Sets the current record's "is_super_admin" value
 * @method sfGuardUser           setLastLogin()             Sets the current record's "last_login" value
 * @method sfGuardUser           setIsMember()              Sets the current record's "is_member" value
 * @method sfGuardUser           setMemberTypeId()          Sets the current record's "member_type_id" value
 * @method sfGuardUser           setCountry()               Sets the current record's "country" value
 * @method sfGuardUser           setApplicationId()         Sets the current record's "application_id" value
 * @method sfGuardUser           setTimezone()              Sets the current record's "timezone" value
 * @method sfGuardUser           setCulture()               Sets the current record's "culture" value
 * @method sfGuardUser           setGroups()                Sets the current record's "Groups" collection
 * @method sfGuardUser           setPermissions()           Sets the current record's "Permissions" collection
 * @method sfGuardUser           setSfGuardUserPermission() Sets the current record's "sfGuardUserPermission" collection
 * @method sfGuardUser           setSfGuardUserGroup()      Sets the current record's "sfGuardUserGroup" collection
 * @method sfGuardUser           setRememberKeys()          Sets the current record's "RememberKeys" value
 * @method sfGuardUser           setForgotPassword()        Sets the current record's "ForgotPassword" value
 * @method sfGuardUser           setSubmission()            Sets the current record's "submission" collection
 * @method sfGuardUser           setSurvey()                Sets the current record's "survey" collection
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user');
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email_address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('username', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 128,
             ));
        $this->hasColumn('algorithm', 'string', 128, array(
             'type' => 'string',
             'default' => 'sha1',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('salt', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
        $this->hasColumn('is_super_admin', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('is_member', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             'size' => 1,
             'notnull' => false,
             ));
        $this->hasColumn('member_type_id', 'integer', 2, array(
             'type' => 'integer',
             'size' => 2,
             'unsigned' => true,
             'notnull' => false,
             'length' => 2,
             ));
        $this->hasColumn('country', 'varchar', 6, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 6,
             ));
        $this->hasColumn('application_id', 'integer', 4, array(
             'type' => 'integer',
             'size' => 4,
             'notnull' => false,
             'unsigned' => true,
             'length' => 4,
             ));
        $this->hasColumn('timezone', 'varchar', 255, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('culture', 'varchar', 255, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 255,
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
        $this->setSubClasses(array(
             'member' => 
             array(
              'is_member' => 1,
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardGroup as Groups', array(
             'refClass' => 'sfGuardUserGroup',
             'local' => 'user_id',
             'foreign' => 'group_id'));

        $this->hasMany('sfGuardPermission as Permissions', array(
             'refClass' => 'sfGuardUserPermission',
             'local' => 'user_id',
             'foreign' => 'permission_id'));

        $this->hasMany('sfGuardUserPermission', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('sfGuardUserGroup', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardRememberKey as RememberKeys', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardForgotPassword as ForgotPassword', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('submission', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('survey', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}
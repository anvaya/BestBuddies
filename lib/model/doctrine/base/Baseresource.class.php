<?php

/**
 * Baseresource
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $resource_type
 * @property boolean $members_only
 * @property integer $program_year_id
 * @property boolean $disabled
 * @property string $download_file_name
 * @property string $file_name
 * @property program_year $program_year
 * @property Doctrine_Collection $resourceMemberTypes
 * @property Doctrine_Collection $resource_membertype
 * 
 * @method integer             getId()                  Returns the current record's "id" value
 * @method string              getTitle()               Returns the current record's "title" value
 * @method string              getResourceType()        Returns the current record's "resource_type" value
 * @method boolean             getMembersOnly()         Returns the current record's "members_only" value
 * @method integer             getProgramYearId()       Returns the current record's "program_year_id" value
 * @method boolean             getDisabled()            Returns the current record's "disabled" value
 * @method string              getDownloadFileName()    Returns the current record's "download_file_name" value
 * @method string              getFileName()            Returns the current record's "file_name" value
 * @method program_year        getProgramYear()         Returns the current record's "program_year" value
 * @method Doctrine_Collection getResourceMemberTypes() Returns the current record's "resourceMemberTypes" collection
 * @method Doctrine_Collection getResourceMembertype()  Returns the current record's "resource_membertype" collection
 * @method resource            setId()                  Sets the current record's "id" value
 * @method resource            setTitle()               Sets the current record's "title" value
 * @method resource            setResourceType()        Sets the current record's "resource_type" value
 * @method resource            setMembersOnly()         Sets the current record's "members_only" value
 * @method resource            setProgramYearId()       Sets the current record's "program_year_id" value
 * @method resource            setDisabled()            Sets the current record's "disabled" value
 * @method resource            setDownloadFileName()    Sets the current record's "download_file_name" value
 * @method resource            setFileName()            Sets the current record's "file_name" value
 * @method resource            setProgramYear()         Sets the current record's "program_year" value
 * @method resource            setResourceMemberTypes() Sets the current record's "resourceMemberTypes" collection
 * @method resource            setResourceMembertype()  Sets the current record's "resource_membertype" collection
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Baseresource extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('resource');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'size' => 4,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'size' => 255,
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('resource_type', 'string', 100, array(
             'type' => 'string',
             'size' => 100,
             'notnull' => false,
             'length' => 100,
             ));
        $this->hasColumn('members_only', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('program_year_id', 'integer', 2, array(
             'type' => 'integer',
             'size' => 2,
             'unsigned' => true,
             'notnull' => false,
             'length' => 2,
             ));
        $this->hasColumn('disabled', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             ));
        $this->hasColumn('download_file_name', 'string', 150, array(
             'type' => 'string',
             'size' => 150,
             'notnull' => false,
             'length' => 150,
             ));
        $this->hasColumn('file_name', 'string', 150, array(
             'type' => 'string',
             'size' => 150,
             'notnull' => false,
             'length' => 150,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('program_year', array(
             'local' => 'program_year_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('member_type as resourceMemberTypes', array(
             'refClass' => 'resource_membertype',
             'local' => 'resource_id',
             'foreign' => 'member_type_id'));

        $this->hasMany('resource_membertype', array(
             'local' => 'id',
             'foreign' => 'resource_id'));
    }
}
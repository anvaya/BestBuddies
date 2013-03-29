<?php

/**
 * Basecountry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property varchar $country_code
 * @property boolean $disabled
 * 
 * @method varchar getCountryCode()  Returns the current record's "country_code" value
 * @method boolean getDisabled()     Returns the current record's "disabled" value
 * @method country setCountryCode()  Sets the current record's "country_code" value
 * @method country setDisabled()     Sets the current record's "disabled" value
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basecountry extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('country');
        $this->hasColumn('country_code', 'varchar', 6, array(
             'type' => 'varchar',
             'primary' => true,
             'unique' => true,
             'length' => 6,
             ));
        $this->hasColumn('disabled', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}
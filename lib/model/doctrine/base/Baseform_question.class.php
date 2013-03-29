<?php

/**
 * Baseform_question
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $form_id
 * @property boolean $mandatory
 * @property varchar $group_code
 * @property integer $display_order
 * @property varchar $css_class
 * @property integer $page_num
 * @property submission_form $submission_form
 * @property Doctrine_Collection $formquestion_option
 * @property Doctrine_Collection $submission_data
 * 
 * @method integer             getFormId()              Returns the current record's "form_id" value
 * @method boolean             getMandatory()           Returns the current record's "mandatory" value
 * @method varchar             getGroupCode()           Returns the current record's "group_code" value
 * @method integer             getDisplayOrder()        Returns the current record's "display_order" value
 * @method varchar             getCssClass()            Returns the current record's "css_class" value
 * @method integer             getPageNum()             Returns the current record's "page_num" value
 * @method submission_form     getSubmissionForm()      Returns the current record's "submission_form" value
 * @method Doctrine_Collection getFormquestionOption()  Returns the current record's "formquestion_option" collection
 * @method Doctrine_Collection getSubmissionData()      Returns the current record's "submission_data" collection
 * @method form_question       setFormId()              Sets the current record's "form_id" value
 * @method form_question       setMandatory()           Sets the current record's "mandatory" value
 * @method form_question       setGroupCode()           Sets the current record's "group_code" value
 * @method form_question       setDisplayOrder()        Sets the current record's "display_order" value
 * @method form_question       setCssClass()            Sets the current record's "css_class" value
 * @method form_question       setPageNum()             Sets the current record's "page_num" value
 * @method form_question       setSubmissionForm()      Sets the current record's "submission_form" value
 * @method form_question       setFormquestionOption()  Sets the current record's "formquestion_option" collection
 * @method form_question       setSubmissionData()      Sets the current record's "submission_data" collection
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Baseform_question extends question
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('form_question');
        $this->hasColumn('form_id', 'integer', 4, array(
             'type' => 'integer',
             'size' => 4,
             'unsigned' => true,
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('mandatory', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('group_code', 'varchar', 20, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 20,
             ));
        $this->hasColumn('display_order', 'integer', 2, array(
             'type' => 'integer',
             'size' => 2,
             'notnull' => false,
             'unsigned' => true,
             'length' => 2,
             ));
        $this->hasColumn('css_class', 'varchar', 30, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 30,
             ));
        $this->hasColumn('page_num', 'integer', 2, array(
             'type' => 'integer',
             'size' => 2,
             'notnull' => false,
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('submission_form', array(
             'local' => 'form_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('formquestion_option', array(
             'local' => 'id',
             'foreign' => 'question_id'));

        $this->hasMany('submission_data', array(
             'local' => 'id',
             'foreign' => 'question_id'));
    }
}
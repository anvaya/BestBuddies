<?php

/**
 * Basesurvey_data
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $submission_id
 * @property integer $survey_question_id
 * @property integer $question_bank_id
 * @property varchar $answer_text
 * @property varchar $selected_options
 * @property survey_submission $survey_submission
 * @property survey_question $survey_question
 * @property question_bank $question_bank
 * 
 * @method integer           getId()                 Returns the current record's "id" value
 * @method integer           getSubmissionId()       Returns the current record's "submission_id" value
 * @method integer           getSurveyQuestionId()   Returns the current record's "survey_question_id" value
 * @method integer           getQuestionBankId()     Returns the current record's "question_bank_id" value
 * @method varchar           getAnswerText()         Returns the current record's "answer_text" value
 * @method varchar           getSelectedOptions()    Returns the current record's "selected_options" value
 * @method survey_submission getSurveySubmission()   Returns the current record's "survey_submission" value
 * @method survey_question   getSurveyQuestion()     Returns the current record's "survey_question" value
 * @method question_bank     getQuestionBank()       Returns the current record's "question_bank" value
 * @method survey_data       setId()                 Sets the current record's "id" value
 * @method survey_data       setSubmissionId()       Sets the current record's "submission_id" value
 * @method survey_data       setSurveyQuestionId()   Sets the current record's "survey_question_id" value
 * @method survey_data       setQuestionBankId()     Sets the current record's "question_bank_id" value
 * @method survey_data       setAnswerText()         Sets the current record's "answer_text" value
 * @method survey_data       setSelectedOptions()    Sets the current record's "selected_options" value
 * @method survey_data       setSurveySubmission()   Sets the current record's "survey_submission" value
 * @method survey_data       setSurveyQuestion()     Sets the current record's "survey_question" value
 * @method survey_data       setQuestionBank()       Sets the current record's "question_bank" value
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basesurvey_data extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('survey_data');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'size' => 8,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('submission_id', 'integer', 8, array(
             'type' => 'integer',
             'size' => 8,
             'unsigned' => true,
             'notnull' => false,
             'length' => 8,
             ));
        $this->hasColumn('survey_question_id', 'integer', 8, array(
             'type' => 'integer',
             'size' => 8,
             'unsigned' => true,
             'notnull' => false,
             'length' => 8,
             ));
        $this->hasColumn('question_bank_id', 'integer', 8, array(
             'type' => 'integer',
             'size' => 8,
             'unsigned' => true,
             'notnull' => false,
             'length' => 8,
             ));
        $this->hasColumn('answer_text', 'varchar', 2000, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 2000,
             ));
        $this->hasColumn('selected_options', 'varchar', 2000, array(
             'type' => 'varchar',
             'notnull' => false,
             'length' => 2000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('survey_submission', array(
             'local' => 'submission_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('survey_question', array(
             'local' => 'survey_question_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('question_bank', array(
             'local' => 'question_bank_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));
    }
}
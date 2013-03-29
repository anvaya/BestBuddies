<?php

/**
 * questionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class questionTable extends Doctrine_Table 
{
    const ANSWER_TYPE_SELECT  = 0;
    const ANSWER_TYPE_TEXT  = 1;
    const ANSWER_TYPE_LONGTEXT = 2;
    const ANSWER_TYPE_EMAIL = 3;
    const ANSWER_TYPE_COUNTRY = 4;
    const ANSWER_TYPE_PROGRAM_YEAR = 5;
    const ANSWER_TYPE_SINGLE_CHOICE = 6;
    const ANSWER_TYPE_MULTI_CHOICE = 7;        
    const ANSWER_TYPE_FILE = 8;    
    const ANSWER_TYPE_SINGLE_CHOICE_WITH_TEXT = 9;
    const ANSWER_TYPE_MULTI_CHOICE_WITH_TEXT = 10;    
    const ANSWER_TYPE_DATE = 11;
    const ANSWER_TYPE_DATE_PERIOD= 12;
    const ANSWER_TYPE_QUESTION_GROUP=13;
    
    public static $ANSWER_TYPES = array(
        self::ANSWER_TYPE_SELECT  => "Select",
        self::ANSWER_TYPE_TEXT=>"Text - Single Line",
        self::ANSWER_TYPE_LONGTEXT=>"Text - Multi Line",        
        self::ANSWER_TYPE_EMAIL=>"Email Address",
        self::ANSWER_TYPE_PROGRAM_YEAR=>"Program Year Selection",
        self::ANSWER_TYPE_COUNTRY=>"Country Selection",
        self::ANSWER_TYPE_SINGLE_CHOICE=>"Single Choice",
        self::ANSWER_TYPE_MULTI_CHOICE=>"Multi Choice",
        self::ANSWER_TYPE_SINGLE_CHOICE_WITH_TEXT=>"Single Choice with Custom Text",
        self::ANSWER_TYPE_MULTI_CHOICE_WITH_TEXT=>"Multiple Choices with Custom Text",
        self::ANSWER_TYPE_FILE=>"Upload File",
        self::ANSWER_TYPE_DATE=>"Date",
        self::ANSWER_TYPE_DATE_PERIOD=>"Date Period",
        self::ANSWER_TYPE_QUESTION_GROUP=>"Question Group"
            
    );

    /**
     * Returns an instance of this class.
     *
     * @return object questionTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('question');
    }

    public function getQuestionGroupsQuery()
    {
        return $this->createQuery('q')
                ->addWhere('q.answer_type = ?', self::ANSWER_TYPE_QUESTION_GROUP)
                ->orderBy('q.question_text');
        
        
    }
}
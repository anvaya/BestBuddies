<?php

/**
 * question_bank
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    BestBuddies
 * @subpackage model
 * @author     Anvaya Technologies
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class question_bank extends Basequestion_bank
{
    public function getAnswerTypeName()
    {
        if($this->getAnswerType())
        {
            return question_bankTable::$ANSWER_TYPES[$this->getAnswerType()];
        }
        return "";
    }
    
    public function __toString() {
        if($this->getQuestionText())
            return $this->getQuestionText ();
        
        return "";
    }
}
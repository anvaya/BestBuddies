<?php
/**
 * Collection of Survey Questions - Subform for the survey form.
 *
 * @author Mrugendra Bhure
 */
class surveyQuestionsCollectionForm extends sfForm
{
    const MASTER_MODEL = "survey";
    
    public function configure() 
    {
        if(!$master = $this->getOption(self::MASTER_MODEL))
        {
            throw new InvalidArgumentException('You must provide a '.self::MASTER_MODEL.' object');
        }               
                
        /* @var $master survey */        
        $details = $master->getSurveyQuestion();                
        
        foreach($details as $key=>$value)
        {            
            $form = new survey_questionForm($value);
            $this->embedForm($key, $form);
        }
        
        parent::configure();
        $this->mergePostValidator(new surveyQuestionValidatorSchema());
    }
    
    public function addDetailRow($key, $question_id=false)
    {
        $detail = new survey_question();
        $master = $this->getOption(self::MASTER_MODEL);
        $detail->setSurvey($master);
    
        if($question_id)            
        {
            $detail->setQuestionId($question_id);
        }
        
        $form = new survey_questionForm($detail);
        
        $this->embedForm($key, $form);
        return $this->embeddedForms[$key];
    }
}

?>
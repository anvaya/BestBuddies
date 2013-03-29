<?php
/**
 * Description of submissionDataCollectionForm
 *
 * @author Mrugendra Bhure
 */
class submissionDataCollectionForm extends sfForm
{
    const MASTER_MODEL = "submission";
    
    public function configure() 
    {
        if(!$master = $this->getOption(self::MASTER_MODEL))
        {
            throw new InvalidArgumentException('You must provide a '.self::MASTER_MODEL.' object');
        }               
                
        $ids = $this->getOption("question_ids", array(0));
        
        /* @var $master submission */        
        $details = submission_dataTable::findBySubmissionIdAndQuestionIds($master->getId(), $ids);
        
        foreach($details as $key=>$value)
        {            
            $form = new profileDataEditForm($value);
            $this->embedForm($key, $form);
        }
        
        parent::configure();
        //$this->mergePostValidator(new surveyQuestionValidatorSchema());
    }
}

?>
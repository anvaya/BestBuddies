<?php
/**
 * Description of surveyDataCollectionForm
 *
 * @author Mrugendra Bhure
 */
class surveyDataCollectionForm extends sfForm
{
    const MASTER_MODEL = "survey_submission";
    
    public function configure() 
    {
        if(!$master = $this->getOption(self::MASTER_MODEL))
        {
            throw new InvalidArgumentException('You must provide a '.self::MASTER_MODEL.' object');
        }               
                
        $page_number = $this->getOption("page_number", false);
        
        $data_query = Doctrine::getTable('survey_data')
                    ->createQuery('sd')
                    ->innerJoin('sd.survey_question sq')
                    ->addWhere('sd.submission_id = ?', $master->getId())
                    ->addWhere('sq.page_id = ?', $page_number)
                    ->addWhere('sd.question_bank_id is null')
                    ->orderBy('sq.display_order');        
        
        
        /* @var $master submission */        
        $details = $data_query->execute();
        
        foreach($details as $key=>$value)
        {            
            $form = new survey_dataForm($value);
            $this->embedForm($key, $form);
        }
        
        parent::configure();        
    }   
}

?>
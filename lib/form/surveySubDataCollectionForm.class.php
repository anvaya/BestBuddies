<?php
/**
 * Description of surveyDataCollectionForm
 *
 * @author Mrugendra Bhure
 */
class surveySubDataCollectionForm extends sfForm
{
    const MASTER_MODEL = "survey_submission";
    
    public function configure() 
    {
        if(!$master = $this->getOption(self::MASTER_MODEL))
        {
            throw new InvalidArgumentException('You must provide a '.self::MASTER_MODEL.' object');
        }                               
        
        
        $data_query = Doctrine::getTable('survey_data')
                    ->createQuery('sd')
                    ->innerJoin('sd.question_bank qb')
                    ->addWhere('qb.parent_question_id > 0')
                    ->addWhere('sd.submission_id = ?', $master->getId());        
        
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
<?php
include sfConfig::get('sf_lib_dir')."/vendor/anvaya/util.php";
/**
 * survey_submission actions.
 *
 * @package    BestBuddies
 * @subpackage survey_submission
 * @author     Anvaya Technologies
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class survey_submissionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
     $invitation_key = $request->getParameter('survey', false);
     
     if(!$invitation_key)
     {
         $this->forward404();
     }
     
     try
     {         
         $survey_info = unserialize(RIJNDAEL_decrypt($invitation_key, sfConfig::get('sf_survey_encryption_key')));
         
         $survey_id = $survey_info[0];
         $user_id   = $survey_info[1];
         
         if(!$survey_id || !$user_id)
             die("Invalid Survey $survey_id:$user_id");
         
         $existing_complete = Doctrine::getTable('survey_submission')
                    ->findOneBySurveyIdAndMemberIdAndStatus($survey_id, $user_id, survey_submissionTable::STATUS_COMPLETE);
         
         if($existing_complete)
         {
             //Already exists
             /* @var $existing_complete survey_submission */
             $existing_complete->delete();
             /*
             $this->setTemplate("duplicate");
             return sfView::SUCCESS;
              * 
              */
         }
         
         $submission = Doctrine::getTable('survey_submission')
                    ->findOneBySurveyIdAndMemberId($survey_id, $user_id); 
         
         if(!$submission)
         {
             $submission = new survey_submission();
             $submission->setMemberId($user_id);
             $submission->setSurveyId($survey_id);
             $submission->setPageNumber(1);
             $submission->save();
             
             $survey = Doctrine::getTable('survey')->find($survey_id);
             /* @var $survey survey */
             foreach($survey->getSurveyQuestion() as $question)
             {
                 $data = new survey_data();
                 $data->setSubmissionId($submission->getId());
                 $data->setSurveyQuestion($question);
                 $data->save();
                 
                 /* @var $question survey_question */
                 $qb = $question->getQuestionBank();
                 if( $qb->getAnswerType()==question_bankTable::ANSWER_TYPE_QUESTION_GROUP)
                 {                     
                     $child_questions = Doctrine::getTable('question_bank')
                                        ->findByParentQuestionId($qb->getId());
                     if($child_questions->count())
                     {
                         foreach($child_questions as $q)
                         {
                             /* @var $q question_bank */
                             $data = new survey_data();
                             $data->setSubmissionId($submission->getId());
                             $data->setQuestionBank($q);
                             $data->save();
                         }
                     }
                 }
             }
         }                 
         
         if($request->hasParameter('page'))
         {    
             $last_page = survey_questionTable::getLastPageId($submission->getSurveyId());                  

             $submission->setPageNumber($request->getParameter('page'));
             $submission->save();
         }
         
         $request->setParameter('id', $submission->getId());
         $this->forward("survey_submission", "edit");
         
     }catch(Exception $ex)
     {
         die($ex->getMessage());
         $this->forward404();
     }
     
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404();
    //$this->form = new survey_submissionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404();
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new survey_submissionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($survey_submission = Doctrine_Core::getTable('survey_submission')->find(array($request->getParameter('id'))), sprintf('Object survey_submission does not exist (%s).', $request->getParameter('id')));
    
    /* @var $survey_submission survey_submission */
    $survey    = $survey_submission->getSurvey();
    $survey_id = $survey->getId();
    
    $this->getResponse()->setTitle($survey->getTitle());
    
    if($survey_submission->getPageNumber() > survey_questionTable::getLastPageId($survey_id))
    {
        $survey_submission->setStatus(survey_submissionTable::STATUS_COMPLETE);
        $survey_submission->save();
        
        $this->setTemplate("complete");
        return sfView::SUCCESS;
    }
    
    $form = new survey_submissionForm($survey_submission);
    
    if($this->getUser()->hasAttribute("error_schema","survey"))
    {
        $error_schema = $this->getUser()->getAttribute("error_schema",false,"survey");
        foreach($error_schema as $field=>$error)
        {
            /* @var $error sfValidatorError */
            $form->getErrorSchema()->addError($error, $field);
        }
    }
    
    $this->form = $form;
    $this->invitation_key = $request->getParameter('survey');
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($survey_submission = Doctrine_Core::getTable('survey_submission')->find(array($request->getParameter('id'))), sprintf('Object survey_submission does not exist (%s).', $request->getParameter('id')));
    $this->form = new survey_submissionForm($survey_submission);
    $this->invitation_key = $request->getParameter('survey');
    
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($survey_submission = Doctrine_Core::getTable('survey_submission')->find(array($request->getParameter('id'))), sprintf('Object survey_submission does not exist (%s).', $request->getParameter('id')));
    $survey_submission->delete();

    $this->redirect('survey_submission/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $this->getUser()->getAttributeHolder()->remove("error_schema",false,"survey");
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {        
      $survey_submission = $form->save();
      
      Doctrine_Query::create()
              ->update()
              ->from('survey_data d')
              ->set('d.survey_question_id', 'NULL')
              ->addWhere('d.submission_id = ?', $survey_submission->getId())
              ->addWhere('d.question_bank_id > 0')
              ->execute();
      
      $page_number = $survey_submission->getPageNumber();
      if(!$page_number) 
      {          
          $page_number=1;
      }
      $page_number++;
      
      $this->redirect("survey_submission/index?survey=".urlencode($request->getParameter('survey'))."&page=$page_number");      
            
    }
    else 
    {
        $page_number = $request->getParameter('page',1);
        $this->getUser()->setAttribute("error_schema", $form->getErrorSchema(), "survey"); 
        $this->getUser()->setFlash("error", "The page could not be submitted due to incomplete data.");
        $this->redirect("survey_submission/index?survey=".urlencode($request->getParameter('survey'))."&page=$page_number");
    }
  } 
   
}

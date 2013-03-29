<?php

require_once dirname(__FILE__).'/../lib/surveyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/surveyGeneratorHelper.class.php';
require_once sfConfig::get('sf_lib_dir')."/vendor/anvaya/util.php";
/**
 * survey actions.
 *
 * @package    BestBuddies
 * @subpackage survey
 * @author     Anvaya Technologies
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class surveyActions extends autoSurveyActions
{
    public function executeAddQuestionRow(sfWebRequest $request)
    {
        $id = $request->getParameter('id', false);
        $question_id = $request->getParameter('question_id', false);
        $num = $request->getParameter('num');
        
        if(!$id)
        {
            $sv = new survey();
        }
        else
            $sv = Doctrine::getTable('survey')
                    ->find($id);
        
        $this->form = new surveyForm($sv);               
        
        $subform = $this->form->getEmbeddedForm("questions");
        
        /* @var $subform surveyQuestionsCollectionForm */
        $detail  = $subform->addDetailRow($num, $question_id);
        
        if(!$detail)
        {
            $response = $this->getResponse();
            $response->setStatusCode(400, "Invalid");
            return sfView::NONE;
        }
        
        $this->form->embedForm('questions', $subform);

        return $this->renderPartial("question",array("item"=>$this->form["questions"][$num] ,"key"=>$num));
    }
    
    public function executeClone(sfWebRequest $request)
    {
        $parent = $this->getRoute()->getObject();
        
        /* @var $parent survey */
        
        $survey = new survey();        
        
        $survey->setTemplateName($parent->getTemplateName());
        $survey->setCssFile($parent->getCssFile());
        
        foreach($parent->getSurveyQuestion() as $question)
        {
            /* @var $question survey_question */
            $sq = new survey_question();
            $sq->setQuestionId($question->getQuestionId());
            $sq->setSurvey($survey);
            $sq->setMandatory( $question->getMandatory() );
            $sq->setDisabled( $question->getDisabled() );
            $sq->setDisplayOrder($question->getDisplayOrder());
            $sq->setPageId($question->getPageId());
            $survey->getSurveyQuestion()->add($sq);                       
        }
        
        foreach($parent->getSurveyMembertype() as $member_type)
        {
            /* @var $member_type survey_membertype */
            $mt = new survey_membertype();
            $mt->setSurvey($survey);
            $mt->setMemberTypeId($member_type->getMemberTypeId());
            $survey->getSurveyMembertype()->add($mt);
        }
        
        $this->form = new surveyForm($survey);
        $this->survey = $survey;
        $this->setTemplate('new');
    }
    
    public function executeSendInvitations(sfWebRequest $request)
    {
        $survey = $this->getRoute()->getObject();
        $sent   = 0;
        
        /* @var $survey survey */
        if($survey->getStatus() == surveyTable::SURVEY_STATUS_PUBLISHED)
        {
            $member_types = $survey->getSurveyMembertype();
            
            $encryption_key = sfConfig::get('sf_survey_encryption_key');
            
            foreach($member_types as $member_type)
            {
                /* @var $member_type survey_memberType */
                $members = $member_type->getMemberType()->getMember();                
                foreach($members as $member)
                {
                    /* @var $members member */
                    $survey_info = array($survey->getId(), $member->getId());
                    $serialized  = serialize($survey_info);
                    $encrypted   = RIJNDAEL_encrypt($serialized, $encryption_key);
                    $link        = urlencode($encrypted);
                    
                    $email_body = get_partial("survey/invitation_email_body", array("member"=>$member, "survey"=>$survey, "link"=>$link));
                    
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // Additional headers
                    $to       = $member->getFirstName()."<". $member->getEmailAddress().">";
                    $subject  = "New Survey: ".$survey->getTitle();
                    //$headers .= 'To: '. $member->getFirstName()."<". $member->getEmailAddress().">". "\r\n";
                    $headers .= 'From: Best Buddies <surveys@bestbuddies.org>' . "\r\n";
                    $headers .= 'Cc: contact@anvayatech.com' . "\r\n";
                    
                    // Mail it
                    $result = @mail($to, $subject, $email_body, $headers);
                    if($result)
                    {
                        $sent++;
                    }
                    else
                        die($link);
                    
                }
            }
        }
        
        $this->getUser()->setFlash('notice',$sent." invites sent.");
        
        $this->redirect(array('sf_route' => 'survey_edit', 'sf_subject' => $survey));        
    }
}

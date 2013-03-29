<?php

/**
 * survey_data form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class survey_dataForm extends Basesurvey_dataForm
{
  public function configure()
  {
      
      
      $object = $this->getObject();
      /* @var $object survey_data */
      
      if($object->getSurveyQuestion()->getId())
      {
        $question = $object->getSurveyQuestion()->getQuestionBank();
        if($question->getAnswerType()<>question_bankTable::ANSWER_TYPE_QUESTION_GROUP)
            $mandatory = $object->getSurveyQuestion()->getMandatory();
        else
            $mandatory = false;
      }
      else
      {
          $question = $object->getQuestionBank ();
          $mandatory = false;
      }
      
      
      $this->widgetSchema['answer_text'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['answer_text'] = new sfValidatorPass();
      
      /* @var $question question_bank */
      switch($question->getAnswerType())
      {
          case question_bankTable::ANSWER_TYPE_COUNTRY:
              $this->widgetSchema['answer_text'] = new sfWidgetFormI18nChoiceCountry(array("add_empty"=>"select"));
              $this->validatorSchema['answer_text'] = new sfValidatorI18nChoiceCountry(array("required"=>$mandatory));              
              break;
          
          case question_bankTable::ANSWER_TYPE_DATE:
              $this->widgetSchema['answer_text'] = new sfWidgetFormJQueryDate();
              $this->validatorSchema['answer_text'] = new sfValidatorDate(array("required"=>$mandatory));
              break;
          
          case question_bankTable::ANSWER_TYPE_DATE_PERIOD:
              break;
          
          case question_bankTable::ANSWER_TYPE_EMAIL:
              $this->widgetSchema['answer_text'] = new sfWidgetFormInputText();
              $this->validatorSchema['answer_text'] = new sfValidatorEmail(array("required"=>$mandatory));              
              break;
          
          case question_bankTable::ANSWER_TYPE_FILE:
              break;
          
          case question_bankTable::ANSWER_TYPE_LONGTEXT:
              $this->widgetSchema['answer_text'] = new sfWidgetFormTextarea();
              $this->validatorSchema['answer_text'] = new sfValidatorString(array("required"=>$mandatory));
              break;
          
          case question_bankTable::ANSWER_TYPE_MULTI_CHOICE:
              $choices = array();
              $q_choices = $question->getQuestionOption();
              foreach($q_choices as $q_option)
              {
                  $choices[$q_option->getOptionValue()] = $q_option->getOptionText();                  
              }
              
              $this->widgetSchema['selected_options'] = new sfWidgetFormChoice(array("choices"=>$choices,"multiple"=>true,"expanded"=>true));
              $this->validatorSchema['selected_options'] = new sfValidatorChoice(array("required"=>$mandatory, "choices"=>array_keys($choices),"multiple"=>true));
              break;
          
          case question_bankTable::ANSWER_TYPE_MULTI_CHOICE_WITH_TEXT:
              
              $choices = array();
              $q_choices = $question->getQuestionOption();
              foreach($q_choices as $q_option)
              {
                  $choices[$q_option->getOptionValue()] = $q_option->getOptionText();                  
              }
              
              $this->widgetSchema['selected_options'] = new sfWidgetFormChoice(array("choices"=>$choices,"multiple"=>true,"expanded"=>true));
              $this->validatorSchema['selected_options'] = new sfValidatorChoice(array("required"=>$mandatory, "choices"=>array_keys($choices),"multiple"=>true));

              $this->widgetSchema['answer_text'] = new sfWidgetFormInputText();
              $this->validatorSchema['answer_text'] = new sfValidatorString(array("required"=>$mandatory));
              
              break;
          
          case question_bankTable::ANSWER_TYPE_PROGRAM_YEAR:
              
              $this->widgetSchema['selected_options'] = new sfWidgetFormDoctrineChoice(array("model"=>"program_year"));
              $this->validatorSchema['selected_options'] = new sfValidatorDoctrineChoice(array("model"=>"program_year","required"=>$mandatory));
              break;
          
          case question_bankTable::ANSWER_TYPE_SELECT:
              break;
          
          case question_bankTable::ANSWER_TYPE_SINGLE_CHOICE:
              $choices = array();
              $q_choices = $question->getQuestionOption();
              foreach($q_choices as $q_option)
              {
                  $choices[$q_option->getOptionValue()] = $q_option->getOptionText();                  
              }
              
              $this->widgetSchema['selected_options'] = new sfWidgetFormChoice(array("choices"=>$choices,"expanded"=>true));
              $this->validatorSchema['selected_options'] = new sfValidatorChoice(array("required"=>$mandatory, "choices"=>array_keys($choices)));

              break;
              
          case question_bankTable::ANSWER_TYPE_SINGLE_CHOICE_WITH_TEXT:
              
              $choices = array();
              $q_choices = $question->getQuestionOption();
              foreach($q_choices as $q_option)
              {
                  $choices[$q_option->getOptionValue()] = $q_option->getOptionText();                  
              }
              
              $this->widgetSchema['selected_options'] = new sfWidgetFormChoice(array("choices"=>$choices,"expanded"=>true));
              $this->validatorSchema['selected_options'] = new sfValidatorChoice(array("required"=>$mandatory, "choices"=>array_keys($choices)));

              $this->widgetSchema['answer_text'] = new sfWidgetFormInputText();
              $this->validatorSchema['answer_text'] = new sfValidatorString(array("required"=>$mandatory));
              
              break;
          
          case question_bankTable::ANSWER_TYPE_TEXT:
              $this->widgetSchema['answer_text'] = new sfWidgetFormInputText();
              $this->validatorSchema['answer_text'] = new sfValidatorString(array("required"=>$mandatory));
              break;
          
          case question_bankTable::ANSWER_TYPE_QUESTION_GROUP:
              $this->widgetSchema['answer_text'] = new sfWidgetFormInputHidden();
              $this->widgetSchema['selected_options'] = new sfWidgetFormInputHidden();
      }
      
      unset($this['submission_id'],$this['question_bank_id'],$this['survey_question_id']);
      
      $this->mergePostValidator(new surveyDataValidatorSchema());
  }
}

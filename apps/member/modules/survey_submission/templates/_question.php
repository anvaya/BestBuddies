<?php
$survey_data = Doctrine::getTable('survey_data')->find($data['id']->getValue());
/* @var $data survey_data */
$question = $survey_data->getSurveyQuestion()->getQuestionBank();
$mandatory = $survey_data->getSurveyQuestion()->getMandatory();
/* @var $question question_bank */
?>
<td>
<p class="question_text">    
    <?php echo $survey_data->getSurveyQuestion()->getDisplayOrder() ?>.&nbsp;<span style="font-size: 24px; font-family: verdana"><?php echo $mandatory?"*":""?></span><?php echo $question->getQuestionText(); ?>   
</p>
<span class="help_message"><?php echo $question->getHelpMessage();?></span>
<?php 
    switch($question->getAnswerType())
    {
        case question_bankTable::ANSWER_TYPE_TEXT:
        case question_bankTable::ANSWER_TYPE_LONGTEXT:
        case question_bankTable::ANSWER_TYPE_COUNTRY:
        case question_bankTable::ANSWER_TYPE_DATE:
        case question_bankTable::ANSWER_TYPE_EMAIL:
        case question_bankTable::ANSWER_TYPE_PROGRAM_YEAR:        
            if($data['answer_text']->hasError())
                echo $data['answer_text']->renderError();
            echo $data["answer_text"];
            break;        
        case question_bankTable::ANSWER_TYPE_MULTI_CHOICE_WITH_TEXT:
        case question_bankTable::ANSWER_TYPE_SINGLE_CHOICE_WITH_TEXT:
            if($data['selected_options']->hasError())
                echo $data['selected_options']->renderError();
            
            echo $data["selected_options"]."<br/> ";
            echo "Other:&nbsp;".$data["answer_text"];
            break;
        case question_bankTable::ANSWER_TYPE_QUESTION_GROUP:            
        default:
            if($data['selected_options']->hasError())
                echo $data['selected_options']->renderError();
            echo $data["selected_options"];            
    }  
?> 
    <?php echo $data->renderHiddenFields();?>
</td>


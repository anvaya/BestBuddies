<?php 
        use_helper('I18N');
        /* @var $survey_submission survey_submission */ 
        $data = $survey_submission->getSurveyData();
        
?>
<?php use_stylesheet('/sfDoctrinePlugin/css/global.css', 'first') ?> 
<?php use_stylesheet('/sfDoctrinePlugin/css/default.css', 'first') ?> 
<div id="sf_admin_container">
<ul class="sf_admin_actions">  
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
</ul>
<br/>
<table>
    <tr>
        <th>Survey:</th>
        <td><?php echo $survey_submission->getSurvey()->getTitle() ?></td>
    </tr>    
    <tr>
        <th>Date:</th>
        <td><?php echo $survey_submission->getUpdatedAt(); ?></td>
    </tr>    
    <tr>
        <th>Member:</th>
        <td><?php echo $survey_submission->getMember();  ?></td>
    </tr>    
</table>
<br/>
    <table width="100%">
    <?php foreach($data as $index=>$answer_row):?>
    <?php /* @var $answer_row survey_data */?>          
    <?php if($answer_row->getQuestionBankId()) continue;?>    
    <tr>
        <td><b><?php echo $index+1;?>. <?php echo $answer_row->getSurveyQuestion()->getQuestionBank()->getQuestionText();?></b></td>
    </tr>   
    
    <tr>
        <?php if($answer_row->getSurveyQuestion()->getQuestionBank()->getAnswerType()==question_bankTable::ANSWER_TYPE_QUESTION_GROUP):?>
            <?php  ?>
        <?php else:?>
            <td>
                <br />
                <?php if($answer_row->getSelectedOptions()):?>
                    <?php $encoded = $answer_row->getSelectedOptions();?>
                    <?php /* @var $encoded sfOutputEscaperArrayDecorator */?>
                    <?php $options = $encoded->getRawValue(); ?>
                    Selected Options: <?php echo implode(",",$options);?>
                <?php endif;?>
                <br />    
                Text Answer: <?php echo $answer_row->getAnswerText();?>
            </td>        
        <?php endif;?>   
    </tr>
    <tr><td>&nbsp;</td></tr>
  <?php endforeach;?>
    </table>

</div>

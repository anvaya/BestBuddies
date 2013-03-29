<?php use_helper('JavascriptBase'); /* @var $item survey_questionForm */ ?>
<?php 
        $question_id = $item['question_id']->getValue();
        
        
        if($question_id)
        {
            $question = Doctrine::getTable('question_bank')
                       ->find($question_id);                        
            
            /*@var $question question_bank */
            $qtext = $question->getQuestionText();
        }                             
        else
            $qtext = "";
?>
<tr id="items_<?php echo $key; ?>">    
    <td id="items_<?php echo $key;?>_question_text">
        <?php echo $qtext;?>
        <?php 
            if($item['question_id']->hasError())
            {
                echo $item['question_id']->renderError();
            }
        ?>
    </td>        
    <td id="items_<?php echo $key;?>_mandatory"><?php echo $item['mandatory'];?></td>
    <td id="items_<?php echo $key;?>_page_no"><?php echo $item['page_id'];?></td>
    <td id="items_<?php echo $key;?>_question_no"><?php echo $item['display_order'];?></td>
    <td id="items_<?php echo $key;?>_disabled"><?php echo $item['disabled'];?></td>
    
    <td>
        <?php echo link_to_function(image_tag('/sfDoctrinePlugin/images/delete.png'), 'remove_item('.$key.');'); ?>
        <input type="hidden" name="survey[questions][<?php echo $key ?>][remove]" id="survey_questions_<?php echo $key;?>_remove" value=""/>
        <?php echo $item->renderHiddenFields();?>
    </td>        
</tr>

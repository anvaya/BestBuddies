<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<h1><?php echo $form->getObject()->getSurvey()->getTitle(); ?></h1>
<?php include_partial("flashes");?>
<form action="<?php echo url_for('survey_submission/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<input type="hidden" name="survey" value="<?php echo $invitation_key ?>" />
<?php endif; ?>
  <table width="100%">
    <tfoot>
      <tr>
        <td colspan="2" align="center">
          <?php echo $form->renderHiddenFields(false) ?>
          <?php if( intval($form['page_number']->getValue()) > 1):?>
            <a class="linkbutton" href="<?php echo url_for("survey_submission/index?survey=".urlencode($invitation_key)."&page=".($form['page_number']->getValue()-1) ) ?>">Back</a>&nbsp;
          <?php endif;?>
          <input type="submit" value="Next" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>     
        <?php foreach($form['data'] as $index=>$data):?>
        <tr class="question_row">
            <?php 
                $survey_data_id = $data['id']->getValue();
                $survey_data = Doctrine::getTable('survey_data')->find($survey_data_id);
                /* @var $survey_data survey_data */                
                $qb = $survey_data->getSurveyQuestion()->getQuestionBank();
            ?>
            <?php include_partial("question", array("key"=>$index, "data"=>$data) ); ?>                                   
        </tr>
        
            <?php if($qb->getAnswerType()==question_bankTable::ANSWER_TYPE_QUESTION_GROUP):?>
            <tr class="sub_question_row">
                <td>
                <table class="subdata">
                    <?php foreach($form['subdata'] as $subindex=>$subdata):?>
                        <?php $data_id = $subdata['id']->getValue();?>
                        <?php $sub_survey_data = Doctrine::getTable('survey_data')->find($data_id);?>
                        <?php if($sub_survey_data->getQuestionBank()->getParentQuestionId()== $qb->getId() ):?>
                            <?php include_partial("sub_question", array("data"=>$subdata));?>
                        <?php endif;?>
                    <?php endforeach;?>
                </table>
                </td>
            </tr>
            <?php endif;?>            
      <?php endforeach;?>
    </tbody>
  </table>
</form>

Dear <?php echo $member->getFirstName() ?>,
<br><br>
A new survey titled <?php echo $survey->getTitle() ?> is available. 
<br><br>
Please click the following link to complete the survey.
<br><br>
<?php $url = str_replace("backend.php", "member.php", url_for("@survey_submission?survey=$link", true));?>
<a href="<?php echo $url ?>" target="_blank">Take Survey</a>


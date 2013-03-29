<h1>Survey submissions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Survey</th>
      <th>Status</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($survey_submissions as $survey_submission): ?>
    <tr>
      <td><a href="<?php echo url_for('survey_submission/edit?id='.$survey_submission->getId()) ?>"><?php echo $survey_submission->getId() ?></a></td>
      <td><?php echo $survey_submission->getSurveyId() ?></td>
      <td><?php echo $survey_submission->getStatus() ?></td>
      <td><?php echo $survey_submission->getCreatedAt() ?></td>
      <td><?php echo $survey_submission->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('survey_submission/new') ?>">New</a>

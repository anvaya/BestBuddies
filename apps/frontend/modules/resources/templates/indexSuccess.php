<h1>Resources List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Resource type</th>
      <th>Members only</th>
      <th>Program year</th>
      <th>Disabled</th>
      <th>Download file name</th>
      <th>File name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resources as $resource): ?>
    <tr>
      <td><a href="<?php echo url_for('resources/edit?id='.$resource->getId()) ?>"><?php echo $resource->getId() ?></a></td>
      <td><?php echo $resource->getTitle() ?></td>
      <td><?php echo $resource->getResourceType() ?></td>
      <td><?php echo $resource->getMembersOnly() ?></td>
      <td><?php echo $resource->getProgramYearId() ?></td>
      <td><?php echo $resource->getDisabled() ?></td>
      <td><?php echo $resource->getDownloadFileName() ?></td>
      <td><?php echo $resource->getFileName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('resources/new') ?>">New</a>

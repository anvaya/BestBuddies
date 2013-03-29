<?php use_helper('I18N', 'Date') ?>
<?php include_partial('calendar_event/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Calendar event', array(), 'messages') ?></h1>

  <?php include_partial('calendar_event/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('calendar_event/form_header', array('calendar_event' => $calendar_event, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('calendar_event/form', array('calendar_event' => $calendar_event, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('calendar_event/form_footer', array('calendar_event' => $calendar_event, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

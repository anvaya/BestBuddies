<?php use_helper('I18N', 'Date') ?>
<?php include_partial('site_page/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Site Page "%%title%%"', array('%%title%%' => $site_page->getTitle()), 'messages') ?></h1>

  <?php include_partial('site_page/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('site_page/form_header', array('site_page' => $site_page, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('site_page/form', array('site_page' => $site_page, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('site_page/form_footer', array('site_page' => $site_page, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

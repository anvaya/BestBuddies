<td colspan="5">
  <?php echo __('%%title%% - %%slug%% - %%status_name%% - %%members_only%% - %%admin_only%%', array('%%title%%' => $site_page->getTitle(), '%%slug%%' => $site_page->getSlug(), '%%status_name%%' => $site_page->getStatusName(), '%%members_only%%' => get_partial('site_page/list_field_boolean', array('value' => $site_page->getMembersOnly())), '%%admin_only%%' => get_partial('site_page/list_field_boolean', array('value' => $site_page->getAdminOnly()))), 'messages') ?>
</td>

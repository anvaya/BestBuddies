<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $site_page->getTitle() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_slug">
  <?php echo $site_page->getSlug() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_status_name">
  <?php echo $site_page->getStatusName() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_members_only">
  <?php echo get_partial('site_page/list_field_boolean', array('value' => $site_page->getMembersOnly())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_admin_only">
  <?php echo get_partial('site_page/list_field_boolean', array('value' => $site_page->getAdminOnly())) ?>
</td>

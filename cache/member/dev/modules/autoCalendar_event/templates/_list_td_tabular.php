<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($calendar_event->getId(), 'calendar_event_edit', $calendar_event) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_member_id">
  <?php echo $calendar_event->getMemberId() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_event_type_id">
  <?php echo $calendar_event->getEventTypeId() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_from_date">
  <?php echo false !== strtotime($calendar_event->getFromDate()) ? format_date($calendar_event->getFromDate(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_to_date">
  <?php echo false !== strtotime($calendar_event->getToDate()) ? format_date($calendar_event->getToDate(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $calendar_event->getTitle() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $calendar_event->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_address">
  <?php echo $calendar_event->getAddress() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_city">
  <?php echo $calendar_event->getCity() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_state">
  <?php echo $calendar_event->getState() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_zip">
  <?php echo $calendar_event->getZip() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_contact_person">
  <?php echo $calendar_event->getContactPerson() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_phone_number">
  <?php echo $calendar_event->getPhoneNumber() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email_address">
  <?php echo $calendar_event->getEmailAddress() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_website">
  <?php echo $calendar_event->getWebsite() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_status">
  <?php echo $calendar_event->getStatus() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($calendar_event->getCreatedAt()) ? format_date($calendar_event->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($calendar_event->getUpdatedAt()) ? format_date($calendar_event->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>

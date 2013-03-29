<td class="sf_admin_text sf_admin_list_td_event_type">
  <?php echo $calendar_event->getEventType() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $calendar_event->getTitle() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_from_date">
  <?php echo false !== strtotime($calendar_event->getFromDate()) ? format_date($calendar_event->getFromDate(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_to_date">
  <?php echo false !== strtotime($calendar_event->getToDate()) ? format_date($calendar_event->getToDate(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_city">
  <?php echo $calendar_event->getCity() ?>
</td>

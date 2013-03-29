<td colspan="5">
  <?php echo __('%%event_type%% - %%title%% - %%from_date%% - %%to_date%% - %%city%%', array('%%event_type%%' => $calendar_event->getEventType(), '%%title%%' => $calendar_event->getTitle(), '%%from_date%%' => false !== strtotime($calendar_event->getFromDate()) ? format_date($calendar_event->getFromDate(), "f") : '&nbsp;', '%%to_date%%' => false !== strtotime($calendar_event->getToDate()) ? format_date($calendar_event->getToDate(), "f") : '&nbsp;', '%%city%%' => $calendar_event->getCity()), 'messages') ?>
</td>

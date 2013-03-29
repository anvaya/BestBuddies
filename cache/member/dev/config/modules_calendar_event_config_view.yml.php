<?php
// auto-generated by sfViewConfigHandler
// date: 2013/03/25 22:37:02
$response = $this->context->getResponse();

if ($this->actionName.$this->viewName == 'calendarSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'calendarSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else
  {
    $this->setDecoratorTemplate('' == 'calendar' ? false : 'calendar'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Event Calendar', false, false);

  $response->addStylesheet('style.css', '', array ());
  $response->addStylesheet('menu.css', '', array ());
  $response->addStylesheet('ui-lightness/jquery-ui-1.10.0.custom.min.css', '', array ());
  $response->addStylesheet('/js/wdCalendar/wdCalendar/css/dailog.css', '', array ());
  $response->addStylesheet('/js/wdCalendar/wdCalendar/css/calendar.css', '', array ());
  $response->addStylesheet('/js/wdCalendar/wdCalendar/css/dp.css', '', array ());
  $response->addStylesheet('/js/wdCalendar/wdCalendar/css/alert.css', '', array ());
  $response->addStylesheet('/js/wdCalendar/wdCalendar/css/main.css', '', array ());
  $response->addJavascript('jquery-1.6.2.min.js', '', array ());
  $response->addJavascript('wdCalendar/wdCalendar/src/Plugins/Common.js', '', array ());
  $response->addJavascript('wdCalendar/wdCalendar/src/Plugins/datepicker_lang_US.js', '', array ());
  $response->addJavascript('wdCalendar/wdCalendar/src/Plugins/jquery.datepicker.js', '', array ());
  $response->addJavascript('wdCalendar/wdCalendar/src/Plugins/jquery.alert.js', '', array ());
  $response->addJavascript('wdCalendar/wdCalendar/src/Plugins/jquery.ifrmdailog.js', '', array ());
  $response->addJavascript('wdCalendar/wdCalendar/src/Plugins/wdCalendar_lang_US.js', '', array ());
  $response->addJavascript('wdCalendar/wdCalendar/src/Plugins/jquery.calendar.js', '', array ());
  $response->addJavascript('jquery-ui-1.10.0.custom/js/jquery-ui-1.10.0.custom.min.js', '', array ());
}
else
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout_main_content' ? false : 'layout_main_content'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('style.css', '', array ());
  $response->addStylesheet('menu.css', '', array ());
  $response->addStylesheet('ui-lightness/jquery-ui-1.10.0.custom.min.css', '', array ());
  $response->addJavascript('jquery-1.9.0.min.js', '', array ());
  $response->addJavascript('jquery-ui-1.10.0.custom/js/jquery-ui-1.10.0.custom.min.js', '', array ());
}


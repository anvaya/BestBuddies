<?php

/**
 * survey filter form.
 *
 * @package    BestBuddies
 * @subpackage filter
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class surveyFormFilter extends BasesurveyFormFilter
{
  public function configure()
  {
      $this->widgetSchema['status'] = widgetHelper::getWidget(widgetHelper::WIDGET_SURVEY_STATUS);
      $this->validatorSchema['status']=  widgetHelper::getValidator(widgetHelper::WIDGET_SURVEY_STATUS);
  }
}

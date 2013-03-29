<?php

/**
 * survey_submission form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class survey_submissionForm extends Basesurvey_submissionForm
{
  public function configure()
  {
      unset($this['survey_id'],$this['status']);
      
      $page_id = $this->getObject()->getPageNumber();
      $subform = new surveyDataCollectionForm(array(), array("survey_submission"=>$this->getObject(), "page_number"=>$page_id ));
      $this->embedForm("data", $subform);
      $this->widgetSchema['page_number'] = new sfWidgetFormInputHidden();
      
      $subform = new surveySubDataCollectionForm(array(), array("survey_submission"=>$this->getObject(), "page_number"=>$page_id ));
      $this->embedForm("subdata", $subform);
      
      unset($this['created_at'],$this['updated_at'],$this['member_id']);
  }
}

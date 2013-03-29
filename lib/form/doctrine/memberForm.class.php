<?php

/**
 * member form.
 *
 * @package    BestBuddies
 * @subpackage form
 * @author     Anvaya Technologies
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class memberForm extends BasememberForm
{
  /**
   * @see sfGuardUserForm
   */
  public function configure()
  {            
     parent::configure();
     $this->widgetSchema['country'] = new sfWidgetFormI18nChoiceCountry(array("add_empty"=>true));
     $this->validatorSchema['country'] = new sfValidatorI18nChoiceCountry(array("required"=>false));
     
     $this->widgetSchema['culture'] = new sfWidgetFormI18nChoiceLanguage(array("add_empty"=>true));
     $this->validatorSchema['culture'] = new sfValidatorI18nChoiceLanguage(array("required"=>false));
     
     $this->widgetSchema['timezone'] = new sfWidgetFormI18nChoiceTimezone(array("add_empty"=>true));
     $this->validatorSchema['timezone'] = new sfValidatorI18nChoiceTimezone(array("required"=>false));
     
     $this->validatorSchema['email_address'] = new sfValidatorEmail(array("required"=>true));
             
     $this->useFields( array("first_name","last_name","email_address","country","timezone","culture") );
  }
}

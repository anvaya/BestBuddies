<?php

/**
 * survey_submission module configuration.
 *
 * @package    BestBuddies
 * @subpackage survey_submission
 * @author     Anvaya Technologies
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class survey_submissionGeneratorConfiguration extends BaseSurvey_submissionGeneratorConfiguration
{
    public function getFilterDefaults() 
    {
        return array("status"=> survey_submissionTable::STATUS_COMPLETE);
    }
}

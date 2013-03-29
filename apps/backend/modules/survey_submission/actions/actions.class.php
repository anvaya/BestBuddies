<?php

require_once dirname(__FILE__).'/../lib/survey_submissionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/survey_submissionGeneratorHelper.class.php';

/**
 * survey_submission actions.
 *
 * @package    BestBuddies
 * @subpackage survey_submission
 * @author     Anvaya Technologies
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class survey_submissionActions extends autoSurvey_submissionActions
{
    public function executeShow(sfWebRequest $request)
    {
        $this->survey_submission = $this->getRoute()->getObject();
    }
}

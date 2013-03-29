<?php
/**
 * Description of surveyDataValidatorSchema
 *
 * @author Mrugendra Bhure
 */
class surveyDataValidatorSchema extends sfValidatorSchema
{
    protected function doClean($values)
    {
        $errorSchema = new sfValidatorErrorSchema($this);
        
        if($values['selected_options'])
        {
            $options = $values['selected_options'];
            if(!is_array($options)) $options = array($options);
            $values['selected_options'] = serialize($options);
        }
        
        return $values;
    }
}

?>
<?php
/**
 * Class Mrmage_IfDirective_Model_Core_Email_Template_Filter
 * @author Anton Viktorov (https://github.com/antviktorov)
 */
class Mrmage_IfDirective_Model_Core_Email_Template_Filter extends Mage_Core_Model_Email_Template_Filter
{
    public function ifDirective($construction)
    {
        if (count($this->_templateVars) == 0) {
            return $construction[0];
        }

        //Custom code for construction in template {{if test = some param}}  -->
        $array = explode('=', $construction[1]);
        if (count($array) >= 2) {
            $variable = trim($array[0]);
            $value = trim($array[1]);

            if($this->_getVariable($variable, '') == $value) {
                return $construction[2];
            } else {
                if (isset($construction[3]) && isset($construction[4])) {
                    return $construction[4];
                }
                return '';
            }
        }
        //<--

        if($this->_getVariable($construction[1], '') == '') {
            if (isset($construction[3]) && isset($construction[4])) {
                return $construction[4];
            }
            return '';
        } else {
            return $construction[2];
        }
    }
}
<?php 

namespace App\Validations;

class CustomRules{
    function check_PL(string $str, string &$error = null) : bool
    {
        if(mb_check_encoding($string, 'UTF-8')){
            return true;
        }
        return false;

    }

}
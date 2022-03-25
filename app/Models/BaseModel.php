<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class BaseModel{

    public static function formatMilliseconds($milliseconds) {
        if(is_null($milliseconds))
            return NULL;
        $seconds = floor($milliseconds / 1000);
        $minutes = floor($seconds / 60);
        $milliseconds = $milliseconds % 1000;
        $seconds = $seconds % 60;
        $minutes = $minutes % 60;
    
        $format = '%02u:%02u.%03u';
        $time = sprintf($format, $minutes, $seconds, $milliseconds);
        return $time;
    }
}
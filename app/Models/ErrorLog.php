<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    use HasFactory;

    public static function  log($event_type,  $route,  $message)
    {

        $error = ["type"=> $event_type, "method"=> $route,  "Message"=> $message];
        $log =  info(json_encode($error));
        return $log;
    }
}


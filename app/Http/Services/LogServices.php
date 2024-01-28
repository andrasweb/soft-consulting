<?php
namespace App\Http\Services;

use App\Models\Log;
use Illuminate\Http\Request;

class LogServices
{
    public function saveNewLog($person, $status)
    {
        $log = (new Log());
        $log->azonosito = $person->AZONOSITO;
        $log->statusz = $status;
        $log->save();
    }
}

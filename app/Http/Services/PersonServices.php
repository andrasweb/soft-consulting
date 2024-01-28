<?php
namespace App\Http\Services;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonServices
{
    public function savePersonsDataFromXml(Request $request)
    {
        $xmlString = file_get_contents($request->file('xml'));
        $xml = new \SimpleXMLElement($xmlString);
    }
}

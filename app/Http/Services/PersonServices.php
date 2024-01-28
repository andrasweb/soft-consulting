<?php
namespace App\Http\Services;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Services\LogServices;

class PersonServices
{
    public function savePersonsDataFromXml(Request $request)
    {
        $xmlString = file_get_contents($request->file('xml'));
        $xml = new \SimpleXMLElement($xmlString);
        $savedPersonIds = $this->getSavedPersonIds();

        foreach($xml as $item){
            $status = 'sikertelen';

            if(!in_array($item->AZONOSITO, $savedPersonIds)){
                $this->saveNewPerson($item);
                $status = 'sikeres';
            }

            $savedPersonIds[] = $item->AZONOSITO;
            $this->saveNewLog($item, $status);
        }
    }

    public function saveNewPerson($person)
    {
        $newPerson = (new Person());
        $newPerson->adoazonositojel = $person->ADOAZONOSITOJEL;
        $newPerson->teljesnev = $person->TELJESNEV;
        $newPerson->azonosito = $person->AZONOSITO;
        $newPerson->egyebid = $person->EGYEBID;
        $newPerson->belepes = $person->BELEPES;
        $newPerson->kilepes = $person->KILEPES;
        $newPerson->emailcim = $person->EMAILCIM;
        $newPerson->save();
    }

    public function saveNewLog($person, $status)
    {
        (new LogServices())->saveNewLog($person, $status);
    }

    public function getSavedPersonIds()
    {
        return (new Person())
            ->pluck('azonosito')
            ->toArray();
    }
}

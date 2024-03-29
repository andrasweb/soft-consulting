<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Http\Services\PersonServices;
use App\Http\Services\LogServices;

class HomeController extends Controller
{
    private $rules;
    private $messages;

    public function __construct()
    {
        $this->rules = [
            'xml' => 'required|file|mimetypes:text/xml,application/xml|mimes:xml',
        ];

        $this->messages = [
            'xml.required' => 'XML fájl kötelező',
            'xml.file' => 'Hibás fájl',
            'xml.mimetypes' => 'Hibás fájlformátum',
            'xml.mimes' => 'Hibás fájlformátum',
        ];
    }

    public function index()
    {
        return view('welcome');
    }

    public function uploadXml(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $results = (new PersonServices())->savePersonsDataFromXml($request);

        session()->flash('results', $results);

        return redirect('/');
    }

    public function showPersons()
    {
        $persons = (new PersonServices())->getPersons();

        return view('persons')->with(compact('persons'));
    }

    public function showLogs()
    {
        $logs = (new LogServices())->getLogs();

        return view('logs')->with(compact('logs'));
    }
}

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

        (new PersonServices())->savePersonsDataFromXml($request);

        return redirect('/');
    }
}

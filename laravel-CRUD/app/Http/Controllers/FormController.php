<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register(){
        return view('form');
    }
    public function welkam(Request $request)
        {
            $firstname = $request ->input("firstname");
            $lastname = $request ->input("lastname");

            return view('welcome', ["firstname" => $firstname, "lastname"=> $lastname]);
    }
    }

    


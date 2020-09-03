<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class FrontController extends Controller
{
    public function getData(){
        $dataStates =  State::all();
        return view('import', ['dataStates' => $dataStates]);
    }
}

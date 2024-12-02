<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WeightController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function insertWeight(Request $request){

        echo 'Insert data';
        $userName= strtolower($request->input('userName'));
        $password=$request->input('password');

    }


}

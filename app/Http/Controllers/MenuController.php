<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MenuController extends Controller
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

    public function getMainMenu(){

        $sql="select * from menu";
        // echo $sql."\n";
        $user = DB::select($sql);
        return response()->json($user);



    }



    //
}
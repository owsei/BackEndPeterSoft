<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
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


    public function getAllUsers()
    {
        // $sql = "SELECT * FROM usuarios";
        // $users= DB::select($sql);
        // $users = DB::select($sql, [1]); // Usa ? para los parámetros

        $users = DB::table('usuarios')->get();

        return response()->json($users);
    }


    public function login(){




    }



    //
}

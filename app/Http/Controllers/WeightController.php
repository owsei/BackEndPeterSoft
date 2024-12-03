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

    public function getWeight(Request $request){
        $sql="select idUser,weight,dateWeight from weight";
        $response = DB::select($sql);
        return response()->json($response);
    }

    public function insertWeight(Request $request){

        // echo 'Insert data';
        $idUser= $request->input('idUser');
        $dateWeight= $request->input('dateInsert');
        $weight=$request->input('weightInsert');

        // echo "\n\t".$date;
        // echo "\n\t".$weight;

        $sql="INSERT INTO weight(idUser,weight,dateWeight)VALUES($idUser,$weight,'$dateWeight')";
        // echo $sql;
        $response = DB::select($sql);
        return response()->json($response);


    }


}

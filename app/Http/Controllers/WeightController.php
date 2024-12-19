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
        $idUser= $request->input('idUser');
        $sql="select idWeight,weight,dateWeight from weight where idUser=".$idUser." order by 3 desc";
        $response = DB::select($sql);
        return response()->json($response);
    }

    public function getWeightForGraphic(Request $request){
        $idUser= $request->input('idUser');
        $sql="select dateWeight as x,weight as y from weight where idUser=".$idUser." order by dateWeight asc";
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

    public function deleteWeight(Request $request){

        // echo 'Insert data';
        $idWeight=$request->input('idWeight');

        $sql="DELETE FROM weight where idWeight=".$idWeight;
        echo $sql;
        $response = DB::select($sql);
        return response()->json($response);
    }


}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TestDataController extends Controller
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

    public function testData(){
        // return 'Hola mundo';
        return response()->json(['message' => 'Hello from the Controller testData!']);
    }

    public function testDataDependencies(Request $request)
    {
        $authHeader = $request->header('Authorization');
        $allHeaders = $request->headers->all();
        $data = $request->all(); // Obtener todos los datos enviados en la solicitud
        return response()->json(['received_data' => $data,'Header'=>$authHeader,'AllHeaders'=>$allHeaders]);
    }


    //
}

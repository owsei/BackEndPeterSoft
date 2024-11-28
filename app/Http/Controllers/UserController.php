<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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


    public function loginUser(Request $request){

        $userName= strtolower($request->input('userName'));
        $password=$request->input('password');
        $hashedPassword = Hash::make($password);

        // echo $userName;
        echo $password."<br>";
        echo $hashedPassword."<br>";

        // if (Hash::check($password, $hashedPassword)) {
        //     echo 'La contraseña es correcta';
        // } else {
        //     echo 'La contraseña no es correcta';
        // }

        $sql="select id,name,password from users where name='".$userName."'";// and password='".$hashedPassword."'";
        //echo $sql."\n";
        $user = DB::selectOne($sql);

        if ($user && Hash::check($password, $user->password)) {
            return response()->json(['message' => 'Inicio de sesión exitoso']);
        } else {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        return response()->json($user);


    }


    public function getAllUsers()
    {

    }


    public function getUser(Request $request){

        $name=$request->query('name');

        $sql="select * from usuarios where name='".$name."'";
        // echo $sql."\n";
        $user = DB::select($sql);
        return response()->json($user);



    }



    //
}

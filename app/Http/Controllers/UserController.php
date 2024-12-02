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

        // echo "\n\tpassword:".$password;
        // echo "\n\tHashPass:".$hashedPassword;

        $sql="select id,name,password,userid from petersoft.users where userid='".$userName."'";// and password='".$hashedPassword."'";
        // echo $sql;
        $user = DB::selectOne($sql);

        // echo "\n\tUser:".$user->password;
        // echo "\n\tCheck:". Hash::check($password,$user->password);

        if ($user && Hash::check($password,$user->password)) {
            return response()->json($user);
            //return response()->json(['message' => 'Inicio de sesión exitoso']);
        } else {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }
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

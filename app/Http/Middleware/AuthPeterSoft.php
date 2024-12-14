<?php

namespace App\Http\Middleware;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

use Closure;

class AuthPeterSoft
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $headers = getallheaders();
        // Iterar y mostrar los encabezados
        // foreach ($headers as $name => $value) {
        //     echo "$name: $value\n";
        // }

        if($headers['Authorization'])
        {
            $authHeader = $headers['Authorization'];
            echo $authHeader;
            $userController= new UserController();
            if(!$userController->ValidateToken($authHeader,$request["idUser"]))
            {
                return response()->json(['message' => 'Credenciales inválidas'], 401);
            }
        }
        else
            return response()->json(['message' => 'Credenciales inválidas'], 401);

        // $token= $request->input('token');
        // if(isset($token))
        //     return response()->json(['message' => 'Credenciales inválidas'], 401);

        return $next($request);
    }
}

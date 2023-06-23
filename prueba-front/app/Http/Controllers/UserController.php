<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $q = (isset($request['user']) && $request['user'] != '')? $request['user']:'YOUR_NAME';
        $peticion = Http::get('https://api.github.com/search/users?q='.$q);
        $response = $peticion->json();
        $users = array_slice($response['items'], 0, 10);

        // Grafico

        $followers_total = array();
        $followers = array();

        foreach ($users as $user) {
            
            $followers[] = $user['login'];
            $peticion_seguidores = Http::get($user['followers_url']);
            $seguidores = $peticion_seguidores->json();
            $followers_total[] = count($seguidores);

        }

        return view( 'user.index', compact('users') )->with('followers',json_encode($followers))->with('followers_total',json_encode($followers_total));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($login)
    {
        $q = (isset($login) && $login != '')? $login:'YOUR_NAME';
        $peticion = Http::get('https://api.github.com/users/'.$q);
        $user = $peticion->json();
        
        return view( 'user.details', compact('user') );
    }

}

<?php

namespace App\Http\Controllers;

use App\Deputado;
use Illuminate\Http\Request;

class DeputadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ch = curl_init('http://localhost:8001/api/deputados');
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json_deputados = curl_exec($ch);
        curl_close($ch);

        $deputados = json_decode($json_deputados, true);

        return view('deputados.index', compact('deputados'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deputado  $deputado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ch = curl_init('http://localhost:8001/api/deputados/'+$id);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json_deputados = curl_exec($ch);
        curl_close($ch);

        $deputado = json_decode($json_deputados, true);

        return view('deputados.deputado', compact('deputado'));
    }
}

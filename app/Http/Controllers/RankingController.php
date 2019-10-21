<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ch = curl_init('http://localhost:8001/api/rankings');
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json_deputados = curl_exec($ch);
        curl_close($ch);

        $query = json_decode($json_deputados, true);
        $deputados = $query['deputados'];
        $midias = $query['midias'];

        return view('rankings.index', compact('deputados', 'midias'));
    }

    public function search($month) {
        $ch = curl_init('http://localhost:8001/api/rankings/'.$month);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json_deputados = curl_exec($ch);
        curl_close($ch);

        return response()->json($json_deputados);
    }
}

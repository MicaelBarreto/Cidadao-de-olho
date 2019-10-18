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
        $midias = Midia::join('deputados_midias', 'midias.id', 'deputados_midias.midia_id')
                        ->orderBy('deputados_midias.midia_id', 'desc')
                        ->limit(5)
                        ->get();

        $deputados = QueryMonth::query(Carbon::now()->format('m'));

        return response()->json(compact('midias', 'deputados'), 200);
    }

    public function dataChange($month)
    {
        $deputados = QueryMonth::query($month);

        return response()->json($deputados);
    }
}

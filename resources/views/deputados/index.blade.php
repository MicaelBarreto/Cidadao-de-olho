@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">    
@endsection

@section('title', 'Deputados')

@section('content')

    <div>
        <h2>Deputados em exercício</h2>
        <table class="table col-sm col-md col-lg col-xl" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Partido</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deputados as $deputado)
                    <tr>
                        <td>{{$deputado['id']}}</td>
                        <td>{{$deputado['nome']}}</td>
                        <td>{{$deputado['partido']}}</td>
                        <td>
                            <a href="/deputado/{{$deputado['id']}}" class="btn btn-primary">Vizualizar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script>
        window.onload = function () {
            $(function () {
                $('#table').DataTable({
                    columnDefs: [
                        { type: 'date-euro', targets: 2 }
                    ],
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : true,
                    "order": [[ 3, "desc" ]]
                })
            })
        }
    </script>
@endsection
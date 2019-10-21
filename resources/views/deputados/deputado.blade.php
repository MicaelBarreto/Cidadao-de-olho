@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('title', 'Deputado')

@section('content')
    <div>
        <h2>Dados do Deputado</h2>
        <form class="col-sm col-md col-lg col-xl">
            <div class="form-group">
                <label class="col-sm-2 col-md-2 col-lg-2 col-xl-2">ID</label>
                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <input type="text" value="{{$deputado['id']}}" class="form-control" readonly />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 col-lg-2 col-xl-2">Nome</label>
                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <input type="text" value="{{$deputado['nome']}}" class="form-control" readonly />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 col-lg-2 col-xl-2">Partido</label>
                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <input type="text" value="{{$deputado['partido']}}" class="form-control" readonly />
                </div>
            </div>
            <div class="form-group d-flex">
                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <table class="table table-borderless" id="table">
                        <tr>
                            <th>Indenizações(data de referência)</th>
                        </tr>
                        @foreach ($indenizacoes as $i)
                            <tr>
                                <td>{{date('d/m/Y', strtotime($i['data']))}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-sm col-md col-lg col-xl">
                    <table class="table table-borderless">
                        <tr>
                            <th>Mídias</th>
                        </tr>
                        @foreach ($midias as $midia)
                            <tr>
                                <td>
                                    <a href="{{$midia['url']}}" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 fa fa-{{strtolower($midia['nome'])}}" target="_blank"></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection
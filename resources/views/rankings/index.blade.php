@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('title', 'Rankings')

@section('content')
    <div class="row">
        <h2>Rankings</h2>
        <div class="row mx-auto mt-5">
            <div class="col px-md-5">
                <div class="p-3 border bg-light">
                        <h5>Deputados</h5>
                        <h6 class="mb-2 text-muted">Top 5 deputados que mais pediram indenizações</h6>
                        <select id="select" class="custom-select">
                            <option value="1">Janeiro</option>
                            <option value="2">Fevereiro</option>
                            <option value="3">Março</option>
                            <option value="4">Abril</option>
                            <option value="5">Maio</option>
                            <option value="6">Junho</option>
                            <option value="7">Julho</option>
                            <option value="8">Agosto</option>
                            <option value="9">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                        <table class="table table-borderless">
                            <tr>
                                <th>Nome</th>
                                <th>Partido</th>
                                <th>Perfil</th>
                            </tr>
                            <tbody id="tbody">
                                @foreach ($deputados as $deputado)
                                    <tr>
                                        <td>{{$deputado['nome']}}</td>
                                        <td>{{$deputado['partido']}}</td>
                                        <td><a href="{{url('/deputado/'.$deputado['id'])}}" class="btn btn-primary">Perfil</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="col px-md-5">
                <div class="p-3 border bg-light">
                    <h5>Midias</h5>
                    <h6 class="mb-2 text-muted">Top 5 midias mais utilizadas pelos deputados</h6>
                    <table class="table table-borderless">
                        @foreach ($midias as $midia)
                            <tr>
                                <td class="d-flex">
                                    <a href="{{$midia['url']}}" class="fa fa-{{strtolower($midia['nome'])}} col-sm-2 col-md-2 col-lg-2 col-xl-2"></a>
                                    <div class="col-sm col-md col-lg col-xl">{{$midia['nome']}}</div>
                                </td>
                            </tr>
                        @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.onload = function () {
            $(function () {
                $('#select').val(new Date().getMonth()+1);
        })}

        $('#select').change(function() {
            var month = $('#select').val();
            $.ajax({
                url: 'http://localhost:8000/rankings/'+month,
                type: 'GET',
                success: function(response){
                    $("#tbody").empty();
                    var data = JSON.parse(response);
                    data.map(function(d) {
                        var tr = '<tr>'+
                                    '<td>'+d.nome+'</td>'+
                                    '<td>'+d.partido+'</td>'+
                                    '<td><a href="localhost:8000/deputado/'+d.id+'" class="btn btn-primary">Perfil</a></td></tr>'
                        $('#tbody').append(tr);
                    });
                }
            });
        });
    </script>
@endsection
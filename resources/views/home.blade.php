@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div className='container'>
        <div className='row'>
            <div className='col-sm col-md col-lg col-xl'>
                <h1>Bem vindo ao Cidadão de Olho</h1>
            </div>
        </div>
        <div className='row'>
            <div className='col-sm-8 col-md-8 col-lg-8 col-xl-8 offset-sm-2 offset-md-2 offset-lg-2 offset-xl-2'>
                <p>
                    Esta iniciativa é motivada por pedidos da sociedade e sem fins lucrativos para que possamos monitorar o que 
                    politicos fazem de forma mais transparente e visual. Como por exemplo o seguinte pedido anônimo: <br />
                    “Nós, cidadãos do estado de Minas Gerais, estamos muito interessados em monitorar como nosso dinheiro está sendo gasto. 
                    Especificamente, gostaríamos de poder acompanhar quem são os deputados mais "gastadores". 
                    Além disso, como maneira de divulgação destes dados, queríamos também saber qual mídia social tem mais impacto para divulgar tal ranking. 
                    Queremos ser ouvidos!”.

                </p>
            </div>
        </div>
    </div>
@endsection
@extends('tienda.componentes.inicio')
@section('productos')
    <div class="col-lg-9 col-md-7">
        <div class="filter__item">
            <h3 class="h2 text-center">Todos Los Productos</h3>
            <div class="row">
            </div>
        </div>
        @include('tienda.componentes.suscrito')
        @include('tienda.componentes.productos')
    </div>    
@endsection
@extends('tienda.componentes.inicio')
@section('productos')
    <div class="col-lg-9 col-md-7">
        <div class="filter__item">
            <h3 class="h2 text-center">
                Productos - {{$nombre}}
            <div class="row">
            </div>
        </div>
        @include('tienda.componentes.productos')
    </div>    
@endsection
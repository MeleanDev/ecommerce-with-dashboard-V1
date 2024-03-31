@extends('tienda.app.app')
@section('contenido')
    <section class="product spad">
        <div class="container">
            <div class="row">
                @include('tienda.componentes.sidebar')
                @yield('productos')
            </div>
        </div>
    </section>    
@endsection

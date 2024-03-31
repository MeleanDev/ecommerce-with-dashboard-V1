@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Panel Principal</h1>
@stop

@section('content')
      <div class="contenedor">
                <div class="small-box bg-info mx-auto">
                    <div class="inner">
                    <h3>N</h3>
                    <p>Total Ventas</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                    </div>
                    {{-- <a href="{{route('admin.ventas')}}" class="small-box-footer">
                    Ver Ventas <i class="fas fa-arrow-circle-right"></i>
                    </a> --}}
                </div>
                <div class="small-box bg-gradient-warning mx-auto">
                    <div class="inner">
                    <h3>{{App\Models\Producto::all()->count();}}</h3>
                    <p>Cantidad de Productos</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-archive"></i>
                    </div>
                    <a href="{{route('admin.productos')}}" class="small-box-footer">
                    Ver Productos <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="small-box bg-gradient-success mx-auto">
                    <div class="inner">
                    <h3>{{App\Models\categoria::all()->count();}}</h3>
                    <p>Cantidad de Categorias</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="{{route('admin.categorias')}}" class="small-box-footer">
                    Ver Categorias <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
      </div>
      <div class="contenedor">

          <div class="small-box bg-primary mx-auto">
                <div class="inner">
                  <h3>{{App\Models\Regisapp::all()->count();}}</h3>
                  <p>Registro de Actividades</p>
                </div>
                <div class="icon">
                  <i class="far fa-list-alt"></i>
                </div>
                <a href="{{route('admin.registroActs')}}" class="small-box-footer">
                Ver Actividades <i class="fas fa-arrow-circle-right"></i>
                </a>
          </div>

          <div class="small-box bg-secondary mx-auto">
              <div class="inner">
                <h3>{{App\Models\Suscrito::all()->count();}}</h3>
                <p>Total Suscrito</p>
              </div>
              <div class="icon">
                <i class="fas fa-desktop"></i>
              </div>
              <a href="{{route('admin.suscrito')}}" class="small-box-footer">
              Ver Suscritos <i class="fas fa-arrow-circle-right"></i>
              </a>
          </div>
      </div>
@stop
@section('css')

<style>
.contenedor {
  display: flex; /* Enables flexbox layout */
  
}



.contenedor > div {
  width: 300px; /* Maintains individual div width */
  margin: 5px;  /* Adds spacing between divs (optional) */
}
</style>

@stop
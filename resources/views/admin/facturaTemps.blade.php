@extends('adminlte::page')

@section('title', 'Dashboard - Factura')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Creando Factura</h1>
@stop


@section('content')
<div class="p-3 mb-2 bg-white">
    @include('admin.ComponCategoria.factura')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#guardarP">
        Agregar Producto
    </button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Crear">
        Crear Factura
    </button>
    <!-- Modal -->
    <div class="modal fade" id="Crear" tabindex="-1" role="dialog" aria-labelledby="Crear" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Factura</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Seguro que desea crear la factura con los datos actuales?</h1>
                <form action="{{route('admin.ventas.cliente.creando.producto.factura')}}" method="POST">
                    @csrf
                    <hr>
                    <p>Si, yo {{Auth::user()->name}}</p>
                    <div class="input-group mb-3">
                        <input type="text" readonly class="form-control-plaintext" name="repuesta" value="Estoy Seguro de Crear la factura con los datos actuales">
                    </div>
                    <p class="font-weight-bold">Para Continual Con la Creacion de la factura Selecione Crear</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <div class="modal fade" id="guardarP" tabindex="-1" role="dialog" aria-labelledby="guardarP" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h2 class="font-weight-bold" style="margin: 0auto; text-align:center">Elije un Producto para la factura</h2>
                <br>
                <form method="POST" action="{{route('admin.ventas.cliente.creando.producto')}}">
                    @csrf
                    <div class="form-group">
                        <label for="producto">Selecciona el Producto</label>
                        <select class="form-control" id="producto" name="producto">
                            <option selected>Selecciona un Producto</option>
                            @foreach ($productos as $item)
                                <option value="{{$item->id}}">{{$item->nombre}} - {{$item->cantidad}}</option>
                            @endforeach
                        </select>
                        <small id="producto" class="form-text text-muted">Primero dice el nombre y luego la cantidad (Nombre - cantida disponible).</small>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad a Facturar</label>
                        <input type="number" name="cantidad" class="form-control" id="cantidad" aria-describedby="cantidad" placeholder="cantidad"  min="1">
                        <small id="cantidad" class="form-text text-muted">Recuerde poner una cantidad menor a la disponible.</small>
                      </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
            </div>
        </form>
        </div>
        </div>
    </div>
</div>
<div class="p-3 mb-2 bg-white">
    <form action="#">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Nombre y Apellido del Cliente</label>
                    <input type="text" class="form-control" value="@foreach ($factura as $item){{$item->nombre}} {{$item->apellido}}@endforeach" readonly>
                </div>
                <div class="col">
                    <label>Telefono del Cliente</label>
                    <input type="text" class="form-control" value="@foreach ($factura as $item){{$item->telefono}}@endforeach" readonly>   
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Cedula del Cliente</label>
                    <input type="text" class="form-control" value="@foreach ($factura as $item){{$item->cedula}}@endforeach" readonly>
                </div>
                <div class="col">
                    <label>Nombre Del Admin</label>
                    <input type="text" class="form-control" value="@foreach ($factura as $item){{$item->admin}}@endforeach" readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row bg-dark">
                <div class="col">
                    <label for="cantidad">Total a pagar</label>
                    <p>Precio total: ${{ $precioTotal }}</p>
                </div>
                <div class="col">
                    <label for="cantidad">Codigo Factura</label>
                    <p>Codigo: @foreach ($factura as $item){{$item->factura}}@endforeach</p>
                </div>
            </div>
          </div>
    </form>
</div>
<div class="p-3 mb-2 bg-white">
    <table id="registros" class="table table-striped" style="width:100%">
        <thead class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 5%">id</th>
                <th class="text-center" style="width: 60%">producto</th>
                <th class="text-center" style="width: 15%">cantidad</th>
                <th class="text-center" style="width: 10%">Precio</th>
                <th class="text-center" style="width: 10%">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faturaProductos as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="text-center">{{$item->nombre}}</td>
                    <td class="text-center">{{$item->cantidad}}</td>
                    <td class="text-center">{{$item->precio}}</td>
                    <td class="text-center">
                        <a href="{{route("admin.ventas.cliente.creando.producto.eliminar",$item->id)}}" class="btn btn-danger btn-san"><i class="fa fa-trash"> Eliminar</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 5%">id</th>
                <th class="text-center" style="width: 60%">producto</th>
                <th class="text-center" style="width: 15%">cantidad</th>
                <th class="text-center" style="width: 10%">Precio</th>
                <th class="text-center" style="width: 10%">Accion</th>
            </tr>
        </tfoot>
    </table>
</div>
@stop

@section('css')
   
@stop

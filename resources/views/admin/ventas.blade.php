@extends('adminlte::page')

@section('title', 'Dashboard - Ventas')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Ventas</h1>
@stop

@section('content')
<div class="p-3 mb-2 bg-white">
    @include('admin.ComponCategoria.vent')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#crear">
        Crear Nueva Factura
    </button>
    <a class="btn btn-danger" href="#" role="button"><p class="text-white">Eliminar Todas Las Facturas</p></a>
    
    <!-- Modal -->
        <div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="crear" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <h2 class="font-weight-bold" style="margin: 0auto; text-align:center">Elije un cliente para la factura</h2>
                    <br>
                    <form method="post" action="{{route('admin.ventas.cliente')}}" >
                        @csrf
                        <label for="clientes">Selecciona el cliente</label>
                        <select class="form-control" id="clientes" name="cliente">
                            <option selected>Selecciona un cliente</option>
                            @foreach ($cliente as $item)
                                <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido}} - {{$item->cedula}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="factura">Codigo para la factura</label>
                            <input type="text" name="factura" class="form-control" id="factura" aria-describedby="factura" placeholder="codigo" oninput="this.value = this.value.replace(/ /g, '');">
                          </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear Factura</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    
    <!-- Button trigger modal -->
    <table id="ventas" class="table table-striped" style="width:100%">
        <thead class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 5%">id</th>
                <th class="text-center" style="width: 20%">Admin</th>
                <th class="text-center" style="width: 30%">Factura</th>
                <th class="text-center" style="width: 20%">Cliente</th>
                <th class="text-center" style="width: 15%">Fecha y hora</th>
                <th class="text-center" style="width: 10%">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="text-center">{{$item->admin}}</td>
                    <td class="text-center">{{$item->factura}}</td>
                    <td class="text-center">{{$item->cliente}}</td>
                    <td class="text-center">{{$item->create_at}}</td>
                    <td class="text-center"></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 5%">id</th>
                <th class="text-center" style="width: 20%">Admin</th>
                <th class="text-center" style="width: 30%">Factura</th>
                <th class="text-center" style="width: 20%">Cliente</th>
                <th class="text-center" style="width: 15%">Fecha y hora</th>
                <th class="text-center" style="width: 10%">Accion</th>
            </tr>
        </tfoot>
    </table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap4.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap4.js"></script>
    <script>	
        var table = new DataTable('#ventas', {
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json',
            },
            responsive: true,
        });
    </script>
@stop

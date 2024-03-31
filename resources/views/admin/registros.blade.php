@extends('adminlte::page')

@section('title', 'Dashboard - Registros')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Registros</h1>
@stop


@section('content')
<div class="p-3 mb-2 bg-white">
    @include('admin.ComponCategoria.regis')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
        Eliminar Todos Los Registros
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Registros</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Seguro Que deseas eliminar todos los registros?</h1>
                <form action="{{route('admin.registroActs.eliminar')}}" method="POST">
                    @csrf
                    <hr>
                    <p>Si, yo {{Auth::user()->name}}</p>
                    <div class="input-group mb-3">
                        <input type="text" readonly class="form-control-plaintext" name="repuesta" value="Estoy Seguro de eliminar todo el registro">
                    </div>
                    <p class="font-weight-bold">Para Continual Con la eliminacion Selecione eliminar</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <table id="registros" class="table table-striped" style="width:100%">
        <thead class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 10%">Registro</th>
                <th class="text-center" style="width: 20%">Usuario</th>
                <th class="text-center" style="width: 30%">Accion</th>
                <th class="text-center" style="width: 40%">Fecha y hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="text-center">{{$item->usuario}}</td>
                    <td class="text-center">{{$item->accion}}</td>
                    <td class="text-center">{{$item->last_login}}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 10%">Registro</th>
                <th class="text-center" style="width: 30%">Usuario</th>
                <th class="text-center" style="width: 40%">Accion</th>
                <th class="text-center" style="width: 20%">Fecha y hora</th>
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
        var table = new DataTable('#registros', {
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json',
            },order: [[0, "desc"], [1, "desc"], [2, "desc"],[3, "desc"]],
            responsive: true
        });
    </script>

@stop
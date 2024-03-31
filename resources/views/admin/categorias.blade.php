@extends('adminlte::page')

@section('title', 'Dashboard - Categorias')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Categorias</h1>
@stop

@section('content')
<div class="p-3 mb-2 bg-white">
    @include('admin.ComponCategoria.catego')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#guardar">
        Agregar Categoria
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="guardar" tabindex="-1" role="dialog" aria-labelledby="guardar" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.categorias.guardar')}}" method="POST">
                    @csrf
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="nombre">Nombre de la nueva Categoria</label>
                        <input type="text" class="form-control" id="nombre" name="categoria" placeholder="Nombre" required/>
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <table id="Categoria" class="table table-striped" style="width:100%">
        <thead class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 10%">ID</th>
                <th class="text-center" style="width: 40%">Categoria</th>
                <th class="text-center" style="width: 40%">Accion</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->categoria}}</td>
                    <td class="text-center">
                        <a href="{{route("admin.categorias.eliminar",$item->id)}}" class="btn btn-danger btn-san"><i class="fa fa-trash"> Eliminar</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Accion</th>
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
        var table = new DataTable('#Categoria', {
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json',
            },
            responsive: true
        });
    </script>

@stop
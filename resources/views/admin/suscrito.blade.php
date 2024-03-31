@extends('adminlte::page')

@section('title', 'Dashboard - Suscritos')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Suscritos</h1>
@stop

@section('content')
<div class="p-3 mb-2 bg-white">
    @include('admin.ComponCategoria.vent')
    <!-- Button trigger modal -->
    <table id="suscritos" class="table table-striped" style="width:100%">
        <thead class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 20%">id</th>
                <th class="text-center" style="width: 50%">Correo</th>
                <th class="text-center" style="width: 30%">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Suscritos as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="text-center">{{$item->correo}}</td>
                    <td class="text-center">
                        <a class="btn bg-danger" href="{{route("admin.suscrito.eliminar",$item->id)}}"><i class='fas fa-trash-alt'></i> Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 20%">id</th>
                <th class="text-center" style="width: 50%">Correo</th>
                <th class="text-center" style="width: 30%">Accion</th>
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
        var table = new DataTable('#suscritos', {
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json',
            },
            responsive: true,
        });
    </script>

@stop
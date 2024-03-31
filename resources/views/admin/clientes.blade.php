@extends('adminlte::page')

@section('title', 'Dashboard - Clientes')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Clientes</h1>
@stop

@section('content')
<div class="p-3 mb-2 bg-white">
    @include('admin.ComponCategoria.client')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#guardar">
        Agregar Cliente
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="guardar" tabindex="-1" role="dialog" aria-labelledby="guardar" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.clientes.guardar')}}" method="POST">
                    @csrf
                    <h4 class="font-weight-bold" style="margin: 0auto; text-align:center">Agregar Cliente Nuevo</h4>
                    <br><hr>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="cedula">Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
                          </div>
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
    <table id="clientes" class="table table-striped" style="width:100%">
        <thead class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 5%">ID</th>
                <th class="text-center" style="width: 15%">Cedula</th>
                <th class="text-center" style="width: 25%">Nombre</th>
                <th class="text-center" style="width: 25%">Apellido</th>
                <th class="text-center" style="width: 25%">Telefono</th>
                <th class="text-center" style="width: 10%">Accion</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->cedula}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->apellido}}</td>
                    <td>{{$item->telefono}}</td>
                    <td><div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acciones
                        </button>
                        <div class="dropdown-menu" saria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item btn bg-info" data-toggle="modal" data-target="#editar{{$item->id}}" href="#"><i class='fas fa-edit'></i> Editar</a>
                            <a class="dropdown-item btn bg-danger" href="{{route("admin.clientes.eliminar",$item->id)}}"><i class='fas fa-trash-alt'></i> Eliminar</a>
                        </div>
                    </div>
                    </td>
                </tr>
                <div class="modal fade" id="editar{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="title-modal">Editar Cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.clientes.editar',$item->id)}}" method="POST">
                                @method('put')
                                @csrf
                                <h4 class="font-weight-bold" style="margin: 0auto; text-align:center">Editar Cliente</h4>
                                <br><hr>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="CedulaEditar">Cedula</label>
                                    <input type="text" class="form-control" id="CedulaEditar" name="cedula" value="{{$item->cedula}}" placeholder="Cedula" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="TelefonoEditar">Telefono</label>
                                    <input type="text" class="form-control" id="TelefonoEditar" name="telefono" value="{{$item->telefono}}" placeholder="Password">
                                  </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="NombreEditar">Nombre</label>
                                        <input type="text" class="form-control" id="NombreEditar" name="nombre" value="{{$item->nombre}}" placeholder="Nombre" required>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="ApellidoEditar">Apellido</label>
                                        <input type="text" class="form-control" id="ApellidoEditar" name="apellido" value="{{$item->apellido}}" placeholder="Apellido" required>
                                      </div>
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
            @endforeach
            
        </tbody>
        <tfoot class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 5%">ID</th>
                <th class="text-center" style="width: 15%">Cedula</th>
                <th class="text-center" style="width: 25%">Nombre</th>
                <th class="text-center" style="width: 25%">Apellido</th>
                <th class="text-center" style="width: 25%">Telefono</th>
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
        var table = new DataTable('#clientes', {
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json',responsive: true,
            },
            responsive: true
        });
    </script>

@stop
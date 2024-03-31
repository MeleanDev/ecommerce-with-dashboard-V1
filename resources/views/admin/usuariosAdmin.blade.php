@extends('adminlte::page')

@section('title', 'Dashboard - UsuariosAdmin')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Usuarios Admin</h1>
@stop

@section('content')
<div class="p-3 mb-2 bg-white">
    @include('admin.ComponCategoria.usuari')
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#guardar">
                Agregar Usuarios Admin
            </button>
        
        <!-- Modal -->
        <div class="modal fade" id="guardar" tabindex="-1" role="dialog" aria-labelledby="guardar" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <h2 class="font-weight-bold" style="margin: 0auto; text-align:center">Datos Del nuevo Admin</h2>
                    <br>
                    <form method="POST" action="{{route('admin.usuarioAdmin.guardar')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Usuario">Nombre Usuario</label>
                                <input type="text" class="form-control" placeholder="Usuario" name="name">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="Email">Correo Electronico</label>
                              <input type="email" class="form-control" placeholder="Correo" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                              <label for="inputCity">Contraseña</label>
                              <input type="password" class="form-control" placeholder="Contraseña" name="password">
                              <small id="passwordHelpInline" class="text-muted">
                                Debe tener entre 8 y 20 caracteres.
                              </small>    
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
    <table id="usuarios" class="table table-striped" style="width:100%">
        <thead class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 10%">ID</th>
                <th class="text-center" style="width: 20%">Usuario</th>
                <th class="text-center" style="width: 30%">Correo</th>
                <th class="text-center" style="width: 30%">Contraseña</th>
                <th class="text-center" style="width: 10%">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->password}}</td>
                    <td>@if (Auth::user()->name != $item->name)
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item bg-warning" href="#" data-toggle="modal" data-target="#exampleModal{{$item->id}}"><i class='fas fa-edit'></i>Editar</a>
                                <a class="dropdown-item bg-danger" href="{{route("admin.usuarioAdmin.eliminar",$item->id)}}"><i class='fas fa-trash-alt'></i> Eliminar</a>
                            </div>
                            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <h2 class="font-weight-bold" style="margin: 0auto; text-align:center">Datos Del nuevo Admin</h2>
                                        <br>
                                        <form action="{{ route("admin.usuarioAdmin.editar", $item->id) }}"method="POST">
                                            @method('put')
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="Usuario">Nombre Usuario</label>
                                                    <input type="text" class="form-control" value="{{$item->name}}" placeholder="Usuario" name="name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="Email">Correo Electronico</label>
                                                  <input type="email" class="form-control" value="{{$item->email}}" placeholder="Correo" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                  <label for="inputCity">Contraseña</label>
                                                  <input type="password" class="form-control" value="{{$item->password}}" placeholder="Contraseña" name="password">
                                                  <small id="passwordHelpInline" class="text-muted">
                                                    Debe tener entre 8 y 20 caracteres.
                                                  </small>    
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
                        @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="p-3 mb-2 bg-info text-white">
            <tr>
                <th class="text-center" style="width: 10%">ID</th>
                <th class="text-center" style="width: 20%">Usuario</th>
                <th class="text-center" style="width: 30%">Correo</th>
                <th class="text-center" style="width: 30%">Contraseña</th>
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
        var table = new DataTable('#usuarios', {
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json',
            },
            responsive: true,
        });
    </script>

@stop
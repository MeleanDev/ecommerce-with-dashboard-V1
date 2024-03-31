@extends('adminlte::page')

@section('title', 'Dashboard - Productos')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Productos</h1>
@stop

@section('content')
    <div class="p-3 mb-2 bg-white">
        @include('admin.ComponCategoria.product')
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#guardar">
            Agregar Producto
        </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar">
            eliminar Producto
        </button>
        
        <!-- Modal Guardar-->
        <div class="modal fade" id="guardar" tabindex="-1" role="dialog" aria-labelledby="guardar" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Nuevo Producto</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Nuevo Producto</h1>    
                        <form action="{{route('admin.productos.guardar')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="Nombre">Nombre Producto</label>
                                    <input type="text" id="Nombre" class="form-control" name="nombre" placeholder="Nombre Producto" required>
                                </div>
                                <div class="form-group">
                                    <label for="Foto">Foto</label>
                                    <input type="file" id="Foto" class="form-control" accept="image/png, image/jpeg" name="foto" placeholder="foto" required>
                                </div>
                                <div class="form-group">
                                    <label for="Categoria">Categoria Producto</label>
                                    <select class="form-control" id="Categoria" name="categoria">
                                        <option value="Sin Categoria" selected>Sin Categoria</option>
                                        @foreach ($categorias as $item)
                                            <option value="{{$item->categoria}}">{{$item->categoria}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="Cantidad">Cantidades</label>
                                        <input type="number" id="Cantidad" class="form-control" name="cantidad" placeholder="Disponibles" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="precio">Precio Actual</label>
                                        <input type="number" id="precio" class="form-control" name="precio" placeholder="precio" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="antiguo">Precio Viejo</label>
                                        <input type="number" id="antiguo" class="form-control" name="antiguo" placeholder="Viejo">
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
        <!-- Modal Eliminar-->
        <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Eliminar</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Eliminar Producto</h1>    
                        <form action="{{route('admin.productos.eliminar')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="eliminar">Producto a eliminar</label>
                                    <select multiple class="form-control" id="eliminar" name="nombre">
                                        <option value="Sin Categoria" selected>elije un producto</option>
                                        @foreach ($dato as $item)
                                            <option value="{{$item->nombre}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
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
    </div>
        <!-- Productos -->
    <div class="container d-flex justify-content-center mt-30 mb-20 bg-white">
                <div class="row">
                @foreach ($datos as $item)
                <div class="col-md-4 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img-actions">         
                                    <img src="{{asset($item->foto)}}" class="card-img img-fluid" width="96" height="350" alt="">
                                </div>
                            </div>
                            <div class="card-body bg-light text-center">
                                <div class="mb-2">
                                    <h4 class="font-weight-semibold mb-2">
                                    <a href="#" class="text-default mb-2" data-abc="true">{{$item->nombre}}</a>
                                    </h4>
                                    <a href="#" class="text-muted" data-abc="true">Categoria: {{$item->categoria}}</a>
                                </div>
                                    <h3 class="mb-0 font-weight-semibold">${{$item->precio}}</h3>
                                    <div class="text-muted"><s>Antes: ${{$item->antiguo}}</s></div>
                                <div class="mb-3">
                                    <i class="fa fa-star star"></i>
                                    <i class="fa fa-star star"></i>
                                    <i class="fa fa-star star"></i>
                                    <i class="fa fa-star star"></i>
                                </div>
                                <div class="mb-2">
                                    <a href="#" class="text-muted" data-abc="true">Disponibles: {{$item->cantidad}}</a>
                                </div>
                                <a class="btn bg-danger" href="{{route("admin.productos.eliminarB",$item->id)}}"><i class='fas fa-trash-alt'></i> Eliminar</a>
                                <button type="button" class="btn bg-cart" data-toggle="modal" data-target="#editar{{$item->id}}"><i class="fa fa-cart-plus mr-2"></i>Editar</button>             
                            </div>
                        </div>               
                </div>

                <!-- Modal Editar-->
                <div class="modal fade" id="editar{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="editar-title">Editar Producto</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Editar Producto</h1>    
                                <form action="{{ route("admin.productos.editar", $item->id) }}" enctype="multipart/form-data" method="POST">
                                    @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="NombreEditar">Nombre</label>
                                            <input type="text" class="form-control" id="NombreEditar" name="nombre" value="{{$item->nombre}}" placeholder="Nombre Producto" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="FotoEditar">Foto</label>
                                            <input type="file" class="form-control" accept="image/png, image/jpeg" id="FotoEditar" name="foto" placeholder="foto">
                                        </div>
                                        <div class="form-group">
                                            <label for="categoriaEditar">Categoria Producto</label>
                                            <select class="form-control" id="categoriaEditar" name="categoria">
                                                <option value="{{$item->categoria}}" selected>{{$item->categoria}}</option>
                                                @foreach ($categorias as $item2)
                                                    <option value="{{$item2->categoria}}">{{$item2->categoria}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                                <label for="cantidadEditar">Cantidades</label>
                                                <input type="number" id="cantidadEditar" class="form-control" name="cantidad" value="{{$item->cantidad}}" placeholder="Disponibles" required>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="precioEditar">Precio Actual</label>
                                                <input type="number" id="precioEditar" class="form-control" name="precio" value="{{$item->precio}}" placeholder="precio" required>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="antiguoEditar">Precio Viejo</label>
                                                <input type="number" id="antiguoEditar" class="form-control" name="antiguo" value="{{$item->antiguo}}" placeholder="Viejo">
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
                </div>
    </div>
    {{$datos->links('pagination::Bootstrap-4')}}
@stop

@section('css')
    <style>
        .mt-50{

        margin-top: 50px;
        }

        .mb-50{

        margin-bottom: 50px;
        }



        .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: .1875rem;
        }

        .card-img-actions {
        position: relative;
        }
        .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
        text-align: center;
        }

        .card-img{

        width: 350px;
        }

        .star{
            color: red;
        }

        .bg-cart {
        background-color:rgb(38, 0, 255);
        color:#fff;
        }

        .bg-cart:hover {

        color:#fff;
        }

        .bg-buy {
        background-color:green;
        color:#fff;
        padding-right: 29px;
        }
        .bg-buy:hover {

        color:#fff;
        }

        a{

        text-decoration: none !important;
        }
    </style>
@stop
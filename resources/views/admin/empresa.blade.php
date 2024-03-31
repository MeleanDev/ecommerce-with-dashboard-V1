@extends('adminlte::page')

@section('title', 'Dashboard - Empresa')

@section('content_header')
    <h1 class="font-weight-bold" style="margin: 0auto; text-align:center">Datos de la Empresa</h1>
@stop


@section('content')
<div class="p-3 mb-2 bg-white">
    @include('admin.ComponCategoria.empres')

    <form action="{{route('admin.empresa.guardar')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col">
                <label for="NombreEmpresa">Nombre De la Empresa</label>
                <input type="text" id="NombreEmpresa" name="nombre" value="@foreach ($empresa as $item){{$item->nombre}}@endforeach" class="form-control" placeholder="electronic Art" required>
                <small id="NombreEmpresa" class="form-text text-muted">Este nombre aparecera en la factura.</small>
                </div>
                <div class="col">
                    <label for="CorreoEmpresa">Correo De la empresa</label>
                    <input type="text" id="CorreoEmpresa" name="correo" value="@foreach ($empresa as $item){{$item->correo}}@endforeach"
                 class="form-control" placeholder="example@example.com" required>
                    <small id="CorreoEmpresa" class="form-text text-muted">Este correo aparecera en la factura.</small>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                <label for="FotoEmpresa">Foto de la empresa</label>
                <input type="file" name="foto" id="FotoEmpresa" accept="image/png, image/jpeg" class="form-control">
                <small id="FotoEmpresa" class="form-text text-muted">Esta foto aparecera en la web como logo de la empresa y tambien aparecera en la Factura</small>
                </div>
                <div class="col">
                    <label for="DireccionEmpresa">Direccion De la empresa</label>
                    <input type="text" id="DireccionEmpresa" name="ubicacion" value="@foreach ($empresa as $item){{$item->ubicacion}}@endforeach" 
                                                                                class="form-control" placeholder="calle o avenida" required>
                    <small id="DireccionEmpresa" class="form-text text-muted">Esta Direccion aparecera en la factura.</small>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                <label for="pais">Prefijo del numero De la Empresa</label>
                <select name="prefijo" id="pais" required>
                    <option selected>Selecciona un país</option>
                    <option value="54">Argentina (+54)</option>
                    <option value="591">Bolivia (+591)</option>
                    <option value="55">Brasil (+55)</option>
                    <option value="56">Chile (+56)</option>
                    <option value="57">Colombia (+57)</option>
                    <option value="506">Costa Rica (+506)</option>
                    <option value="53">Cuba (+53)</option>
                    <option value="593">Ecuador (+593)</option>
                    <option value="503">El Salvador (+503)</option>
                    <option value="502">Guatemala (+502)</option>
                    <option value="504">Honduras (+504)</option>
                    <option value="52">México (+52)</option>
                    <option value="505">Nicaragua (+505)</option>
                    <option value="507">Panamá (+507)</option>
                    <option value="595">Paraguay (+595)</option>
                    <option value="51">Perú (+51)</option>
                    <option value="1">Puerto Rico (+1)</option>
                    <option value="598">República Dominicana (+598)</option>
                    <option value="509">Haití (+509)</option>
                    <option value="597">Surinam (+597)</option>
                    <option value="58">Venezuela (+58)</option>
                  </select>
                <small class="form-text text-muted">Elije tu pais. Esto se completara para guiar al cliente directo al whatsapp de la empresa</small>
                </div>
                <div class="col">
                    <label for="TelefonoEmpresa">Telefono De la empresa</label>
                    <input type="text" id="TelefonoEmpresa" value="@foreach ($empresa as $item){{$item->telefono}}@endforeach"  name="telefono" class="form-control" placeholder="04123456709" required>
                    <small class="form-text text-muted">Esta Telefono aparecera en la factura. completa el numero sin prefijo</small>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-info">Guardar Datos</button>
        </div>
    </form>
</div>
@stop

@section('css')
   
@stop

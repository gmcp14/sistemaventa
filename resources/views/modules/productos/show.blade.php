@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Eliminar Productos</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">

            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Eliminar Producto del stock</h4>
                    <h6 class="card-subtitle">Una vez que ele producto sea eliminado, no podra ser recuperado.</h6>
                   
                   
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Categoria</th>
                                    <th>Proveedor</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Venta</th>
                                    <th>Compra</th>
                                    <th>Activo</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr class="text-center">
                                    <td>{{$items->nombre_categoria}}</td>
                                    <td>{{$items->nombre_proveedores}}</td>
                                    <td>{{$items->nombre}}</td>
                                    <td></td>
                                    <td>{{$items->descripcion}}</td>
                                    <td>{{$items->cantidad}}</td>
                                    <td>{{$items->precio_compra}}</td>
                                    <td>{{$items->precio_venta}}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="{{$items->id}}"
                                                {{ $items->activo ? 'checked' : ''}}>

                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                           
                        </table>
                        <form action="{{route('productos.destroy', $items->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Eliminar Producto</button>
                             <a href="{{route('productos')}}" class="btn btn-info">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset ('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endsection
@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Eliminar compra de productos</h4>
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
                    <h4 class="card-title">Eliminar Compras</h4>
                    <h6 class="card-subtitle">Una vez eliminada la compra no podrea ser recuperada!</h6>
                   
                   
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Usuario</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio de compra</th>
                                    <th>Total de compra</th>
                                    <th>Fecha</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                             
                                <tr class="text-center">
                                    <td>{{$items->nombre_usuario}}</td>
                                    <td>{{$items->nombre_producto}}</td>
                                    <td>{{$items->cantidad}}</td>
                                    <td>{{$items->precio_compra}}</td>
                                    <td>{{$items->precio_compra * $items->cantidad}}</td>
                                    <td>{{$items->created_at}}</td>
                                  
                                   
                                </tr>

                            </tbody>
                           
                        </table>
                        <form action="{{route('compras.destroy', $items->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="text" value="{{$items->producto_id}}" id="producto_id" name="producto_id" hidden>
                            <button class="btn btn-danger">Eliminar compra</button>
                            <a href="{{route('compras')}}" class="btn btn-info mt -3">Cancelar</a>
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

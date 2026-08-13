@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Editar imagen de  Productos</h4>
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
                    <h4 class="card-title">Editar imagen de  Producto del stock</h4>
                                      
                   
                    <div class="table-responsive">
                        
                        <form action="{{route('productos.update.image', $item->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="">Selecciona la nueva imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                            <button class="btn btn-danger mt-3">Actualizar imagen</button>
                             <a href="{{route('productos')}}" class="btn btn-info mt-3">Cancelar</a>
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
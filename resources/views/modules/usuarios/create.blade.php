@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"> Agregar Usuario</h4>
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
                    <h4 class="card-title">Agregar nueva usuario</h4>
                    <form action="{{route('usuarios.store')}}" method="POST">
                        @csrf
                        <label for="">Nombre de Categoria</label>
                        <input type= "text" class="form-control mb-2" required name="name" id="name">
                        <label for="">Email</label>
                        <input type= "text" class="form-control mb-2" required name="email" id="email">
                        <label for="">Password</label>
                        <input type= "Password" class="form-control mb-2" required name="password" id="password">
                         <label for="">Rol de usuario</label>
                         <select class="form-control" id="rol" name="rol">
                            <option value="">Selecciona el rol</option>
                            <option value="admin">Admin</option>
                            <option value="cajero">Cajero</option>
                         </select>
                        <button class="btn btn-primary mt-3">Guardar</button>
                        <a href="{{route('usuarios')}}" class="btn btn-info mt-3">Cancelar</a>
                    </form>

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
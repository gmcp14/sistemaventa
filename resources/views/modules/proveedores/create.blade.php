@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"> Agregar nuevo proveedor</h4>
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
                    <h4 class="card-title">Agregar nuevo proveedor</h4>
                    <form action="{{route('proveedores.store')}}" method="POST">
                        @csrf
                        <label for="">Nombre de Proveedor</label>
                        <input type= "text" class="form-control mb-2" required name="nombre" id="nombre">
                        <label for="">Telefono</label>
                        <input type= "text" class="form-control mb-2" required name="telefono" id="telefono">
                        <label for="">Email</label>
                        <input type= "text" class="form-control mb-2" required name="email" id="email">
                        <label for="">CP</label>
                        <input type= "text" class="form-control mb-2" required name="cp" id="cp">
                        <label for="">Sitio Web</label>
                        <input type= "text" class="form-control mb-2" required name="sitio_web" id="sitio_web">
                        <label for="">notas</label>
                        <textarea name="notas"  id="notas" cols="30" rows="10" class="form-control"></textarea>
                        <button class="btn btn-primary mt-3">Guardar</button>
                        <a href="{{route('proveedores')}}" class="btn btn-info mt-3">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

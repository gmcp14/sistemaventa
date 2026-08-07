@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"> Editar proveedor</h4>
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
                    <h4 class="card-title">Editar proveedor</h4>
                    <form action="{{route('proveedores.update', $item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="">Nombre de Proveedor</label>
                        <input type= "text" class="form-control mb-2" required name="nombre" id="nombre" value="{{$item->nombre}}">
                        <label for="">Telefono</label>
                        <input type= "text" class="form-control mb-2" required name="telefono" id="telefono" value="{{$item->telefono}}">
                        <label for="">Email</label>
                        <input type= "text" class="form-control mb-2" required name="email" id="email" value="{{$item->email}}">
                        <label for="">CP</label>
                        <input type= "text" class="form-control mb-2" required name="cp" id="cp" value="{{$item->cp}}">
                        <label for="">Sitio Web</label>
                        <input type= "text" class="form-control mb-2" required name="sitio_web" id="sitio_web" value="{{$item->sitio_web}}">
                        <label for="">notas</label>
                        <textarea name="notas"  id="notas" cols="30" rows="10" class="form-control" >{{$item->notas}}</textarea>
                        <button class="btn btn-primary mt-3">Actualizar</button>
                        <a href="{{route('proveedores')}}" class="btn btn-info mt-3">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

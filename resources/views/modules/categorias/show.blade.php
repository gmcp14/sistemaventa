@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"> Eliminar Categoria</h4>
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
                    <h4 class="card-title">¿Esta seguro de eliminar esta categoria?</h4>
                    <form action="{{route('categorias.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <label for="">Nombre de Categoria</label>
                        <input type= "text" class="form-control" readonly name="nombre" id="nombre" value="{{$item->nombre}}">
                        <button class="btn btn-danger mt-3">Eliminar</button>
                        <a href="{{route('categorias')}}" class="btn btn-info mt-3">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

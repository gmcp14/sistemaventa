@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"> Crear producto</h4>
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
                    <h4 class="card-title">Crear nuevo producto</h4>
                    <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                           <option value="">Selecciona una categoria</option> 
                           @foreach($categorias as $item)
                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>

                        <label for="">Proveedor</label>
                        <select name="proveedor_id" id="proveedor_id" class="form-control">
                            <option value="">Selecciona un Proveedor</option> 
                            @foreach($proveedores as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @endforeach
                        </select>
                        <label for="">Codigo del producto</label>
                        <input type="text" class="form-control" required name="codigo" id="codigo"
                            >
                        <label for="">Nombre del producto</label>
                        <input type= "text" class="form-control" required name="nombre" id="nombre">

                        <label for="">Descripcion</label>
                       <textarea name="descripcion" id="descripcion" cols="20" rows="5" class="form-control"></textarea>

                       <label for="imagen">Imagen</label>
                       <input type="file" class="form-control" name="imagen" id="imagen">
                        <button class="btn btn-primary mt-3">Guardar</button>
                        <a href="{{route('productos')}}" class="btn btn-info mt-3">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

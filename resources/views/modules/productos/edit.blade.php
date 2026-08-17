@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"> Editar producto</h4>
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
                    <h4 class="card-title">Editar producto</h4>
                    <form action="{{route('productos.update', $item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="">Selecciona una categoria</option>
                            @foreach($categorias as $categoria)
                            @if($item->categoria_id == $categoria->id)
                            <option selected value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @else
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endif

                            @endforeach
                        </select>

                        <label for="">Proveedor</label>
                        <select name="proveedor_id" id="proveedor_id" class="form-control">
                            <option value="">Selecciona un Proveedor</option>
                            @foreach($proveedores as $proveedor)
                           @if($item->proveedor_id == $proveedor->id)
                            <option selected value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                             @else
                             <option  value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                              @endif
                            @endforeach
                        </select>
                         <label for="">Codigo del producto</label>
                        <input type="text" class="form-control" required name="codigo" id="codigo"
                            value="{{$item->codigo}}">

                        <label for="">Nombre del producto</label>
                        <input type="text" class="form-control" required name="nombre" id="nombre"
                            value="{{$item->nombre}}">

                        <label for="">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="20" rows="5"
                            class="form-control">{{$item->descripcion}}</textarea>

                        <label for="">Precio de venta</label>
                        <input type="text" class="form-control" required name="precio_venta" id="precio_venta"
                            value="{{$item->precio_venta}}">

                        <button class="btn btn-warning mt-3">Actualizar</button>
                        <a href="{{route('productos')}}" class="btn btn-info mt-3">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
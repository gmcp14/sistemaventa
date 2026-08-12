@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Editar una  compra</h4>
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
                    <h4 class="card-title">Edicion de  : {{$item->nombre}}</h4>
                    <form action="{{route('compras.update', $item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" value="{{$item->producto_id}}" id="producto_id" name='producto_id' hidden>
                        <label for="">Cantidad del producto</label>
                        <input type= "text" class="form-control" value="{{$item->cantidad}}" required name="cantidad" id="cantidad">

                        <label for="">Precio de compra</label>
                       <input type= "text" class="form-control" value="{{$item->precio_compra}}" required name="precio_compra" id="precio_compra">
                        <button class="btn btn-warning mt-3">Actualizar</button>
                        <a href="{{route('compras')}}" class="btn btn-info mt-3">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

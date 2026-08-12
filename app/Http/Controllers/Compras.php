<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Compras extends Controller
{
    public function create($id){
        $titulo= 'Compra productos';
        $item= Producto::find($id);
        return view('modules.compras.create', compact('titulo', 'item'));
    }
    public function store(Resquest $request){
        $item = new Compra();
        $item->user_id = Auth::user()->id;
        $item ->producto_id = $request->id;
        $item->cantidad = $request->cantidad;
        $item->precio_compra = $request->precio_compra;

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\Detalle_venta;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Ventas extends Controller
{
    public function index(){
        $titulo="ventas";
        $items = Producto::all();
        return view('modules.ventas.index', compact('titulo','items'));
    }
    public function agregar_carrito($id_producto){
        //$titulo ='Ventas';
        $item = Producto::find($id_producto);
        $caqntidad_disponible = $item->cantidad;

        $items_carrito= Session::get('items_carrito', []);

        $existe_producto = false;
        foreach($items_carrito as $key => $carrito){
            if($carrito['id'] == $id_producto){
                
            if($carrito['cantidad']>= $caqntidad_disponible){
                return to_route('ventas-nueva')->with('error', 'No hay stock suficiente!!');
            }
                $items_carrito[$key]['cantidad'] += 1;
                $existe_producto = true;
                break;
            }
        }
        if(!$existe_producto){
             $items_carrito []=[
            'id' =>$item->id,
            'codigo'=>$item->codigo,
            'nombre'=>$item->nombre,
            'cantidad'=>1,
            'precio'=>$item->precio_venta
        ];
        }
       
        Session::put('items_carrito', $items_carrito);

        //$items = Producto::all();
         //return view('modules.ventas.index', compact('titulo','items'));
         return to_route('ventas-nueva');
    }
    public function quitar_carrito($id_producto){
        $items_carrito = Session::get('items_carrito',[]);
        foreach($items_carrito as $key => $carrito){
            if($carrito['id'] == $id_producto){
                if($carrito['cantidad'] > 1){
                    $items_carrito[$key]['cantidad'] -=1;
                }else{
                    unset($items_carrito[$key]);
                }
                break;
            }
        }
        Session::put('items_carrito', $items_carrito);
        return to_route('ventas-nueva');
    }

    public function borrar_carrito(){
         Session::forget('items_carrito');
        // $titulo="ventas";
        //$items = Producto::all();
        return to_route('ventas-nueva');

    }

    public function vender(){
        $items_carrito = Session::get('items_carrito', []);
        
        if(empty($items_carrito)){
            return to_route('ventas-nueva')->with('error', 'El carrito esta vacio');
        }

        DB::beginTransaction();
        try {
            $totalVenta = 0;
            foreach($items_carrito as $item){
                $totalVenta += $item['cantidad']*$item['precio'];
            }
            $venta = new Venta();
            $venta->user_id = Auth::id();
            $venta->total_venta = $totalVenta;
            $venta->save();

            foreach($items_carrito as $item){
                $producto = Producto::find($item['id']);

                if($producto->cantidad < $item['cantidad']){
                    DB::rollBack();
                    return to_route('ventas-nueva')->with('error', 'No hay stock suficiente para' . $producto->nombre);

                }

                $detalle = new Detalle_venta();
                $detalle->venta_id = $venta->id;
                $detalle->producto_id = $item['id'];
                $detalle->cantidad = $item['cantidad'];
                $detalle->precio_unitario = $item['precio'];
                $detalle->sub_total = $item['cantidad'] * $item['precio'];
                $detalle->save();

                $producto->cantidad -= $item['cantidad'];
                $producto->save();
            }
            Session::forget('items_carrito');
            DB::commit();
            return to_route('ventas-nueva')->with('success', 'venta realizado con exito!!');
        } catch (\Throwable $th) {
            //dd($th);
            DB::rollBack();
            return to_route('ventas-nueva')->with('error', 'Erroro al procesar la venta!' .$th->getMessage());
        }
    }
}

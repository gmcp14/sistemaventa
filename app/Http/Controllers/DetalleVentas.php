<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\Detalle_venta;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class DetalleVentas extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(){
    $titulo = 'Detalles de ventas';
    $items = Venta::select(
        'ventas.*',
        'users.name as nombre_usuario'
    )
    ->join('users', 'ventas.user_id', '=', 'users.id')
    ->orderBy('ventas.created_at', 'desc')
    ->get();
        return view('modules.detalles_ventas.index', compact('titulo','items'));
    }

    
      public function vista_detalle($id){
        $titulo = 'Detalle de venta';
        $venta = Venta::select(
            'ventas.*',
            'users.name as nombre_usuario'
        )
        ->join('users', 'ventas.user_id', '=', 'users.id')
        ->where('ventas.id', $id)
        ->firstOrFail();

        $detalles = Detalle_venta::select(
            'detalle_venta.*',
            'productos.nombre as nombre_producto'
        )
        ->join('productos', 'detalle_venta.producto_id', '=', 'productos.id')
        ->where('venta_id', $id)
        ->get();

        return view('modules.detalles_ventas.detalle_venta', compact('titulo', 'venta', 'detalles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function revocar($id)
    {
       
        try {
            $detalles = Detalle_venta::Select(
                'producto_id', 'cantidad'
            )
            ->where('venta_id', $id)
            ->get();

            foreach($detalles as $detalle){
                Producto::where('id',$detalle->producto_id)
                ->increment('cantidad', $detalle->cantidad);
            }

            Detalle_venta::where('venta_id', $id)->delete();
            Venta::where('id',$id)->delete();
            DB::commit();
            return to_route('detalle-venta')->with('success', '
            Revocacion de vebnta exitosa!!');
        } catch (\Throwable $th) {
            //dd($th);
           DB::rollBack();
            return to_route('detalle-venta')->with('error', '
           no se pudo revocar la venta');
        }
    }

    
    public function generarTicket($id)
    {
        $venta = Venta::select(
            'ventas.*',
            'users.name as nombre_usuario'
        )
        ->join('users', 'ventas.user_id', '=', 'users.id')
        ->where('ventas.id', $id)
        ->firstOrFail();

        $detalles = Detalle_venta::select(
            'detalle_venta.*',
            'productos.nombre as nombre_producto'
        )
        ->join('productos', 'detalle_venta.producto_id', '=', 'productos.id')
        ->where('venta_id', $id)
        ->get();

        $pdf = Pdf::loadView('modules.detalles_ventas.ticket', compact('venta', 'detalles'));

        return $pdf->stream("ticket_compra_{$venta->id}.pdf");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

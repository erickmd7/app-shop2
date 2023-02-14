<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    //
    public function store(Request $request){


        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id =$request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();
        $message ="EL PRODUCTO SE HA AÑADIDO CORRECTAMENTE";
        $alerta = "danger";

        return back()->with(compact('message','alerta'));
    }
    public function destroy(Request $request){

        $message = "ERROR EN ELIMINAR";
        $cartDetail = CartDetail::find($request->cart_detail_id);
        if($cartDetail->cart_id == auth()->user()->cart->id){
            $cartDetail->delete();
            $alerta ="success";
            $message ="EL PRODUCTO SE HA ELIMINADO CORRECTAMENTE";
        }
        return back()->with(compact('message','alerta'));
    }
}

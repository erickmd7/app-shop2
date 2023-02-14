<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(){
        $cart = auth()->user()->cart;
        $cart->status = "Pending";
        $cart->save();
        $message = "Tu pedido se ha registrado correctamente. Te contactaremos pronto por email.";

        return back()->with(compact('message'));

    }
    //
}

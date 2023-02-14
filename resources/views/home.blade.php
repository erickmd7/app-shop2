@extends('layouts.app')
@section('title','Dashboard')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/applied_background.jpg')}}'); display:flex; align-items:center;justify-content: center">
    <h2 class="title text-center mt-2" style="position: relative; width:100%; background: rgba(255, 255, 255, .3); -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); border: 1.5px solid rgba(209, 213, 219, 0.3); padding: 8px 0;" >Bienvenido {{Auth::user()->name}}.</h2>
</div>
<div class="main main-raised">
    <div class="container" style="padding-top:15px">
        <div class="section">
            <h2 class="title text-center">Dashboard</h2>
            @if (session('message'))
                <div class="alert alert-{{session('alerta')}}">
                    <div class="container-fluid">
                      <div class="alert-icon">
                        <i class="material-icons">
                            check
                        
                        </i>
                      </div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                      </button>
                      <b> {{session('message')}}</b>
                    </div>
                </div>
            @endif
            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="active">
                    <a href="#dashboard" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Carrito de compras
                    </a>
                </li>
                <li>
                    <a href="#tasks" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Pedidos realizados
                    </a>
                </li>
            </ul>
            @php
            $total = 0;
            @endphp
            <hr>
            <p>Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos</p>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th class="text-center">Nombre del producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(auth()->user()->cart->details as $detail)
                    <tr>
                        <td class="text-center"><img height="50px" src="{{$detail->product->featured_image_url}}"></td>
                            <td class="text-center"><a href="{{url('/products/'.$detail->product->id)}}" target="_blank">{{$detail->product->name}}</a></td>
                            <td class="text-center">{{$detail->quantity}}</td>
                            <td class="text-center">&dollar; {{$detail->product->price}}</td>
                            <td class="text-center">&dollar; {{$detail->quantity*$detail->product->price}}</td>
                        @php
                            $total = $total + ($detail->quantity*$detail->product->price)
                        @endphp
                            <td class="td-actions text-center">
                                <form method="POST" action="{{url('/cart')}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                    <a type="button" rel="tooltip" title="Ver producto" target="_blank" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs"                                          >
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
                <tfoot>
                    <td class="text-right bg-info" colspan="4">Total</td>
                    <td class="text-center bg-info">&dollar; {{$total}}</td>
                </tfoot>
            </table>
            <div class="text-center">
                <form method="POST" action="{{url('/order')}}">
                    {{ csrf_field() }}
                    <button class="btn btn-primary btn-round">
                        <i class="material-icons">done</i> Realizar pedido
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@include('includes.footer')
</div>
@endsection
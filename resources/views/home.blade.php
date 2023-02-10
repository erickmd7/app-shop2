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
            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li>
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
        
        </div>
    </div>
</div>
@include('includes.footer')
</div>
@endsection
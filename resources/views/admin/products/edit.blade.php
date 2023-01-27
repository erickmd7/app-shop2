@extends('layouts.app')
@section('title','Listado de productos')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/applied_background.jpg')}}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Productos</h2>
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action="{{url('/admin/products/'.$product->id.'/edit')}}" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group label-floating">
                                <label class="control-label" for="name">ID DEL PRODUCTO</label>
                                <input disabled type="text" class="form-control" name="name" value="{{$product->id}}">
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label" for="name">Nombre del producto</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group label-floating">
                                <label class="control-label" for="description">Descripcion</label>
                                <input type="text" class="form-control" name="description" value="{{$product->description}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group label-floating">
                                <label class="control-label" for="long_description">Descripción Larga</label>
                                <textarea class="form-control" rows="3" name="long_description">{{$product->long_description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group label-floating">
                                <label class="control-label" for="price">Precio</label>
                                <input type="number" step="0.01" form-control" rows="3" name="price" value="{{$product->price}}"></input>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-center">Actualizar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <nav class="pull-right">
            <ul>
                <li><a href="https://applied.com.mx">Applied</a></li>
                <li><a href="https://rodensa.net">Rodensa</a></li>
                <li><a href="https://vycmex.net">Vycmex</a></li>
                <li><a href="http://www.dicofasa.mx/">Dicofasa</a></li>
            </ul>
        </nav>
        <div class="copyright pull-left">
            Applied México © 
                @php
                    echo(date("Y"));
                @endphp
                Todos los derechos reservados.
            </div>
        </div>
    </div>
</footer>
@endsection
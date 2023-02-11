@extends('layouts.app')
@section('title','Bienvenido a Applied SR24')
@section('body-class','landing-page')
@section('styles')
<style>
    .team .row .col-md-4{
        margin-bottom: 5em;
    }
    .row{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }   
    .row > [class*='col-']{
        display: flex;
        flex-direction: column;
    }
</style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/applied_background.jpg')}}');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- -->
                <h1 class="title">Tienda de Applied Para Reventa.</h1>
                <h4>Realiza pedidos en Linea, te contactaremos para coordinar la factura y la entraga.</h4>
                <br />
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-primary btn-raised btn-lg">
                    <i class="fa fa-hand-o-right"></i> Hacer Pedido
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">Applied SR24</h2>
                    <h5 class="description">Diseñado para vender productos practicamente nuevos, los cuales fueron devueltos por error en la Orden de compra, o porque no se usaron. Cada producto cuenta con condiciones excelentes, por lo cual su condicion funcional es superior al 95%</h5>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                <i class="material-icons">assignment_turned_in</i>
                            </div>
                            <h4 class="info-title">Calidad Garantizada</h4>
                            <p>Productos reacondicionados de primer nivel.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">query_stats</i>
                            </div>
                            <h4 class="info-title">Productos Nuevos</h4>
                            <p>Todos nuestros productos SR estan verificados por un experto</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">money</i>
                            </div>
                            <h4 class="info-title">Las mejores soluciones</h4>
                            <p>Con más de 100 años desde su fundación, Applied se ha catalogado en el mercado como el mejor proveedor de materiales para la industria.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section text-center">
            <h2 class="title">Productos disponibles</h2>

            <div class="team">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="card team-player">
                                <img src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
                                <h4 class="title"><a href="{{url('/products/'.$product->id)}}">{{$product->name}} </a><br />
                                    <small class="text-muted">{{$product->category['name']}}</small>
                                </h4>
                                <p class="description">{{$product->description}}</p>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
</div>
@endsection
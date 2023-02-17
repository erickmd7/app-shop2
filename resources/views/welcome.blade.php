@extends('layouts.app')
@section('title','Bienvenido a Applied SR24')
@section('body-class','landing-page')
@section('styles')
<style>
    .team .row .col-md-4{
        margin-bottom: 5em;
    }
    .tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 422px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
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
            <h2 class="title">Visita nuestras categorias</h2>

            <form class="form-inline" method="get" action="{{url('/search')}}">
                <input class="typeahead form-control" type="text" placeholder="¿Qué Producto buscas?" name="query" id="search">
                <button class="btn btn-primary btn-just-icon" type="submit"><i class="material-icons">search</i></button>
            </form>

            <div class="team">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{$category->featured_image_url}}" alt="Imagen categoria {{$category->name}}" class="img-raised img-circle">
                                <h4 class="title"><a href="{{url('/categories/'.$category->id)}}">{{$category->name}} </a><br />
                                    <small class="text-muted">{{$category->name}}</small>
                                </h4>
                                <p class="description">{{substr($category->description,0,40).'...'}}</p>
                                <a href="{{url('/categories/'.$category->id)}}" class="btn btn-primary">Ver más...</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
</div>
@endsection
@section('scripts')
    <script src='{{asset('/js/typeahead.bundle.min.js')}}'></script>
    <script>
        $(function(){
            let products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch : '{{url("/products/json")}}'
            });
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLenght: 1,
            },{
                name:'products',
                source: products
            });
        });
    </script>
@endsection
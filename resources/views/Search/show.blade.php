@extends('layouts.app')
@section('title','App Shop | Resultados Busqueda')
@section('body-class','profile-page')
@section('content')
<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');">
</div>

<div class="main main-raised">
	<div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{url('img/logo.png')}}" alt="Circle Image" class="img-circle img-responsive img-raised">
                    </div>
                    @if (session('message'))
                    <div class="alert alert-success">
                        <div class="container-fluid">
                          <div class="alert-icon">
                            <i class="material-icons">check</i>
                          </div>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                          </button>
                          <b> {{session('message')}}</b>
                        </div>
                    </div>
                    @endif
                    <div class="name">
                        <h3 class="title">Se encontraron {{$products->count()}} Resultados de búsqueda para el termino "<b>{{$query}}</b>" </h3>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
			    <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{$product->featured_image_url}}" alt="Imagen categoria {{$product->name}}" class="img-raised img-circle">
                            <h4 class="title"><a href="{{url('/categories/'.$product->id)}}">{{$product->name}} </a><br />
                                <small class="text-muted">{{$product->name}}</small>
                            </h4>
                            <p class="description">{{substr($product->description,0,40).'...'}}</p>
                            <a href="{{url('/products/'.$product->id)}}" class="btn btn-primary">Ver más...</a>
                        </div>
                    </div>
                    @endforeach				
			    </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
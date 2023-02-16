@extends('layouts.app')
@section('title','App Shop | Categoria '.$category->name)
@section('body-class','profile-page')
@section('styles')
<style>
    .team .row .col-md-4{
        margin-bottom: 5em;
    }
</style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');">
</div>

<div class="main main-raised">
	<div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{$category->featured_image_url}}" alt="{{'Imagen Representativa de la categoria'}} {{$category -> name}}" class="img-circle img-responsive img-raised">
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
                        <h3 class="title">{{$category->name}}</h3>
					<h6>{{$category->name}}</h6>
                    </div>
                </div>
            </div>
            <div class="description text-center">
                   <p>{{$category->description}}</p>
            </div>
            <div class="text-center team">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
                                <h4 class="title"><a href="{{url('/products/'.$product->id)}}">{{$product->name}} </a><br />
                                    <small class="text-muted">{{$product->category_name}}</small>
                                </h4>
                                <p class="description">{{substr($product->description,0,40).'...'}}</p>
                                <a href="{{url('/products/'.$product->id)}}" class="btn btn-primary">Ver más...</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$products->links()}}
            </div>
            
        </div>
    </div>
</div>
<!-- Modal Core -->

@include('includes.footer')
@endsection
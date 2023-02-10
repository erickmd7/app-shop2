@extends('layouts.app')
@section('title','Imagenes de productos')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/applied_background.jpg')}}'); display:flex; align-items:center;justify-content: center">
</div>


<div class="main main-raised">
    <div class="container">
        <div class="text-center">
            <div style="margin-top: 20px">
                <div class="section">
                    <h2 class="title text-center mt-2" style="position: relative; width:100%; background: rgba(255, 255, 255, .3); -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); border: 1.5px solid rgba(209, 213, 219, 0.3); padding: 8px 0;" >Imagenes del producto "{{$product->name}}"</h2>
                    <form method="post" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="photo" required accept="image/png, image/jpeg">
                        <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>    
                        
                        <a class="btn btn-secondary btn-round" href="{{url('/admin/products/')}}">
                            <i class="material-icons">add</i>Volver al listado de productos
                        </a>
                    </form>
                    <hr>
                    <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <img src="{{$image->url}}" width="250px">
                                    <form method="post" action="">
                                        {{ csrf_field() }}
                                        {{method_field('DELETE')}}
                                        <input type="hidden" name="image_id" value="{{$image->id}}">
                                        <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                                        @if ($image->featured)
                                            <button type="button" class="btn btn-success btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada de este producto">
                                                <i class="material-icons">favorite</i>
                                            </button>
                                        @else
                                        <a href="{{url('/admin/products/'.$product->id.'/images/select/'.$image->id)}}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                            <i class="material-icons">favorite</i>
                                        </a>
                                        @endif    
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
</div>
@endsection
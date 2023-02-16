@extends('layouts.app')
@section('title','Bienvenido a Applied SR24')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/applied_background.jpg')}}'); display:flex; align-items:center;justify-content: center">
    <h2 class="title text-center mt-2" style="position: relative; width:100%; background: rgba(255, 255, 255, .3); -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); border: 1.5px solid rgba(209, 213, 219, 0.3); padding: 8px 0;" >Registrar nuevo Producto</h2>
</div>

<div class="main main-raised text-center">
    <div class="container" style="padding-top:15px">
        <div class="text-center" style="display: flex;align-items:center;justify-content: center;flex-direction:column">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" style="width: 700px" >
                <div class="container-fluid">
                    <div class="alert-icon">
                        <i class="material-icons">error_outline</i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                    </button>
                    <b>Error: </b>
                    {{$error}}
                </div>
            </div>
            @endforeach    
            @endif
        </div>
        <div class="section col-md-4 col-md-offset-4 text-center">
                <form method="POST" action="{{url('/admin/products')}}" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group label-floating">
                                <label class="control-label" for="name">Nombre del producto</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group label-floating">
                                <label class="control-label" for="description">Descripcion</label>
                                <input type="text" class="form-control" name="description"value="{{old('description')}}">
                            </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group label-floating">
                                <label class="control-label" for="long_description">Descripción Larga</label>
                                <textarea class="form-control" rows="3" name="long_description">{{old('long_description')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group label-floating">
                                <label class="control-label" for="price">Precio</label>
                                <input type="number" class="form-control" name="price" step="0.01" value="{{old('price')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="form-group label-floating">
                                <label class="control-label" for="category">Categoria</label>
                                <select class="form-control" name="category_id" id="category">
                                    <option disabled selected>Seleccionar categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-center">Registrar Producto</button>
                    <a class="btn btn-danger text-center" href="{{url('/admin/products')}}">Cancelar</a>
                </form>
        
        </div>
    </div>
</div>
    @include('includes.footer')
</div>
@endsection
@extends('layouts.app')
@section('title','Listado de productos')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/applied_background.jpg')}}'); display:flex; align-items:center;justify-content: center">
    <h2 class="title text-center mt-2" style="position: relative; width:100%; background: rgba(255, 255, 255, .3); -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); border: 1.5px solid rgba(209, 213, 219, 0.3); padding: 8px 0;" >
        Listado de Categorias</h2>
</div>


<div class="main main-raised">
    <div class="container">
        <div class="text-center">
            <div style="margin-top: 20px">
                <div class="row">
                    <a class="btn btn-primary btn-round" href="{{url('/admin/categories/create')}}">
                        <i class="material-icons">add</i> Nuevo Categoria
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripcion</th>
                                <th> Imagen </th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{$category->name}}</td>
                                    <td class="col-md-4">{{$category->description}}</td>
                                    <td>
                                        <img src="{{$category->featured_image_url}}" height="50">
                                    </td>
                                    <td class="col-md-4 td-actions">
                                        <form method="POST" action="{{url('/admin/categories/'.$category->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE')}}
                                            <a href="{{url("/categories/".$category->id)}}" type="button" rel="tooltip" title="Ver Categoria" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <a href="{{url('/admin/categories/'.$category->id .'/edit')}}" rel="tooltip" title="Editar categoria" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{url('/admin/categories/'.$category->id .'/images')}}" rel="tooltip" title="Editar Imagen" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-image"></i>
                                            </a>
                                            <button type="submit" title="Eliminar categoria" class="btn btn-danger btn-simple btn-xs" rel="tooltip" title="Eliminar categoria"                                         >
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                    </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
</div>
@endsection
@extends('layouts.app')
@section('title','Listado de productos')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/applied_background.jpg')}}'); display:flex; align-items:center;justify-content: center">
    <h2 class="title text-center mt-2" style="position: relative; width:100%; background: rgba(255, 255, 255, .3); -webkit-backdrop-filter: blur(5px); backdrop-filter: blur(5px); border: 1.5px solid rgba(209, 213, 219, 0.3); padding: 8px 0;" >Listado de Productos</h2>
</div>


<div class="main main-raised">
    <div class="container">
        <div class="text-center">
            <div style="margin-top: 20px">
                <div class="row">
                    <a class="btn btn-primary btn-round" href="{{url('/admin/products/create')}}">
                        <i class="material-icons">add</i> Nuevo Producto
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td class="col-md-4">{{$product->long_description}}</td>
                                    <td>{{$product->category ? $product->category->name : 'General'}}</td>
                                    <td class="text-right">&dollar; {{$product->price}}</td>
                                    <td class="td-actions text-right">
                                        <form method="POST" action="{{url('/admin/products/'.$product->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE')}}
                                            <button type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-info"></i>
                                            </button>
                                            <a href="{{url('/admin/products/'.$product->id .'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs"                                          >
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                    </div>
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
</div>
@endsection
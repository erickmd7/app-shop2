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
            <div class="team">
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
                                        <button type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </button>
                                        <a href="{{url('/admin/products/'.$product->id .'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{url('/admin/products/'.$product->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE')}}
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
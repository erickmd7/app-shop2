@extends('layouts.app')
@section('body-class','signup-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/applied_background.jpg')}}');
    background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav class="pull-right">
                <ul>
                    <li><a href="#">Applied</a></li>
                    <li><a href="#">Rodensa</a></li>
                    <li><a href="#">Vycmex</a></li>
                    <li><a href="#">Dicofasa</a></li>
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
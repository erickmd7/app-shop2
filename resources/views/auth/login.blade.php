@extends('layouts.app')
@section('body-class','signup-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/applied_background.jpg')}}');
    background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <h2>Iniciar Sesión</h2>
                        </div>
						<div class="content">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password" type="password" class="form-control" name="password" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Recuerdame
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                    <span class="help-block text-center">
                                        <strong style="color: red; font-size:13px;">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        Iniciar sesión
                                    </button>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Olvidé la contraseña
                                    </a>
                            </div>
                        </div>
                    </form>
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
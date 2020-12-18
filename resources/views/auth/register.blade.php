@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Booking')])
@section('title')
	Registro
@endsection

@section('content')
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-lg-5 col-md-7 col-sm-9 ml-auto mr-auto">

            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="card card-login card-hidden mb-3">
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title"><strong>{{ __('Registro') }}</strong></h4>
                        <div class="social-line">
                  <img src="{{asset('images/icono_la_buena_pizza.jpg')}}" style="width: 120px; border-radius: 10px;" alt="" />

                        </div>
                    </div>
                    <div class="card-body ">
                        <p class="card-description text-center">{{ __(' ') }}</p>
                        <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">face</i>
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="{{ __('Nombre...') }}"
                                    value="{{ old('name') }}"   autocomplete="name" autofocus>
                            </div>
                            @if ($errors->has('name'))
                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                            @endif
                        </div>
                        <!--Apellidos-->
                        <div class="bmd-form-group{{ $errors->has('apellido') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                </div>
                                <input type="text" name="apellido" class="form-control" placeholder="{{ __('Apellidos...') }}"
                                    value="{{ old('apellido') }}"   autocomplete="apellido">
                            </div>
                            @if ($errors->has('apellido'))
                            <div id="apellido-error" class="error text-danger pl-3" for="apellido" style="display: block;">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </div>
                            @endif
                        </div>
                         <!--Dni-->
                        <div class="bmd-form-group{{ $errors->has('dni') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">picture_in_picture</i>
                                    </span>
                                </div>
                                <input type="text" name="dni" class="form-control" placeholder="{{ __('DNI...') }}"
                                    value="{{ old('dni') }}"   autocomplete="dni">
                            </div>
                            @if ($errors->has('dni'))
                            <div id="dni-error" class="error text-danger pl-3" for="dni" style="display: block;">
                                <strong>{{ $errors->first('dni') }}</strong>
                            </div>
                            @endif
                        </div>
                         <!--telefono-->
                        <div class="bmd-form-group{{ $errors->has('telefono') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">stay_current_portrait</i>
                                    </span>
                                </div>
                                <input type="text" name="telefono" class="form-control" placeholder="{{ __('Telefono...') }}"
                                    value="{{ old('telefono') }}"   autocomplete="telefono">
                            </div>
                            @if ($errors->has('telefono'))
                            <div id="telefono-error" class="error text-danger pl-3" for="telefono" style="display: block;">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}"
                                    value="{{ old('email') }}"   autocomplete="email">
                            </div>
                            @if ($errors->has('email'))
                            <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="{{ __('Password...') }}"   autocomplete="new-password">
                            </div>
                            @if ($errors->has('password'))
                            <div id="password-error" class="error text-danger pl-3" for="password"
                                style="display: block;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div
                            class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="{{ __('Confirm Password...') }}"   autocomplete="new-password">
                            </div>
                            @if ($errors->has('password_confirmation'))
                            <div id="password_confirmation-error" class="error text-danger pl-3"
                                for="password_confirmation" style="display: block;">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                            @endif
                        </div>
                        {{-- <div class="form-check mr-auto ml-3 mt-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="policy" name="policy"
                                    {{ old('policy', 1) ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
                            </label>
                        </div> --}}
                    </div>
                    <div class="card-footer justify-content-center">
                        <button type="submit"
                            class="btn btn-primary btn-link btn-lg">{{ __('Crear Cuenta') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

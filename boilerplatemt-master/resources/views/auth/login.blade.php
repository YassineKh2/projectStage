@extends('layouts.app')

@section('css')
    <style>
        .login.login-4 .login-form {
            width: 100%;
            max-width: 450px;
        }
    </style>
@endsection

@section('bodycontent')



<div class="d-flex flex-column flex-root">
<!--begin::Login-->
<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{asset("assets/media/bg/bg-3.jpg")}}');">
    <div class="login-form text-center p-7 position-relative overflow-hidden">
        <!--begin::Login Header-->
        <div class="d-flex flex-center mb-10">
            <a href="#">
                <img src="{{asset('assets/img/kpmg.svg')}}" class="max-h-75px" alt="" />
            </a>
        </div>
        <!--end::Login Header-->
        <!--begin::Login Sign in form-->
        <div class="login-signin">
            <div class="mb-20">
                <h3>Bienvenue sur Dealflow</h3>
                <div class="text-muted font-weight-bold">Veuillez vous connecter:</div>
            </div>
            <form class="form" id="kt_login_signin_form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-5">
                    <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
                    @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group mb-5">
                    <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" />
                    @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                   {{--  <div class="checkbox-inline">
                        <label class="checkbox m-0 text-muted">
                        <input type="checkbox" name="remember" />
                        <span></span>Remember me</label>
                    </div>
                    <a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a> --}}
                </div>
                <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Connexion</button>
            </form>
            {{-- <div class="mt-10">
                <span class="opacity-70 mr-4">Don't have an account yet?</span>
                <a href="javascript:;" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Sign Up!</a>
            </div> --}}
        </div>
        <!--end::Login Sign in form-->
    </div>
</div>
</div>
<!--end::Login-->
</div>
@endsection
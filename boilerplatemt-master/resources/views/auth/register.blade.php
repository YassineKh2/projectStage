@extends('layouts.app')

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
        <div class="signup-form">
            <div class="mb-20">
                <h3>Bienvenue sur KPMG DealFlow</h3>
                <div class="text-muted font-weight-bold">Veuillez vous inscrire:</div>
            </div>
            <form class="form" id="kt_signup_form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">


                    <div class="col-12">
                         <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Nom" name="name" autocomplete="off" value="{{ old('name') }}"/>
                            @error('name')
                            <div class="invalid-feedback show text-left ml-8" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}"/>
                            @error('email')
                            <div class="invalid-feedback show text-left ml-8">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Mot de passe" name="password" />
                            @error('password')
                            <div class="invalid-feedback show text-left ml-8">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirmer mot de passe" name="password_confirmation" />
                        </div>
                    </div>
                </div>


                <div class="form-group mb-5 text-left">
                    <div class="checkbox-inline">
                        <label class="checkbox m-0">
                        <input type="checkbox" name="agree" />
                        <span></span>I Agree the
                        <a href="#" class="font-weight-bold ml-1">terms and conditions</a>.</label>
                    </div>
                    <div class="form-text text-muted text-center"></div>
                    @error('agree')
                    <div class="invalid-feedback show mt-2 ml-8" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <button id="signup_submit" type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Enregistrer</button>
            </form>
        </div>
        <!--end::Login Sign in form-->
    </div>
</div>
</div>
<!--end::Login-->
</div>
@endsection
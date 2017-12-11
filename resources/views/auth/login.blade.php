@extends('layouts.app')
@section('stylesheets')

@endsection
@section('content')



    {{--logo--}}
    <div class="row center-xs p-a-sm">
        <div class=p-l-md">
            <a class="navbar-brand">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24">
                    <path d="M 4 4 L 44 4 L 44 44 Z" fill="#a88add"></path>
                    <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)"></path>
                    <path d="M 4 4 L 24 4 L 4  44 Z" fill="#0cc2aa"></path>
                </svg>
                <img src="../assets/images/logo.png" alt="." class="hide">
                <span class="hidden-folded inline">E-hr</span>
            </a>
        </div>
    </div>

    {{-- white box--}}
    <div class="center-block w-xl r box-color  p-y-sm">
        {{--title--}}
        <div class="text-sm m-a-md">
            Sign in with your E-HR Account
        </div>

        {{--form--}}
        <div class="m-a-md">
            <form class="form-horizontal" data-parsley-validate="" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="eq-ui-form-group eq-ui-input-field">
                    <input id="email" type="email" name="email" class="form-control eq-ui-input" value="{{ old('email') }}" required="">
                    <label for="email" data-error="Email not valid">E-mail</label>
                </div>

                <div class="eq-ui-form-group eq-ui-input-field">
                    <input id="password" type="password" name="password" class="form-control eq-ui-input" required="" value="">
                    <label for="password" data-error="Min length 6">Password</label>
                </div>


                <div class="eq-ui-form-group eq-ui-input-field row middle-xs"  >
                    <input type="checkbox" id="test7" class="eq-ui-input filled-in"
                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="text-black" for="test7"  >Keep me signed in</label>
                </div>

                <div class="eq-ui-form-group eq-ui-input-field">
                    <button type="submit" class="btn btn-block btn-primary eq-ui-waves-light">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <a class="row p-b-sm center-xs text-primary text-sm _600" href="{{ route('password.request') }}">
        Forgot Your Password?
    </a>
    <div class="row center-xs text-sm">Do not have an account?
        <a href="{{ route('register') }}" class="p-l-sm text-primary _600">Sign up</a>
    </div>

@endsection

@section('scripts')

@endsection

@extends('layouts.app')
@section('stylesheets')
    {!! Html::style('css/exentriq-bootstrap-material-ui.min.css') !!}
@endsection
<style>
    .eq-ui-form-group.eq-ui-input-field {
        padding-bottom: 10px;
    }
</style>

@section('content')


        <div class="row center-xs p-a-md">
            <div class=p-l-md">
                <a class="navbar-brand">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24">
                        <path d="M 4 4 L 44 4 L 44 44 Z" fill="#a88add"></path>
                        <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)"></path>
                        <path d="M 4 4 L 24 4 L 4  44 Z" fill="#0cc2aa"></path>
                    </svg>
                    <img src="../assets/images/logo.png" alt="." class="hide">
                    <span class="hidden-folded inline">Flatkit</span>
                </a>
            </div>
        </div>

        <div class="center-block w-xxl r box-color  p-y-sm">

            <div class="text-sm m-a-md">
                Sign in with your E-HR Account
            </div>
            <div class="m-a-md">
                <form class="form-horizontal" data-parsley-validate="" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="eq-ui-form-group eq-ui-input-field">
                        <input id="email" type="email" name="email" class="form-control eq-ui-input" required="">
                        <label for="email" data-error="Email not valid">E-mail</label>
                    </div>

                    <div class="eq-ui-form-group eq-ui-input-field">
                        <input id="password" type="password" name="password" data-parsley-minlength="6"
                               class="form-control eq-ui-input" required="">
                        <label for="password" data-error="Min length 6">Password</label>
                    </div>


                    {{--

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>



                    --}}


                    <div class="form-group">
                        <div class="row middle-xs col-md-12">
                            <input type="checkbox" id="test7" class="eq-ui-input filled-in" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="test7">Keep me signed in</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-block btn-primary eq-ui-waves-light">
                                Login
                            </button>
                        </div>
                    </div>
                </form>



            </div>
        </div>

        <a class="row p-b-sm center-xs text-primary text-sm _600" href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>

        <div class="row center-xs text-sm">Do not have an account? <a class="p-l-sm text-primary _600">Sign up</a> </div>

    </div>



@endsection


@section('scripts')

    {{--<script type="text/javascript" src="js/"></script>--}}
    <script type="text/javascript" src="js/exentriq-bootstrap-material-ui.min.js"></script>
@endsection

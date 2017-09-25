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
            Sign up to your E-HR Account
        </div>

        {{--form--}}
        <div class="m-a-md">
            <form class="form-horizontal" data-parsley-validate=""  method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="eq-ui-form-group eq-ui-input-field">
                    <input id="name" type="text" name="name" class="form-control eq-ui-input" required="">
                    <label for="name" >Name</label>
                </div>

                <div class="eq-ui-form-group eq-ui-input-field">
                    <input id="email" type="email" name="email" class="form-control eq-ui-input" required="">
                    <label for="email" data-error="Email not valid">E-mail</label>
                </div>


                <div class="eq-ui-form-group eq-ui-input-field">
                    <input id="password" type="password" data-parsley-minlength="6" class="form-control eq-ui-input invalid" required="" data-parsley-id="10">
                    <label for="password" data-error="Min length 6" class="active">Password</label>
                </div>
                <div class="eq-ui-form-group eq-ui-input-field">
                    <input id="password-confirm" type="password" data-parsley-minlength="6" data-parsley-equalto="#password" class="form-control eq-ui-input invalid" required="" data-parsley-id="12">
                    <label for="password-confirm" data-error="Min length 6 or Password not equal" class="">Confirm Password</label>
                </div>
{{--

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                               autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>
                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               required>

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

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required>
                    </div>
                </div>
--}}


                <div class="eq-ui-form-group eq-ui-input-field">
                    <button type="submit" class="btn btn-block btn-primary eq-ui-waves-light">
                        Register
                    </button>
                </div>

            </form>
        </div>
    </div>
{{--
    <div class="center-xs text-sm">Do not have an account?
        <a href="{{ route('register') }}" class="p-l-sm text-primary _600">Sign up</a>
    </div>--}}
@endsection
@section('scripts')
    <script type="text/javascript" src="js/exentriq-bootstrap-material-ui.min.js"></script>
@endsection
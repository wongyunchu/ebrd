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
<div class="container">
    <div class="row">



        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body" >
                    @include('partials._messages')

                    <form class="form-horizontal" data-parsley-validate="" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="eq-ui-form-group eq-ui-input-field" >
                            <input id="email" type="email" name="email" class="form-control eq-ui-input" required="" >
                            <label for="email" data-error="Email not valid">E-mail</label>
                        </div>

                        <div class="eq-ui-form-group eq-ui-input-field">
                            <input id="password" type="password" name="password"  data-parsley-minlength="6" class="form-control eq-ui-input" required=""  >
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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

        {{--<script type="text/javascript" src="js/"></script>--}}
    <script type="text/javascript" src="js/exentriq-bootstrap-material-ui.min.js"></script>
@endsection

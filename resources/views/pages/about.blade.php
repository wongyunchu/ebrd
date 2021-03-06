@extends('main')
@section('title', '| About')

@section('content')
{{phpinfo()}}
    <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>


    <a class="btn btn-primary eq-ui-waves-light">Button</a>
    <a class="btn btn-success eq-ui-waves-light">Success</a>
    <a class="btn btn-info eq-ui-waves-light">Info</a>
    <a class="btn btn-warning eq-ui-waves-light">Warning</a>
    <a class="btn btn-danger eq-ui-waves-light">Danger</a>
    <a class="btn btn-primary eq-ui-waves-light eq-desert-orange-500">Custom</a>


    <div class="row">
        <div class="col-md-12 m-b-3 ">
            <!-- BEGIN Portlet PORTLET-->
            <button type="submit" class="btn btn-primary eq-ui-waves-light">
                Login2
            </button>
            <!-- END Portlet PORTLET-->
        </div>


    </div>





@endsection
@section('scripts')

    {{--<script type="text/javascript" src="js/"></script>--}}
    {{--<script type="text/javascript" src="js/exentriq-bootstrap-material-ui.min.js"></script>--}}
@endsection
@if(Session::has('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <strong>Success:</strong>{{Session::get('success')}}
            </div>
        </div>
    </div>
@endif

@if($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert" style="margin-top: 20px">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <strong>Error:</strong>
                <ul>
                    @foreach($errors->all() as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

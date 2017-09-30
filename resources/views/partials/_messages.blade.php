@if(Session::has('success'))
    <div class="row">
        <div class="col-md-12">
            <div  id="success-alert" class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success:</strong>{{Session::get('success')}}
            </div>
        </div>
    </div>


@endif

@if($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert" style="margin-top: 20px">
                <span class="fa fa-sign" aria-hidden="true"></span>
                <span class='fa-2x fa fa-trash text-danger' style='cursor:pointer; padding:6px'></span>
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

@extends('main')
@section('title', '| Contact')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Me</h1>
                <hr>
                <form action="{{url('contact')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Subject:</label>
                        <input type="text" id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Message:</label>
                        <textarea type="text" id="message" name="message" class="form-control">Type message here..</textarea>
                    </div>

                    <input type="submit" value="SEnd Message" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('main')
@section('title',  "| All Categories")

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        {{--end of md8?--}}

        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                <h2>New Category</h2>
                <div class="form_group">
                    {{Form::label('name', 'Name:')}}
                    {{Form::text('name', null, ['class'=>'form-control'])}}
                </div>
                {{Form::submit('Create New Category', ['class'=>'btn btn-primary btn-block', 'style'=> 'margin-top:20px'])}}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection


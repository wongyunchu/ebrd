@extends('main')
@section('title',  "| All Tags")

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                <tr>
                    <th>{{$tag->id}}</th>
                    <td><a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a></td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        {{--end of md8?--}}

        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                <h2>New Tags</h2>
                <div class="form_group">
                    {{Form::label('name', 'Name:')}}
                    {{Form::text('name', null, ['class'=>'form-control'])}}
                </div>
                {{Form::submit('Create New tags', ['class'=>'btn btn-primary btn-block', 'style'=> 'margin-top:20px'])}}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection


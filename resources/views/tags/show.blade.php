@extends('main')
@section('title',  "| $tag->name Tag")

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{$tag->name}} Tag
                <small>{{$tag->posts()->count() }}Posts</small>
            </h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-lg btn-primary pull-right btn-block" style="margin-top: 20px"> Edit</a>
        </div>
        <div class="col-md-2">
            {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
            {{Form::submit('Delete', ['class'=>'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px'])}}
            {!! Form::close() !!}
        </div>        
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tag->posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>
                                @foreach($post->tags as $tag)
                                    <span class="label label-default">{{$tag->name}}</span>
                                @endforeach
                            </td>
                            <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-default btn-xs">View</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{--<div class="row">--}}
    {{--<div class="col-md-8">--}}
    {{--<h1>Tags</h1>--}}
    {{--<table class="table">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th>#</th>--}}
    {{--<th>Name</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@foreach($tags as $tag)--}}
    {{--<tr>--}}
    {{--<th>{{$tag->id}}</th>--}}
    {{--<td>{{$tag->name}}</td>--}}
    {{--</tr>--}}
    {{--</tbody>--}}
    {{--@endforeach--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--end of md8?--}}

    {{--<div class="col-md-4">--}}
    {{--<div class="well">--}}
    {{--{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}--}}
    {{--<h2>New Tags</h2>--}}
    {{--<div class="form_group">--}}
    {{--{{Form::label('name', 'Name:')}}--}}
    {{--{{Form::text('name', null, ['class'=>'form-control'])}}--}}
    {{--</div>--}}
    {{--{{Form::submit('Create New tags', ['class'=>'btn btn-primary btn-block', 'style'=> 'margin-top:20px'])}}--}}

    {{--{!! Form::close() !!}--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection


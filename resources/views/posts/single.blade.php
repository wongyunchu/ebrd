@extends('main')
<?php $titleTAg = htmlspecialchars($post->title); ?>
@section('title',  "| $titleTAg")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{asset('images/'.$post->image)}}" alt="" >
            <h1>{{$post->title}}</h1>
            <p class="lead"> {!! $post->body !!} </p>
            <hr>
            <p>Posted In: {{$post->category->name}}</p>
            <p>Created Date: {{$post->category->created_at}}</p>
        </div>

    </div>

    <div class="col-md-8 col-md-offset-2">
        <hr>
        <h3 class="comments-title">
            <span class="glyphicon glyphicon-comment"></span>
            {{$post->comments()->count()}} Comments</h3>
        @foreach($post->comments as $comment)
            <div class="comment">
                <div class="author-info">
                    <img src="{{"https://www.gravatar.com/avatar/".md5( strtolower(trim($comment->email)))."?s=50&d=wavatar"}}" alt="" class="author-image" style="background-color: #2ab27b">
                    <div class="author-name">
                        <h4>{{$comment->name}}</h4>
                        <div class="author-time">
                            {{date('M j, Y - g:iA', strtotime($comment->created_at) ) }}
                        </div>
                    </div>
                </div>
                <div class="comment-content">
                    {{$comment->comment}}
                </div>


            </div>

        @endforeach
    </div>

    <div class="row">
        <div class="comment-form col-md-8 col-md-offset-2">
            {!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}
            <div class="form_group">
                {{Form::label('name', 'Name:')}}
                {{Form::text('name', null, ['class'=>'form-control'])}}
            </div>
            <div class="col-md-6">
            </div>

            <div class="col-md-6">
                <div class="form_group">
                    <div class="form_group">
                        {{Form::label('email', 'Email:')}}
                        {{Form::text('email', null, ['class'=>'form-control'])}}
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form_group">
                    {{Form::label('comment', 'Comment:')}}
                    {{Form::textarea('comment', null, ['class'=>'form-control'])}}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form_group">
                    {{Form::submit('Add Comments', ['class'=>'btn btn-success btn-lg btn-block', ])}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop


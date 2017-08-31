@extends('main')
@section('title', '공지사항')
@section('title_sub', 'write form...')
@section('stylesheets')
    {!! (Html::style('css/parsley.css')) !!}
    {!! Html::style('css/select2.min.css') !!}
    {{--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">--}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=sryyzpozg7u0t3ffpr85qz3eq02lpqdf54kfbvs28rmfez4c"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10">

            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate'=>'', 'files' => true]) !!}

            {{--{{Form::label('title', 'Title:')}}--}}
            {{--{{Form::text('title', null, ['class'=>'form-control'])}}--}}

            {{--<div class="form_group">--}}
            {{--{{Form::label('slug', 'Slug:')}}--}}
            {{--{{Form::text('slug', null, ['class'=>'form-control', 'required', 'min-length'=>'5'])}}--}}
            {{--</div>--}}

            <div class="md-form-group float-label">
                {{Form::text('title', null, ['class'=>'md-input', 'required', 'min-length'=>'5'])}}
                <label>Title : </label>
            </div>

            <div class="md-form-group float-label">
                {{Form::text('slug', null, ['class'=>'md-input', 'required', 'min-length'=>'5'])}}
                <label>Slug : </label>
            </div>


            <div class="md-form-group">
                {{Form::label('category_id', 'Category:',['class'=>'md-input'])}}
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
{{--

            <div class="form_group">
                {{Form::label('tags', 'Tags:')}}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
--}}

            <div class="md-form-group">
                {{Form::label('featured_img', 'featured Image :')}}
                {{Form::file('featured_img', null, ['class'=>'form-control'])}}
            </div>

            <div class="form_group">
                {{Form::label('body', 'Post Body:')}}
                {{Form::textarea('body', null, ['class'=>'form-control'])}}
            </div>

            {{Form::submit('Create Post', ['class'=>'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px'])}}
            {!! Form::close() !!}


        </div>
        @stop
        @section('scripts')
            {!! (Html::script('js/select2.min.js')) !!}
            <script type="text/javascript">
                $(".select2-multi").select2();

                $(document).ready(function () {
                    $('#summernote').summernote(
                        {
                            height: 300,
                            placeholder: 'write here...'
                        }
                    );
//            $('#summernote').summernote('editor.insertText', 'hello world');
                });

            </script>

            <script src="{{ asset('js/summernote.min.js')}}"></script>
@endsection



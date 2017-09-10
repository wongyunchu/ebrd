@extends('main')
@section('title', '| Edit Blog Post')
@section('stylesheets')
    {!! (Html::style('css/parsly.css')) !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=sryyzpozg7u0t3ffpr85qz3eq02lpqdf54kfbvs28rmfez4c"></script>
    <script>tinymce.init({
            selector:'textarea',
            branding: false
    });</script>
@endsection
@section('content')
    <div class="row">
        {!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT']) !!}
        <div class="col-md-8" >
            {{Form::Label('title', 'Title:')}}
            {{Form::text('title', null, ['class'=>'form-control input-lg'])}}

            <div class="form_group">
            {{--{{Form::Label('slug', 'Slug:')}}--}}
            {{--{{Form::text('slug', null, ['class'=>'form-control input-lg'])}}--}}
                <div class="md-form-group float-label">
                    {{Form::text('slug', null, ['class'=>'md-input', 'required', 'readonly',  'min-length'=>'5'])}}
                    <label>slug</label>
                </div>
            </div>

            <div class="form_group">
                {{Form::label('category_id', 'Category:')}}
                {{Form::select('category_id', $categories, null , ['class'=>'form-control input-lg'])}}
                {{--$post->category_id--}}
            </div>

            <div class="form_group">
                {{Form::label('tags', 'Tags:')}}
                {{Form::select('tags[]', $tags, null , ['class'=>'form-control input-lg select2-multi', 'multiple'=>'multiple'])}}
            </div>

            
            <div class="form_group">
            {{Form::Label('body',  'Body:', ['class'=>'form-spacing-top1'] )}}
            {{Form::textarea('body', null, ['class'=>'form-control'])}}
            </div>
        </div>
        
        {{--right area--}}
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show','Cancel', array($post->id), ['class'=>'btn btn-danger btn-block'] ) !!}
                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Save Changes', ['class'=>'btn btn-success btn-block'])}}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@stop

@section('scripts')
    {!! (Html::script('js/select2.min.js')) !!}
    <script type="text/javascript">
        $(".select2-multi").select2();
    </script>
@endsection
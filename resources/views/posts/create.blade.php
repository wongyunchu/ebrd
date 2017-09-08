@extends('main')
@section('title', '공지사항')
@section('title_sub', 'write form...')
@section('stylesheets')
    {!! (Html::style('css/parsley.css')) !!}
    {!! Html::style('css/select2.min.css') !!}

    {{--x-editor--}}
    {{--<script src="{{ asset('js/dropzone.js')}}"></script>--}}
    {{--{!! (Html::script('js/dropzone.js')) !!}--}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=sryyzpozg7u0t3ffpr85qz3eq02lpqdf54kfbvs28rmfez4c"></script>
    <script>tinymce.init({selector: 'textarea'});</script>

    {{--dropzone--}}

    {!! (Html::style('css/dropzone.css')) !!}

@endsection

@section('content')
    <div class="row">
        {{--{{phpinfo()}}--}}
        <div class="col-xs-offset-0 col-xs-12">

            {!! Form::open(['route' => ['posts.store'],  'files' => true, 'enctype' => 'multipart/form-data', 'data-parsley-validate'=>'', 'id' => 'postForm']) !!}

            {{--{{Form::label('title', 'Title:')}}--}}
            {{--{{Form::text('title', null, ['class'=>'form-control'])}}--}}

            {{--<div class="form_group">--}}
            {{--{{Form::label('slug', 'Slug:')}}--}}
            {{--{{Form::text('slug', null, ['class'=>'form-control', 'required', 'min-length'=>'5'])}}--}}
            {{--</div>--}}

            <div class="md-form-group float-label">
                {{Form::text('title', null, ['class'=>'md-input', 'required', 'min-length'=>'5'])}}
                <label>Title: </label>
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
            {{--'class' => 'dropzone', 'id' => 'image-upload'--}}
            {{--
                        <div class="md-form-group" >
                            {{Form::label('featured_img', 'featured Image :')}}
                            --}}
            {{--{{Form::file('featured_img', null, ['class'=>'form-control'])}}--}}{{--


                            --}}
            {{--{!! Form::open([ 'route' => [ 'dropzone.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}--}}{{--

                            <div class="dropzone-previews" id="dropzonePreview"></div>
                            <a id="btnFileAdd" class="btn btn-primary btn-xs">파일첨부</a>
                            --}}
            {{--{!! Form::close() !!}--}}{{--

                        </div>
            --}}

            <div class="form_group">
                {{Form::label('body', 'Post Body:')}}
                {{Form::textarea('body', null, ['class'=>'form-control'])}}
            </div>

            {{--{{Form::submit('Create Post', ['id'=>'submit-all','class'=>'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px'])}}--}}
            {!! Form::close() !!}

            {!! Form::open([ 'route' => [ 'dropzone.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
            <div class="dropzone-previews" id="dropzonePreview"></div>
            {!! Form::close() !!}

            <div class="form_group">
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.index','취소', array(), ['class'=>'btn btn-info btn-lg'] ) !!}
                    </div>
                    <div class="col-sm-6">
                        <div class="end-xs">
                            <button type="submit" id="submit-all" class="btn btn-primary btn-lg right">저장</button>
                        </div>
                    </div>
                    {{--<div class="col-md-8">col-md-8</div>--}}
                    {{--<div class="col-md-4 "></div>--}}
                </div>
            </div>
        </div>

    </div>
    {{--
            <div class="row">
                <div class="col-xs-12" style="background-color: red">
                    <div class="form_group row between-xs">
                        <div class="col-xs-2">
                            <button type="submit" id="submit-all" class="btn btn-primary btn-lg right">저장</button>
                        </div>
                        <div class="col-xs-2">
                            <button type="submit" id="submit-all1" class="btn btn-primary btn-lg right">저장</button>
                        </div>
                    </div>
                </div>
            </div>--}}
        @stop
        @section('scripts')
            {!! (Html::script('js/select2.min.js')) !!}
            {!! (Html::script('js/dropzone.js')) !!}

            <script type="text/javascript">
                $("#submit-all").click(function () {
                    $("#postForm").submit();
                });

                /*                $( "#postForm" ).submit(function( event ) {
                                    alert( "Handler for .submit() called." );
                                });*/


                Dropzone.options.imageUpload = {
                    //autoProcessQueue: false,
                    parallelUploads: 100,
//                    previewsContainer: '#dropzonePreview',
                    //previewTemplate: document.querySelector('#preview-template').innerHTML,
                    dictFileTooBig: 'Image is bigger than 8MB',
                    dictDefaultMessage: "Click 또는  File을 Drag&Drop 하실 수 있습니다 ",
                    addRemoveLinks: true,
                    dictRemoveFile: 'Remove',
                    maxFilesize: 500,
                    acceptedFiles: ".txt,.jpeg,.jpg,.png,.gif",
                    createImageThumbnails: "true",

                    init: function () {
                        var myDropzone = this;
                        /*$('#submitfiles').on("click", function (e) {

                            e.preventDefault();
                            e.stopPropagation();

                            if (myDropzone.getQueuedFiles().length > 0) {
                                myDropzone.processQueue();
                            } else {
                                alert('No Files to upload!');
                            }
                        });*/
                    },
                    success: function (file, response) {
                        var imgName = response.success;
                        file.previewElement.classList.add("dz-success");

                        var $hiddenInput = $('<input/>', {type: 'hidden', name: 'addfile[]', value: imgName});
                        $hiddenInput.appendTo('#postForm');
                        console.log("Successfully uploaded :" + imgName);
                    },
                    error: function (file, response) {
                        file.previewElement.classList.add("dz-error");
                    }
                };
            </script>


    {{--  <script type="text/javascript">

          $(document).ready(function() {
              Dropzone.autoDiscover = false;
              $("#dropzonePreview").dropzone({
                  //autoProcessQueue: false,
                  url: "/dropzone/store",
                  addRemoveLinks: true,
                  dictRemoveFile: 'Remove',
                  maxFilesize: 5,
                  dictFileTooBig: '10MB 보다 클수 없습니다.',
                  dictDefaultMessage: "Click or Drop files here to upload",
                  acceptedFiles: ".txt,.jpeg,.jpg,.png,.gif",
                  init: function () {

                      var myDropzone = this;

                      $('#submitfiles').on("click", function (e) {

                          e.preventDefault();
                          e.stopPropagation();

                          if (myDropzone.getQueuedFiles().length > 0) {
                              myDropzone.processQueue();
                          } else {
                              alert('No Files to upload!');
                          }
                      });
                  },
                  success: function (file, response) {
                      var imgName = response;
                      file.previewElement.classList.add("dz-success");
                      console.log("Successfully uploaded :" + imgName);
                  },
                  error: function (file, response) {
                      file.previewElement.classList.add("dz-error");
                  }
              });
          });


          $(".select2-multi").select2();

      </script>--}}
    {{--<script type="text/javascript">

        Dropzone.options.imageUpload = {
            autoProcessQueue: false,
            parallelUploads: 100,
            clickable: ["#btnFileAdd"],
            uploadMultiple: true,
            previewsContainer: '#dropzonePreview',
//                    previewTemplate: document.querySelector('#preview-template').innerHTML,
            dictFileTooBig: 'Image is bigger than 8MB',
            dictDefaultMessage: "Click 또는  File을 Drop 하실 수 있습니다!-나는 마스터 ",
            addRemoveLinks: true,
            dictRemoveFile: 'Remove',
            maxFilesize: 500,
//                    acceptedFiles: ".txt,.jpeg,.jpg,.png,.gif",

            createImageThumbnails: "true",
            // The setting up of the dropzone

            init: function () {
                var myDropzone = this;



                $('#submit-all').on("click", function (e) {
//                            if (myDropzone.getQueuedFiles().length > 0) {
                    if (myDropzone.files.length > 0) {

                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    }

                    /*if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    } else {
                        alert('No Files to upload!');
                    }*/
                });

//                        this.on("complete", function(file) {
//                            myDropzone.removeFile(file);
//                        });

                this.on("successmultiple", function(files, response) {
                    window.location.href="/posts";
                });
            },


            success: function (file, response) {
                var imgName = response;
                file.previewElement.classList.add("dz-success");
                console.log("Successfully uploaded :" + imgName);
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
                $(file.previewElement).find('.dz-error-message').text(response);
            }
        };
    </script>--}}
@endsection



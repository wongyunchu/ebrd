@extends('main')
@section('title', '공지사항')
@section('title_sub', 'write form...')
@section('stylesheets')
    {!! (Html::style('css/parsley.css')) !!}
    {!! Html::style('css/select2.min.css') !!}

    <?php
        if($isReadonly == 'readonly') {
            $editable = 'false';

        }
        else {
            $editable = 'true';
        }
    ?>
    @if ($isReadonly == 'readonly')
        <style>
            .mce-tinymce.mce-container.mce-panel {
                border: 0px dashed !important;
            }
        </style>
    @endif
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=sryyzpozg7u0t3ffpr85qz3eq02lpqdf54kfbvs28rmfez4c"></script>
    <script>tinymce.init({
            selector: 'textarea',
            branding: false,
            elementpath: false,
            readonly:   {{$editable=='false'?'true':'false'}},
            menubar:    {{$editable}},
            statusbar:  {{$editable}},
            @if ($isReadonly == 'readonly')
            toolbar:false
            @endif

        });</script>

    {{--dropzone--}}

    {!! (Html::style('css/dropzone.css')) !!}

@endsection

@section('content')
    <div class="row">
        {{--{{phpinfo()}}--}}
        <div class="col-xs-offset-0 col-xs-12">

            {!! Form::model($post, ['route' => ['posts.store'],  'files' => true, 'enctype' => 'multipart/form-data', 'data-parsley-validate'=>'', 'id' => 'postForm']) !!}

            <div class="md-form-group float-label">
                {{Form::text('title', null, ['class'=>'md-input', $isReadonly, 'required', 'min-length'=>'5'])}}
                <label>Title: </label>
            </div>

            <div class="md-form-group float-label">
                {{Form::text('slug', null, ['class'=>'md-input', $isReadonly,'required', 'min-length'=>'5'])}}
                <label>Slug : </label>
            </div>


            <div class="md-form-group">
                {{Form::label('category_id', 'Category:',['class'=>'md-input'])}}

                <select class="form-control" id="category_id"  name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if (old('category_id') == $category->id)  selected="selected" @endif
                                @if ($post != null && $post->category_id == $category->id)  selected="selected" @endif
                        >
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form_group">
                {{Form::label('body', 'Post Body:')}}
                {{Form::textarea('body', null,['class'=>'form-control', $isReadonly])}}
            </div>
            {!! Form::close() !!}

            {!! Form::open([ 'route' => [ 'dropzone.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
            <div class="dropzone-previews" $isReadonly, id="dropzonePreview"></div>
            {!! Form::close() !!}

            <div class="form_group">
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.index','Back', array(), ['class'=>'btn btn-info btn-lg'] ) !!}
                    </div>
                    @if ($isReadonly != 'readonly')
                    <div class="col-sm-6">
                        <div class="end-xs">
                            <button type="submit" id="submit-all" class="btn btn-primary btn-lg right">저장</button>
                        </div>
                    </div>
                    @endif
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
        @if ($isReadonly == 'readonly')
            $("#category_id option").not(":selected").remove();
        @endif

        $("#submit-all").click(function () {
            $("#postForm").submit();
        });

        Dropzone.options.imageUpload = {
            //autoProcessQueue: false,
            parallelUploads: 100,
            @if ($isReadonly == 'readonly')
                clickable: false,
                addRemoveLinks: false,
            @else
                addRemoveLinks: true,
            @endif
            dictFileTooBig: 'Image is bigger than 8MB',
            dictDefaultMessage: "Click 또는  File을 Drag&Drop 하실 수 있습니다 ",
            dictRemoveFile: 'Remove',
            maxFilesize: 500,
            acceptedFiles: ".txt,.jpeg,.jpg,.png,.gif",
            createImageThumbnails: "true",

            init: function () {
                var myDropzone = this;
                <?php
                    // 드롭존 초기화시 파일 보여주는
                    // 1. 저장 후 실패하여 돌아왔을경우
                    // 2. just view
                    $file_names_view = null;
                    $file_names = [];
                    // 업로드 되었고 리스트업 된 상태 ( 그중에 인풋 오류로 되돌아온 상태 old에 값이 있는)
                    $file_names_error = old('file_name');

                    if($post){
                        $file_names_view = $post->atcfiles;
                    }

                    if($file_names_error != null) {
                        $file_names = $file_names_error;
                    }
                    else if($file_names_view != null) {
                        $file_names = $file_names_view;
                    }

                    if($file_names != null ) {
                        foreach($file_names as $file_name){
                            if($file_names_error != null) {
                                $ar = explode('|', $file_name);
                                $ar_file_org_name = $ar[0];
                                $ar_file_name = $ar[1];
                                $ar_file_id = $ar[2];
                            }
                            else if($file_names_view != null) {
                                $ar_file_org_name = $file_name->org_name;
                                $ar_file_name = $file_name->name;
                                $ar_file_id = $file_name->id;
                            }
                ?>
                            var mockFile = {name: '{{$ar_file_org_name}}', size: 100};
                            myDropzone.emit("addedfile", mockFile);
                            //myDropzone.emit("thumbnail", mockFile, "/image/url");
                            //myDropzone.options.addedfile.call(myDropzone, file);
                            myDropzone.createThumbnailFromUrl(mockFile, '/images/' + '{{$ar_file_name}}');
                            myDropzone.emit("complete", mockFile);

                            var $hiddenInput = $('<input/>', {
                                type: 'hidden',
                                name: 'file_name[]',
                                value: '{{$ar_file_org_name.'|'.$ar_file_name.'|'.$ar_file_id}}'
                            });
                            $hiddenInput.appendTo('#postForm');

                            {{--var $hiddenFileId = $('<input/>', {type: 'hidden', name: 'file_id[]', value:'{{$ar_file_id}}' });--}}
                            {{--$hiddenFileId.appendTo('#postForm');--}}
                <?php
                          }
                //  echo 'myDropzone.emit("complete", mockFile)';
                    }
                ?>

                this.on("removedfile", function(file) {

                $.ajax({
                    type: 'POST',
                    url: 'upload/delete',
                    data: {id: file.name, _token: $('#csrf-token').val()},
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        if(rep.code == 200)
                        {
                            alert('삭제 성공');
                        }
                    },
                    error:function(data) {
                        alert(data.statusText);

                    }

                });

            } );
            },
            success: function (file, response) {
                var file_name = response.success.file_name;
                file.previewElement.classList.add("dz-success");
                var $hiddenInputName = $('<input/>', {type: 'hidden', name: 'file_name[]', value: file_name});
                $hiddenInputName.appendTo('#postForm');
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
                $(file.previewElement).find('.dz-error-message').text(response.message);
            }
        };
    </script>

@endsection



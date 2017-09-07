

<html>
<head>
    <title>Upload Multiple Images using dropzone.js and Laravel</title>

    {{--<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>--}}
    {{--<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>--}}
    {{--{!! (Html::style('css/basic.css')) !!}--}}
    <script src="{{ asset('js/dropzone.js')}}"></script>
    {!! (Html::style('css/dropzone.css')) !!}


</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            {!! Form::open([ 'route' => [ 'dropzone.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
            <div class="dropzone-previews" id="dropzonePreview"></div>

            {!! Form::close() !!}
            <button id='submitfiles' class='btn btn-primary'>Submit Files</button>
        </div>
    </div>
</div>



<!-- Dropzone Preview Template -->
{{--<div id="preview-template">

    <div class="dz-preview dz-file-preview" >
        <div class="dz-image"><img data-dz-thumbnail=""></div>

        <div class="dz-details">
            <div class="dz-size"><span data-dz-size=""></span></div>
            <div class="dz-filename"><span data-dz-name=""></span></div>
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
        <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

        <div class="dz-success-mark">
            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                <title>Check</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <path d="M23.5,k31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                          id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475"
                          fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                </g>
            </svg>
        </div>

        <div class="dz-error-mark">
            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                <title>error</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158"
                       fill="#FFFFFF" fill-opacity="0.816519475">
                        <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                              id="Oval-2" sketch:type="MSShapeGroup"></path>
                    </g>
                </g>
            </svg>
        </div>

    </div>
</div>--}}

<script type="text/javascript">

    Dropzone.options.imageUpload = {
        //autoProcessQueue: false,
        parallelUploads: 100,
        previewsContainer: '#dropzonePreview',
        //previewTemplate: document.querySelector('#preview-template').innerHTML,
        dictFileTooBig: 'Image is bigger than 8MB',
        dictDefaultMessage: "Click 또는  File을 Drop 하실 수 있습니다!-나는 마스터 ",
        addRemoveLinks: true,
        dictRemoveFile: 'Remove',
        maxFilesize: 5,
        acceptedFiles: ".txt,.jpeg,.jpg,.png,.gif",
        createImageThumbnails: "true",
        // The setting up of the dropzone
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

        }

    };


</script>
{{--<script src="{{ asset('js/dropzone.js')}}"></script>--}}

</body>
</html>
@extends('main')
@section('title', '공지사항1')
@section('title_sub', 'All Posts...')
@section('stylesheets')
    <script src="{{ asset('js/datatables.min.js')}}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-offset-0 col-xs-12">
            <table id="example" width="100%" cellspacing="0" class="table blueTable2 text-center table-striped table-bordered table-hover row-border p-b-md " >
                <thead>
                <th style="width:70px">#</th>
                <th style="width:320px">Title</th>
                <th style="">Body</th>
                <th style="width:110px">Create</th>
                <th style="width:130px; min-width: 130px;">처리</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{strip_tags($post->title)}}</td>
                        <td>{{substr(strip_tags($post->body), 0, 50)}} {{strlen($post->body) > 50 ? "...":""}}</td>
                        <td>{{date('M j, Y', strtotime($post->updated_at) )}}</td>
                        <td>
                            <a href="{{route('posts.show', $post->id)}}" data-pjax
                               class="btn btn-outline b-info text-info btn-sm">View</a>
                            <a href="{{route('posts.edit', $post->id)}}"
                               class="btn btn-outline b-warning text-warning btn-sm">Edit</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>


            </table>
            {{--  페이징
            <div class="center-xs">
                {!! $posts->links(); !!}
            </div>
            --}}
            <div class="form_group">
                <hr>
                <div class="row p-r end-xs">
                    {{--<button id="addRow">Add new row</button>--}}
                    <a href="{{route('posts.create')}}" class="md-btn md-raised m-b-sm btn-lg w-sm indigo " >작성</a>
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            //alert("공지사항ready22");
            var table = $('#example').DataTable(
                {

                    "responsive": true,
                    select: false,
                    "paging": true,
                    "info": true,
                    "ordering": true,
                    "order": [[0, "desc"]],
                    "deferRender": false,
                    stateSave: true, // 페이징 번호, 정렬등 상태저장 가능
                    "pagingType": "full_numbers", //first_last_number
                    dom: 'Bfrtip',
                    buttons: [
                        { extend: 'copyHtml5', footer: true },
                        { extend: 'excelHtml5', footer: true },
                        { extend: 'csvHtml5', footer: true },
                        { extend: 'pdfHtml5', footer: true }
                        , 'print'
                    ]
                }
            );
            // 테이블 셋팅완료
            /*var counter = 1;
            $('#addRow').on( 'click', function () {
                table.row.add( [
                    '.1',
                    '.2',
                    '.3'

                ] ).draw( false );

                counter++;
            } );
            $('#addRow').click();*/


            // 이벤트
            $('#example tbody').on( 'click', 'tr', function () {
                // $(this).toggleClass('selected');
            } );

            /*            $('#example tbody').on('click', 'tr', function () {
                            var data = table.row( this ).data();
                            alert( 'You clicked on '+data[0]+'\'s row' );
                        } );*/
        });
    </script>
@endsection
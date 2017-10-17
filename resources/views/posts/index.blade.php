@extends('main')
@section('title', '공지사항')
@section('title_sub', 'All Posts...')
@section('content')
    <div class="row">
        <div class="col-xs-offset-0 col-xs-12">
            <table id="example" width="100%" cellspacing="0" class="table table-striped table-bordered table-hover row-border p-b-md">

                <thead>
                <th></th>
                <th style="width:100px">#</th>
                <th>slug</th>
                <th>Title</th>
                <th>Body</th>
                <th style="width:140px">Create At</th>
                <th style="width:140px"></th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td></td>
                        <td>{{$post->id}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{strip_tags($post->title)}}</td>
                        <td>{{substr(strip_tags($post->body), 0, 50)}} {{strlen($post->body) > 50 ? "...":""}}</td>
                        <td>{{date('M j, Y', strtotime($post->updated_at) )}}</td>
                        <td>
                            <a href="{{route('posts.show', $post->id)}}"
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
                <div class="end-xs">
                    {{--<button id="addRow">Add new row</button>--}}
                    <a href="{{route('posts.create')}}" class="md-btn md-raised m-b-sm btn-lg w-sm indigo">작성</a>
                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script type="text/javascript">


        $(document).ready(function () {

            var table = $('#example').DataTable(
                {
                    select: false,
                    "paging": true,
                    "info": true,
                    "ordering": true,
                    "order": [[0, "desc"]],
                    "deferRender": true,
                    stateSave: true, // 페이징 번호, 정렬등 상태저장 가능
                    "pagingType": "full_numbers", //first_last_number
                    // obj 순서대로 칼럼 정의 할수 있음
                    "columnDefs": [{
                            orderable: false,
                            className: 'select-checkbox',
                            targets: 0
                        }],
                    select: {
                            style:    'os',
                            selector: 'td:first-child'
                    },
                    "createdRow": function ( row, data, index ) {
                        if ( data[0].replace(/[\$,]/g, '') * 1 > 55 ) {
                            $('td', row).eq(1).addClass('text-primary'); //
                        }
                    }
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
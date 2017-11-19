@extends('main')
@section('title', '의료비')
@section('title_sub', 'All Posts...')
@section('content')

@section('stylesheets')
    <style type="text/css">
        tbody>tr>th {
            font-weight: normal;
        }
    </style>
@endsection
    <div class="row">
        <div class="col-xs-offset-0 col-xs-12">
            <table id="example" cellspacing="0" width="100%" class="table table-striped table-bordered table-hover row-border p-b-md">

                <thead>
                    <th style="min-width:60px">대상년월</th>
                    <th style="min-width:50px">신청일</th>
                    <th style="min-width:60px">진료과목</th>
                    <th style="min-width:50px">사용일</th>
                    <th style="min-width:60px"> 지원건수</th>
                    <th style="min-width:60px">지원금액</th>
                    <th style="min-width:60px">품의상태</th>
                    <th style="min-width:60px">전표상태</th>
                    <th style="min-width:60px">변경/삭제</th>
                </thead>
                <tbody>
                @foreach($list as $item)

                    <tr >
                        <th>{{\Illuminate\Support\Carbon::parse($item->tagetdate)->format('Y-m-d')}}</th>
                        <th>{{\Illuminate\Support\Carbon::parse($item->created_at)->format('Y-m-d')}}</th>
                        <th>{{$item->categorySubject}}</th>
                        <th >-</th>
                        <th >-</th>
                        <th></th>
                        <th>접수</th>
                        <th>-</th>
                        <th>
                            <form action="{{route('medicalDetailsView')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="item" value="{{json_encode($item)}}">
                                <button type="submit" class="btn btn-outline b-info text-info btn-sm" >View</button>
                            </form>
{{--                            <a href=""
                               class="btn btn-outline b-warning text-warning btn-sm">Edit</a>--}}
                        </th>
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
                <div class="row end-xs p-r">
                    {{--<button id="addRow">Add new row</button>--}}
                    <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm btn-lg w-sm indigo">작성</a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            //alert("의료비");
            var table = $('#example').DataTable(
                {
                    "responsive": true,
                    select: false,
                    "paging": true,
                    "info": true,
                    "ordering": false,
                    "order": [[0, "desc"]],
                    "deferRender": true,
                    stateSave: true, // 페이징 번호, 정렬등 상태저장 가능
                    "pagingType": "full_numbers", //first_last_number
                    // obj 순서대로 칼럼 정의 할수 있음
                    "columnDefs": [
                        { responsivePriority: 1, targets: 8},
                        {
                          /*  "render": function ( data, type, row ) {
                                return data +' ('+ row[1]+')';
                            },
                            "targets": 0*/
                        },
                        {
/*                            "targets": [1],
                            "visible": false,
                            "searchable": false*/
                        }
                    ],
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


/*            // 이벤트
            $('#example tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');
            } );*/

/*            $('#example tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();
                alert( 'You clicked on '+data[0]+'\'s row' );
            } );*/
        });
    </script>
@endsection
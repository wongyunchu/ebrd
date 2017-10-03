
    <div class="row">
        <div class="col-xs-offset-0 col-xs-12">
            <table id="example" cellspacing="0" class="table table-striped table-bordered table-hover row-border p-b-md">

                <thead>
                <th style="width:100px">#</th>
                <th>slug</th>
                <th>Title</th>
                <th>Body</th>
                <th style="width:140px">Create At</th>
                <th style="width:140px"></th>
                </thead>
                <tbody>
                
                </tbody>


            </table>
            {{--  페이징
            <div class="center-xs">
                {!! $posts->links(); !!}
            </div>
            --}}
            <div class="form_group">
                <hr>
                <div class="row col-sm-12 end-xs">
                    {{--<button id="addRow">Add new row</button>--}}
                    <a href="{{route('posts.create')}}" class="md-btn md-raised m-b-sm btn-lg w-sm indigo">작성</a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('libs/jquery/jquery/dist/jquery.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            alert('ready');
            var table = $('#example').DataTable(
                {
                    "paging": true,
                    "info": true,
                    "ordering": true,
                    "order": [[0, "desc"]],
                    "deferRender": true,
                    stateSave: true, // 페이징 번호, 정렬등 상태저장 가능
                    "pagingType": "full_numbers", //first_last_number
                    // obj 순서대로 칼럼 정의 할수 있음
                    "columnDefs": [
                        {
                          /*  "render": function ( data, type, row ) {
                                return data +' ('+ row[1]+')';
                            },
                            "targets": 0*/
                        },
                        {
                            "targets": [1],
                            "visible": false,
                            "searchable": false
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


            // 이벤트
            $('#example tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');
            } );

/*            $('#example tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();
                alert( 'You clicked on '+data[0]+'\'s row' );
            } );*/
        });
    </script>

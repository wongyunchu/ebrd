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
            <div id="myModal" class="form_group">
                <hr>
                <div class="row end-xs p-r">
                    {{--<button id="addRow">Add new row</button>--}}
                    <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm btn-lg w-sm indigo">작성</a>
                   {{--<button @click="get2"> get List crossDomain</button>--}}
                    {{-- <button @click="save2"> test 저장</button>--}}
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

            ///vue 코드 없어져야함
            vue = new Vue({
                el: '#myModal',
                data: {
                    sltdData: null
                },
                methods: {
                    get2:function() {
                        var formDatas = {};
                        formDatas.SERVER = 'STC';
                        formDatas.FID = 'Z_HR_0131';//'Z_HR_TB01';
                        formDatas.import = '{"I_ENDDA":"20161231","I_PERNR":"2950001","I_BEGDA":"aaaaaaaaaaaaa%0d%0a%ea0%a8%ec%a0%81%ec%9c%bc%eb%a1%9c+%eb%86%92%ec%95%84%ec%a7%88+%ea%b2%83%22%ec%9d%b4%eb%9d%bc%ea%b3%a0+%ec%a0%84%eb%a7%9d%ed%96%88%eb%8b%a4.+%0d%0abbbbbbbbbbbbb"}';

                        $.ajax({
                            type: 'POST',
                            url: 'http://localhost:8080/common_infra_01/JsonServlet',
                            data: jQuery.param(formDatas)
                        })
                            .done(function(data){
                                alert( "Posting failed." +data);
                                // show the response
                            })
                            .fail(function() {

                                // just in case posting your form failed
                                alert( "Posting failed." );

                            });

                        //JSON.stringify({"I_PERNR":"2950001"});//'%7B%22I%5FENDDA%22%3A%2220161231%22%2C%22I%5FPERNR%22%3A%222950001%22%2C%22I%5FBEGDA%22%3A%2220160101%22%7D';//

                        //axios.post('http://localhost:8080/common_infra_01/JsonServlet', formDatas)
                        //axios.post('http://10.40.17.43:9088/erpsac/JsonServlet', formDatas)
                        //http://localhost:8080/common_infra_01/JsonServlet?SERVER=STC&FID=Z_HR_0131&import=%7B%22I_EN DDA%22%3A%2220161231%22%2C%22I_PERNR%22%3A%222950001%22%2C%22I_BEGDA%22%3A%2220160101%22%7D
                        /*
                        var param = jQuery.param(formDatas);
                         axios.post('http://localhost:8080/common_infra_01/JsonServlet?'+param
                        )
                             .then(function (response) {
                                 console.log(response);
                                 //var a = response.data.T_MEDI[0].TEXT;
                                 bootbox.alert({
                                     title:'Success',
                                     message:a,
                                     callback: function (result) {
                                         //window.location.href ='/medicals';
                                     }
                                 });
                             })
                             .catch(function (error) {
                                 msg = error.message;
                                 exeption = error.stack;
                                 bootbox.alert({
                                     title: exeption,
                                     message: msg
                                 })
                             });
                       */





                        /*
                        axios.post('http://localhost:8080/common_infra_01/JsonServlet',{
                                                                                            SERVER: 'STC',
                                                                                            FID: 'Z_HR_0131',//'Z_HR_0131',
                                                                                            import:'%7B%22I%5FPERNR%22%3A%222950001%22%7D'
                                                                                        }
/!*                            ,{
                                headers: {
                                    crossDomain: true,
                                    withCredentials: true

                                }
                            }*!/
                        )*/
                        //
/*
*
*
*                           {
                                headers: {
                                    crossDomain: true,
                                    withCredentials: true

                                }
                            }
* */
                        //axios.get('http://10.40.17.43:9088/erpsac/JsonServlet?SERVER=STC&FID=Z_HR_0131&import=%7B%22I%5FENDDA%22%3A%2220161231%22%2C%22I%5FPERNR%22%3A%222950001%22%2C%22I%5FBEGDA%22%3A%2220160101%22%7D')
                        //axios.get('http://localhost:8080/common_infra_01/JsonServlet?SERVER=STC&FID=Z_HR_0131&import=%7B%22I_ENDDA%22%3A%2220161231%22%2C%22I_PERNR%22%3A%222950001%22%2C%22I_BEGDA%22%3A%2220160101%22%7D')



                    },
                    save2:function() {
                        //alert(11);
                        //var formDatas = $('#formMedicalMain').serialize();
/*

                        SERVER: STC
                        FID: Z_HR_TB03
                        import: {"I_GWAREKEY":""}
                        tables: {"ITAB":[{"PERNR":"2950001","BREAS":"12345","BETRG":" 30000.00","BUSE":"01"}]}
*/

                        var formDatas = {};
                        formDatas.SERVER = 'STC';
                        formDatas.FID = 'Z_HR_TB03';
                        formDatas.import = {"I_GWAREKEY":""};
                        formDatas.tables = {"ITAB":[{"PERNR":"2950001","BREAS":"12345","BETRG":" 30000.00","BUSE":"01"}]};

                        axios.post('http://10.40.17.43:9088/erpsac/JsonServlet',formDatas)
                        /*
                        axios.post('/medicals', {
                                                firstName: 'Fred',
                                                lastName: 'Flintstone'
                         })
                        */
                            .then(function (response) {
                                console.log(response);
                                bootbox.alert({
                                    title:'Success',
                                    message:'저장되었습니다.',
                                    callback: function (result) {
                                        window.location.href ='/medicals';
                                    }
                                });
                            })
                            .catch(function (error) {
                                msg = JSON.parse(error.request.responseText).message;
                                exeption = JSON.parse(error.request.responseText).exception;
                                bootbox.alert({
                                    title: exeption,
                                    message: msg
                                })
                            });
                    }
                },
                mounted: function() {

//                    axios.post('/medicals',formDatas)
                    /*axios.get('http://10.40.17.43:9088/erpsac/JsonServlet?SERVER=STC&FID=Z_HR_0131&import=%7B%22I%5FENDDA%22%3A%2220161231%22%2C%22I%5FPERNR%22%3A%222950001%22%2C%22I%5FBEGDA%22%3A%2220160101%22%7D')
                        .then(function (response) {
                            console.log(response);
                            var a = response.data.T_MEDI[0].TEXT;
                            bootbox.alert({
                                title:'Success',
                                message:a,
                                callback: function (result) {
                                    //window.location.href ='/medicals';
                                }
                            });
                        })
                        .catch(function (error) {
                            msg = JSON.parse(error.request.responseText).message;
                            exeption = JSON.parse(error.request.responseText).exception;
                            bootbox.alert({
                                title: exeption,
                                message: msg
                            })
                        });*/
                        /*
                    axios.get("/api/stories")
                        .then(function (response) {
                            Vue.set(vm, "stories", response.data) // vm.stories = response.data
                        })*/
                }
            });


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
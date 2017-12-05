@extends('main')
@section('title', '| Top Bank')
@section('stylesheets')

@endsection
@section('content')
    <div id="vuejs" class="container_del">
        <div class="row">
            <div class="col-md-12">
                <div class="row end-xs" style="margin-right: -24px">
                    <table id="" cellspacing="0" style="max-width:400px;"  class="table blueTable2 table-striped table-bordered table-hover row-border p-b-md m-r-md">
                        <thead>
                            <th style="min-width:60px">상환기간</th>
                            <th style="min-width:50px">대출금액</th>
                            <th style="min-width:60px">상환금액</th>
                            <th style="min-width:50px">잔여금액</th>
                        </thead>
                        <tbody>
                        <tr style="height: 35px">
                            <td v-text="output.E_DTEXT"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <table id="tbList" cellspacing="0" width="100%" class="table text-center blueTable2 table-striped table-bordered table-hover row-border p-b-md " style="cursor: pointer;border-collapse:collapse!important;">
                    {{--<colgroup>
                        <col span="3" width="110px" style=" max-width: 110px;background-color: red;"/>
                        <col />
                        <col width="110px"/>
                        <col />
                        <col span="2" width="100px" style="background-color: blue" />
                    </colgroup>--}}

                    <thead>
                    <th>신청상태</th>
                    <th>신청일</th>
                    <th>대출용도</th>
                    <th>대출사유</th>
                    <th>대출금액</th>
                    <th>보증보험상태</th>
                    <th>지급일</th>
                    <th>변경/상태</th>
                    </thead>
                    <tbody>
                        <tr v-for="row in output.otab" @click="goView(row)">
                            <td width="80px" style="max-width:80px;" v-text="row.WSTATX" ></td>
                            <td width="80px" style="max-width:80px;" v-text="moment(row.SDATE).format('YYYY-MM-DD')"></td>
                            <td width="80px" v-text="row.BUSET"></td>
                            <td v-text="row.BREAS"></td>
                            <td width="110px" style="max-width:110px;" v-text="accounting.formatMoney(row.BETRG)"></td>
                            <td width="90px" style="max-width:90px;" v-text="row.RSTATX"></td>
                            <td width="80px" style="max-width:80px;" v-text="row.PAYDT"></td>
                            <td width="110px" style="max-width:110px;min-width: 110px;" >
                                {{--@{{row.WSTATUS}}--}}
                                <button @click.stop="goEdit(row)" class="btn btn-outline b-info text-info btn-sm">변경</button>
                                <button @click.stop="goDelete(row)" class="btn btn-outline b-danger text-danger btn-sm">삭제</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 p-t-md">
                <div class="row">
                    <div class="col-xs-2">
                        <button @click="goCreate" class="md-btn md-raised m-b-sm w-sm primary">신청</button>
                    </div>
                    <div class="col-xs-10">
                        <div class="row end-xs p-r-sm">
                        <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w-sm blue m-r-sm">동의서</a>
                        <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w-md blue">Top Bank 매뉴얼</a>
                        </div>
                    </div>

                    {{--help--}}
                    <div class="col-xs-12 well well-sm m-b-0">
                        <div class="text-info">
                            <i class="fa fa-comments-o"></i> Help :
                        </div>
                        <ul class="p-l-md m-b-0">
                            <li type="*">신청기간 : 수시</li>
                            <li>부서장의 결재를 득한 경우에만 지급됩니다.</li>
                            <li>신청 시 대출사유별 제출서류 확인 후 동의서 및 증빙서류 Scan File을 첨부하셔야 (1개의 File로 첨부) 지급이 가능합니다.</li>
                            <li class="text-danger">단, 파일은 반드시 보안해제 후 첨부하셔야 합니다.</li>
                            <li>보증보험 가입 대상자는 증빙서류 제출 후 1차 지급 확정시 일주일 이내 보증보험 가입을 완료해야 합니다.</li>
                            <li class="text-danger">운영금액 한도 소진 시 Top Bank 신청이 일시 중단 될 수 있습니다.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <form id="formToCreate" action="{{route('topbank.create')}}" method="POST" style="display: none;">
        {{ csrf_field() }}
        <input id="inputData" name="inputData" type="hidden" >
        {{--<input id="inputData" name="inputData" type="hidden" >--}}
    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        Vue.config.devtools = true;
        $(document).ready(function() {
            /*$('#tbList tbody').on( 'click', 'tr', function () {
                var data = table.row( this ).data();
                alert( 'You clicked on '+data+'\'s row' );
            } );*/
        } );


        var table = $('#tbList').DataTable(
            {
                /*"responsive": true,*/
                select: false,
                "paging": true,
                "info": true,
                "ordering": false,
                /*"order": [[0, "desc"]],*/
                "deferRender": true,
                stateSave: true, // 페이징 번호, 정렬등 상태저장 가능
                "pagingType": "full_numbers" //first_last_number
                // obj 순서대로 칼럼 정의 할수 있음
            }
        );

        vv = new Vue({
            el:'#vuejs',
            data : {
                input:{
                    SERVER :'STC',
                    FID :'Z_HR_TB01',
                    import:'{"I_PERNR":"2950001"}'
                },
                output:{
                    /*나중에 하나만 써야함 에지간하면 data로 통일시키는게 편할듯 */
                    data:{},
                    E_DTEXT:'',
                    otab:[],
                    T_BCODE:[],
                    T_UCODE:[]
                }
            },
            methods: {
                goView:function (row, _action='V') {
                    val = $.extend({action:_action},{sltdRow:row}, {output:vv.output.data});
                    p = JSON.stringify(val);
                    $('#inputData').val(p);
                    $('#formToCreate').submit();
                },
                goEdit:function (row) {
                    this.goView(row, 'E')
                },
                goCreate:function(){
                    //inputData  = JSON.stringify(vv.output.data);
                    //$('#inputData').val(inputData);
                    val = $.extend({action:'C'},{sltdRow:''}, {output:vv.output.data});
                    p = JSON.stringify(val);
                    $('#inputData').val(p);
                    $('#formToCreate').submit();
                },
                getList:function() {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: 'http://localhost:8080/common_infra_01/JsonServlet',
                        data: jQuery.param(this.input)
                    }).done(function(data){
                        vv.output.data = data;
                        vv.output.E_DTEXT = data.E_DTEXT;
                        vv.output.otab = data.OTAB;
                    }).fail(function() {
                        alert( "Posting failed." );
                    });
                },
                goDelete:function(row) {
                    _row = row;
                    bootbox.confirm({
                        message: "삭제하시겠습니까?",
                        buttons: {
                            cancel: {
                                label: 'No',
                                className: 'btn btn-outline b-danger text-danger btn-md m-r-sm'
                            },
                            confirm: {
                                label: 'Yes',
                                className: 'btn btn-outline b-info text-info btn-md'
                            }
                        },
                        callback: function (result) {
                            if(result === true ) {
                                $.ajax({
                                    type: 'POST',
                                    dataType: 'json',
                                    url: 'http://localhost:8080/common_infra_01/JsonServlet',
                                    data: jQuery.param({
                                        SERVER :'STC',
                                        FID :'Z_HR_TB02',
                                        import:JSON.stringify({"I_GWAREKEY":_row.GWAREKEY})
                                    })
                                }).done(function(data){
                                    if(data.RETCODE!==0) {
                                        alert(data.RETTEXT);
                                        return;
                                    }
                                    else {
                                        alert(data.RETTEXT);
                                        window.location.href='/topbank';
                                    }
                                }).fail(function() {
                                    alert( "delete failed." );
                                });
                            }

                        }
                    });
                }
            },
            mounted: function() {
/*                this.output = {
                    HEADER:{},
                    OTAB:[]
                }*/

                this.$nextTick(function () {
                    this.getList()
                })
            }
        })





    </script>
@endsection

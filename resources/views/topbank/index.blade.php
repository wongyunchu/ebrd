<?php
?>
@extends('main')
@section('title', 'Top Bank ')
@section('title_sub', ' | All List...')
@section('stylesheets')
<style>
    /*.table-responsive { overflow-x: initial; }*/
</style>
@endsection
@section('content')

@php
@endphp

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
        </div>
{{--
C:\0.project\02.laravel\eHr\resources\views\topbank\index.blade.php
--}}
        <div class="table-responsive1" >

            <table id="tbList" cellspacing="0" width="100%" class="table text-center blueTable2 table-striped table-bordered table-hover row-border p-b-md " style=" border-collapse:collapse!important;">
                <thead>
                <th style="width:100px;min-width: 100px">신청상태</th>
                <th style="width:100px;;min-width: 100px" >신청일</th>
                <th style="width:90px;min-width: 90px" >대출용도</th>
                <th style="min-width: 140px"> 대출사유</th>
                <th style="width:90px" >대출금액</th>
                <th style="width:110px" >보증보험상태</th>
                <th style="width:90px" >지급일</th>
                <th style="width:110px">변경/상태</th>
                </thead>
                <tbody>
                {{--{{dump($res['OTAB'])}}
                console.log($("#d1").data("role"));
                moment({{$row['SDATE']}}).format('YYYY-MM-DD')
                --}}
                {{--
                @foreach($res['OTAB'] as $row)
                    <tr @click="goView(event, 'V')" style="cursor: pointer;" data-val="{{json_encode($row, JSON_UNESCAPED_UNICODE)}}">
                        <td >{{$row['WSTATX']}} </td>
                        <td >{{  date('Y-m-d',strtotime($row['SDATE']))  }}</td>
                        <td >{{$row['BUSET']}}</td>
                        <td width="100%" style=" overflow: hidden;text-overflow:ellipsis; white-space:nowrap;" >{{$row['BREAS']}}</td>
                        <td >{{\silverUtil\numberUtil::getAmtSap($row['BETRG'])}}  </td>
                        <td >{{$row['RSTATX']}}</td>
                        <td >{{$row['PAYDT']}}</td>
                        <td >
                            --}}{{--{{$row->WSTATUS}}--}}{{--
                            <div class="">
                                <button @click.stop="goView(event, 'E')" class="btn btn-outline b-info text-info btn-sm">변경</button>
                                <button @click.stop="goDelete(event)" class="btn btn-outline b-danger text-danger btn-sm">삭제</button>
                            </div>
                        </td>

                    </tr>
                @endforeach
                --}}
                {{--vuejs 사용시
                data-val="{{json_encode($row, JSON_UNESCAPED_UNICODE)}}"
                --}}
                <tr v-for="row in output.otab" @click="goView(row, 'V')">
                    <td v-text="row.WSTATX" ></td>
                    <td v-text="moment(row.SDATE).format('YYYY-MM-DD')"></td>
                    <td v-text="row.BUSET"></td>
                    <td v-text="row.BREAS"></td>
                    <td v-text="accounting.formatMoney(row.BETRG)"></td>
                    <td v-text="row.RSTATX"></td>
                    <td v-text="row.PAYDT"></td>
                    <td >
                        <button @click.stop="goView(row, 'E')" class="btn btn-outline b-info text-info btn-sm">변경</button>
                        <button @click.stop="goDelete(row)" class="btn btn-outline b-danger text-danger btn-sm">삭제</button>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>

         <div class="row">
            <div class="col-md-12 p-t-md">
                <div class="row">
                    <div class="col-xs-4">
                        <button @click="goView(event, 'C')" class="md-btn md-raised m-b-sm w-sm primary">신청</button>
                        <button @click="getList" class="md-btn md-raised m-b-sm w-sm primary">js Sap</button>
                    </div>
                    <div class="col-xs-8">
                        <div class="row end-xs p-r-sm">
                        <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w-sm blue m-r-sm">동의서</a>
                        <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w blue">Top Bank 매뉴얼</a>
                        </div>
                    </div>

                    {{--help--}}
                    <div class="col-xs-12 well well-sm m-b-0 m-t-md">
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
        var dt;
        Vue.config.devtools = true;

        $(document).ready(function() {
            /*
            $('#tbList tbody').on( 'click', '#btnEdit', function () {
                var data = dt.row( $(this).parents('tr') ).data();
                alert( data[0] +"'s salary is: "+ data[ 5 ] );
            } );*/
            /*$('#tbList tbody').on( 'click', 'tr', function () {
                var data = table.row( this ).data();
                alert( 'You clicked on '+data+'\'s row' );
            } );*/
            //dt.rows.add(data2).draw();
            //dt.rows().invalidate().draw();
            //dt.rows().draw();
        } );

        vv = new Vue({
            el:'#vuejs',
            data : {
                input:{
                    "I_PERNR":"2950001"
                },
                output:{
                    //data:{},
                    otab:{},
                    param:{},
                }
            },
            methods: {
                init:function(){
                    loadSap('Z_HR_TB01', this.input).done(function(data){
                        vv.output.otab = data.OTAB;
                        vv.output.param.E_DTEXT = data.E_DTEXT;
                        vv.output.param.T_BCODE  = data.T_BCODE;
                        vv.output.param.T_UCODE  = data.T_UCODE;

                        Vue.nextTick(function() {
                            dt = $('#tbList').DataTable({
                                columnDefs: [
                                    { responsivePriority: 1, targets: 0 },
                                    { responsivePriority: 2, targets: -1 } //우측부터
                                ],
                                 buttons: ['copy', 'excel', 'pdf'],
                                 select: false,"paging": true,"info": true,"ordering": false,"deferRender": true,stateSave: true,"pagingType": "full_numbers",responsive: true
                            });
                        })

                    }).fail(function() {
                        alert( "Posting failed." );
                    });
                },
                goView:function (rowData, _action) {
                    val = $.extend(
                        {action:_action},{sltdRow:rowData},{param:vv.output.param} // action : [C, E,], sltdRow:선택된 row의 data-val, param:sap에서 받아온 값을 뷰화면에 전달
                    );
                    submitRow(val);
                },
                getList:function() {
                    // ex) vuejs에서 call하는 경우 sample
                    loadSap('Z_HR_TB01', vv.input).done(function(data){
                        alert('성공'+JSON.stringify(data));
                    }).fail(function() {
                        alert( "Posting failed." );
                    });
                },
                goDelete:function(event) {
                    _row = event;
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
                                loadSap('Z_HR_TB02', {"I_GWAREKEY":_row.GWAREKEY})
                                .done(function(data){
                                    if(data.RETCODE!==0) {
                                        alert(data.RETTEXT);
                                        return;
                                    }
                                    else {
                                        alert(data.RETTEXT);
                                        window.location.href='/topbank';
                                    }
                                }).fail(function() {
                                    alert( "Posting failed." );
                                });
                            }
                        }
                    });
                }
            },
            mounted: function() {
                this.$nextTick(function () {
                    {{--
                    vv.output.param.E_DTEXT = '{!! $res['E_DTEXT'] !!}';
                    vv.output.param.T_BCODE  = {!!  json_encode($res['T_BCODE']) !!};
                    vv.output.param.T_UCODE  = {!!  json_encode($res['T_UCODE']) !!};
                    --}}
                })
            },
            created: function() {
                this.init();
            }
        })
    </script>
@endsection

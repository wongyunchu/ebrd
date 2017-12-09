<?php
?>
@extends('main')
@section('title', '| Top Bank')
@section('stylesheets')

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
            <div class="col-md-12">
                <table id="tbList" cellspacing="0" width="100%" class="table text-center blueTable2 table-striped table-bordered table-hover row-border p-b-md " style="cursor: pointer;border-collapse:collapse!important;">
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
                    {{--{{dump($res['OTAB'])}}
                    console.log($("#d1").data("role"));
                    moment({{$row['SDATE']}}).format('YYYY-MM-DD')
                    --}}
                    @foreach($res['OTAB'] as $row)
                        <tr @click="goView(event, 'V')" data-val="{{json_encode($row, JSON_UNESCAPED_UNICODE)}}">
                            <td width="80px" style="max-width:80px;">{{$row['WSTATX']}} </td>
                            <td width="80px" style="max-width:80px;">{{  date('Y-m-d',strtotime($row['SDATE']))  }}</td>
                            <td width="80px">{{$row['BUSET']}}</td>
                            <td>{{$row['BREAS']}}</td>
                            <td width="110px" style="max-width:110px;">{{\silverUtil\numberUtil::getAmtSap($row['BETRG'])}}  </td>
                            <td width="90px" style="max-width:90px;" >{{$row['RSTATX']}}</td>
                            <td width="80px" style="max-width:80px;" >{{$row['PAYDT']}}</td>
                            <td width="110px" style="max-width:110px;min-width: 110px;" >
                                {{--{{$row->WSTATUS}}--}}
                                <button @click.stop="goView(event, 'E')" class="btn btn-outline b-info text-info btn-sm">변경</button>
                                <button @click.stop="goDelete(event)" class="btn btn-outline b-danger text-danger btn-sm">삭제</button>
                            </td>
                        </tr>
                    @endforeach
                        {{--
                        vuejs 사용시
                        <tr v-for="row in output.otab" @click="goView(row)">
                            <td width="80px" style="max-width:80px;" v-text="row.WSTATX" ></td>
                            <td width="80px" style="max-width:80px;" v-text="moment(row.SDATE).format('YYYY-MM-DD')"></td>
                            <td width="80px" v-text="row.BUSET"></td>
                            <td v-text="row.BREAS"></td>
                            <td width="110px" style="max-width:110px;" v-text="accounting.formatMoney(row.BETRG)"></td>
                            <td width="90px" style="max-width:90px;" v-text="row.RSTATX"></td>
                            <td width="80px" style="max-width:80px;" v-text="row.PAYDT"></td>
                            <td width="110px" style="max-width:110px;min-width: 110px;" >
                                @{{row.WSTATUS}}
                                <button @click.stop="goEdit(row)" class="btn btn-outline b-info text-info btn-sm">변경</button>
                                <button @click.stop="goDelete(row)" class="btn btn-outline b-danger text-danger btn-sm">삭제</button>
                            </td>
                        </tr>--}}
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 p-t-md">
                <div class="row">
                    <div class="col-xs-4">
                        <button @click="goView(event, 'C')" class="md-btn md-raised m-b-sm w-sm primary">신청</button>
                        <button @click="getList" class="md-btn md-raised m-b-sm w-sm primary">js Sap</button>
                    </div>
                    <div class="col-xs-8">
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
        var dt;
        Vue.config.devtools = true;

        $(document).ready(function() {
            dt = $('#tbList').DataTable(
                {
                   /*
                   data:data2,
                   columns: [
                        { data: "SDATE", title:"신청일" },
                        { data: "BUSET", title:"대출용도" },
                        { data: "BREAS" , title:"대출사유" },
                        { data: "BETRG" , title:"대출금액" },
                        { data: "RSTATX" , title:"보증보험상태" },
                        { data: "PAYDT" , title:"지급일" },
                        { data: "null" , title:"변경/상태",
                            "defaultContent":
                            "<button id='btnEdit' @click.stop=\"goEdit(row)\" class=\"btn btn-outline b-info text-info btn-sm\">변경</button>\n" +
                            "<button @click.stop=\"goDelete(row)\" class=\"btn btn-outline b-danger text-danger btn-sm\">삭제</button>"
                        }
                    ],*/
                    select: false,"paging": true,"info": true,"ordering": false,"deferRender": true,stateSave: true,"pagingType": "full_numbers",responsive: true
                }
            );
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
                    param:{},
                }
            },
            methods: {
                goView:function (event, _action='V') {
                    rowData = getRowVal(event);
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
                    _row = getRowVal(event);
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
                    vv.output.param.E_DTEXT = '{!! $res['E_DTEXT'] !!}';
                    vv.output.param.T_BCODE  = {!!  json_encode($res['T_BCODE']) !!};
                    vv.output.param.T_UCODE  = {!!  json_encode($res['T_UCODE']) !!};
                })
            }
        })
    </script>
@endsection

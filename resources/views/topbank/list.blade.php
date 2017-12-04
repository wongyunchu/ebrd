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
                        <tr>
                            <td>@{{output.E_DTEXT}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <table id="tbList" cellspacing="0" width="100%" class="table text-center blueTable2 table-striped table-bordered table-hover row-border p-b-md " style="border-collapse:collapse!important;">
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
                        <tr v-for="row in output.otab" >
                            <td width="80px" style="max-width:80px;" >@{{row.WSTATX}}</td>
                            <td width="80px" style="max-width:80px;" >@{{moment(row.SDATE).format('YYYY-MM-DD')}}</td>
                            <td width="80px">@{{row.BUSET}}</td>
                            <td >@{{row.BREAS}}</td>
                            <td width="110px" style="max-width:110px;" >@{{accounting.formatMoney(row.BETRG)}}</td>
                            <td width="90px" style="max-width:90px;" >@{{row.RSTATX}}</td>
                            <td width="80px" style="max-width:80px;" >@{{row.PAYDT}}</td>
                            <td width="80px" style="max-width:80px;" >@{{row.WSTATX}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-2">
                        <form id="formToCreate" action="{{route('topbank.create')}}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input id="inputData" name="inputData" type="hidden" >
                        </form>

                        <button @click="goCreate" class="md-btn md-raised m-b-sm w-sm blue">신청</button>


                        {{--<a  class="md-btn md-raised m-b-sm w-sm blue">신청</a>--}}
                        {{--<a href="{{route('topbank_create')}}" class="md-btn md-raised m-b-sm w-sm blue m-r-sm">신청</a>--}}
                    </div>
                    <div class="col-xs-10 end-xs">
                        <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w-sm blue m-r-sm">동의서</a>
                        <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w-md blue">Top Bank 매뉴얼</a>
                    </div>
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
@endsection
@section('scripts')
    <script type="text/javascript">
        Vue.config.devtools = true;
        //alert("의료비");
        var table = $('#tbList').DataTable(
            {
                /*"responsive": true,*/
                select: false,
                "paging": true,
                "info": true,
                "ordering": false,
                /*"order": [[0, "desc"]],
                "deferRender": true,*/
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
                goCreate:function(){
                    inputData  = JSON.stringify(vv.output.data);
                    $('#inputData').val(inputData);
                    //var formDatas = $('#formToCreate').serialize();

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
                openInsertView:function() {

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

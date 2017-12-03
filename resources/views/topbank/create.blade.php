@extends('main')
@section('title', 'Top Bank | ')
@section('title_sub', 'Request...')
@section('stylesheets')

@endsection
@section('content')
    <div id="vuejs" class="container_del">
        <div class="row">

            <div class="text-md _500 "><i class="text-info fa fa-edit p-r-sm"></i>신청정보</div>
            <table class="blueTable m-y-sm m-b-md">
                <tr>
                    <td width="120">대출정보</td>
                    <td class="text-left">@{{output.params.E_DTEXT}}</td>
                </tr>
                <tr>
                    <td width="120">대출용도</td>
                    <td>
                        <select id="BUSE" name="BUSE" v-model="input.BUSE" class="text-center form-control form-control-sm " style="width: 120px;">
                            <option value="" selected>- 선택 -</option>
                            <option v-for="option in output.params.T_UCODE" v-bind:value="option.CODE">
                                @{{ option.TEXT}}
                            </option>
                        </select>
                        {{--<span>Selected: @{{ input.BUSE }}</span>--}}
                    </td>
                </tr>
                <tr>
                    <td width="120">대출금액</td>
                    <td>
                        <select id="BETRG" name="BETRG" v-model="input.BETRG" class="text-center form-control form-control-sm " style="width: 120px;">
                            <option value="" selected>- 선택 -</option>
                            <option v-for="option in output.params.T_UCODE" v-bind:value="option.CODE">
                                @{{ accounting.formatMoney(option.BETRG)}}
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="120">대출사유</td>
                    <td width="">
                       <input  id="BREAS" name="BREAS" type="text" style="width: 100%;"/>
                    </td>
                </tr>
            </table>

            <div class="text-md _500 p-t-md"><i class="text-info fa fa-edit p-r-sm"></i>진행정보</div>
            <table class="blueTable m-y-sm">
                <tr>
                    <td width="120">신청상태</td>
                    <td width="100" class="text-left"></td>

                    <td width="100">반려사유</td>
                    <td  class="text-left"></td>

                    <td width="100">보증보험상태</td>
                    <td width="100" class="text-left"></td>

                    <td width="100">지급일자</td>
                    <td width="100" class="text-left"></td>
                </tr>
            </table>

            <div class="text-md _500  p-t-md"><i class="text-info fa fa-edit p-r-sm"></i>대출사유 세부 기준 및 구비 서류</div>
            <table id="tbList" cellspacing="0" width="100%" class="table  text-center blueTable2 table-striped table-bordered table-hover row-border p-b-md " style="border-collapse:collapse!important;">
                <thead>
                <th>순위</th>
                <th>사유</th>
                <th>사유세부기준</th>
                <th>제출서류</th>
                </thead>
                <tbody>
                <tr >
                    <td width="80px" style="max-width:80px;">1</td>
                    <td width="180px" style="max-width:80px;" >주택 구입 및 주택임차</td>
                    <td>본인 또는 명의 주택 구입 및 임차</td>
                    <td width="120px">계약서 사본</td>
                </tr>
                <tr >
                    <td width="80px" style="max-width:80px;">2</td>
                    <td width="180px" style="max-width:80px;" >경조사</td>
                    <td >결혼 - 본인결혼, 자녀결혼</td>
                    <td width="120px">청첩장</td>
                </tr>
                <tr >
                    <td width="80px" style="max-width:80px;">2</td>
                    <td width="180px" style="max-width:80px;" >경조사</td>
                    <td >사망 - 본인 및 배우자 부모</td>
                    <td width="120px">사망확인서류</td>
                </tr>
                <tr >
                    <td width="80px" style="max-width:80px;">3</td>
                    <td width="180px" style="max-width:80px;" >학자금, 의료비</td>
                    <td >학자금 : 본인, 배우자, 자녀 학자금</td>
                    <td width="150px">등록금납입고지서</td>
                </tr>
                <tr >
                    <td width="80px" style="max-width:80px;">3</td>
                    <td width="180px" style="max-width:80px;" >학자금, 의료비</td>
                    <td >의료비 : 본인, 배우자, 자녀 , 부모, 배우자 부모</td>
                    <td width="120px">의료비영수증</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <button @click="" class="md-btn md-raised m-b-sm w-sm blue">임시저장</button>
                <button @click="" class="md-btn md-raised m-b-sm w-sm blue">승인요청</button>
            </div>
            <div class="col-xs-8 end-xs">
                <a href="{{route('medicalDetails')}}" class="md-btn md-raised m-b-sm w-sm blue">이전화면</a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        Vue.config.devtools = true;
        {{--params = JSON.parse(' {!! $param !!}');--}}
        {{--var array = '{{ json_decode() }}';--}}
        vv = new Vue({
            el:'#vuejs',
            data : {
                input:{
                    SERVER :'STC',
                    FID :'Z_HR_TB01',
                    import:'{"I_PERNR":"2950001"}',

                    BUSE:"",
                    BETRG:""
                },
                output:{
                    params:JSON.parse(' {!! $param !!}')
                }
            },
            methods: {
                getList:function() {
/*                    $.ajax({
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
                    });*/
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

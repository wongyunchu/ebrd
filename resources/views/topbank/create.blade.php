@extends('main')
@section('title', 'Top Bank | ')
@section('title_sub', 'Request...')
@section('stylesheets')

@endsection
@section('content')
    <div id="vuejs" class="container_del">
        <div class="row">
            <div class="col-md-12">
            <div class="text-md2 _500 "><i class="text-info fa fa-edit p-r-sm"></i>신청정보</div>
            <table class="blueTable m-y-sm m-b-md">
                <tr>
                    <td width="120">대출정보</td>
                    {{--<td class="text-left" v-text="params.action=='V'?params.output.E_DTEXT:'' " ></td>--}}
                    <td class="text-left" v-text="params.param.E_DTEXT"></td>

                </tr>
                <tr>
                    <td width="120">대출용도</td>
                    <td>
                        <select id="BUSE" name="BUSE" :disabled="isDisabled" v-model="input.tables.ITAB[0].BUSE"
                                class="text-center form-control form-control-sm " style="width: 120px;">
                            <option value="" >- 선택 -</option>
                            <option  v-for="option in params.param.T_UCODE" v-bind:value="(option.CODE)" >
                                @{{ option.TEXT}}
                            </option>
                        </select>
                        {{--<span>Selected: @{{ input.BUSE }}</span>--}}
                    </td>
                </tr>
                <tr>
                    <td width="120">대출금액</td>
                    <td>
                        <select id="BETRG" name="BETRG" :disabled="isDisabled" v-model="input.tables.ITAB[0].BETRG"
                                class="text-center form-control form-control-sm " style="width: 120px;">
                            <option value="" selected>- 선택 -</option>
                            <option v-for="option in params.param.T_UCODE" v-bind:value="option.BETRG">
                                @{{ accounting.formatMoney(option.BETRG)}}
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="120">대출사유</td>
                    <td width="">
                       <input  id="BREAS" name="BREAS" type="text" style="width: 100%;" v-model="input.tables.ITAB[0].BREAS" :disabled="isDisabled">
                    </td>
                </tr>
            </table>

            <div class="text-md2 _500 p-t-md"><i class="text-info fa fa-edit p-r-sm"></i>진행정보</div>
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
            {{--help--}}
            <div class="text-md2 _500  p-t-md"><i class="text-info fa fa-edit p-r-sm"></i>대출사유 세부 기준 및 구비 서류</div>
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

            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-4">
                        <button @click="onSave" class="md-btn md-raised m-b-sm w-sm primary" v-if="getAction!='V'" >@{{getAction=='C'?'저장':'수정'}}</button>
                        <button @click="" class="md-btn md-raised m-b-sm w-sm blue" v-if="getAction!='V'">승인요청</button>
                    </div>
                    <div class="col-xs-8 end-xs">
                        <a href="{{route('topbank.index')}}" class="md-btn md-raised m-b-sm w-sm blue">이전화면</a>
                    </div>
                </div>
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
                params:JSON.parse(' {!! $param !!}'),
                input:{
                    I_GWAREKEY:"",
                    tables:{
                        ITAB:[
                            {
                                PERNR:'2950001',
                                BREAS:"",
                                BETRG:"",
                                BUSE:"",
                                GWAREKEY:""
                            }
                        ]
                    }
                }

            },
            computed:{
                isDisabled () {
                    if(this.params.action ==="V") {
                        return true;
                    }
                    else {
                        return false;
                    }
                },
                getAction(){
                    return this.params.action;
                }
            },
            methods: {
                onSave:function () {
                    saveSap('Z_HR_TB03', vv.input).done(function(data){
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
                },
                getList:function() {

                }
            },
            mounted: function() {
                this.$nextTick(function () {
                    if(vv.params.action !== 'C') {
                        vv.input.tables.ITAB[0].BUSE = vv.params.sltdRow.BUSE;
                        vv.input.tables.ITAB[0].BETRG  = vv.params.sltdRow.BETRG;
                        vv.input.tables.ITAB[0].BREAS = vv.params.sltdRow.BREAS;
                        vv.input.import.I_GWAREKEY = vv.params.sltdRow.GWAREKEY;
                    }
                })
            }
        })




    </script>
@endsection

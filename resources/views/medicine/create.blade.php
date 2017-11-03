
@extends('main')
@section('title', '의료비')
@section('title_sub', '의료비 신청')
@section('stylesheets')
    {!! (Html::style('css/parsley.css')) !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    @php
        $nowYear = date("Y");
        $subjects = ['이비인후과', '안과', '치과','소아과']
    @endphp
    <div id="vuejs" class="col-xs-offset-0 col-xs-12 ">

        {!! Form::hidden('csrf-token', csrf_token(), ['id' => 'csrf-token']) !!}

{{--        {{ Form::model(['url' => '/', 'method' => 'post']) }}
        {{ Form::close() }}--}}
        {{--의료비 신청--}}
        <div class="pTitle">
            <i class="fa fa-dot-circle-o"></i><label>의료비 신청</label>
        </div>

        <form id="formMedicalMain" action="/medicals">
            <input id="medicalList" name="medicalList" type="hidden" >
            <table class="blueTable">
                <tr>
                    <td width="20%">의료비 지원대상자
                    </td>
                    <td width="30%">김남오(342221)</td>
                    <td width="20%">의료비 지원가능 금액</td>
                    <td width="30%">30,000원</td>
                </tr>
                <tr>
                    <td>대상년월</td>
                    <td>
                        <div class="form-group" style="display: inline;">
                            <select class="form-control form-control-sm p-l-2" style="width: 100px;  display: inline"
                                    id="targetYear" name="targetYear">
                                @for($i=0; $i<10; $i++)
                                    <option value="{{$nowYear+$i}}">
                                        {{$nowYear+$i}}년
                                    </option>
                                @endfor
                            </select>

                            <select class="form-control form-control-sm p-l-2" style="width: 100px; display: inline"
                                    id="targetMonth" name="targetMonth">
                                @for($i=0; $i<12; $i++)
                                    <option value="{{$i+1}}" style="text-align-last: center">
                                        {{$i+1}}월
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </td>
                    <td>신청금액</td>
                    <td>10,000원</td>
                </tr>
                <tr>
                    <td>진료과목</td>
                    <td><select class="form-control form-control-sm p-l-2" style="width: 204px;  display: inline"
                                id="categorySubject" name="categorySubject">
                            @foreach($subjects as $subject)
                                <option value="{{$subject}}">
                                    {{$subject}}
                                </option>
                            @endforeach
                        </select></td>
                    <td>잔여금액</td>
                    <td>30,000원</td>
                </tr>
            </table>
        </form>
        {{--의료비 사용내역 입력 --}}
        {{--
        onsubmit="return checkForm()"
         @submit="addList"
        --}}
        <div id="insertArea" style="height: 0px; overflow: hidden">
            <form id="formMedicine" onsubmit="return false"  data-parsley-validate="">
                <div class="pTitle" >
                    <i class="fa fa-dot-circle-o"></i><label>의료비 사용내역 입력</label>
                </div>
                <table class="blueTable" >
                    <tr>
                        <td width="20%">사용일자</td>
                        <td width="30%">
                            <div class="input-group date">
                                <input id="usedate" type="text" class="form-control dateComp" readonly value="{{@date("Y-m-d")}}"/>
                                <span class="input-group-addon" >
                                    <i class="glyphicon glyphicon-th"></i>
                                </span>
                            </div>
                        </td>

                        <td width="20%">금액</td>
                        <td width="30%">
                            <input type="text" id="amount" class="form-control" required data-parsley-type="digits"></td>
                    </tr>
                    <tr>
                        <td>병원 / 약국명</td>
                        <td colspan="3">
                            <input type="text" id="hospitalname" class="form-control" required>
                        </td>
                    </tr>
                </table>

            <div class="row end-xs p-a-sm">
                {{--https://stackoverflow.com/questions/683498/calling-javascript-from-a-html-form--}}
                {{--@submit.prevent="addList" --}}
                <button type="submit" class="md-btn md-raised m-b-sm w-xs indigo m-a-xs">
                    <div v-if="sltdData==null">추가</div>
                    <div v-else>수정</div>
                </button>
                <button type="button" @click="cancelForm" class="md-btn md-raised m-b-sm w-xs green m-a-xs">취소</button>
            </div>
            </form>
        </div>
        <hr>
        {{--의료비 사용내역--}}
        <div class="row bottom-xs">

            <div class="pTitle col-xs-5" style="display: inline">
                <i class="fa fa-dot-circle-o"></i><label>의료비 사용내역</label>
            </div>

            <div class="col-xs-7 row end-xs p-r-0">
                <button @click="addForm" class="md-btn md-raised m-b-sm w-xs blue m-a-xs">추가</button>
                <button @click="editForm" class="md-btn md-raised m-b-sm w-xs blue m-a-xs">수정</button>
                <button @click="delList" class="md-btn md-raised m-b-sm w-xs red m-a-xs">삭제</button>
            </div>
        </div>
        <table id="example" cellspacing="0" width="100%"
               class="table table-striped table-bordered table-hover row-border p-b-md">
            <thead>
            <th>선택</th>
            <th>사용일자</th>
            <th>병원 / 약국명</th>
            <th>금액</th>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-2">
                <div class="md-form-group float-label">
                    {{Form::text('title', null, ['id'=>'idCount', 'class'=>'md-input text-right','readonly', '', 'min-length'=>'5'])}}
                    <label class="w-full text-right p-r-0" >건수 </label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="md-form-group float-label">
                    {{Form::text('title', null, ['id'=>'idAmount','class'=>'md-input text-right '])}}
                    <label class="w-full text-right p-r-xs" >금액계 </label>
                </div>
            </div>
        </div>


        {{--하단 계좌정보--}}
        <div class="pTitle p-t -0">
            <i class="fa fa-dot-circle-o"></i><label>입금/계좌 정보</label>
        </div>
        <table class="blueTable">
            <tr>
                <td width="20%">입금은행</td>
                <td width="30%">국민은행</td>
                <td width="20%">계좌번호</td>
                <td width="30%">53535-1233-533</td>
            </tr>
            <tr>
                <td width="20%">예금주</td>
                <td colspan="3" width="30%">김남오</td>
            </tr>
        </table>


        <div class="form_group">
            <hr>
            <div class="row no-gutter">
                <div class="col-sm-6">
                    {!! Html::linkRoute('medicals.index','뒤로', array(), ['class'=>'md-btn md-raised m-b-sm btn-lg w-sm green'] ) !!}
                </div>

                <div class="col-sm-6">
                    <div class="row end-xs no-gutter">
                        <button id="submit-all" type="submit" @click="saveForm"  class="md-btn md-raised m-b-sm btn-lg w-sm blue">저장
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{--
    modal 창
    <button class="btn white" data-toggle="modal" data-target="#m-b-b">Dark style</button>
    <div id="m-b-b" class="modal black-overlay" data-backdrop="false" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal</h5>
                </div>
                <div class="modal-body text-center p-lg">
                    <p>Are you sure to execute this action?</p>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn dark-white p-x-md"  data-dismiss="modal">No</button>
                    <button type="button" id="yesCloser" class="btn danger p-x-md"   data-dismiss="modal">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>--}}
@stop
@section('scripts')
    <script>
        /*
        $('#m-b-b').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        })

      $('#m-b-b').on('hidden.bs.modal',function (e) {
            var button = $(e.relatedTarget);
            if (!data) return e.preventDefault() // stops modal from being shown
        })*/

        function resetForm() {
            $('#formMedicine').each(function() {
                this.reset();
            })
        }

        vue = new Vue({
            el: '#vuejs',
            data: {
                sltdData: null
            },
            methods: {
                openInsertView:function() {
                    TweenMax.to($('#insertArea'), 0.4, {delay: "0", height: "230"});
                },
                // 최종 전체 저장
                saveForm:function () {
                    /*
                    // bootbox confirm
                    bootbox.confirm({
                        message: "This is a confirm with custom button text and color! Do you like it?",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-success'
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-danger'
                            }
                        },
                        callback: function (result) {
                            console.log('This was logged in the callback: ' + result);
                        }
                    });
*/
                    //var formDatas = $('#formMedicalMain').serializeArray();
                    ar_medicineList = medicineListTable.rows().data().toArray();
                    for (var key in ar_medicineList) {
                        delete ar_medicineList[key].select;
                    }
                    var medicneTableList = JSON.stringify(ar_medicineList);
//                    var medicneTableList = JSON.stringify(medicineListTable.rows().data().toArray());



                    $('#medicalList').val(medicneTableList);


                    var formDatas = $('#formMedicalMain').serialize();

                    axios.post('/medicals',formDatas)
/*                    axios.post('/medicals', {
                        firstName: 'Fred',
                        lastName: 'Flintstone'
                    })*/
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
                        /*bootbox.confirm({
                            title: exeption,
                            message: msg,
                            buttons: {
                                confirm: {
                                    label: '<i class="fa fa-check"></i> Confirm'
                                }
                            },
                            callback: function (result) {
                                console.log('This was logged in the callback: ' + result);
                            }
                        });*/

                    });
                },
                // 하단 추가, 수정, 삭제
                addForm: function () {
                    medicineListTable.rows().deselect();
                    vue.sltdData = null;
                    resetForm();
                    this.openInsertView();
                    //$('#usedate').focus();
                },
                editForm:function() {
                    if(medicineListTable.row( { selected: true } ).count() === 0) {
                        alert('수정할 대상을 선택하세요');
                        return;
                    }
                    this.openInsertView();
                    vue.sltdData = medicineListTable.row( { selected: true } ).data();
                    $('#usedate').val(vue.sltdData.usedate);
                    $('#amount').val(vue.sltdData.amount);
                    $('#hospitalname').val(vue.sltdData.hospitalname) ;
                },
                delList:function() {
                    //var count = medicineListTable.rows( { selected: true } ).data();
                    var count = medicineListTable.row( { selected: true } ).remove().draw();
                },

                /////////////////////////////////////////////////////////////////////////////////
                // 상단
                cancelForm: function () {
                    vue.sltdData = null;
                    medicineListTable.rows().deselect();
                    TweenMax.to($('#insertArea'), 0.2, {delay: "0", height: "0"});
                    resetForm();

                },
                addList:function () {
                    // 신규 추가시
                    if(vue.sltdData == null) {
                        rowCnt++;
                        medicineListTable.row.add(
                            {
                                "select":     "",
                                "usedate":$('#usedate').val(),
                                "hospitalname":$('#hospitalname').val(),
                                "amount": $('#amount').val()
                            }
                        ).draw( false );
                        vue.cancelForm();
                    }
                    // 수정시
                    else {
                        vue.sltdData.usedate = $('#usedate').val();
                        vue.sltdData.hospitalname = $('#hospitalname').val();
                        vue.sltdData.amount = $('#amount').val();
                        medicineListTable.rows().invalidate().draw();
                        vue.cancelForm();
                    }
                    var count = medicineListTable.rows().count();
                    $('#idCount').val(count);
                    $('#idCount').addClass("has-value hover");

                    var totalAmount = medicineListTable.column( 3 ).data().sum();
                    $('#idAmount').val(accounting.formatMoney(totalAmount));
                    $('#idAmount').addClass("has-value hover");
                }

            }
        });
        Vue.config.devtools = true;
    </script>

    <script type="text/javascript">

        var medicineListTable;
        var rowCnt=0;

        $(document).ready(function () {
              $('#formMedicine').parsley()
                  .on('form:success', function() {
                      vue.addList();
                      $('#formMedicine').parsley().reset();
                      return;
                  })
                  .on('form:init', function() {
                      alert('3');
                  });
                  /*.on('form:error', function() {
                      alert('6');
                  })*/


              $('.input-group.date').datepicker({
                  format: "yyyy-mm-dd",
                  maxViewMode: 0,
                  todayBtn: true,
                  language: "kr",
                  keyboardNavigation: false,
                  forceParse: false,
                  autoclose: true,
                  todayHighlight: true,
                  toggleActive: true
              });

//            TweenMax.to($('#insertArea'), 0, {scaleY:"0", height:"0",  onComplete:timelineDone});
            function timelineDone() {
                //TweenMax.to(pp, 1, {delay:"3", scaleY:"1", height:"158"});
            }

            $.extend(true, $.fn.dataTable.defaults, {
                "searching": false,
                "ordering": false
                //select: true,
            });

             medicineListTable = $('#example').DataTable(
                {
                    select:false,
                    "info": false,
                    "paging": false,
/*                    "createdRow": function (row, data, index) {
                        if (data[0].replace(/[\$,]/g, '') * 1 > 55) {
                            $('td', row).eq(1).addClass('text-primary'); //
                        }
                    },*/
                    "columnDefs": [{
                        //orderable: false,
                        className: 'select-checkbox',
                        targets: 0
                    }],
                    select: {
                        style:    'os',
                        selector: 'td:first-child'
                    },

                    "data": [
                        {
                            "select":     "",
                            "usedate":       "2017-11-21",
                            "hospitalname":   "하나병원",
                            "amount": "2345"
                        },
                        {
                            "select":     "",
                            "usedate":       "2017-05-01",
                            "hospitalname":   "System Architect",
                            "amount": "5545"
                        },
                    ],
                    "columns": [
                        { "data": "select" },
                        { "data": "usedate" },
                        { "data": "hospitalname" },
                        { "data": "amount" }
                    ]
                }
            );

            // 이벤트
            /*
           $('#example tbody').on('click', 'tr', function () {
               $(this).toggleClass('selected');
                   var data = table.row( this ).data();
                   alert( 'You clicked on '+data[0]+'\'s row' );
           });
            */
        });
    </script>
@endsection



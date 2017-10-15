
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

        {{--의료비 신청--}}
        <div class="pTitle">
            <i class="fa fa-dot-circle-o"></i><label>의료비 신청</label>
        </div>

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
                                id="category_id" name="category_id">
                            @for($i=0; $i<10; $i++)
                                <option value="{{$nowYear+$i}}">
                                    {{$nowYear+$i}}년
                                </option>
                            @endfor
                        </select>

                        <select class="form-control form-control-sm p-l-2" style="width: 100px; display: inline"
                                id="category_id" name="category_id">
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
                            id="category_id" name="category_id">
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

        {{--의료비 사용내역 입력 --}}
        <form id="formMedicine" @submit.prevent="addList" data-parsley-validate="" >
        <div id="insertArea" style="height: 0px; overflow: hidden">
            <div class="pTitle" >
                <i class="fa fa-dot-circle-o"></i><label>의료비 사용내역 입력</label>

            </div>
            <table class="blueTable" style="position: relative; z-index: 9999; " >
                <tr>
                    <td width="20%">사용일자</td>
                    <td width="30%">
                        <div class="input-group date">
                            <input id="tiDate" type="text" class="form-control dateComp" readonly value="{{@date("Y-m-d")}}"/>
                            <span class="input-group-addon" >
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                    </td>

                    <td width="20%">금액</td>
                    <td width="30%">
                        <input type="text" id="tiAmt" class="form-control" required data-parsley-type="digits"></td>
                </tr>
                <tr>
                    <td>병원 / 약국명</td>
                    <td colspan="3">
                        <input type="text" id="tiHsptName" class="form-control" required></td>
                </tr>
            </table>

        </div>
        <div class="row end-xs p-a-sm">
            {{--https://stackoverflow.com/questions/683498/calling-javascript-from-a-html-form--}}
            {{--@submit.prevent="addList" --}}
            <button type="submit" class="md-btn md-raised m-b-sm w-xs indigo m-a-xs">추가</button>
            <button @click="cancelForm" class="md-btn md-raised m-b-sm w-xs green m-a-xs">취소</button>
        </div>
        </form>
        <hr>
        {{--의료비 사용내역--}}
        <div class="row bottom-xs">
            <div class="pTitle col-xs-2" style="display: inline">
                <i class="fa fa-dot-circle-o"></i><label>의료비 사용내역</label>
            </div>
            <div class="col-xs-10 row end-xs p-r-0">
                <button @click="addForm" class="md-btn md-raised m-b-sm w-xs blue m-a-xs">추가</button>
                <button class="md-btn md-raised m-b-sm w-xs blue m-a-xs">수정</button>
                <button class="md-btn md-raised m-b-sm w-xs red m-a-xs">삭제</button>
            </div>
        </div>
        <table id="example" cellspacing="0" width="100%"
               class="table table-striped table-bordered table-hover row-border p-b-md">
            <thead>
            <th style="width:100px">#</th>
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
                    {{Form::text('title', null, ['class'=>'md-input has-value','readonly', '', 'min-length'=>'5'])}}
                    <label>건수 </label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="md-form-group float-label">
                    {{Form::text('title', null, ['class'=>'md-input'])}}
                    <label>금액계 </label>
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
            <div class="row ">
                <div class="col-sm-6">
                    {!! Html::linkRoute('medicine.index','뒤로', array(), ['class'=>'md-btn md-raised m-b-sm btn-lg w-sm green'] ) !!}
                </div>

                <div class="col-sm-6">
                    <div class="end-xs">
                        <button type="submit" id="submit-all" class="md-btn md-raised m-b-sm btn-lg w-sm blue">저장
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">@example.com</span>
        </div>
    --}}

    {{--    <h1>@{{ message }}</h1>
        <button  @click="addForm" class="md-btn md-raised m-b-sm w-xs blue m-a-xs">추가!</button>--}}

@stop
@section('scripts')
    <script>
        new Vue({
            el: '#vuejs',
            data: {
                message: 'Greetings your Majesty!'

            },
            methods: {
                addForm: function () {
                    //var pp = $('#insertArea');//document.getElementById("insertArea");
                    TweenMax.to($('#insertArea'), 0.4, {delay: "0", height: "184"});
                    //TweenMax.to($('#insertArea'), 0.2, {delay: "0", scaleY: "1"});
                    //$('#tiDate').focus();
                },
                cancelForm: function () {
                    TweenMax.to($('#insertArea'), 0.2, {delay: "0", height: "0"});
                    //TweenMax.to($('#insertArea'), 0.2, {delay: "0", scaleY: "0"});
                },
                addList:function () {
                    $('#formMedicine').parsley().on('field:validated', function() {
                        var ok = $('.parsley-error').length === 0;
                        if(ok ===true) {
                            rowCnt++;
                            medicineListTable.row.add( [
                                rowCnt.toString(),
                                tiDate.value,
                                tiHsptName.value,
                                tiAmt.value
                            ] ).draw( false );
                            tiDate.value = '';
                            tiHsptName.value = '';
                            tiAmt.value = '';
                        }
                    })
                    .on('form:submit', function() {
                        return false; // Don't submit form for this demo
                    });


                }

            }
        });
    </script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>--}}

    <script type="text/javascript">
        var medicineListTable;
        var rowCnt=0;
        $(document).ready(function () {
            $('#formMedicine').parsley()
                .on('form:submit', function() {
                    alert('3');
                    return false; // Don't submit form for this demo
                });

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
/*            $(function () {
                $('#datetimepicker1').datetimepicker(
                    {
                        format:'YYYY년 MM월 DD일',
                        viewMode: 'days'
                    }
                );
            });*/

//            TweenMax.to($('#insertArea'), 0, {scaleY:"0", height:"0",  onComplete:timelineDone});
            function timelineDone() {
                //TweenMax.to(pp, 1, {delay:"3", scaleY:"1", height:"158"});
            }

            //TweenMax.to(pp, 1, {scaleX:"1",height:"158", opacity:"1"});

            $.extend(true, $.fn.dataTable.defaults, {
                "searching": false,
                "ordering": false
            });

             medicineListTable = $('#example').DataTable(
                {
                    "info": false,
                    "paging": false,
                    "createdRow": function (row, data, index) {
                        if (data[0].replace(/[\$,]/g, '') * 1 > 55) {
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
            $('#example tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
            });

            /*            $('#example tbody').on('click', 'tr', function () {
                            var data = table.row( this ).data();
                            alert( 'You clicked on '+data[0]+'\'s row' );
                        } );*/
        });
    </script>
@endsection



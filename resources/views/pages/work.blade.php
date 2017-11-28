@extends('main')
@section('title', '| 근태/출장')
@section('stylesheets')
    <link rel='stylesheet' href='/css/fullcalendar.css'/>
    <link rel='stylesheet' href='/css/toastr.min.css'/>

    <link rel='stylesheet' href='/assets/styles/work_fc.css'/>

@endsection

@section('content')
    <div class="container">
        <div class="row">

        </div>
        <div class="row">

            {{--스케쥴러--}}
            <div class="col-sm-8">
                <div id="pnDrag" class="hidden-md-down">
                    <div id='external-events' class="row end-xs">
                        <div class="col-xs-6 well well-sm">
                            <div class="row">
                                <small class="col-xs-12 text-left">* 달력으로 Drag하실수 있습니다.</small>
                                <div class='col-xs fc-event biztrip '
                                     data-event='{"title":"출장", "allDay":true, "color":"#E34342","textColor":"white","stick": true}'
                                     style='background-color:#E34342;border-color: #A02929; color:#ffffff'><i class=" fa fa-fighter-jet"></i> 출장
                                </div>
                                <div class='col-xs fc-event work '
                                     data-event='{"title":"근태",  "color":"#6A9FCF","textColor":"white"}'
                                     style='background-color:#6A9FCF; color:#ffffff'><i class=" fa fa-file-word-o"></i>  근태
                                </div>
                                <div class='col-xs fc-event vocation '
                                     data-event='{"title":"휴가",  "color":"#74BB5B","textColor":"white"}'
                                     style='background-color:#74BB5B; color:#ffffff'><i class="fa fa fa-home"></i> 휴가
                                </div>
                                <div class='col-xs fc-event edu '
                                     data-event='{"title":"교육", "color":"#804040","textColor":"white", "borderColor":"#5A3500"}'
                                     style='background-color:#804040; border-color: #5A3500; color:#fff'><i class=" fa fa-mortar-board"></i> 교육
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div id='calendar' style="padding-bottom: 50px; margin-bottom: 50px"></div>

            </div>

            {{-- 휴가 쿼터 리스트--}}
            <div class="col-sm-4">
                <div class="box b-light b-a">
                    <div class="box-header dker">
                        <h3>팀원 교육/출장/휴가 현황</h3>
                    </div>
                    <div class="box-body">
                        <p class="m-a-0">
                        <table id="tableR1" cellspacing="0" width="100%" class="table table-bordered row-border table-responsive">
                            <thead>
                            <th>성명</th>
                            <th>구분</th>
                            <th>기간</th>
                            </thead>
                        </table>
                        </p>
                    </div>
                </div>

                <div class="box b-light b-a">
                    <div class="box-header dker">
                        <h3>휴가일수</h3>
                    </div>
                    <div class="box-body">
                        <p class="m-a-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam-a-0 m-b-smitudin egestas dui nec, fermentum diam. Vivamus vel tincidunt libero, vitae elementu</p>
                    </div>
                </div>

                <div class="box b-light b-a">
                    <div class="box-header dker">
                        <h3>당월 OT 통계</h3>
                    </div>
                    <div class="box-body">
                        <p class="m-a-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam-a-0 m-b-smitudin egestas dui nec, fermentum diam. Vivamus vel tincidunt libero, vitae elementu</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">근태신청</h4>
                </div>
                <div class="modal-body p-x-lg ">
                    <form class="row top-xs form-inline  work p-b-20 " style="padding-left: 12px">
                        <table id="example" cellspacing="0" width="100%" class="table table-bordered row-border table-responsive">
                            <thead>
                            <th style="min-width: 100px;">구분</th>
                            <th style="min-width: 160px; max-width:160px;">근태발생일</th>
                            <th style="min-width: 100px;">시작</th>
                            <th style="min-width: 100px;">종료</th>
                            <th>비고</th>
                            </thead>
                            <tbody>
                            <tr role="row" class="even">
                                <td>
                                    <div class="form-group form-inline ">
                                        <select class="form-control form-control-sm " id="selTitle">
                                            <option value="근태">근태</option>
                                            <option value="휴가">휴가</option>
                                            <option value="출장">출장</option>
                                            <option value="지각">지각</option>
                                            <option value="휴.야간근무">휴.야간근무</option>
                                            <option value="긴급출동">긴급출동</option>
                                            <option value="교대근무">교대근무</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group form-inline ">
                                        <div class="input-group date">
                                            <input id="startdt" type="text" readonly
                                                   class="form-control dateComp has-value">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-group form-inline ">
                                            <select class="form-control form-control-sm" id="startTime"></select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group form-inline">
                                        <select class="form-control form-control-sm" id="endTime"></select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group form-inline form-group-lg">
                                    <textarea class="form-control m-t-0" rows="3" id="comment"
                                              style="min-width: 210px; max-width: 210px; min-height:80px;"></textarea>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                    <div class="well m-t-md">
                        <h7 class="text-info p-l-20">Help</h7>
                        <ol type="1" class="p-l-md">
                            <li>교대근무: 18시(또는 09시)~익일 09시까지 계획적으로 이루어지는 근무형태 (망관리실,전력운영실 등)</li>
                            <li>휴야간근무: 09시~익일 06시(또는 09시)까지 이루어지는 휴야간근무(휴일근무,일반야간근무)</li>
                            <li>긴급출동: 18시~익일 06시(또는 09시)까지 이루어지는 야간근무(야간비상대기후 출동)</li>
                        </ol>

                        <h7 class="text-info p-l-20">근무수당 및 숙휴 기준</h7>
                        <ol class="m-b-0 p-l-md" type="1">
                            <li>고정초근수당 지급 : 06~09시 / 18~22시</li>
                            <li>고정초근수당 지급 : 06~09시 / 18~22시</li>
                        </ol>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnSave" @click="newWorkSave" type="button" class="btn btn-primary">신청</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')


    <script type="text/javascript">
        /* $(document).ready(function () {
             var s = $('.portlet.portlet-bordered');
             s.attr('style', 'background-color:#f0f0f0');
         });*/
    </script>

    <script>

        $(document).ready(function () {


            var table = $('#tableR1').DataTable(
                {
                    "paging": false,
                    "info": false,
                    "ordering": false,
                    "search":false
                }
            );

            dtOptionStart = $('#startTime');
            dtOptionend = $('#endTime');

            dtOptionStart.empty();
            dtOptionend.empty();
            for (var i = 1; i < 24; i++) {
                var option = $("<option>" + i + "시</option>");
                dtOptionStart.append(option);
            }

            for (var i = 1; i < 24; i++) {
                var option = $("<option>" + i + "시</option>");
                dtOptionend.append(option);
                //dtOption.options[i] = new Option(i,i);  //SELECTBOX의 옵션을 length 만큼 생성시켜준다.
            }


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
        });


        vue = new Vue({
            el: '#myModal',
            data: {
                sltdData: null
            },
            methods: {
                newWorkSave: function () {
                    var sTitle = $('#selTitle').val();
                    var action = $('#myModal').data('action');

                    if(sTitle === null) {
                        alert('근태 구분을 선택하세요');
                        return;
                    }


                    if(action === 'I') {
/*                        var event = {
                            title: $('#selTitle').val(),//'new Event',
                            start: $('#startdt').val(),//moment().startOf('month')
                            comment:$('#comment').val();
                        };*/
                        var event = {};
                    }
                    else { // 'M'
                        event = $('#myModal').data('event');
                    }
                    event.title= $('#selTitle').val();//'new Event',
                    event.start = $('#startdt').val();//moment().startOf('month')
                    event.comment = $('#comment').val();//moment().startOf('month')
                    event.textColor = "white";
                    if ((",조퇴,지각").indexOf(sTitle) > 0) {
                        event.color = "#74BB5B"
                    }else if(sTitle === '출장') {
                        event.color = "#E34342"
                    }
                    else if(sTitle === '근태') {
                        event.color = "#6A9FCF"
                    }
                    else if(sTitle === '휴가') {
                        event.color = "#74BB5B"
                    }
                    else if(sTitle === '교육') {
                        event.color = "#804040"
                    }


                    if(action === 'I') {
                        $("#calendar").fullCalendar("renderEvent", event, true);
                    }
                    else {
                        $('#calendar').fullCalendar('updateEvent', event);
                    }
                    $('#myModal').modal('hide');
                },
                newWorkCancel: function () {
                    $('#myModal').modal('hide');
                }

            }
        });
    </script>
    <script src='/js/fullcalendar.js'></script>
    <script src="{{asset('/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/js/fc.js')}}"></script>
    <script src='/js/toastr.min.js'></script>
@endsection

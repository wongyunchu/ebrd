@extends('main')
@section('title', '| 근태/출장')
@section('stylesheets')
    <link rel='stylesheet' href='/css/fullcalendar.css' />
    <link rel='stylesheet' href='/css/toastr.min.css' />

    <link rel='stylesheet' href='/assets/styles/work_fc.css' />

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

            </div>

            <div id="pnDrag" class="col-sm-1 panel">
                <div class="box light-blue-800 b-a b-grey">
                    <div class="box-header">
                        <h7>근태/휴가</h7>
                        {{----}}
                        <div class="box-tool">
                            <ul class="nav">

                                <li class="nav-item inline dropdown">
                                    <a class="nav-link" data-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons md-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-scale pull-right">
                                        <a class="dropdown-item" href="">Action</a>
                                        <a class="dropdown-item" href="">Another action</a>
                                        <a class="dropdown-item" href="">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item">Separated link</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class=" box-body white">
                        <div id='external-events'>
                            <div class='fc-event biztrip' data-event='{"title":"출장", "allDay":true, "color":"#E34342","textColor":"white","stick": true}' style='background-color:#E34342;border-color: #A02929; color:#ffffff'>출장</div>
                            <div class='fc-event work' data-event='{"title":"근태",  "color":"#6A9FCF","textColor":"white"}' style='background-color:#6A9FCF; color:#ffffff'>근태</div>
                            <div class='fc-event vocation' data-event='{"title":"휴가",  "color":"#74BB5B","textColor":"white"}' style='background-color:#74BB5B; color:#ffffff'>휴가</div>
                            <div class='fc-event edu' data-event='{"title":"교육", "color":"#804040","textColor":"white", "borderColor":"#5A3500"}' style='background-color:#804040; border-color: #5A3500; color:#fff'>교육</div>
                        </div>
                    </div>
                    <div class="box-footer light-blue-50">
                        <small>위 box를 달력으로 Drag하실수 있습니다.</small>
                    </div>
                </div>
               {{-- <div class="panel-heading">
                    <h5 class="panel-title">근태 / 휴가</h5>
                </div>
                <div class="panel-body">
                    <div id='external-events'>
                        <div class='fc-event biztrip' data-event='{"title":"출장", "allDay":true, "color":"#E34342","textColor":"white","stick": true}' style='background-color:#E34342;border-color: #A02929; color:#ffffff'>출장</div>
                        <div class='fc-event work' data-event='{"title":"근태",  "color":"#6A9FCF","textColor":"white"}' style='background-color:#6A9FCF; color:#ffffff'>근태</div>
                        <div class='fc-event vocation' data-event='{"title":"휴가",  "color":"#74BB5B","textColor":"white"}' style='background-color:#74BB5B; color:#ffffff'>휴가</div>
                        <div class='fc-event edu' data-event='{"title":"교육", "color":"#FFFD84","textColor":"#5A3500", "borderColor":"#F0EA1F"}' style='background-color:#FFFD87; border-color: #F0EA1F; color:#5A3500'>교육</div>
                    </div>
                </div>--}}
            </div>
{{--            <div class="form-group">
                <div class="input-group date">
                    <input id="usedate" type="text" class="form-control dateComp" readonly value="{{@date("Y-m-d")}}"/>
                    <span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
                </div>
            </div>--}}




            {{--스케쥴러--}}
            <div class="col-sm-10">
                <div id='calendar' style="padding-bottom: 50px; margin-bottom: 50px"></div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">근태신청</h4>
                </div>
                <div class="modal-body p-x-lg">
                    <div class="row work">
                        <div class="box-color grey-300 pos-rlt " style="width: 110px;">
                            <div class="box-body text-center">구분</div>
                        </div>

                        <div class="box-color grey-300 pos-rlt" style="width: 230px;">
                            <div class="box-body text-center">근태발생일</div>
                        </div>

                        <div class="box-color grey-300 pos-rlt" style="width: 66px;">
                            <div class="box-body">시작</div>
                        </div>

                        <div class="box-color grey-300 pos-rlt" style="width: 66px;">
                            <div class="box-body">종료</div>
                        </div>

                        <div class="box-color grey-300 pos-rlt" style="width: 220px;">
                            <div class="box-body text-center">비고</div>
                        </div>
                    </div>

                    <form class="row top-xs form-inline  work p-b-20 " style="padding-left: 12px">
                        <div class="form-group">
                            <select class="form-control form-control form-control-sm " id="selTitle">
                                <option>조퇴</option>
                                <option>지각</option>
                                <option>휴.야간근무</option>
                                <option>긴급출동</option>
                                <option>교대근무</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="input-group date">
                                <input id="startdt" type="text"  readonly class="form-control dateComp has-value">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <select class="form-control form-control form-control-sm " id="startTime"></select>
                            </div>
                        </div>

                        <div class="form-group">
                            <select class="form-control form-control form-control-sm " id="endTime"></select>
                        </div>

                        <div class="form-group form-group-lg">
                            <textarea class="form-control m-t-0" rows="3" id="comment" style="min-width: 210px; max-width: 210px; min-height:80px;"></textarea>
                        </div>

                    </form>

                    <div class="well m-t-md">
                        <h7 class="text-info p-l-20">Help</h7>
                        <ol type="1">
                            <li>교대근무: 18시(또는 09시)~익일 09시까지 계획적으로 이루어지는 근무형태 (망관리실,전력운영실 등)</li>
                            <li>휴야간근무: 09시~익일 06시(또는 09시)까지 이루어지는 휴야간근무(휴일근무,일반야간근무)</li>
                            <li>긴급출동: 18시~익일 06시(또는 09시)까지 이루어지는 야간근무(야간비상대기후 출동)</li>
                        </ol>

                        <h7 class="text-info p-l-20">근무수당 및 숙휴 기준</h7>
                        <ol class="m-b-0" type="1">
                            <li>고정초근수당 지급 : 06~09시 / 18 ~ 22시</li>
                            <li>고정초근수당 지급 : 06~09시 / 18 ~ 22시</li>
                        </ol>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click="newWorkSave" type="button" class="btn btn-primary">신청</button>
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

            dtOptionStart = $('#startTime');
            dtOptionend = $('#endTime');

            dtOptionStart.empty();
            dtOptionend.empty();
            for(var i=1; i<24; i++) {
                var option = $("<option>"+i+"시</option>");
                dtOptionStart.append(option);
            }

            for(var i=1; i<24; i++) {
                var option = $("<option>"+i+"시</option>");
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
                    var event = {
                        title : $('#selTitle').val(),//'new Event',
                        start: $('#startdt').val()//moment().startOf('month')
                    };
                    event.textColor = "white";
                    if( (",조퇴,지각").indexOf(sTitle) > 0) {
                        event.color="#74BB5B"
                        //"color":"#74BB5B","textColor":"white"
                    }

                    $("#calendar").fullCalendar("renderEvent", event, true);
                    $('#myModal').modal('hide');
                },
                newWorkCancel:function() {
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

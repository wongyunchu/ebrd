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
                            <div class='fc-event edu' data-event='{"title":"교육", "color":"#FFFD84","textColor":"#5A3500", "borderColor":"#F0EA1F"}' style='background-color:#FFFD87; border-color: #F0EA1F; color:#5A3500'>교육</div>
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

            {{--스케쥴러--}}
            <div class="col-sm-10">
                <div id='calendar' style="padding-bottom: 50px; margin-bottom: 50px"></div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src='/js/fullcalendar.js'></script>
    <script src="{{asset('/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/js/fc.js')}}"></script>
    <script src='/js/toastr.min.js'></script>
    <script type="text/javascript">
       /* $(document).ready(function () {
            var s = $('.portlet.portlet-bordered');
            s.attr('style', 'background-color:#f0f0f0');
        });*/
    </script>
@endsection

<div id="content" class="app-content" class="app-content box-shadow-z0" role="main">
    <div ui-view class="app-body" id="view">
        <div class="padding">
            <div class="row">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet portlet-bordered">
                    <div class="portlet-title">
                        {{--패널이름--}}
                        <div class="caption caption-red">
                            <i class="glyphicon glyphicon-cog"></i>
                            <span class="caption-subject text-uppercase"> @yield('title')</span>
                            <span class="caption-helper">@yield('title_sub')</span>
                        </div>

                        {{--패널 액션--}}
                        <div class="actions">
                            <a href="javascript:;" class="btn btn-red btn-circle active">
                                <i class="glyphicon glyphicon-paperclip"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-red btn-circle">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-red btn-circle">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-red btn-circle">
                                <i class="glyphicon glyphicon-search"></i>
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
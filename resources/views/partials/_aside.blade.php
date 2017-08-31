<!-- ############ LAYOUT START-->
<!-- aside -->
<div id="aside" class="app-aside modal fade nav-dropdown">
    <!-- fluid app aside -->
    <div class="left navside dark dk" layout="column">
        <div class="navbar no-radius">
            <!-- brand -->
            <a class="navbar-brand">
                <div ui-include="'../assets/images/logo.svg'"></div>
                <img src="../assets/images/logo.png" alt="." class="hide">
                <span class="hidden-folded inline">E-hr</span>
            </a>
            <!-- / brand -->
        </div>
        <div flex class="hide-scroll">
            <nav class="scroll nav-light">
                <ul class="nav" ui-nav>
                    <li class="nav-header hidden-folded">
                        <small class="text-success">인사/급여</small>
                    </li>
                    {{--<li>--}}
                        {{--<a href="dashboard.html">--}}
                            {{--<span class="nav-icon">--}}
                                {{--<i class="material-icons">&#xe3fc;<span ui-include="'../assets/images/i_0.svg'"></span></i>--}}
                            {{--</span>--}}
                            {{--<span class="nav-text">Dashboard</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li >
                        <a>
                            {{--Menu명 앱스--}}
                            <span class="nav-caret">
                            <i class="fa fa-caret-down"></i>
                          </span>
                            <span class="nav-label">
                            <b class="label rounded label-sm primary">5</b>
                          </span>
                            <span class="nav-icon">
                                <i class="material-icons">&#xe5c3;<span ui-include="'../assets/images/i_1.svg'"></span></i>
                            </span>
                            <span class="nav-text">개인정보</span>
                        </a>
                        {{--sub 메뉴--}}
                        <ul class="nav-sub ">
                            <li><a href="inbox.html"><span class="nav-text">개인정보</span></a></li>
                            <li><a href="inbox.html"><span class="nav-text">급여정보</span></a></li>
                            <li><a href="inbox.html"><span class="nav-text">연말정산</span></a></li>
                            <li><a href="inbox.html"><span class="nav-text">건강보험 연말정산</span></a></li>
                            <li><a href="inbox.html"><span class="nav-text">급여/복리후생</span></a></li>
                            <li><a href="inbox.html"><span class="nav-text">개인정보</span></a></li>
                            <li><a href="inbox.html"><span class="nav-text">개인정보</span></a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe23b;<span ui-include="'../assets/images/i_0.svg'"></span></i>
                            </span>
                            <span class="nav-text">급여정보</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe23b;<span ui-include="'../assets/images/i_0.svg'"></span></i>
                            </span>
                            <span class="nav-text">연말정산</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe23b;<span ui-include="'../assets/images/i_0.svg'"></span></i>
                            </span>
                            <span class="nav-text">건강보험 연말정산</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe23b;<span ui-include="'../assets/images/i_0.svg'"></span></i>
                            </span>
                            <span class="nav-text">급여/복리후생/IRP</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe23b;<span ui-include="'../assets/images/i_0.svg'"></span></i>
                            </span>
                            <span class="nav-text">평가결과</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe23b;<span ui-include="'../assets/images/i_0.svg'"></span></i>
                            </span>
                            <span class="nav-text">근로계약/동의서</span>
                        </a>
                    </li>


                    <li class="nav-header hidden-folded">
                        <small class="text-muted">근태/교육</small>
                    </li>
                    <li>
                        <a href="dashboard.html">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe23b;<span ui-include="'../assets/images/i_0.svg'"></span></i>
                            </span>
                            <span class="nav-text">휴가/휴직제도안내</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe23b;<span ui-include="'../assets/images/i_0.svg'"></span></i>
                            </span>
                            <span class="nav-text">근무/휴가</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.html">
                            <span class="nav-icon">
                                <i class="material-icons">&#xe23b;<span ui-include="'../assets/images/i_0.svg'"></span></i>
                            </span>
                            <span class="nav-text">출장</span>
                        </a>
                    </li>






                    <li class="nav-header hidden-folded">
                        <small class="text-muted">복리후생</small>
                    </li>

                    <li class="nav-header hidden-folded">
                        <small class="text-muted">HR Info</small>
                    </li>



















                    <li class="nav-header hidden-folded">
                        <small class="text-muted">Help</small>
                    </li>
                    <li class="hidden-folded">
                        <a href="docs.html">
                            <span class="nav-text">Documents</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div flex-no-shrink class="b-t">
            <div class="nav-fold">
                <a href="profile.html">
            <span class="pull-left">
            <img src="../assets/images/a0.jpg" alt="..." class="w-40 img-circle">
            </span>
                    <span class="clear hidden-folded p-x">
            <span class="block _500">Jean Reyes</span>
            <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>online</small>
            </span>
                </a>
            </div>
        </div>
    </div>
</div>
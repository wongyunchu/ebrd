<div id="aside" class="app-aside modal fade nav-dropdown">

    <div class="left navside dark box-shadow-z0" layout="column">
        <div class="navbar">
            <!-- brand -->
            <a href="{{route('dashboard')}}" class="navbar-brand">
                <img src="../assets/images/logo.png" alt="." class="">
                <span class="hidden-folded inline v-m">
                    E-HR
                    <span class="text-xs text-muted _300 block m-t-xs tagline">
                        Common-IT - Dasom
                    </span>
	            </span>
            </a>
            <!-- / brand -->
        </div>
        {{--User profile--}}
        <div flex-no-shrink="">
            <div class="nav-fold">
                <a href="{{route('profile')}}" ui-sref="app.page.profile">
                    <span class="pull-right m-v-sm hidden-folded">
                      <b class="label warn">9</b>
                    </span>
                    <span class="pull-left">
                      <img src="../assets/images/a1.jpg" alt="..." class="w-40 img-circle">
                    </span>
                    <span class="clear hidden-folded p-x">
                    <span class="block _500">홍길동</span>
                      <small class="block text-muted">인사관리, 1팀</small>
                    </span>
                </a>
            </div>
        </div>
        <div flex class="hide-scroll">
            <nav class="scroll nav-border b-primary" flex="">
                <ul class="nav leftMenu" ui-nav>
                <li class="nav-header hidden-folded">
                    <span class="text-xs text-muted">Header</span>
                </li>

                {{--인사급여--}}
                <li class="active">
                    <a>
                      <span class="nav-caret text-muted">
                        <i class="fa fa-caret-down"></i>
                      </span>
                        <i class="nav-label"><b class="label label-sm no-bg">6</b></i>
                        <span class="nav-icon"><i class="fa fa-user-secret"></i></span>
                        <span class="nav-text">인사급여</span>
                    </a>
                    <ul class="nav-sub">
                        <li><a href="/posts"><span class="nav-text">개인정보</span></a></li>
                        <li><a href="/medicals"><span class="nav-text">급여정보</span></a></li>
                        <li><a><span class="nav-text">연말정산</span></a></li>
                        <li><a><span class="nav-text">건강보험 연말정산</span></a></li>
                        <li><a><span class="nav-text">평가결과</span></a></li>
                        <li><a><span class="nav-text">근로계약/동의서</span></a></li>

                        <li>
                            <a>
        	                    <span class="nav-caret text-muted"><i class="fa fa-caret-down"></i></span>
                                <span class="nav-text">Action with sub</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a><span class="nav-text">Action</span></a>
                                </li>
                                <li>
                                <a>
                                    <span class="nav-caret text-muted">
                                          <i class="fa fa-caret-down"></i>
                                    </span>
                                    <span class="nav-text">Another</span>
                                </a>
                                    <ul class="nav-sub">
                                        <li><a><span class="nav-text">Action</span></a></li>
                                        <li><a><span class="nav-text">Another</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                {{--근태교육--}}
                <li>
                    <a>
                        <span class="nav-caret text-muted"><i class="fa fa-caret-down"></i></span>
                        <span class="nav-icon"><i class="fa fa-id-badge"></i></span>
                        <span class="nav-text">근태교육</span>
                    </a>
                    <ul class="nav-sub">
                        <li><a><span class="nav-text">휴가/휴직제도</span></a></li>
                        <li><a><span class="nav-text">근무/휴가</span></a></li>
                        <li><a><span class="nav-text">출장</span></a></li>
                        <li><a><span class="nav-text">구성원포상</span></a></li>
                        <li><a><span class="nav-text">상담원근무관리</span></a></li>
                        <li><a><span class="nav-text">근로계약/모성보호</span></a></li>
                    </ul>
                </li>

                {{--복리후생--}}
                <li>
                    <a>
                        <span class="nav-caret text-muted"><i class="fa fa-caret-down"></i></span>
                        <span class="nav-icon"><i class="fa fa-briefcase"></i></span>
                        <span class="nav-text">복리후생</span>
                    </a>
                    <ul class="nav-sub">
                        <li><a><span class="nav-text">복리후생제도안내</span></a></li>
                        <li><a><span class="nav-text">경조금</span></a></li>
                        <li><a><span class="nav-text">제증명서</span></a></li>
                        <li><a><span class="nav-text">의료비</span></a></li>
                        <li><a><span class="nav-text">Top Bank</span></a></li>
                        <li><a><span class="nav-text">명함신청</span></a></li>
                    </ul>
                </li>

                {{--HR Info--}}
                <li>
                    <a>
                        <span class="nav-caret text-muted"><i class="fa fa-caret-down"></i></span>
                        <i class="nav-label hidden-folded"><b class="label label-xs no-bg b-a">NEW</b></i>

                        <span class="nav-icon"><i class="fa fa-book"></i></span>
                        <span class="nav-text">HR Info</span>
                    </a>
                    <ul class="nav-sub" >

                        <li><a><span class="nav-text">구성원 인사기록</span></a></li>
                        <li><a><span class="nav-text">구성원 근태</span></a></li>
                        <li><a><span class="nav-text">구성원 평가결과</span></a></li>
                        <li><a><span class="nav-text">파견/계약직현황</span></a></li>
                        <li><a><span class="nav-text">공지사항 관리</span></a></li>
                        <li><a><span class="nav-text">전사인사발령 공지</span></a></li>
                        <li><a><span class="nav-text">결재함</span></a></li>
                    </ul>
                </li>
            </ul>
            </nav>
        </div>

        <div flex-no-shrink="">
            <nav ui-nav="">
                <ul class="nav">
                    <li>
                        <div class="b-b b m-v-sm"></div>
                    </li>

                    <li class="no-bg">
                        <a >
                        <span class="nav-icon">
                          <i class="material-icons"></i>
                        </span>
                            <span class="nav-text">결재함</span>
                        </a>
                    </li>
                    <li>
                        <div class="b-b b "></div>
                    </li>
                    @guest
                    @else
                    <li class="no-bg">
                        <a onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            <span class="nav-icon"><i class="material-icons"></i></span>
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>
                     @endguest
                </ul>
            </nav>
        </div>
    </div>


</div>
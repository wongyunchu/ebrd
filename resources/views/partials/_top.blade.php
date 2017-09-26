<div class="app-header white box-shadow">
    <div class="navbar">
        <!-- Open side - Naviation on mobile -->
        <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
            <i class="material-icons">&#xe5d2;</i>
        </a>
        <!-- / -->
        <!-- Page title - Bind to $state's title -->
        <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>


        <!-- navbar right -->
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link" href data-toggle="dropdown">
                    <i class="material-icons">&#xe7f5;</i>
                    <span class="label label-sm up warn">3</span>
                </a>
                <div ui-include="'/views/blocks/dropdown.notification.html'"></div>
            </li>

            {{--유저 팝업 --}}
            <li class="nav-item dropdown">
                <a class="nav-link clear" href data-toggle="dropdown">
                    @auth
                        {{Auth::user()->email}}
                    @endauth
                    <span class="avatar w-32">
                    <img src="/assets/images/a0.jpg" alt="...">
                    <i class="on b-white bottom"></i>
                    </span>
                </a>
                <div class="dropdown-menu pull-right dropdown-menu-scale">
                    <a class="dropdown-item" ui-sref="app.inbox.list">
                        <span>Inbox</span>
                        <span class="label warn m-l-xs">3</span>
                    </a>
                    <a class="dropdown-item" ui-sref="app.page.profile">
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" ui-sref="app.page.setting">
                        <span>Settings</span>
                        <span class="label primary m-l-xs">3/9</span>
                    </a>

                    @guest
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" ui-sref="app.docs">
                            Need help?
                        </a>
                        <a class="dropdown-item" href="{{route('login')}}">Sign In</a>
                        @else
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Sign out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                       @endguest
                </div>
                {{--
                <div ui-include="'/views/blocks/dropdown.user.html'"></div>--}}
            </li>


            <li class="nav-item hidden-md-up">
                <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                    <i class="material-icons">&#xe5d4;</i>
                </a>
            </li>
        </ul>
        <!-- / navbar right -->
        <!-- navbar collapse -->
        <div class="collapse navbar-toggleable-sm" id="collapse" style="padding-left: 200px">
            <div ui-include="'../views/blocks/navbar.form.right.html'"></div>
            <!-- link and dropdown -->
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href data-toggle="dropdown">
                        <i class="fa fa-fw fa-plus text-muted"></i>
                        <span>New</span>
                    </a>
                    <div ui-include="'../views/blocks/dropdown.new.html'"></div>
                </li>
            </ul>
            <!-- / -->
        </div>


        <!-- / navbar collapse -->
    </div>
</div>
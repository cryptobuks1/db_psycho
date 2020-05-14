<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/admin/server" class="site_title"><i class="fa fa-paw"></i> <span>
                @if(isset($texts->firstWhere('caption_name', 'AdminPanel')->caption_translation))
                    {{$texts->firstWhere('caption_name', 'AdminPanel')->caption_translation}}
                @endif
                </span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu prile quick info -->

        {{--<div class="profile">--}}
            {{--<div class="profile_pic">--}}
                {{--<img src="/adminCss/images/img.jpg" alt="..." class="img-circle profile_img">--}}
            {{--</div>--}}
            {{--<div class="profile_info">--}}
                {{--<span>Welcome,</span>--}}
                {{--<h2>{{$consumer->consumer_name}}</h2>--}}
            {{--</div>--}}
        {{--</div>--}}

        <!-- /menu prile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i>
                            @if(isset($texts->firstWhere('caption_name', 'UserProfile')->caption_translation))
                            {{ $texts->firstWhere('caption_name', 'UserProfile')->caption_translation }}
                            @endif
                            <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li>
                                <a href="{{route('admin-user-profile')}}">
                                    @if(isset($texts->firstWhere('caption_name', 'UserData')->caption_translation))
                                    {{ $texts->firstWhere('caption_name', 'UserData')->caption_translation }}
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </li>

                    @if($consumer->IsAdmin == 1 )
                        <li><a><i class="fa fa-desktop"></i>
                                @if(isset($texts->firstWhere('caption_name', 'AdministeringDB')->caption_translation))
                                {{ $texts->firstWhere('caption_name', 'AdministeringDB')->caption_translation }}
                                @endif
                                <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li><a href="{{route('admin-db')}}">
                                        @if(isset($texts->firstWhere('caption_name', 'DB')->caption_translation))
                                        {{ $texts->firstWhere('caption_name', 'DB')->caption_translation }}
                                        @endif

                                    </a></li>
                                <li><a href="{{route('admin-country-region-index')}}">
                                        @if(isset($texts->firstWhere('caption_name', 'CountryAndRegion')->caption_translation))
                                        {{ $texts->firstWhere('caption_name', 'CountryAndRegion')->caption_translation }}
                                        @endif
                                    </a></li>
                                <li><a href="{{route('admin-accesses')}}">
                                        @if(isset($texts->firstWhere('caption_name', 'Accesses')->caption_translation))
                                        {{ $texts->firstWhere('caption_name', 'Accesses')->caption_translation }}
                                        @endif
                                    </a></li>


                                <li><a>Languages{{--{{ $texts->firstWhere('caption_name', 'AdministeringDB')->caption_translation }}--}}<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li>
                                            <a href="{{route('admin-lang')}}">
                                                @if(isset($texts->firstWhere('caption_name', 'languageName')->caption_translation))
                                                {{ $texts->firstWhere('caption_name', 'languageName')->caption_translation }}
                                                @endif
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('admin-directory-caption')}}">
                                                @if(isset($texts->firstWhere('caption_name', 'CaptionList')->caption_translation))
                                                {{ $texts->firstWhere('caption_name', 'CaptionList')->caption_translation }}
                                                @endif
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('admin-caption')}}">
                                                @if(isset($texts->firstWhere('caption_name', 'CaptionCode')->caption_translation))
                                                {{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}
                                                @endif
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <li><a><i class="fa fa-edit"></i>
                            @if(isset($texts->firstWhere('caption_name', 'Report')->caption_translation))
                            {{ $texts->firstWhere('caption_name', 'Report')->caption_translation }}
                            @endif
                            <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{route('admin-company-report-index')}}">
                                    @if(isset($texts->firstWhere('caption_name', 'ReportOrganizations')->caption_translation))
                                    {{ $texts->firstWhere('caption_name', 'ReportOrganizations')->caption_translation }}
                                    @endif

                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <div class="menuAdminLang">
                <a href="{{ route('change_lang', ['lang' => 'en']) }}">EN</a>
                <a href="{{ route('change_lang', ['lang' => 'ru']) }}">RU</a>
            </div>

            <ul class="nav navbar-nav navbar-right">

                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        {{--<img src="/adminCss/images/img.jpg" alt="">--}}{{$consumer->consumer_name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        {{--<li><a href="javascript:;"> Profile</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:;">--}}
                                {{--<span class="badge bg-red pull-right">50%</span>--}}
                                {{--<span>Settings</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:;">Help</a>--}}
                        {{--</li>--}}
                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>

                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
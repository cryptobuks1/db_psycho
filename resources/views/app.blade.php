<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    todo Адаптив--}}
    <title>Dashboard</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    <link href="/adminCss/css/bootstrap.min.css" rel="stylesheet">

    {{--<link href="../../node_modules/jquery-resizable/resizable.css" rel="stylesheet">--}}
    <link href="/adminCss/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="/adminCss/css/animate.min.css" rel="stylesheet">
    <link href="/adminCss/css/custom.css" rel="stylesheet">
    <link href="/adminCss/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="/adminCss/css/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="/adminCss/css/custom.css" rel="stylesheet">
    <script src="/adminCss/js/jquery.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
@if(config('app.VueBlade'))
    <div id="app">
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/custom-vue.js"></script>


@endif
@if(!config('app.VueBlade'))

    <div class="container body">
        <div class="main_container">

        @include('auth.admin.layouts.header')


        {{--------------------------------LEFT MENU--------------------------------------}}
        {{--<div class="col-md-3 left_col">--}}
        {{--<div class="left_col scroll-view">--}}
        {{--<div class="navbar nav_title" style="border: 0;">--}}
        {{--<a href="/admin/server" class="site_title"><i class="fa fa-paw"></i> <span> {{$texts->firstWhere('caption_name', 'AdminPanel')->caption_translation}} </span></a>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--<!-- menu prile quick info -->--}}

        {{--<div class="profile">--}}
        {{--<div class="profile_pic">--}}
        {{--<img src="/adminCss/images/img.jpg" alt="..." class="img-circle profile_img">--}}
        {{--</div>--}}
        {{--<div class="profile_info">--}}
        {{--<span>Welcome,</span>--}}
        {{--<h2>{{$consumer->consumer_name}}</h2>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<!-- /menu prile quick info -->--}}

        {{--<br/>--}}

        {{--<!-- sidebar menu -->--}}
        {{--<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">--}}

        {{--<div class="menu_section">--}}
        {{--<h3>General</h3>--}}
        {{--<ul class="nav side-menu">--}}
        {{--<li><a><i class="fa fa-home"></i>{{ $texts->firstWhere('caption_name', 'UserProfile')->caption_translation }}<span class="fa fa-chevron-down"></span></a>--}}
        {{--<ul class="nav child_menu" style="display: none">--}}
        {{--<li>--}}
        {{--<a href="{{route('admin-user-profile')}}">{{ $texts->firstWhere('caption_name', 'UserData')->caption_translation }}</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}

        {{--@if($consumer->IsAdmin == 1 )--}}
        {{--<li><a><i class="fa fa-desktop"></i>{{ $texts->firstWhere('caption_name', 'AdministeringDB')->caption_translation }}<span class="fa fa-chevron-down"></span></a>--}}
        {{--<ul class="nav child_menu" style="display: none">--}}
        {{--<li><a href="{{route('admin-db')}}">{{ $texts->firstWhere('caption_name', 'DB')->caption_translation }}</a></li>--}}
        {{--<li><a href="{{route('admin-country-region-index')}}">{{ $texts->firstWhere('caption_name', 'CountryAndRegion')->caption_translation }}</a></li>--}}
        {{--<li><a href="{{route('admin-accesses')}}">{{ $texts->firstWhere('caption_name', 'Accesses')->caption_translation }}</a></li>--}}


        {{--<li><a>Languages{{ $texts->firstWhere('caption_name', 'AdministeringDB')->caption_translation }}<span class="fa fa-chevron-down"></span></a>--}}
        {{--<ul class="nav child_menu" style="display: none">--}}
        {{--<li>--}}
        {{--<a href="{{route('admin-lang')}}">--}}
        {{--{{ $texts->firstWhere('caption_name', 'languageName')->caption_translation }}--}}
        {{--</a>--}}
        {{--</li>--}}

        {{--<li>--}}
        {{--<a href="{{route('admin-directory-caption')}}">--}}
        {{--{{ $texts->firstWhere('caption_name', 'CaptionList')->caption_translation }}--}}
        {{--</a>--}}
        {{--</li>--}}

        {{--<li>--}}
        {{--<a href="{{route('admin-caption')}}">--}}
        {{--{{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@endif--}}

        {{--<li><a><i class="fa fa-edit"></i>{{ $texts->firstWhere('caption_name', 'Report')->caption_translation }}<span class="fa fa-chevron-down"></span></a>--}}
        {{--<ul class="nav child_menu" style="display: none">--}}
        {{--<li><a href="{{route('admin-company-report-index')}}">{{ $texts->firstWhere('caption_name', 'ReportOrganizations')->caption_translation }}</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--<!-- /sidebar menu -->--}}

        {{--<!-- /menu footer buttons -->--}}
        {{--<div class="sidebar-footer hidden-small">--}}
        {{--<a data-toggle="tooltip" data-placement="top" title="Settings">--}}
        {{--<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--<a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
        {{--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--<a data-toggle="tooltip" data-placement="top" title="Lock">--}}
        {{--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--<a data-toggle="tooltip" data-placement="top" title="Logout">--}}
        {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--<!-- /menu footer buttons -->--}}
        {{--</div>--}}
        {{--</div>--}}

        <!-- top navigation -->
        {{--<div class="top_nav">--}}

        {{--<div class="nav_menu">--}}
        {{--<nav class="" role="navigation">--}}
        {{--<div class="nav toggle">--}}
        {{--<a id="menu_toggle"><i class="fa fa-bars"></i></a>--}}
        {{--</div>--}}

        {{--<div class="menuAdminLang">--}}
        {{--<a href="{{ route('change_lang', ['lang' => 'en']) }}">EN</a>--}}
        {{--<a href="{{ route('change_lang', ['lang' => 'ru']) }}">RU</a>--}}
        {{--</div>--}}


        {{--<ul class="nav navbar-nav navbar-right">--}}


        {{--<li class="">--}}
        {{--<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"--}}
        {{--aria-expanded="false">--}}
        {{--<img src="/adminCss/images/img.jpg" alt="">{{$consumer->consumer_name}}--}}
        {{--<span class=" fa fa-angle-down"></span>--}}
        {{--</a>--}}
        {{--<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">--}}
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
        {{--<li><a href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}

        {{--</ul>--}}
        {{--</nav>--}}
        {{--</div>--}}

        {{--</div>--}}
        <!-- /top navigation -->
            {{--------------------------------END LEFT MENU----------------------------------}}




            {{-------------------------------- CONTENT----------------------------------}}

            <div class="container body">
                <div class="main_container">
                    <div class="right_col" role="main">
                        <div class="">
                            <div class="page-title">
                                <h1 style="text-align: center">{{$texts->firstWhere('caption_name', 'WelcomeAdminPanel')->caption_translation}}</h1>
                                <div class="title_left">
                                    <h3>
                                        Chart Js
                                        <small>
                                            Some examples to get you started
                                        </small>
                                    </h3>
                                </div>

                            </div>

                            <div class="menuAdminLang">
                                <a href="{{ route('change_lang', ['lang' => 'en']) }}">EN</a>
                                <a href="{{ route('change_lang', ['lang' => 'ru']) }}">RU</a>
                            </div>


                            <ul class="nav navbar-nav navbar-right">


                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                       aria-expanded="false">
                                        <img src="/adminCss/images/img.jpg" alt="">{{$consumer->consumer_name}}
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                        <li><a href="javascript:;"> Profile</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="badge bg-red pull-right">50%</span>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Help</a>
                                        </li>
                                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                            </nav>
                        </div>

                    </div>
                    <!-- /top navigation -->

                    <div class="container body">
                        <div class="main_container">
                            <div class="right_col" role="main">
                                <div class="">
                                    <div class="page-title">
                                        <h1 style="text-align: center">{{$texts->firstWhere('caption_name', 'WelcomeAdminPanel')->caption_translation}}</h1>
                                        <div class="title_left">
                                            <h3>
                                                Chart Js
                                                <small>
                                                    Some examples to get you started
                                                </small>
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="row">

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Line graph</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                        <li>
                                                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                                                        </li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <canvas id="canvas000"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Bar graph </h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <canvas id="canvas_bar"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        var randomScalingFactor = function () {
                            return Math.round(Math.random() * 100)
                        };



                        var barChartData = {
                            labels: ["January", "February", "March", "April", "May", "June", "July"],
                            datasets: [
                                {
                                    fillColor: "#26B99A", //rgba(220,220,220,0.5)
                                    strokeColor: "#26B99A", //rgba(220,220,220,0.8)
                                    highlightFill: "#36CAAB", //rgba(220,220,220,0.75)
                                    highlightStroke: "#36CAAB", //rgba(220,220,220,1)
                                    data: [51, 30, 40, 28, 92, 50, 45]
                                },
                                {
                                    fillColor: "#03586A", //rgba(151,187,205,0.5)
                                    strokeColor: "#03586A", //rgba(151,187,205,0.8)
                                    highlightFill: "#066477", //rgba(151,187,205,0.75)
                                    highlightStroke: "#066477", //rgba(151,187,205,1)
                                    data: [41, 56, 25, 48, 72, 34, 12]
                                }
                            ],
                        }

                        $(document).ready(function () {
                            new Chart($("#canvas_bar").get(0).getContext("2d")).Bar(barChartData, {
                                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                                responsive: true,
                                barDatasetSpacing: 6,
                                barValueSpacing: 5
                            });
                        });


                        var lineChartData = {
                            labels: ["January", "February", "March", "April", "May", "June", "July"],
                            datasets: [
                                {
                                    label: "My First dataset",
                                    fillColor: "rgba(38, 185, 154, 0.31)", //rgba(220,220,220,0.2)
                                    strokeColor: "rgba(38, 185, 154, 0.7)", //rgba(220,220,220,1)
                                    pointColor: "rgba(38, 185, 154, 0.7)", //rgba(220,220,220,1)
                                    pointStrokeColor: "#fff",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "rgba(220,220,220,1)",
                                    data: [31, 74, 6, 39, 20, 85, 7]
                                },
                                {
                                    label: "My Second dataset",
                                    fillColor: "rgba(3, 88, 106, 0.3)", //rgba(151,187,205,0.2)
                                    strokeColor: "rgba(3, 88, 106, 0.70)", //rgba(151,187,205,1)
                                    pointColor: "rgba(3, 88, 106, 0.70)", //rgba(151,187,205,1)
                                    pointStrokeColor: "#fff",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "rgba(151,187,205,1)",
                                    data: [82, 23, 66, 9, 99, 4, 2]
                                }
                            ]

                        };

                        $(document).ready(function () {
                            new Chart(document.getElementById("canvas000").getContext("2d")).Line(lineChartData, {
                                responsive: true,
                                tooltipFillColor: "rgba(51, 51, 51, 0.55)"
                            });
                        });

                        var sharePiePolorDoughnutData = [
                            {
                                value: 120,
                                color: "#455C73",
                                highlight: "#34495E",
                                label: "Dark Grey"
                            },
                            {
                                value: 50,
                                color: "#9B59B6",
                                highlight: "#B370CF",
                                label: "Purple Color"
                            },
                            {
                                value: 150,
                                color: "#BDC3C7",
                                highlight: "#CFD4D8",
                                label: "Gray Color"
                            },
                            {
                                value: 180,
                                color: "#26B99A",
                                highlight: "#36CAAB",
                                label: "Green Color"
                            },
                            {
                                value: 100,
                                color: "#3498DB",
                                highlight: "#49A9EA",
                                label: "Blue Color"
                            }

                        ];

                    </script>

                </div>

            </div>

            <div id="custom_notifications" class="custom-notifications dsp_none">
                <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
                </ul>
                <div class="clearfix"></div>
                <div id="notif-group" class="tabbed_notifications"></div>
            </div>

            <script src="/adminCss/js/bootstrap.min.js"></script>



        </div>

        <script src="/adminCss/js/custom.js"></script>
        <script type="text/javascript" src="/adminCss/js/flot/jquery.flot.js"></script>
        <script type="text/javascript" src="/adminCss/js/flot/jquery.flot.pie.js"></script>
        <script type="text/javascript" src="/adminCss/js/flot/jquery.flot.orderBars.js"></script>
        <script type="text/javascript" src="/adminCss/js/flot/jquery.flot.time.min.js"></script>
        <script type="text/javascript" src="/adminCss/js/flot/date.js"></script>
        <script type="text/javascript" src="/adminCss/js/flot/jquery.flot.spline.js"></script>
        <script type="text/javascript" src="/adminCss/js/flot/jquery.flot.stack.js"></script>
        <script type="text/javascript" src="/adminCss/js/flot/curvedLines.js"></script>
        <script type="text/javascript" src="/adminCss/js/flot/jquery.flot.resize.js"></script>
        <script>
            $(document).ready(function () {
                // [17, 74, 6, 39, 20, 85, 7]
                //[82, 23, 66, 9, 99, 6, 2]
                var data1 = [[gd(2012, 1, 1), 17], [gd(2012, 1, 2), 74], [gd(2012, 1, 3), 6], [gd(2012, 1, 4), 39], [gd(2012, 1, 5), 20], [gd(2012, 1, 6), 85], [gd(2012, 1, 7), 7]];

                var data2 = [[gd(2012, 1, 1), 82], [gd(2012, 1, 2), 23], [gd(2012, 1, 3), 66], [gd(2012, 1, 4), 9], [gd(2012, 1, 5), 119], [gd(2012, 1, 6), 6], [gd(2012, 1, 7), 9]];
                $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
                    data1, data2
                ], {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        verticalLines: true,
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: '#fff'
                    },
                    colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
                    xaxis: {
                        tickColor: "rgba(51, 51, 51, 0.06)",
                        mode: "time",
                        tickSize: [1, "day"],
                        //tickLength: 10,
                        axisLabel: "Date",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Verdana, Arial',
                        axisLabelPadding: 10
                        //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
                    },
                    yaxis: {
                        ticks: 8,
                        tickColor: "rgba(51, 51, 51, 0.06)",
                    },
                    tooltip: false
                });

                function gd(year, month, day) {
                    return new Date(year, month - 1, day).getTime();
                }
            });
        </script>

        <script type="text/javascript" src="/adminCss/js/maps/jquery-jvectormap-2.0.1.min.js"></script>
        <script type="text/javascript" src="/adminCss/js/maps/gdp-data.js"></script>
        <script type="text/javascript" src="/adminCss/js/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script type="text/javascript" src="/adminCss/js/maps/jquery-jvectormap-us-aea-en.js"></script>
        <script>
            $(function () {
                $('#world-map-gdp').vectorMap({
                    map: 'world_mill_en',
                    backgroundColor: 'transparent',
                    zoomOnScroll: false,
                    series: {
                        regions: [{
                            values: gdpData,
                            scale: ['#E6F2F0', '#149B7E'],
                            normalizeFunction: 'polynomial'
                        }]
                    },
                    onRegionTipShow: function (e, el, code) {
                        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                    }
                });
            });
        </script>
        <script src="/adminCss/js/skycons/skycons.js"></script>
        <script>
            var icons = new Skycons({
                    "color": "#73879C"
                }),
                list = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                ],
                i;

            for (i = list.length; i--;)
                icons.set(list[i], list[i]);

            icons.play();
        </script>

        <script>
            var doughnutData = [
                {
                    value: 30,
                    color: "#455C73"
                },
                {
                    value: 30,
                    color: "#9B59B6"
                },
                {
                    value: 60,
                    color: "#BDC3C7"
                },
                {
                    value: 100,
                    color: "#26B99A"
                },
                {
                    value: 120,
                    color: "#3498DB"
                }
            ];
        </script>
        <script type="text/javascript">
            $(document).ready(function () {

                var cb = function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
                }


                var optionSet1 = {
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2015',
                    dateLimit: {
                        days: 60
                    },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'MM/DD/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Clear',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                };
                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                $('#reportrange').daterangepicker(optionSet1, cb);
                $('#reportrange').on('show.daterangepicker', function () {
                    console.log("show event fired");
                });
                $('#reportrange').on('hide.daterangepicker', function () {
                    console.log("hide event fired");
                });
                $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                    console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                });
                $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                    console.log("cancel event fired");
                });
                $('#options1').click(function () {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
                });
                $('#options2').click(function () {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
                });
                $('#destroy').click(function () {
                    $('#reportrange').data('daterangepicker').remove();
                });
            });
        </script>

@endif
</body>
</html>

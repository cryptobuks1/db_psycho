@extends('auth.admin.layouts.default')

@section('caption_name')
    БД
@endsection

@section('auth.admin.layouts.content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                @endif
                <div class=" col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{--<i class="fa fa-bars"></i>--}}{{ $texts->firstWhere('caption_name', 'BlockBD')->caption_translation }}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">Settings 1</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Settings 2</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--</li>--}}
                            </ul>
                            <div class="clearfix"></div>
                        </div><br>

                        <div class="x_content"><br>
                            <div class="col-md-1">
                                <!-- required for floating -->
                                <!-- Nav tabs -->
                                {{--<ul class="nav nav-tabs tabs-left">--}}
                                    {{--<li class="active"><a href="#server" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'Server')->caption_translation }}</a></li>--}}
                                    {{--<li><a href="#db" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'Database')->caption_translation }}</a></li>--}}
                                    {{--<li><a href="#dbArea" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'AreaDB')->caption_translation }}</a></li>--}}
                                {{--</ul>--}}
                            </div>

                            <div class="col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="menuHeader">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#server" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'Server')->caption_translation }}</a></li>
                                            <li><a href="#db" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'Database')->caption_translation }}</a></li>
                                            <li><a href="#dbArea" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'AreaDB')->caption_translation }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane active" id="server">
                                        {{--<p class="lead">Home tab</p>--}}
                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#serverGet">{{ $texts->firstWhere('caption_name', 'ServerAll')->caption_translation }} </a></li>
                                                <li><a data-toggle="tab" href="#serverAdd">{{ $texts->firstWhere('caption_name', 'ServerAddNew')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#serverDelete">{{ $texts->firstWhere('caption_name', 'ServerDelete')->caption_translation }}</a></li>
                                            </ul><br>

                                            {{--{{dd($servers)}}--}}

                                            <div class="tab-content menuHeader">
                                                <div id="serverGet" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3>{{ $texts->firstWhere('caption_name', 'ServerList')->caption_translation }}</h3>
                                                                <tr>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'ServerTableServerName')->caption_translation }}</th>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'ServerTableServerIP')->caption_translation }}</th>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'ServerTableServerUrl')->caption_translation }}</th>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'ServerTableServerModifyDate')->caption_translation }}</th>                                                               </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($servers as $server)
                                                            <button style="min-width: 100%; " type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$server['id']}}">
                                                                <table class="table" style="text-align: left">
                                                                    <thead>
                                                                        <tr>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="col-md-3">{{$server['server_name']}}</td>
                                                                            <td class="col-md-3">{{$server['server_ip']}}</td>
                                                                            <td class="col-md-3">{{$server['server_url']}}</td>
                                                                            <td class="col-md-3">{{$server['modify_date']}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </button>
                                                        @endforeach


                                                        {{--{{dd($servers)}}--}}

                                                        {{------------------modal-------------------------}}
                                                        @foreach($servers as $server)
                                                            <div class="modal fade " id="myModal{{$server['id']}}" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">{{$server['server_name'].':'.$server['server_ip']}}</h4>
                                                                            {{--<p style="color: red">{{$server['id']}}</p>--}}
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-server-update')}}" >
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="idServer" value="{{$server['id']}}">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'ServerTableServerName')->caption_translation }}<span class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"  name="serverName" value="{{$server['server_name']}}"
                                                                                        required="required" class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'ServerTableServerIP')->caption_translation }}<span class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"  name="serverIp" value="{{$server['server_ip']}}"
                                                                                        required="required" class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'ServerTableServerUrl')->caption_translation }}<span class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"  name="serverUrl" value="{{$server['server_url']}}"
                                                                                        required="required" class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                {{--<div class="form-group">--}}
                                                                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">{{ $texts->firstWhere('caption_name', 'ServerTableServerSuserName')->caption_translation }}<span class="required">*</span></label>--}}
                                                                                    {{--<div class="col-xs-7">--}}
                                                                                        {{--<input type="text"  name="serverSuserName" value="{{$server['suser_name']}}"--}}
                                                                                        {{--required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                                    {{--</div>--}}
                                                                                {{--</div>--}}

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>
                                                                                    <div class="col-xs-1 col-sm-offset-5"><br>
                                                                                        <button type="submit" class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        {{------------------End modal---------------------}}
                                                    </div>

                                                </div>

                                                <div id="serverAdd" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-server-insert')}}" >
                                                        {{ csrf_field() }}
                                                         <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="serverNameAdd"> {{ $texts->firstWhere('caption_name', 'ServerTableServerName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="serverNameAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="serverIpAdd"> {{ $texts->firstWhere('caption_name', 'ServerTableServerIP')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="serverIpAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="serverUrlAdd"> {{ $texts->firstWhere('caption_name', 'ServerTableServerUrl')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="serverUrlAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="serverSuserNameAdd"> {{ $texts->firstWhere('caption_name', 'ServerTableServerSuserName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="serverSuserNameAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>
                                                            <div class="col-xs-1 col-sm-offset-5"><br>
                                                                <button type="submit" class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div id="serverDelete" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-server-delete')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'ServerSelectDelete')->caption_translation }} </label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="ServerId" required>
                                                                    <option> </option>

                                                                    @foreach($servers as $server)
                                                                        <option class="col-xs-7" value="{{$server->id}}" >{{$server->server_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-offset-8 col-xs-4">
                                                                <button type="submit" id="deleteServer" class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="db">

                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#homeDbGet">{{ $texts->firstWhere('caption_name', 'DBAll')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#homeDbAdd">{{ $texts->firstWhere('caption_name', 'DBAddNew')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#homeDbDelete">{{ $texts->firstWhere('caption_name', 'DBDelete')->caption_translation }}</a></li>
                                            </ul><br>

                                            {{--{{dd($servers)}}--}}

                                            <div class="tab-content menuHeader">
                                                <div id="homeDbGet" class="tab-pane fade in active">

                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3>{{ $texts->firstWhere('caption_name', 'DBList')->caption_translation }}</h3>
                                                            <tr>
                                                                <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'DBTableDBName')->caption_translation }}</th>
                                                                <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'DBTableDBServerIP')->caption_translation }}</th>
                                                                <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'DBTableDBServerName')->caption_translation }}</th>
                                                                <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'DBTableDBServerUrl')->caption_translation }}</th>
                                                            </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($servers as $server)
                                                            @foreach($server->servers as $db)
                                                                <button style="min-width: 100%; " type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalDb{{$db['id']}}">
                                                                    <table class="table" style="text-align: left">
                                                                        <thead>
                                                                        <tr>
                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        <tr>
                                                                            <td class="col-md-3">{{$db['db_name']}}</td>
                                                                            <td class="col-md-3">{{$server['server_ip']}}</td>
                                                                            <td class="col-md-3">{{$server['server_name']}}</td>
                                                                            <td class="col-md-3">{{$server['server_url']}}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </button>
                                                            @endforeach
                                                        @endforeach

                                                        {{------------------modal-------------------------}}
                                                        @foreach($servers as $server)
                                                            @foreach($server->servers as $db)
                                                                <div class="modal fade " id="myModalDb{{$db['id']}}" role="dialog">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">{{$db['db_name'].':'.$server['server_ip']}}</h4>
                                                                                {{--<p style="color: red">{{$server['id']}}</p>--}}
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <form class="form-horizontal form-label-left"
                                                                                      method="POST"
                                                                                      action="{{route('admin-db-update')}}">
                                                                                    {{ csrf_field() }}

                                                                                    <input type="hidden" name="idDb" value="{{$db['id']}}">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                               for="dbName">{{ $texts->firstWhere('caption_name', 'DBTableDBName')->caption_translation }}<span
                                                                                                    class="required">*</span></label>
                                                                                        <div class="col-xs-7">
                                                                                            <input type="text"
                                                                                                   name="dbName"
                                                                                                   value="{{$db['db_name']}}"
                                                                                                   required="required"
                                                                                                   class="form-control col-md-7 col-xs-12">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                               for="dbCode">{{ $texts->firstWhere('caption_name', 'DBTableDBCode')->caption_translation }}<span
                                                                                                    class="required">*</span></label>
                                                                                        <div class="col-xs-7">
                                                                                            <input type="text"
                                                                                                   name="dbCode"
                                                                                                   value="{{$db['db_code']}}"
                                                                                                   required="required"
                                                                                                   class="form-control col-md-7 col-xs-12">
                                                                                        </div>
                                                                                    </div>

                                                                                    {{--<div class="form-group">--}}
                                                                                        {{--<label class="control-label col-md-3 col-sm-3 col-xs-4"--}}
                                                                                               {{--for="dbSuserName">{{ $texts->firstWhere('caption_name', 'DBTableDBSuserName')->caption_translation }}<span--}}
                                                                                                    {{--class="required">*</span></label>--}}
                                                                                        {{--<div class="col-xs-7">--}}
                                                                                            {{--<input type="text"--}}
                                                                                                   {{--name="dbSuserName"--}}
                                                                                                   {{--value="{{$db['suser_name']}}"--}}
                                                                                                   {{--required="required"--}}
                                                                                                   {{--class="form-control col-md-7 col-xs-12">--}}
                                                                                        {{--</div>--}}
                                                                                    {{--</div>--}}

                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                               for="dbModifyDate"> {{ $texts->firstWhere('caption_name', 'DBTableDBModifyDate')->caption_translation }}<span
                                                                                                    class="required">*</span></label>
                                                                                        <div class="col-xs-7">
                                                                                            <input type="text"
                                                                                                   name="dbModifyDate"
                                                                                                   value="{{$db['modify_date']}}"
                                                                                                   required="required"
                                                                                                   class="form-control col-md-7 col-xs-12">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                               for="parent-category"><span
                                                                                                    class="required"></span></label>
                                                                                        <div class="col-xs-1 col-sm-offset-5">
                                                                                            <br>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success">
                                                                                                @lang('MenuAdministeringDB.ButtonSave')
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endforeach

                                                        {{------------------End modal---------------------}}
                                                    </div>
                                                </div>

                                                <div id="homeDbAdd" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-db-insert')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="serverIpSelect">{{ $texts->firstWhere('caption_name', 'ServerTableServerIP')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="ServerIdSelect">
                                                                    <option>{{ $texts->firstWhere('caption_name', 'DBSelectServerDb')->caption_translation }} </option>

                                                                    @foreach($servers as $server)
                                                                        <option class="col-xs-7" value="{{$server->id}}" >{{$server->server_ip}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="serverNameAdd">{{ $texts->firstWhere('caption_name', 'AreaDBTableAreaDBName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="dbNameAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="dbCode">{{ $texts->firstWhere('caption_name', 'DBTableDBServerUrl')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="dbCode" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="serverSuserNameAdd">{{ $texts->firstWhere('caption_name', 'DBTableDBServerName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="dbSuserNameAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>
                                                            <div class="col-xs-1 col-sm-offset-5"><br>
                                                                <button type="submit" class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>


                                                <div id="homeDbDelete" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-db-delete')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>

                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="dbId">
                                                                    <option>Выберите базу данных для удаления</option>

                                                                    @foreach($servers as $server)
                                                                        @foreach($server->servers as $db)
                                                                            <option class="col-xs-7" value="{{$db->id}}" >{{$db->db_name}}</option>
                                                                        @endforeach
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-offset-8 col-xs-4">
                                                                <button type="submit" id="deleteDb" class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="dbArea">
                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#homeDbAreaGet">{{ $texts->firstWhere('caption_name', 'AreaDBAll')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#homeDbAreaAdd">{{ $texts->firstWhere('caption_name', 'AreaDBAddNew')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#homeDbAreaDelete">{{ $texts->firstWhere('caption_name', 'AreaDBDelete')->caption_translation }}</a></li>
                                            </ul><br>

                                            <div class="tab-content menuHeader">
                                                <div id="homeDbAreaGet" class="tab-pane fade in active">
                                                    <div class="container">

                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3>{{ $texts->firstWhere('caption_name', 'AreaDBList')->caption_translation }}</h3>
                                                            <tr>
                                                                <th class="col-md-4" scope="col">{{ $texts->firstWhere('caption_name', 'AreaDBTableAreaDBName')->caption_translation }}</th>
                                                                <th class="col-md-4" scope="col">{{ $texts->firstWhere('caption_name', 'AreaDBTableAreaDBServerName')->caption_translation }}</th>
                                                                <th class="col-md-4" scope="col">{{ $texts->firstWhere('caption_name', 'AreaDBTableAreaDBServerIP')->caption_translation }}</th>
                                                            </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($servers as $server)
                                                            @foreach($server->servers as $db)
                                                                <button style="min-width: 100%; " type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalDbArea{{$db['id']}}">
                                                                    <table class="table" style="text-align: left">
                                                                        <thead>
                                                                        <tr>
                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        <tr>
                                                                            <td class="col-md-4">{{$db['db_name']}}</td>
                                                                            <td class="col-md-4">{{$server['server_name']}}</td>
                                                                            <td class="col-md-4">{{$server['server_ip']}}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </button>
                                                            @endforeach
                                                        @endforeach

                                                        {{------------------modal-------------------------}}
                                                        @foreach($servers as $server)
                                                            @foreach($server->servers as $db)
                                                                <div class="modal fade " id="myModalDbArea{{$db['id']}}" role="dialog">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">{{$db['db_name'].':'.$db['server_id']}}</h4>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                @foreach($db->db_area as $db_area)
                                                                                    <form class="form-horizontal form-label-left"  enctype="multipart/form-data"  method="POST" action="{{route('admin-db-area-update')}}" >
                                                                                        {{ csrf_field() }}
                                                                                        <input type="hidden" name="idDbArea" value="{{$db_area['id']}}">

                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="dbAreaCode">{{ $texts->firstWhere('caption_name', 'AreaDBTableAreaCode')->caption_translation }}<span class="required">*</span></label>
                                                                                            <div class="col-xs-7">
                                                                                                <input type="text"  name="dbAreaCode" value="{{$db_area['db_area_code']}}"
                                                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="dbAreaPass">{{ $texts->firstWhere('caption_name', 'AreaDBTableAreaPass')->caption_translation }}<span class="required">*</span></label>
                                                                                            <div class="col-xs-7">
                                                                                                <input type="text"  name="dbAreaPass" value="{{$db_area['db_area_pass']}}"
                                                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                                                            </div>
                                                                                        </div>

                                                                                        {{--<div class="form-group">--}}
                                                                                            {{--<label class="control-label col-md-3 col-sm-3 col-xs-4" for="dbAreaSuserName">{{ $texts->firstWhere('caption_name', 'AreaDBTableAreaDBServerName')->caption_translation }}<span class="required">*</span></label>--}}
                                                                                            {{--<div class="col-xs-7">--}}
                                                                                                {{--<input type="text"  name="dbAreaSuserName" value="{{$db_area['suser_name']}}"--}}
                                                                                                       {{--required="required" class="form-control col-md-7 col-xs-12">--}}
                                                                                            {{--</div>--}}
                                                                                        {{--</div>--}}

                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>
                                                                                            <div class="col-xs-2 col-md-offset-5">
                                                                                                <button type="submit" class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>
                                                                                            </div>
                                                                                        </div>

                                                                                    </form>
                                                                                @endforeach
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div id="homeDbAreaAdd" class="tab-pane fade ">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-db-area-insert')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="DbAreaIdSelect"> {{ $texts->firstWhere('caption_name', 'DBTableDBName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="DbAreaIdSelect">
                                                                    <option>{{ $texts->firstWhere('caption_name', 'AreaDBSelectDB')->caption_translation }}</option>

                                                                    @foreach($servers as $server)
                                                                        @foreach($server->servers as $db)
                                                                            <option class="col-xs-7" value="{{$db->id}}" >{{$db->db_name}}</option>
                                                                        @endforeach
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="dbCode">{{ $texts->firstWhere('caption_name', 'AreaDBTableAreaCode')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="dbAreaCode" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="serverSuserNameAdd">{{ $texts->firstWhere('caption_name', 'AreaDBTableAreaSuserName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="dbAreaSuserNameAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>
                                                            <div class="col-xs-1 col-sm-offset-5"><br>
                                                                <button type="submit" class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="homeDbAreaDelete" class="tab-pane fade ">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-db-area-delete')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'AreaDBSelectAreaDelete')->caption_translation }} </label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="dbAreaDeleteId" required>
                                                                    <option> </option>
                                                                    @foreach($servers as $server)
                                                                        @foreach($server->servers as $db)
                                                                            @foreach($db->db_area as $db_area)
                                                                                <option class="col-xs-7" value="{{$db_area->id}}" >{{$db_area->db_area_code}}</option>
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-offset-8 col-xs-4">
                                                                <button type="submit" id="deleteDbArea" class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer content -->

        @include('auth.admin.layouts.footer')

        <!-- /footer content -->
    </div>
    <!-- /page content -->

@endsection

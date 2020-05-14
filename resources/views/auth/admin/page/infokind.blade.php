@extends('auth.admin.layouts.default')

@section('caption_name')
    Accesses
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
                            <h2>{{ $texts->firstWhere('caption_name', 'Accesses')->caption_translation }}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div><br>

                        <div class="x_content"><br>
                            <div class="col-md-1">
                                {{--<ul class="nav nav-tabs tabs-left">--}}
                                    {{--<li class="active"><a href="#kind" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'kind')->caption_translation }}</a></li>--}}
                                    {{--<li><a href="#type" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'Type')->caption_translation }}</a></li>--}}
                                {{--</ul>--}}
                            </div>

                            <div class="col-md-10">
                                <div class="tab-content">
                                    <div class="menuHeader">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#kind" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'kind')->caption_translation }}</a></li>
                                            <li><a href="#type" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'Type')->caption_translation }}</a></li>
                                        </ul>
                                    </div>
                                    <div id="kind" class="tab-pane fade in active">
                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#accAllKind">{{ $texts->firstWhere('caption_name', 'All')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#accAddNewKind">{{ $texts->firstWhere('caption_name', 'AddKind')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#accDeleteNewKind">{{ $texts->firstWhere('caption_name', 'DeleteKind')->caption_translation }}</a></li>
                                            </ul><br>

                                            <div class="tab-content menuHeader">
                                                <div id="accAllKind" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3></h3>
                                                            <tr>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'KindName')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'infoTName')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'KindCode')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'SuserName')->caption_translation }}</th>
                                                            </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($infokind as $ik)
                                                            <button style="min-width: 100%; " type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#allKind{{$ik['id']}}">
                                                                <table class="table" style="text-align: left">
                                                                    <thead>
                                                                    <tr>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="col-md-1">{{$ik['info_kind_name']}}</td>
                                                                        <td class="col-md-1">{{$ik->infotype->info_type_name}}</td>
                                                                        <td class="col-md-1">{{$ik['info_kind_code']}}</td>
                                                                        {{--<td class="col-md-1">{{$ik['suser_name']}}</td>--}}
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </button>
                                                        @endforeach

                                                        {{------------------modal-------------------------}}
                                                        @foreach($infokind as $ik)

                                                            <div class="modal fade " id="allKind{{$ik['id']}}" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">{{$ik['info_lind_code']}}</h4>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal form-label-left"
                                                                                  method="POST"
                                                                                  action="{{route('admin-info-kind-update')}}">
                                                                                {{ csrf_field() }}

                                                                                <input type="hidden" name="KindID" value="{{$ik['id']}}">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="infoKName">{{ $texts->firstWhere('caption_name', 'KindName')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="infoKName"
                                                                                               value="{{$ik['info_kind_name']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="infoTName">{{ $texts->firstWhere('caption_name', 'infoTName')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">

                                                                                        <select class="form-control" name = "infoTName" id="infoTName" require>
                                                                                            @foreach($infotype as $it)
                                                                                                <option class="col-xs-7" value="{{$it->id}}">{{$it->info_type_name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="infoKCode">{{ $texts->firstWhere('caption_name', 'KindCode')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="infoKCode"
                                                                                               value="{{$ik['info_kind_code']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                {{--<div class="form-group">--}}
                                                                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-4"--}}
                                                                                           {{--for="KindSuserName">{{ $texts->firstWhere('caption_name', 'SuserName')->caption_translation }}<span--}}
                                                                                                {{--class="required">*</span></label>--}}
                                                                                    {{--<div class="col-xs-7">--}}
                                                                                        {{--<input type="text"--}}
                                                                                               {{--name="KindSuserName"--}}
                                                                                               {{--value="{{$ik['suser_name']}}"--}}
                                                                                               {{--required="required"--}}
                                                                                               {{--class="form-control col-md-7 col-xs-12">--}}
                                                                                    {{--</div>--}}
                                                                                {{--</div>--}}

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

                                                        {{------------------End modal---------------------}}
                                                    </div>
                                                </div>

                                                <div id="accAddNewKind" class="tab-pane">
                                                    <div class="container">
                                                        <form class="form-horizontal form-label-left"
                                                              method="POST"
                                                              action="{{route('admin-info-kind-insert')}}">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="AddInfoKName">{{ $texts->firstWhere('caption_name', 'KindName')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="AddInfoKName"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="AddInfoTName">{{ $texts->firstWhere('caption_name', 'infoTName')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <select class="form-control" name = "AddInfoTName" id="AddInfoTName" require>
                                                                        @foreach($infotype as $it)
                                                                            <option class="col-xs-7" value="{{$it->id}}">{{$it->info_type_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="AddInfoKCode">{{ $texts->firstWhere('caption_name', 'KindCode')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="AddInfoKCode"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="AddKindSuserName">{{ $texts->firstWhere('caption_name', 'SuserName')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="AddKindSuserName"
                                                                           value=""
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
                                                </div>

                                                <div id="accDeleteNewKind" class="tab-pane">
                                                    <div class="container">
                                                        <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-info-kind-delete')}}" >
                                                            {{ csrf_field() }}

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'KindDelete')->caption_translation }} </label>
                                                                <div class="col-xs-7">
                                                                    <select class="form-control" name="KindDeleteId" required>
                                                                        @foreach($infokind as $ik)
                                                                            <option class="col-xs-7" value="{{$ik->id}}" >{{$ik->info_kind_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-xs-offset-8 col-xs-4">
                                                                    <button type="submit"  class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div id="type" class="tab-pane fade in">

                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#accAllType">{{ $texts->firstWhere('caption_name', 'All')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#accAddNewType">{{ $texts->firstWhere('caption_name', 'TypeAdd')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#accDeleteNewType">{{ $texts->firstWhere('caption_name', 'TypeDelete')->caption_translation }}</a></li>
                                            </ul><br>

                                            <div class="tab-content menuHeader">
                                                <div id="accAllType" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3></h3>
                                                            <tr>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'InfoTypeName')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'accUid1cCode')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'InfoTypeCode')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'SuserName')->caption_translation }}</th>
                                                            </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($infotype as $it)
                                                            <button style="min-width: 100%; " type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#allType{{$it['id']}}">
                                                                <table class="table" style="text-align: left">
                                                                    <thead>
                                                                    <tr>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="col-md-1">{{$it['info_type_name']}}</td>
                                                                        <td class="col-md-1">{{$it['uid_1c_code']}}</td>
                                                                        <td class="col-md-1">{{$it['info_type_code']}}</td>
                                                                        {{--<td class="col-md-1">{{$it['suser_name']}}</td>--}}
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </button>
                                                        @endforeach

                                                        {{------------------modal-------------------------}}
                                                        @foreach($infotype as $it)

                                                            <div class="modal fade " id="allType{{$it['id']}}" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">{{$it['info_type_name']}}</h4>
                                                                            <p style="color: red">{{--{{$server['id']}}--}}</p>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal form-label-left"
                                                                                  method="POST"
                                                                                  action="{{route('admin-info-type-update')}}">
                                                                                {{ csrf_field() }}

                                                                                <input type="hidden" name="InfoTypeID" value="{{$it['id']}}">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="InfoTypeName">{{ $texts->firstWhere('caption_name', 'InfoTypeName')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="InfoTypeName"
                                                                                               value="{{$it['info_type_name']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="TypeUid1cCode">{{ $texts->firstWhere('caption_name', 'accUid1cCode')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="TypeUid1cCode"
                                                                                               value="{{$it['uid_1c_code']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="InfoTypeCode">{{ $texts->firstWhere('caption_name', 'InfoTypeCode')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="InfoTypeCode"
                                                                                               value="{{$it['info_type_code']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="TypeSuserName">{{ $texts->firstWhere('caption_name', 'SuserName')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    {{--<div class="col-xs-7">--}}
                                                                                        {{--<input type="text"--}}
                                                                                               {{--name="TypeSuserName"--}}
                                                                                               {{--value="{{$it['suser_name']}}"--}}
                                                                                               {{--required="required"--}}
                                                                                               {{--class="form-control col-md-7 col-xs-12">--}}
                                                                                    {{--</div>--}}
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

                                                        {{------------------End modal---------------------}}
                                                    </div>
                                                </div>

                                                <div id="accAddNewType" class="tab-pane">
                                                    <div class="container">
                                                        <form class="form-horizontal form-label-left"
                                                              method="POST"
                                                              action="{{route('admin-info-type-insert')}}">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="AddInfoTypeName">{{ $texts->firstWhere('caption_name', 'InfoTypeName')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="AddInfoTypeName"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>

                                                                </div> <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                           for="AddInfoTypeCode">{{ $texts->firstWhere('caption_name', 'InfoTypeCode')->caption_translation }}<span
                                                                                class="required">*</span></label>
                                                                    <div class="col-xs-7">
                                                                        <input type="text"
                                                                               name="AddInfoTypeCode"
                                                                               value=""
                                                                               required="required"
                                                                               class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                           for="AddUid1cCode">{{ $texts->firstWhere('caption_name', 'accUid1cCode')->caption_translation }}<span
                                                                                class="required">*</span></label>
                                                                    <div class="col-xs-7">
                                                                        <input type="text"
                                                                               name="AddUid1cCode"
                                                                               value=""
                                                                               required="required"
                                                                               class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="AddTypeSuserName">{{ $texts->firstWhere('caption_name', 'SuserName')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="AddTypeSuserName"
                                                                           value=""
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
                                                </div>

                                                <div id="accDeleteNewType" class="tab-pane">
                                                    <div class="container">
                                                        <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-info-type-delete')}}" >
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'TypeDelete')->caption_translation }} </label>
                                                                <div class="col-xs-7">
                                                                    <select class="form-control" name="TypeDeleteId" required>
                                                                        @foreach($infotype as $it)
                                                                            <option class="col-xs-7" value="{{$it->id}}" >{{$it->info_type_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-xs-offset-8 col-xs-4">
                                                                    <button type="submit"  class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
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

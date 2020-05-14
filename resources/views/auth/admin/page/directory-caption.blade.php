@extends('auth.admin.layouts.default')

@section('caption_name')
    БД
@endsection

@section('auth.admin.layouts.content')
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

                            <h2>{{ $texts->firstWhere('caption_name', 'CaptionList')->caption_translation }}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div><br>

                        <div class="x_content"><br>
                            <!--<div class="col-md-2">
                                    <ul class="nav nav-tabs tabs-left">
                                    <li class="active"><a href="#caption" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'Caption')->caption_translation }}</a></li>
                                    <li><a href="#language" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'Translate')->caption_translation }}</a></li>
                                </ul> -->
                            </div>
                            <div class="col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="language">
                                        <div class="menuHeader">
                                        <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#languageGet">{{ $texts->firstWhere('caption_name', 'langAll')->caption_translation }} </a></li>
                                                <li><a data-toggle="tab" href="#addNewLang">{{ $texts->firstWhere('caption_name', 'Add')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#deleteLang">{{ $texts->firstWhere('caption_name', 'Delete')->caption_translation }}</a></li>
                                            </ul><br>

                                            <div class="tab-content menuHeader">
                                                <div id="languageGet" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                                <h3>{{ $texts->firstWhere('caption_name', 'CaptionList')->caption_translation }}</h3>
                                                                <tr>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}</th>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'CaptionRem')->caption_translation }}</th>
                                                                </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($captAll as $c)
                                                                <table class="table" style="text-align: left">
                                                                    <tbody id="updatePage">
                                                                            <th class="col-md-3" data-toggle="modal" data-target="#myModal{{$c->id}}">{{$c->caption_name}}</th>
                                                                            <th class="col-md-3" data-toggle="modal" data-target="#myModal{{$c->id}}">{{$c->caption_rem}}</th>
                                                                    </tbody>
                                                                </table>
                                                        @endforeach 

                                                        @foreach($captAll as $с)
                                                        <div class="modal fade" id="myModal{{$с->id}}" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">{{$с->caption_name}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-directory-caption-update')}}" >
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="idCapt" value="{{$с->id}}">
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}<span class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"  name="CaptName" value="{{$с->caption_name}}"
                                                                                    required="required" class="form-control col-md-7 col-xs-12" readonly>
                                                                                    </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'Remark')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <input type="text"  name="CaptRem" value="{{$с->caption_rem}}"
                                                                                    class="form-control col-md-7 col-xs-12">
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
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div id="addNewLang" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-directory-caption-insert')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="CaptNameAdd"> {{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="CaptNameAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div> 
                                                            <!-- <div class="col-xs-7"> 
                                                                <select class="form-control" name = "CaptNameAdd" id="CaptNameAdd" require>
                                                                        @foreach($captAll as $c)
                                                                            <option class="col-xs-7" value="{{ $c->id }}">{{$c->caption_name}}</option>
                                                                        @endforeach
                                                                </select>
                                                            </div> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="CaptRemAdd"> {{ $texts->firstWhere('caption_name', 'Remark')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="CaptRemAdd" value=""
                                                                       class="form-control col-md-7 col-xs-12">
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
                                                 
                                                <div id="deleteLang" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-directory-caption-delete')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }} </label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="CaptIdDel" required>
                                                                    @foreach($captAll as $cAll)
                                                                        <option class="col-xs-7" value="{{$cAll->id}}" >{{$cAll->caption_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-offset-8 col-xs-4">
                                                                <button type="submit" id="CaptIdDel" class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
                                                            </div>
                                                        </div>
                                                    </form>
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

@endsection

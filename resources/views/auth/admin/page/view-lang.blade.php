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

                            <h2>{{ $texts->firstWhere('caption_name', 'languageName')->caption_translation }}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div><br>

                        <div class="x_content">
                            <br>
                            <div class="col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="language">
                                        <div class="menuHeader">
                                        <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#languageGet">{{ $texts->firstWhere('caption_name', 'langAll')->caption_translation }} </a></li>
                                                <li><a data-toggle="tab" href="#addNewLang">{{ $texts->firstWhere('caption_name', 'addNewLang')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#deleteLang">{{ $texts->firstWhere('caption_name', 'deleteLang')->caption_translation }}</a></li>
                                            </ul><br>

                                            <div class="tab-content menuHeader">
                                                <div id="languageGet" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3>{{ $texts->firstWhere('caption_name', 'LangList')->caption_translation }}</h3>
                                                                <tr>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'LanguageTableCode')->caption_translation }}</th>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'LanguageTableName')->caption_translation }}</th>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'LanguageTableNameRu')->caption_translation }}</th>
                                                                    <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'LanguageTableView')->caption_translation }}</th>                                                               </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($lang as $l)
                                                                <table class="table" style="text-align: left">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="col-md-3" data-toggle="modal" data-target="#myModal{{$l['id']}}">{{$l['language_code']}}</th>
                                                                            <th class="col-md-3" data-toggle="modal" data-target="#myModal{{$l['id']}}">{{$l['language_name']}}</th>
                                                                            <th class="col-md-3" data-toggle="modal" data-target="#myModal{{$l['id']}}">{{$l['language_name_ru']}}</th>
                                                                            <th class="col-md-3" data-toggle="modal" data-target="#myModal{{$l['id']}}">{{$l['language_view']}}</th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                        @endforeach

                                                        @foreach($lang as $l)
                                                        <div class="modal fade" id="myModal{{$l['id']}}" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">{{$l['language_name']}}</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-lang-update')}}" >
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="idLang" value="{{$l['id']}}">
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'LanguageTableCode')->caption_translation }}<span class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"  name="langCode" value="{{$l['language_code']}}"
                                                                                    required="required" class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'LanguageTableName')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <input type="text"  name="LangName" value="{{$l['language_name']}}"
                                                                                    required="required" class="form-control col-md-7 col-xs-12">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'LanguageTableNameRu')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <input type="text"  name="LangNameRu" value="{{$l['language_name_ru']}}"
                                                                                    required="required" class="form-control col-md-7 col-xs-12">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" >
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">{{ $texts->firstWhere('caption_name', 'LanguageTableView')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <input type="text"  name="LangView" value="{{$l['language_view']}}"
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
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-lang-insert')}}" >
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="langCodeAdd"> {{ $texts->firstWhere('caption_name', 'LanguageTableCode')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="langCodeAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="LangNameAdd"> {{ $texts->firstWhere('caption_name', 'LanguageTableName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="LangNameAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="LangNameRuAdd"> {{ $texts->firstWhere('caption_name', 'LanguageTableNameRu')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="LangNameRuAdd" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="LangViewAdd"> {{ $texts->firstWhere('caption_name', 'LanguageTableView')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="LangViewAdd" value=""
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
                                                
                                                <div id="deleteLang" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-lang-delete')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'LanguageSelectDelete')->caption_translation }} </label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="langIddelete" required>
                                                                    @foreach($lang as $l)
                                                                        <option class="col-xs-7" value="{{$l->id}}" >{{$l->language_code}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-offset-8 col-xs-4">
                                                                <button type="submit" id="deleteLang" class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
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

        <!-- footer content -->

        @include('auth.admin.layouts.footer')
        <!-- /footer content -->
                </div>
    <!-- /page content -->

@endsection

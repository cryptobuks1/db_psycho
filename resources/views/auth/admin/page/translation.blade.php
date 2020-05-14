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
            <h2>{{ $texts->firstWhere('caption_name', 'Translate')->caption_translation }}</h2>
            <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
         </div>
         <br>
         <div class="x_content">
            <br>
            <div class="col-md-10">
               <!-- Tab panes -->
               <div class="tab-content">
                  <div class="tab-pane active" id="language">
                     <div class="menuHeader">
                        <ul class="nav nav-tabs">
                           <li class="active"><a data-toggle="tab" href="#languageGet">{{ $texts->firstWhere('caption_name', 'langAll')->caption_translation }} </a></li>
                           <li><a data-toggle="tab" href="#addNewLang">{{ $texts->firstWhere('caption_name', 'Add')->caption_translation }}</a></li>
                           <li><a data-toggle="tab" href="#changeLang">{{ $texts->firstWhere('caption_name', 'Change')->caption_translation }}</a></li>
                           <li><a data-toggle="tab" href="#deleteLang">{{ $texts->firstWhere('caption_name', 'Delete')->caption_translation }}</a></li>
                        </ul>
                        <br>
                        <div class="tab-content menuHeader">
                           <div id="languageGet" class="tab-pane fade in active">
                              <div class="container">
                                 <table class="table" style="text-align: left">
                                    <thead>
                                       <h3>{{ $texts->firstWhere('caption_name', 'Translate')->caption_translation }}</h3>
                                       <tr>
                                          <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'language')->caption_translation }}</th>
                                          <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}</th>
                                          <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'Translate')->caption_translation }}</th>
                                       </tr>
                                    </thead>
                                 </table>
                                 @foreach($translate as $tr)
                                 <table class="table" style="text-align: left">
                                    <tbody>
                                       <tr>
                                          <th class="col-md-3" data-toggle="modal" data-target="#myModal{{$tr->id}}">{{$tr->language_name}}</th>
                                          <th class="col-md-3" data-toggle="modal" data-target="#myModal{{$tr->id}}">{{$tr->caption_code}}</th>
                                          <th class="col-md-3" data-toggle="modal" data-target="#myModal{{$tr->id}}">{{$tr->caption_translation}}</th>
                                       </tr>
                                    </tbody>
                                 </table>
                                 @endforeach
                                 @foreach($translate as $tr)
                                 <div class="modal fade" id="myModal{{$tr->id}}" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <h4 class="modal-title">{{$tr->language_name}}</h4>
                                          </div>
                                          <div class="modal-body">
                                             <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-translate-update')}}" >
                                                {{ csrf_field() }}
                                                <input type="hidden" name="idLang" value="{{$tr->id}}">
                                                <div class="form-group">
                                                   <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'language')->caption_translation }}<span class="required">*</span></label>
                                                   <div class="col-xs-7">
                                                      <input type="text"  name="langName" value="{{$tr->language_name}}"
                                                         required="required" class="form-control col-md-7 col-xs-12"  readonly> 
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}<span class="required">*</span></label>
                                                   <div class="col-xs-7">
                                                      <input type="text"  name="CaptionCode" value="{{$tr->caption_code}}"
                                                         required="required" class="form-control col-md-7 col-xs-12"  readonly>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'Translate')->caption_translation }}<span class="required">*</span></label>
                                                   <div class="col-xs-7">
                                                      <input type="text"  name="CaptionTranslate" value="{{$tr->caption_translation}}"
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
                                             <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-translate-delete')}}" >
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                   <input type="hidden" name="TrIddelete" value="{{$tr->id}}"> 
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-xs-offset-8 col-xs-4">
                                                      <button type="submit" id="deleteLang" class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
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
                              <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-translate-insert')}}" >
                                 {{ csrf_field() }}
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="langNameAdd"> {{ $texts->firstWhere('caption_name', 'language')->caption_translation }}<span class="required">*</span></label>
                                    <div class="col-xs-7">
                                       <select class="form-control" name="langNameAdd" required>
                                          @foreach($lang as $l)
                                          <option class="col-xs-7" value="{{$l->id}}" >{{$l->language_name}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="CaptionCodeAdd"> {{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}<span class="required">*</span></label>
                                    <div class="col-xs-7">
                                       <input type="text"  name="CaptionCodeAdd" value=""
                                          required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="CaptionTranslateAdd"> {{ $texts->firstWhere('caption_name', 'Translate')->caption_translation }}<span class="required">*</span></label>
                                    <div class="col-xs-7">
                                       <input type="text"  name="CaptionTranslateAdd" value=""
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
                           <div id="changeLang" class="tab-pane fade">
                              <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-translate-insert')}}" >
                                 {{ csrf_field() }}
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="langNameAdd"> {{ $texts->firstWhere('caption_name', 'language')->caption_translation }}<span class="required">*</span></label>
                                    <div class="col-xs-7">
                                       <select class="form-control" name="langNameAdd" required>
                                          @foreach($lang as $l)
                                          <option class="col-xs-7" value="{{$l->id}}" >{{$l->language_name}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="CaptionCodeAdd"> {{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}<span class="required">*</span></label>
                                    <div class="col-xs-7">
                                       <input type="text"  name="CaptionCodeAdd" value=""
                                          required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="CaptionTranslateAdd"> {{ $texts->firstWhere('caption_name', 'Translate')->caption_translation }}<span class="required">*</span></label>
                                    <div class="col-xs-7">
                                       <input type="text"  name="CaptionTranslateAdd" value=""
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
                              <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-translate-delete')}}" >
                                 {{ csrf_field() }}
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'LanguageSelectDelete')->caption_translation }} </label>
                                    <div class="col-xs-7">
                                       <select class="form-control" name="TrIddelete" required>
                                          @foreach($translate as $tr)
                                          <option class="col-xs-7" value="{{$tr->id}}" >{{$tr->caption_code}}</option>
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
   </div>
   <!-- footer content -->
  
   @include('auth.admin.layouts.footer')

<!-- /footer content -->
</div>
<!-- /page content -->
@endsection

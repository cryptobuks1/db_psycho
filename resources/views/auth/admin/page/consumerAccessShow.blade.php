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
                            <h2>{{ $texts->firstWhere('caption_name', 'Accesses')->caption_translation }}</h2>
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
                                        <div class="menuHeader">
                                            <div class="tab-content menuHeader">
                                                {{--@foreach($ConsAccess as $CA)--}}
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-consumer-access-insert')}}" >
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'Consumer')->caption_translation }} </label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="ConsumerAdd" required>
                                                                    @foreach($consumerInfo as $c)
                                                                        <option class="col-xs-7" value="{{$c->id}}" >{{$c->consumer_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="dbAreaAdd"> {{ $texts->firstWhere('caption_name', 'dbArea')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="dbAreaAdd" required>
                                                                    @foreach($dbarea as $d)
                                                                        <option class="col-xs-7" value="{{$d->id}}" >{{$d->db_area_code}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="AccessesAdd"> {{ $texts->firstWhere('caption_name', 'Accesses')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="AccessesAdd" required>
                                                                    @foreach($access as $a)
                                                                        <option class="col-xs-7" value="{{$a->id}}" >{{$a->access_type_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="ContractorAdd"> {{ $texts->firstWhere('caption_name', 'AccContractor')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="ContractorAdd" required>
                                                                    @foreach($contractor as $c)
                                                                        <option class="col-xs-7" value="{{$c->id}}" >{{$c->contractor_short_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="CompanyAdd"> {{ $texts->firstWhere('caption_name', 'accCompany')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="CompanyAdd" required>
                                                                    @foreach($company as $c)
                                                                        <option class="col-xs-7" value="{{$c->id}}" >{{$c->company_short_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="ActualAdd"> {{ $texts->firstWhere('caption_name', 'Actual')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="ActualAdd" value=""
                                                                      class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="ReadOnlyAdd"> {{ $texts->firstWhere('caption_name', 'ReadOnly')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="ReadOnlyAdd" value=""
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
                                                {{--@endforeach--}}
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
@endsection

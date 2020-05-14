@extends('auth.admin.layouts.default')

@section('caption_name')
    Country and Regions
@endsection

@section('auth.admin.layouts.content')


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                {{--<p style=" color:red;  font-size: 16px; padding: 10px" id="alert"></p>--}}
                @if (session('alert'))
                    <div class="alert alert-success" id="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <div class=" col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{--<i class="fa fa-bars"></i>--}}{{ $texts->firstWhere('caption_name', 'BlockCountryReg')->caption_translation }}</h2>
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
                                    {{--<li class="active"><a href="#country" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'CountryRegCountry')->caption_translation }}</a></li>--}}
                                    {{--<li><a href="#region" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'CountryRegRegions')->caption_translation }}</a></li>--}}
                                {{--</ul>--}}
                            </div>

                            <div class="col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="menuHeader">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#country" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'CountryRegCountry')->caption_translation }}</a></li>
                                            <li><a href="#region" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'CountryRegRegions')->caption_translation }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane active" id="country">
                                        {{--<p class="lead">Home tab</p>--}}
                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#countryGet">{{ $texts->firstWhere('caption_name', 'BlockCountryAll')->caption_translation }} </a></li>
                                                <li><a data-toggle="tab" href="#countryAdd"> {{ $texts->firstWhere('caption_name', 'BlockCountryAddNew')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#countryDelete">{{ $texts->firstWhere('caption_name', 'BlockCountryDelete')->caption_translation }}</a></li>
                                            </ul><br>

                                            <div class="tab-content menuHeader">
                                                <div id="countryGet" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3>{{ $texts->firstWhere('caption_name', 'BlockCountryLists')->caption_translation }}</h3>
                                                            <tr>
                                                                <th class="col-md-3" scope="col">{{ $texts->firstWhere('caption_name', 'BlockCountryCountryName')->caption_translation }}</th>
                                                                <th class="col-md-5" scope="col">{{ $texts->firstWhere('caption_name', 'BlockCountryFullName')->caption_translation }}</th>
                                                                <th class="col-md-2" scope="col">{{ $texts->firstWhere('caption_name', 'BlockCountryCod')->caption_translation }}</th>
                                                                <th class="col-md-2" scope="col">{{ $texts->firstWhere('caption_name', 'BlockCountryAlpha2')->caption_translation }}</th>
                                                            </tr>
                                                            </thead>
                                                        </table>

                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <tr>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <tr>
                                                                @foreach($countriesAll as $country)
                                                                    <button  value="{{$country['id']}}"   style="min-width: 100%; " type="button" class="btn btn-info btn-lg modalUpdateCountry" data-toggle="modal" data-target="#country{{$country['id']}}">

                                                                        <span class="col-md-3" style="text-align: left">{{$country['country_name']}}</span>
                                                                        <span class="col-md-5" style="text-align: left">{{$country['country_full_name']}}</span>
                                                                        <span class="col-md-2 " style="text-align: center">{{$country['country_code']}}</span>
                                                                        <span class="col-md-2" style="text-align: center">{{$country['country_code_alpha2']}}</span>
                                                                    </button>
                                                                @endforeach
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        {{------------------modal Country-------------------------}}
                                                        <style>
                                                            .modalCountry > .modal{
                                                                display: block;
                                                                 opacity: 1;

                                                            }
                                                        </style>
                                                        <div id="modalCountry">

                                                            <div class="modal fade " id="country' + country.id + '"
                                                                 role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal">&times;
                                                                            </button>
                                                                            <h4 class="modal-title">' +
                                                                                country.country_name + '</h4>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal form-label-left"
                                                                                  method="POST"
                                                                                  action="{{route('admin-country-update')}}">
                                                                                {{csrf_field()}}

                                                                                <input type="hidden" name="idCountry"
                                                                                       value="' + country.id + '">
                                                                                <div class="form-group">' +
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="countryName"> {{ $texts->firstWhere('caption_name', 'BlockRegionName')->caption_translation }}
                                                                                        <span class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="countryName"
                                                                                               value=" ' + country.country_name + '"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="countryFullName"> {{ $texts->firstWhere('caption_name', 'BlockCountryFullName')->caption_translation }}
                                                                                        <span class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="countryFullName"
                                                                                               value=" ' + country.country_full_name + ' "
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="countryCode">{{ $texts->firstWhere('caption_name', 'BlockCountryCod')->caption_translation }}
                                                                                        <span class="required"></span></label>'
                                                                                    +
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="countryCode"
                                                                                               maxlength="5"
                                                                                               value=" ' + country.country_code + ' "
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="countryCodeAlpha2">{{ $texts->firstWhere('caption_name', 'BlockCountryAlpha2')->caption_translation }}
                                                                                        <span class="required"></span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="countryCodeAlpha2"
                                                                                               maxlength="4"
                                                                                               value=" ' + country.country_code_alpha2 + ' "
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>


                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           maxlength="6"
                                                                                           for="countryCodeAlpha3">{{ $texts->firstWhere('caption_name', 'BlockCountryAlpha3')->caption_translation }}
                                                                                        <span class="required"></span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="countryCodeAlpha3"
                                                                                               value=" ' + country.country_code_alpha3 + ' "
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                {{--<div class="form-group">--}}
                                                                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-4"--}}
                                                                                           {{--for="countrySuserName"> {{ $texts->firstWhere('caption_name', 'BlockCountrySuserName')->caption_translation }}--}}
                                                                                        {{--<span class="required"></span></label>--}}
                                                                                    {{--<div class="col-xs-7">--}}
                                                                                        {{--<input type="text"--}}
                                                                                               {{--name="countrySuserName"--}}
                                                                                               {{--maxlength="100"--}}
                                                                                               {{--value=" ' + country.suser_name + ' "--}}
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
                                                                                                class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-default"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="countryAdd" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-country-insert')}}" >
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="addCountryName">{{ $texts->firstWhere('caption_name', 'BlockCountryAddCountryName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addCountryName" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="addCountryFullName"> {{ $texts->firstWhere('caption_name', 'BlockCountryAddCountryFullName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addCountryFullName" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="addCountryCode"> {{ $texts->firstWhere('caption_name', 'BlockCountryAddCountryCode')->caption_translation }}<span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addCountryCode" maxlength="5"  value=""
                                                                       class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="addCountryCodeAlpha2">{{ $texts->firstWhere('caption_name', 'BlockCountryAddCountryCodeAlpha2')->caption_translation }}<span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addCountryCodeAlpha2" maxlength="4" value=""
                                                                       class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" maxlength="6" for="addCountryCodeAlpha3">{{ $texts->firstWhere('caption_name', 'BlockCountryAddCountryCodeAlpha3')->caption_translation }}<span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addCountryCodeAlpha3" value=""
                                                                       class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="addCountrySuserName"> {{ $texts->firstWhere('caption_name', 'BlockCountryAddCountrySuserName')->caption_translation }}<span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addCountrySuserName" maxlength="100" value=""
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

                                                <div id="countryDelete" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-country-delete')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'BlockCountrySelectDelete')->caption_translation }} </label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="deleteCountryId" required>
                                                                    <option> </option>
                                                                    @foreach($countriesAll as $country)
                                                                        <option class="col-xs-7" value="{{$country->id}}" >{{$country->country_name}}</option>
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

                                    <div class="tab-pane" id="region">
                                        {{--<p class="lead">Home tab</p>--}}
                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#regionGet">{{ $texts->firstWhere('caption_name', 'BlockRegionAll')->caption_translation }} </a></li>
                                                <li ><a data-toggle="tab" href="#regionAdd"> {{ $texts->firstWhere('caption_name', 'BlockRegionAddNew')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#regionDelete"> {{ $texts->firstWhere('caption_name', 'BlockRegionDelete')->caption_translation }}</a></li>
                                            </ul><br>


                                            <div class="tab-content menuHeader">
                                                <div id="regionGet" class="tab-pane fade in active">
                                                    <div class="container">

                                                        <div class="form-group"><br>
                                                            <label class="control-label col-md-2 col-sm-2 col-xs-4"
                                                                   for="getAllCountryName">  {{ $texts->firstWhere('caption_name', 'BlockRegionSelectCountry')->caption_translation }}
                                                                <span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <select id="getAllCountryName" class="form-control"
                                                                        name="getAllCountryName" required>
                                                                    <option value="#"> </option>
                                                                    @foreach($countriesAll as $key=>$value)

                                                                        <option class="col-xs-7"
                                                                                value="{{$value->id}}">{{$value->country_name}}</option>
                                                                    @endforeach
                                                                </select><br><br>
                                                            </div>
                                                        </div>

                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            {{--<h3>{{ $texts->firstWhere('caption_name', 'BlockRegionList')->caption_translation }}</h3>--}}
                                                            <tr>
                                                                <th class="col-md-6" scope="col">{{ $texts->firstWhere('caption_name', 'BlockRegionName')->caption_translation }}</th>
                                                                <th class="col-md-2" scope="col">{{ $texts->firstWhere('caption_name', 'BlockRegionCode')->caption_translation }}</th>
                                                                <th class="col-md-2" scope="col">{{ $texts->firstWhere('caption_name', 'BlockRegionCodeAlpha')->caption_translation }}</th>
                                                                <th class="col-md-2" scope="col">{{ $texts->firstWhere('caption_name', 'BlockRegionSuserName')->caption_translation }}</th>
                                                            </tr>
                                                            </thead>
                                                        </table>

                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <tr></tr>
                                                            </thead>

                                                            <tbody>
                                                            <tr id="regions"></tr>
                                                            </tbody>
                                                        </table>


                                                        {{------------------modal Region-------------------------}}
                                                        <div id="modalRegion"></div>
                                                    </div>
                                                </div>

                                                <div id="regionAdd" class="tab-pane fade " >
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-region-insert')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="countryName"> {{ $texts->firstWhere('caption_name', 'BlockRegionSelectCountry')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">

                                                                <select  id="select1" class="form-control" name="countryNameId">

                                                                    @foreach($countriesAll as $key=>$value)
                                                                        <option class="col-xs-7" value="{{$value->id}}" >{{$value->country_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="addRegionName"> {{ $texts->firstWhere('caption_name', 'BlockRegionAddName')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addRegionName" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="addRegionCode"> {{ $texts->firstWhere('caption_name', 'BlockRegionAddCod')->caption_translation }}<span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addRegionCode" maxlength="15" value=""
                                                                       required="required" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="addRegionCodeApha"> {{ $texts->firstWhere('caption_name', 'BlockRegionAddCodAlpha')->caption_translation }}<span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addRegionCodeApha" maxlength="15"  value=""
                                                                       class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="addRegionSuserName"> {{ $texts->firstWhere('caption_name', 'BlockRegionAddSuserName')->caption_translation }}<span class="required"></span></label>
                                                            <div class="col-xs-7">
                                                                <input type="text"  name="addRegionSuserName" maxlength="100" value=""
                                                                       class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>
                                                            <div class="col-xs-1 col-sm-offset-5"><br>
                                                                <button type="submit"   class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div id="regionDelete" class="tab-pane fade">
                                                    <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-region-delete')}}" >
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                   for="countryName"> {{ $texts->firstWhere('caption_name', 'BlockRegionSelectCountry')->caption_translation }}
                                                                <span class="required">*</span></label>
                                                            <div class="col-xs-7">

                                                                <select id="countrySelectName" class="form-control countrySelectName"
                                                                        name="countryName" required>

                                                                    @foreach($countriesAll as $key=>$value)

                                                                        <option class="col-xs-7"
                                                                                value="{{$value->id}}">{{$value->country_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                   for="CountryIdSelect">Select
                                                                region {{--{{ $texts->firstWhere('caption_name', 'BlockRegionSelectCountry')->caption_translation }}--}}
                                                                <span class="required">*</span></label>
                                                            <div class="col-xs-7">
                                                                <select name="regionName" id="regionsDelete"
                                                                        class="form-control">
                                                                    <option value="#">...</option>
                                                                    @foreach($countriesAll as $key=>$value)
                                                                        @foreach($value->regions as $region)
                                                                            <option data-id="{{$region->id}}"  value="{{($region->country_id)}}">{{$region->region_name}}</option>
                                                                        @endforeach
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-xs-offset-8 col-xs-4">
                                                                <button type="submit" id="deleteRegionSubmit" class="btn btn-danger">@lang('MenuAdministeringDB.ButtonDelete')</button>
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

        <script>
            $("#countrySelectName").change(function() {
                if ($(this).data('options') === undefined) {
                    /*Taking an array of all options-2 and kind of embedding it on the select1*/
                    $(this).data('options', $('#regionsDelete option').clone());
                }
                var id = $(this).val();
                var options = $(this).data('options').filter('[value=' + id + ']');
                $('#regionsDelete').html(options);
            });


            {{--------delete Region--------------}}

            $('#deleteRegionSubmit').on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/admin/region/delete",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id:$('#regionsDelete option:selected').attr('data-id'),
                    },
                    success:function(response){
//                        $("#alert").text(response.message);

                        setTimeout(function(){
                            window.location.reload(1);
                        }, 200);
                    }
                });
            });

            {{--------END delete Region----------}}


            {{--------get Regions Ajax--------------}}

            $('#getAllCountryName').on('change', function() {
                var id = this.value;
                $.ajax({
                    method: "POST",
                    url: "/admin/get/region/ajax",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(response){
//                        console.log(response);
                        $('#regions').empty();

                        $.each( response, function( key, regions ) {
                            console.log(regions.region_name);
                            console.log(regions.id);

                            $('#regions').append(
                                '<button  value=" '+ regions.id +' " style="min-width: 100%;" type="button" class="btn btn-info btn-lg modalUpdateRegion" data-toggle="modal" data-target="#region'+ regions.id +'">'+
                                '<span class="col-md-6" style="text-align: left">' + regions.region_name +'</span>'+
                                '<span class="col-md-2" style="text-align: left">' + regions.region_code + '</span>'+
                                '<span class="col-md-2" style="text-align: left">' + regions.region_code_alpha + '</span>'+
//                                '<span class="col-md-2" style="text-align: left">' + regions.suser_name + '</span>'+
                                '</button>'
                            );
                        });
                    }
                });
            });
            {{--------END get Regions Ajax----------}}

            /*--------Update Table Coutry modal AJAX------*/

            $( document ).ready(function() {
                $('.modalUpdateCountry').click(function () {
//            });
//            $(document).on('click', '.modalUpdateCountry', function() {
                    var id = $(this).val();

                    $.ajax({
                        method: "POST",
                        url: "/admin/update/country/modal/ajax",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                        },
                        success: function (response) {
//                        console.log(response);

                            $.each(response, function (key, country) {
//                            console.log(country.id);

                                $('#modalCountry').append(
                                    '<div class="modal fade " id="country' + country.id + '" role="dialog">' +
                                    '<div class="modal-dialog modal-lg">' +
                                    '<div class="modal-content">' +
                                    '<div class="modal-header">' +
                                    '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
                                    '<h4 class="modal-title">' + country.country_name + '</h4>' +
                                    '</div>' +

                                    '<div class="modal-body">' +
                                    '<form class="form-horizontal form-label-left" method="POST"  action="{{route('admin-country-update')}}">' +
                                    '{{csrf_field()}}' +

                                    '<input type="hidden" name="idCountry" value="' + country.id + '">' +
                                    '<div class="form-group">' +
                                    '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="countryName"> {{ $texts->firstWhere('caption_name', 'BlockRegionName')->caption_translation }}<span class="required">*</span></label>' +
                                    '<div class="col-xs-7">' +
                                    '<input type="text"  name="countryName" value=" ' + country.country_name + '"  required="required" class="form-control col-md-7 col-xs-12">' +
                                    '</div>' +
                                    '</div>' +

                                    '<div class="form-group">' +
                                    '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="countryFullName"> {{ $texts->firstWhere('caption_name', 'BlockCountryFullName')->caption_translation }}<span class="required">*</span></label>' +
                                    '<div class="col-xs-7">' +
                                    '<input type="text"  name="countryFullName" value=" ' + country.country_full_name + ' "  required="required" class="form-control col-md-7 col-xs-12">' +
                                    '</div>' +
                                    '</div>' +

                                    '<div class="form-group">' +
                                    '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="countryCode">{{ $texts->firstWhere('caption_name', 'BlockCountryCod')->caption_translation }}<span class="required"></span></label>' +
                                    '<div class="col-xs-7">' +
                                    '<input type="text"  name="countryCode" maxlength="5"  value=" ' + country.country_code + ' " class="form-control col-md-7 col-xs-12">' +
                                    '</div>' +
                                    '</div>' +

                                    '<div class="form-group">' +
                                    '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="countryCodeAlpha2">{{ $texts->firstWhere('caption_name', 'BlockCountryAlpha2')->caption_translation }}<span class="required"></span></label>' +
                                    '<div class="col-xs-7">' +
                                    '<input type="text"  name="countryCodeAlpha2" maxlength="4" value=" ' + country.country_code_alpha2 + ' " class="form-control col-md-7 col-xs-12"> ' +
                                    '</div>' +
                                    '</div>' +


                                    '<div class="form-group">' +
                                    '<label class="control-label col-md-3 col-sm-3 col-xs-4" maxlength="6" for="countryCodeAlpha3">{{ $texts->firstWhere('caption_name', 'BlockCountryAlpha3')->caption_translation }}<span class="required"></span></label>' +
                                    '<div class="col-xs-7">' +
                                    '<input type="text"  name="countryCodeAlpha3" value=" ' + country.country_code_alpha3 + ' " class="form-control col-md-7 col-xs-12">' +
                                    '</div>' +
                                    '</div>' +

                                    '<div class="form-group">' +
                                    '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="countrySuserName"> {{ $texts->firstWhere('caption_name', 'BlockCountrySuserName')->caption_translation }}<span class="required"></span></label>' +
                                    '<div class="col-xs-7">' +
                                    '<input type="text"  name="countrySuserName" maxlength="100" value=" ' + country.suser_name + ' " class="form-control col-md-7 col-xs-12">' +
                                    '</div>' +
                                    '</div>' +

                                    '<div class="form-group">' +
                                    '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>' +
                                    '<div class="col-xs-1 col-sm-offset-5"><br>' +
                                    '<button type="submit" class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</form>' +
                                    '</div>' +

                                    '<div class="modal-footer">' +
                                    '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                );
                            });
                        }
                    });
                });
            });
            /*--------END Update Table Coutry modal AJAX-----------*/

            /*--------Update Table Region modal AJAX------*/

            $(document).on('click', '.modalUpdateRegion', function() {

                var id = $(this).val();
//                console.log(id);

                $.ajax({
                    method: "POST",
                    url: "/admin/update/region/modal/ajax",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(response){

                        $.each( response, function( key, region ) {
//                            console.log(region.id);

                            $('#modalRegion').append(
                                '<div class="modal fade " id="region'+ region.id +'" role="dialog">'+
                                '<div class="modal-dialog modal-lg">'+
                                '<div class="modal-content">'+
                                '<div class="modal-header">'+
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                '<h4 class="modal-title">'+ region.region_name +'</h4>'+
                                '</div>'+

                                '<div class="modal-body">'+
                                '<form class="form-horizontal form-label-left" method="POST" action="{{route('admin-region-update')}}" >'+
                                        '{{ csrf_field() }}'+
                                        '<input type="hidden" name="idRegion" value="'+ region.id +'">'+

                                        '<div class="form-group">'+
                                        '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="regionName"> {{ $texts->firstWhere('caption_name', 'BlockRegionName')->caption_translation }}<span class="required">*</span></label>'+
                                        '<div class="col-xs-7">'+
                                        '<input type="text"  name="regionName" value=" '+ region.region_name +' " required="required" class="form-control col-md-7 col-xs-12">'+
                                        '</div>'+
                                        '</div>'+

                                        '<div class="form-group">'+
                                        '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="regionCode">{{ $texts->firstWhere('caption_name', 'BlockRegionCode')->caption_translation }}<span class="required">*</span></label>'+
                                        '<div class="col-xs-7">'+
                                        '<input type="text"  name="regionCode" maxlength="15" value=" '+ region.region_code +' "  required="required" class="form-control col-md-7 col-xs-12">'+
                                        '</div>'+
                                        '</div>'+

                                        '<div class="form-group">'+
                                        '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="regionCodeAlpha">{{ $texts->firstWhere('caption_name', 'BlockRegionCodeAlpha')->caption_translation }}<span class="required"></span></label>'+
                                        '<div class="col-xs-7">'+
                                        '<input type="text"  name="regionCodeAlpha" maxlength="15"  value=" '+ region.region_code_alpha +' " class="form-control col-md-7 col-xs-12">'+
                                        '</div>'+
                                        '</div>'+

                                        '<div class="form-group">'+
                                        '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="regionSuserName">{{ $texts->firstWhere('caption_name', 'BlockRegionSuserName')->caption_translation }}<span class="required"></span></label>'+
                                        '<div class="col-xs-7">'+
                                        '<input type="text"  name="regionSuserName" maxlength="100" value=" '+ region.suser_name +' " class="form-control col-md-7 col-xs-12">'+
                                        '</div>'+
                                        '</div>'+

                                        '<div class="form-group">'+
                                        '<label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span></label>'+
                                        '<div class="col-xs-1 col-sm-offset-5"><br>'+
                                        '<button type="submit" class="btn btn-success">@lang('MenuAdministeringDB.ButtonSave')</button>'+
                                        '</div>'+
                                        '</div>'+
                                        '</form>'+


                                '</div>'+

                                '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'+
                                '</div>'+
                                '</div>'+
                                '</div>'+
                                '</div>'
                            );
                        });
                    }
                });
            });
            /*--------END Update Table Region modal AJAX-----------*/

        </script>



        <!-- footer content -->

    @include('auth.admin.layouts.footer')

    <!-- /footer content -->
    </div>
    <!-- /page content -->

@endsection

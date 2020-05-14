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
                                <!-- required for floating -->
                                <!-- Nav tabs -->
                                {{--<ul class="nav nav-tabs tabs-left">--}}
                                    {{--<li class="active"><a href="#organizations" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'AccOrganization')->caption_translation }}</a></li>--}}
                                    {{--<li><a href="#contractors" data-toggle="tab">{{ $texts->firstWhere('caption_name', 'AccContractor')->caption_translation }}</a></li>--}}
                                {{--</ul>--}}
                                {{--.container {--}}
                                {{--justify-content: flex-start | flex-end | center | space-between | space-around | space-evenly;--}}
                                {{--}--}}
                            </div>

                            <div class="col-md-10">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="menuHeader">
                                        <ul class="nav nav-tabs flex-container">
                                            <li class="active flex-item"><a data-toggle="tab"  href="#organizations" >{{ $texts->firstWhere('caption_name', 'AccOrganization')->caption_translation }}</a></li>
                                            <li class="flex-item"><a data-toggle="tab"  href="#contractors" class = "menu_one">{{ $texts->firstWhere('caption_name', 'AccContractor')->caption_translation }}</a></li>
                                        </ul>
                                    </div>

                                    <div id="contractors" class="tab-pane fade in ">
                                            <div class="menuHeader">
                                                <ul class="nav nav-tabs flex-container">
                                                    <li class="active flex-item"><a data-toggle="tab" href="#accAllContractor">{{ $texts->firstWhere('caption_name', 'ContractorAll')->caption_translation }}</a></li>
                                                    <li class="flex-item"><a data-toggle="tab" href="#accAddNewContractor">{{ $texts->firstWhere('caption_name', 'ContractorAddNew')->caption_translation }}</a></li>
                                                    <li class="flex-item"><a data-toggle="tab" href="#accDeleteNewContractor">{{ $texts->firstWhere('caption_name', 'ContractorDeleteNew')->caption_translation }}</a></li>
                                                    <li class="flex-item"><a data-toggle="tab" href="#accViewContractor">{{ $texts->firstWhere('caption_name', 'ConsumerInfo')->caption_translation }}</a></li>
                                                </ul><br>

                                            <div class="tab-content menuHeader">
                                                <div id="accAllContractor" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <tr>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'dbArea')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'accUid1cCode')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'contractor_fullname')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'contractor_short_name')->caption_translation }}</th>
                                                            </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($contractors as $contractor)

                                                            <button style="min-width: 100%; " type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#allCompanies{{$contractor['id']}}">
                                                                <table class="table" style="text-align: left">
                                                                    <thead>
                                                                        <tr>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="col-md-1">@if( isset($contractor['country']->country_name)) {{$contractor['country']->country_name}}@endif</td>
                                                                        <td class="col-md-1">@if(isset($contractor['dbarea']->db_area_code)) {{$contractor['dbarea']->db_area_code}}@endif</td>
                                                                        <td class="col-md-1">{{$contractor['uid_1c_code']}}</td>
                                                                        <td class="col-md-1">{{$contractor['contractor_full_name']}}</td>
                                                                        <td class="col-md-1">{{$contractor['contractor_short_name']}}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </button>
                                                        @endforeach

                                                        {{------------------modal-------------------------}}
                                                        @foreach($contractors as $contractor)

                                                            <div class="modal fade " id="allCompanies{{$contractor['id']}}" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">{{$contractor['contractor_full_name']}}</h4>
                                                                            <p style="color: red">{{--{{$server['id']}}--}}</p>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal form-label-left"
                                                                                  method="POST"
                                                                                  action="{{route('admin-accesses-update')}}">
                                                                                {{ csrf_field() }}

                                                                                <input type="hidden" name="accContractorId" value="{{$contractor['id']}}">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCountry">{{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">

                                                                                        <select class="form-control" name = "accCountry" id="accCountry" require>
                                                                                            @foreach($country as $c)
                                                                                                <option class="col-xs-7"  value="{{$c->id}}">{{$c->country_name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accDBArea">{{ $texts->firstWhere('caption_name', 'dbArea')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <select class="form-control" name ="accDBArea" id="accDBArea" require>
                                                                                            @foreach($dbarea as $d)
                                                                                                <option class="col-xs-7" value="{{$d->id }}">{{$d->db_area_code}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompUid1cCode">{{ $texts->firstWhere('caption_name', 'accUid1cCode')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accCompUid1cCode"
                                                                                               value="{{$contractor['uid_1c_code']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accindividual_l">{{ $texts->firstWhere('caption_name', 'individual')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accindividual_l"
                                                                                               value="{{$contractor['individual_l']}}"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accIdentity_document">{{ $texts->firstWhere('caption_name', 'identity_document')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accIdentity_document"
                                                                                               value="{{$contractor['identity_document']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accContractor_fullname">{{ $texts->firstWhere('caption_name', 'contractor_fullname')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="accContractor_fullname"
                                                                                               value="{{$contractor['contractor_full_name']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accContractor_short_name">{{ $texts->firstWhere('caption_name', 'contractor_short_name')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="accContractor_short_name"
                                                                                               value="{{$contractor['contractor_short_name']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accTaxpayer_number">{{ $texts->firstWhere('caption_name', 'taxpayer_number')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accTaxpayer_number"
                                                                                               value="{{$contractor['taxpayer_number']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCode_reason_number">{{ $texts->firstWhere('caption_name', 'code_reason_number')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accCode_reason_number"
                                                                                               value="{{$contractor['code_reason_number']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accSocial_security_number">{{ $texts->firstWhere('caption_name', 'social_security_number')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accSocial_security_number"
                                                                                               value="{{$contractor['social_security_number']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           {{--измениить потом social_security_number = registry_number--}}
                                                                                           for="accRegistry_number">{{ $texts->firstWhere('caption_name', 'registry_number')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accRegistry_number"
                                                                                               value="{{$contractor['register_number']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accEntrepreneur_certificate">{{ $texts->firstWhere('caption_name', 'entrepreneur_certificate')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accEntrepreneur_certificate"
                                                                                               value="{{$contractor['entrepreneur_certificate']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accEntrepreneur_certificate_date">{{ $texts->firstWhere('caption_name', 'entrepreneur_certificate_date')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="date"
                                                                                               name="accEntrepreneur_certificate_date"
                                                                                               value="{{$contractor['entrepreneur_certificate_date']}}"
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

                                                        {{------------------End modal---------------------}}
                                                    </div>
                                                </div>

                                                <div id="accAddNewContractor" class="tab-pane">
                                                    <div class="container">
                                                        <form class="form-horizontal form-label-left"
                                                              method="POST"
                                                              action="{{route('admin-accesses-insert')}}">
                                                            {{ csrf_field() }}

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddCountry">{{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <select class="form-control" name = "accAddCountry" id="accAddCountry" require>
                                                                        @foreach($country as $c)
                                                                            <option class="col-xs-7" value="{{$c->id}}">{{$c->country_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddDBArea">{{ $texts->firstWhere('caption_name', 'dbArea')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <select class="form-control" name = "accAddDBArea" id="accAddDBArea" require>
                                                                        @foreach($dbarea as $d)
                                                                            <option class="col-xs-7" value="{{$d->id }}">{{$d->db_area_code}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddCompUid1cCode">{{ $texts->firstWhere('caption_name', 'accUid1cCode')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accAddCompUid1cCode"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>
                                                                {{----}}
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddindividual_l">{{ $texts->firstWhere('caption_name', 'individual')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accAddindividual_l"
                                                                           value=""
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddIdentity_document">{{ $texts->firstWhere('caption_name', 'identity_document')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accAddIdentity_document"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddContractor_fullname">{{ $texts->firstWhere('caption_name', 'contractor_fullname')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="accAddContractor_fullname"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddContractor_short_name">{{ $texts->firstWhere('caption_name', 'contractor_short_name')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="accAddContractor_short_name"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddTaxpayer_number">{{ $texts->firstWhere('caption_name', 'taxpayer_number')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="accAddTaxpayer_number"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddCode_reason_number">{{ $texts->firstWhere('caption_name', 'code_reason_number')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accAddCode_reason_number"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       {{--измениить потом social_security_number = registry_number--}}
                                                                       for="accAddRegistry_number">{{ $texts->firstWhere('caption_name', 'registry_number')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accAddRegistry_number"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddSocial_security_number">{{ $texts->firstWhere('caption_name', 'social_security_number')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accAddSocial_security_number"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddEntrepreneur_certificate">{{ $texts->firstWhere('caption_name', 'entrepreneur_certificate')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accAddEntrepreneur_certificate"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accAddEntrepreneur_certificate_date">{{ $texts->firstWhere('caption_name', 'entrepreneur_certificate_date')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="date"
                                                                           name="accAddEntrepreneur_certificate_date"
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

                                                <div id="accDeleteNewContractor" class="tab-pane">
                                                    <div class="container">
                                                        <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-accesses-delete')}}" >
                                                            {{ csrf_field() }}

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'selectContractorDelete')->caption_translation }} </label>
                                                                <div class="col-xs-7">
                                                                    <select class="form-control" name="accContractorDeleteId" required>
                                                                        @foreach($contractors as $contractor)
                                                                            <option class="col-xs-7" value="{{$contractor->id}}" >{{$contractor->contractor_full_name}}</option>
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
                                                <div id="accViewContractor" class="tab-pane fade in">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                                <h3>{{ $texts->firstWhere('caption_name', 'ConsumerInfo')->caption_translation }}</h3>
                                                            <tr>
                                                                <th class="col-md-3" scope="col">
                                                                    <select class="form-control" name = "ConsumerInfo" id="ConsumerInfo" require>
                                                                        <option>{{ $texts->firstWhere('caption_name', 'SelectConsumer')->caption_translation }}</option>
                                                                        @foreach($contractors as $contractor)
                                                                            <option class="col-xs-7" value="{{$contractor->id}}" >{{$contractor->contractor_full_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    <h4>{{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}</h4>
                                                                </th>
                                                                <th>
                                                                    <h4>{{ $texts->firstWhere('caption_name', 'kind')->caption_translation }}</h4>
                                                                </th>
                                                                <th>
                                                                    <h4>{{ $texts->firstWhere('caption_name', 'Type')->caption_translation }}</h4>
                                                                </th>
                                                                <th>
                                                                    <h4>
                                                                        @if(isset($texts->firstWhere('caption_name', 'Representation')->caption_translation))
                                                                        {{ $texts->firstWhere('caption_name', 'Representation')->caption_translation }}
                                                                        @endif
                                                                    </h4>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                        <table class="table" style="text-align: left">
                                                            <tbody id="updatePage">
                                                            </tbody>
                                                        </table>
                                                        @foreach($companyInfo  as $cInfo)
                                                            <div class="modal fade" id="myModal{{$cInfo->id}}" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            {{--<h4 class="modal-title">{{$cInfo->companies->company_full_name}}</h4>--}}
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'CaptionCode')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    {{--<h4>{{$cInfo->companies->company_full_name}}</h4>--}}
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->country->country_name}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'KindName')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>  @if(isset($cInfo->infotype->info_kind_name)){{$cInfo->infokind->info_kind_name}} @endif</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'infoTName')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4> @if(isset($cInfo->infotype->info_type_name)){{$cInfo->infotype->info_type_name}} @endif</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">

                                                                                    @if(isset($texts->firstWhere('caption_name', 'Representation')->caption_translation))
                                                                                        {{ $texts->firstWhere('caption_name', 'Representation')->caption_translation }}
                                                                                    @endif

                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->representation}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">

                                                                                    @if(isset($texts->firstWhere('caption_name', 'City')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'City')->caption_translation }}
                                                                                    @endif
                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->city_name}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">

                                                                                    @if(isset($texts->firstWhere('caption_name', 'e_mail')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'e_mail')->caption_translation }}
                                                                                    @endif

                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->e_mail}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">

                                                                                    @if(isset($texts->firstWhere('caption_name', 'url')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'url')->caption_translation }}
                                                                                    @endif

                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->url_name}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">

                                                                                    @if(isset($texts->firstWhere('caption_name', 'phone_number')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'phone_number')->caption_translation }}
                                                                                    @endif

                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->phone_number}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">

                                                                                    @if(isset($texts->firstWhere('caption_name', 'phone_number_without_codes')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'phone_number_without_codes')->caption_translation }}
                                                                                    @endif

                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->phone_number_without_codes}}</h4>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="modal-footer">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div id="organizations" class="tab-pane fade in active">

                                        <div class="menuHeader">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#accAllCompanies">{{ $texts->firstWhere('caption_name', 'OrganAll')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#accAddNewCompany">{{ $texts->firstWhere('caption_name', 'OrganAddNew')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#accDeleteNewCompany">{{ $texts->firstWhere('caption_name', 'OrganDeleteNew')->caption_translation }}</a></li>
                                                <li><a data-toggle="tab" href="#accViewCompany">{{ $texts->firstWhere('caption_name', 'CompanyInfo')->caption_translation }}</a></li>
                                            </ul><br>
                                            <div class="tab-content menuHeader">
                                                <div id="accAllCompanies" class="tab-pane fade in active">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3>{{--{{ $texts->firstWhere('caption_name', 'DBList')->caption_translation }}--}}</h3>
                                                            <tr>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'dbArea')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'accUid1cCode')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'company_fullname')->caption_translation }}</th>
                                                                <th class="col-md-1" scope="col">{{ $texts->firstWhere('caption_name', 'company_short_name')->caption_translation }}</th>
                                                            </tr>
                                                            </thead>
                                                        </table>

                                                        @foreach($company as $c)
                                                            <button style="min-width: 100%; " type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#allContractors{{$c['id']}}">
                                                                <table class="table" style="text-align: left">
                                                                    <thead>
                                                                    <tr>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="col-md-1">@if(isset($c->country->country_name)){{$c->country->country_name}}@endif</td>
                                                                        <td class="col-md-1">{{$c->dbarea->db_area_code}}</td>
                                                                        <td class="col-md-1">{{$c['uid_1c_code']}}</td>
                                                                        <td class="col-md-1">{{$c['company_full_name']}}</td>
                                                                        <td class="col-md-1">{{$c['company_short_name']}}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </button>
                                                        @endforeach

                                                        {{------------------modal-------------------------}}
                                                        @foreach($company as $c)

                                                            <div class="modal fade " id="allContractors{{$c['id']}}" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">{{$c['company_full_name']}}</h4>
                                                                            <p style="color: red">{{--{{$server['id']}}--}}</p>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal form-label-left"
                                                                                  method="POST"
                                                                                  action="{{route('admin-company-update')}}">
                                                                                {{ csrf_field() }}

                                                                                <input type="hidden" name="accCompanyId" value="{{$c['id']}}">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompanyCountry">{{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">

                                                                                        <select class="form-control" name = "accCompanyCountry" id="accCompanyCountry" require>
                                                                                            @foreach($country as $count)
                                                                                                <option class="col-xs-7" value="{{$count->id}}">{{$count->country_name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompanyDBArea">{{ $texts->firstWhere('caption_name', 'dbArea')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <select class="form-control" name = "accCompanyDBArea" id="accCompanyDBArea" require>
                                                                                            @foreach($dbarea as $d)
                                                                                                <option class="col-xs-7" value="{{$d->id }}">{{$d->db_area_code}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompanyCompUid1cCode">{{ $texts->firstWhere('caption_name', 'accUid1cCode')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accCompanyCompUid1cCode"
                                                                                               value="{{$c['uid_1c_code']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompanyindividual_l">{{ $texts->firstWhere('caption_name', 'individual')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accCompanyindividual_l"
                                                                                               value="{{$c['individual_l']}}"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                {{--<div class="form-group">--}}
                                                                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-4"--}}
                                                                                           {{--for="accCompanyEntepreneur">{{ $texts->firstWhere('caption_name', 'entepreneur')->caption_translation }}<span--}}
                                                                                                {{--class="required">*</span></label>--}}
                                                                                    {{--<div class="col-xs-7">--}}
                                                                                        {{--<input type="text"--}}
                                                                                               {{--name="accCompanyEntepreneur"--}}
                                                                                               {{--value="{{$c['entrepreneur_l']}}"--}}
                                                                                               {{--required="required"--}}
                                                                                               {{--class="form-control col-md-7 col-xs-12">--}}
                                                                                    {{--</div>--}}
                                                                                {{--</div>--}}

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompany_fullname">{{ $texts->firstWhere('caption_name', 'company_fullname')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="accCompany_fullname"
                                                                                               value="{{$c['company_full_name']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompany_short_name">{{ $texts->firstWhere('caption_name', 'company_short_name')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="text"
                                                                                               name="accCompany_short_name"
                                                                                               value="{{$c['company_short_name']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompanyTaxpayer_number">{{ $texts->firstWhere('caption_name', 'taxpayer_number')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accCompanyTaxpayer_number"
                                                                                               value="{{$c['taxpayer_number']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompanyCode_reason_number">{{ $texts->firstWhere('caption_name', 'code_reason_number')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accCompanyCode_reason_number"
                                                                                               value="{{$c['code_reason_number']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompanySocial_security_number">{{ $texts->firstWhere('caption_name', 'social_security_number')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accCompanySocial_security_number"
                                                                                               value="{{$c['social_security_number']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"

                                                                                           for="accCompanyRegistry_number">{{ $texts->firstWhere('caption_name', 'registry_number')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accCompanyRegistry_number"
                                                                                               value="{{$c['register_number']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompanyEntrepreneur_certificate">{{ $texts->firstWhere('caption_name', 'entrepreneur_certificate')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="number"
                                                                                               name="accCompanyEntrepreneur_certificate"
                                                                                               value="{{$c['entrepreneur_certificate']}}"
                                                                                               required="required"
                                                                                               class="form-control col-md-7 col-xs-12">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                                           for="accCompanyEntrepreneur_certificate_date">{{ $texts->firstWhere('caption_name', 'entrepreneur_certificate_date')->caption_translation }}<span
                                                                                                class="required">*</span></label>
                                                                                    <div class="col-xs-7">
                                                                                        <input type="date"
                                                                                               name="accCompanyEntrepreneur_certificate_date"
                                                                                               value="{{$c['entrepreneur_certificate_date']}}"
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

                                                        {{------------------End modal---------------------}}
                                                    </div>
                                                </div>

                                                <div id="accAddNewCompany" class="tab-pane">
                                                    <div class="container">
                                                        <form class="form-horizontal form-label-left"
                                                              method="POST"
                                                              action="{{route('admin-company-insert')}}">
                                                            {{ csrf_field() }}

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddCountry">{{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <select class="form-control" name = "accCompanyAddCountry" id="accCompanyAddCountry" require>
                                                                        @foreach($country as $c)
                                                                            <option class="col-xs-7" value="{{$c->id}}">{{$c->country_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddDBArea">{{ $texts->firstWhere('caption_name', 'dbArea')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <select class="form-control" name = "accCompanyAddDBArea" id="accCompanyAddDBArea" require>
                                                                        @foreach($dbarea as $d)
                                                                            <option class="col-xs-7" value="{{$d->id }}">{{$d->db_area_code}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddCompUid1cCode">{{ $texts->firstWhere('caption_name', 'accUid1cCode')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accCompanyAddCompUid1cCode"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>
                                                            {{----}}
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddindividual_l">{{ $texts->firstWhere('caption_name', 'individual')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accCompanyAddindividual_l"
                                                                           value=""
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddEntepreneur_l">{{ $texts->firstWhere('caption_name', 'entepreneur')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accCompanyAddEntepreneur_l"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddContractor_fullname">{{ $texts->firstWhere('caption_name', 'company_fullname')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="accCompanyAddContractor_fullname"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddContractor_short_name">{{ $texts->firstWhere('caption_name', 'company_short_name')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="text"
                                                                           name="accCompanyAddContractor_short_name"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddTaxpayer_number">{{ $texts->firstWhere('caption_name', 'taxpayer_number')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accCompanyAddTaxpayer_number"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddCode_reason_number">{{ $texts->firstWhere('caption_name', 'code_reason_number')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accCompanyAddCode_reason_number"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddRegistry_number">{{ $texts->firstWhere('caption_name', 'registry_number')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accCompanyAddRegistry_number"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddSocial_security_number">{{ $texts->firstWhere('caption_name', 'social_security_number')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accCompanyAddSocial_security_number"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddEntrepreneur_certificate">{{ $texts->firstWhere('caption_name', 'entrepreneur_certificate')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="number"
                                                                           name="accCompanyAddEntrepreneur_certificate"
                                                                           value=""
                                                                           required="required"
                                                                           class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4"
                                                                       for="accCompanyAddEntrepreneur_certificate_date">{{ $texts->firstWhere('caption_name', 'entrepreneur_certificate_date')->caption_translation }}<span
                                                                            class="required">*</span></label>
                                                                <div class="col-xs-7">
                                                                    <input type="date"
                                                                           name="accCompanyAddEntrepreneur_certificate_date"
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

                                                <div id="accDeleteNewCompany" class="tab-pane">
                                                    <div class="container">
                                                        <form class="form-horizontal form-label-left" method="POST" action="{{route('admin-company-delete')}}" >
                                                            {{ csrf_field() }}

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"><span class="required"></span>{{ $texts->firstWhere('caption_name', 'selectOrganDelete')->caption_translation }} </label>
                                                                <div class="col-xs-7">
                                                                    <select class="form-control" name="accCompanyDeleteId" required>
                                                                        @foreach($company as $c)
                                                                            <option class="col-xs-7" value="{{$c->id}}" >{{$c->company_full_name}}</option>
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
                                                <div id="accViewCompany" class="tab-pane fade in">
                                                    <div class="container">
                                                        <table class="table" style="text-align: left">
                                                            <thead>
                                                            <h3>{{ $texts->firstWhere('caption_name', 'CompanyInfo')->caption_translation }}</h3>
                                                            <tr>
                                                                <th class="col-md-3" scope="col">
                                                                    <select class="form-control" name = "CompanyInfo" id="CompanyInfo" require>
                                                                        <option>{{ $texts->firstWhere('caption_name', 'SelectCompany')->caption_translation }}</option>
                                                                        @foreach($company as $c)
                                                                            <option class="col-xs-7" value="{{$c->id}}" >{{$c->company_full_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <h4>{{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}</h4>
                                                                    </th>
                                                                    <th>
                                                                        <h4>{{ $texts->firstWhere('caption_name', 'kind')->caption_translation }}</h4>
                                                                    </th>
                                                                    <th>
                                                                        <h4>{{ $texts->firstWhere('caption_name', 'Type')->caption_translation }}</h4>
                                                                    </th>
                                                                    <th>
                                                                        <h4>
                                                                            @if(isset($texts->firstWhere('caption_name', 'Representation')->caption_translation))
                                                                                {{ $texts->firstWhere('caption_name', 'Representation')->caption_translation }}
                                                                            @endif
                                                                        </h4>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <table class="table" style="text-align: left">
                                                            <tbody id="updatePage2">
                                                            </tbody>
                                                        </table>
                                                        @foreach($contractorInfo  as $cInfo)
                                                            <div class="modal fade" id="Modal{{$cInfo->id}}" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            {{--<h4 class="modal-title">{{$cInfo->contractors->contractor_full_name}}</h4>--}}
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            {{ csrf_field() }}
                                                                            <input type="hidden" name="idCapt" value="{{$cInfo->id}}">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'AccContractor')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    {{--<h4>{{$cInfo->contractors->contractor_full_name}}</h4>--}}
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'accCountry')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->country->country_name}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'KindName')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>
                                                                                        @if(isset($cInfo->infokind->info_kind_name))
                                                                                        {{$cInfo->infokind->info_kind_name}}
                                                                                        @endif
                                                                                    </h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category"> {{ $texts->firstWhere('caption_name', 'infoTName')->caption_translation }}<span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>
                                                                                        @if(isset($cInfo->infotype->info_type_name))
                                                                                        {{$cInfo->infotype->info_type_name}}
                                                                                        @endif
                                                                                    </h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">

                                                                                    @if(isset($texts->firstWhere('caption_name', 'Representation')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'Representation')->caption_translation }}
                                                                                    @endif
                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->representation}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">

                                                                                    @if(isset($texts->firstWhere('caption_name', 'City')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'City')->caption_translation }}
                                                                                    @endif

                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->city_name}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">
                                                                                    @if(isset($texts->firstWhere('caption_name', 'e_mail')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'e_mail')->caption_translation }}
                                                                                    @endif
                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->e_mail}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">

                                                                                @if(isset($texts->firstWhere('caption_name', 'url')->caption_translation))
                                                                                 {{ $texts->firstWhere('caption_name', 'url')->caption_translation }}
                                                                                @endif

                                                                                <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->url_name}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">
                                                                                    @if(isset($texts->firstWhere('caption_name', 'phone_number')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'phone_number')->caption_translation }}
                                                                                    @endif
                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->phone_number}}</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-4" for="parent-category">

                                                                                    @if(isset($texts->firstWhere('caption_name', 'phone_number_without_codes')->caption_translation))
                                                                                    {{ $texts->firstWhere('caption_name', 'phone_number_without_codes')->caption_translation }}
                                                                                    @endif

                                                                                    <span class="required">*</span></label>
                                                                                <div class="col-xs-7">
                                                                                    <h4>{{$cInfo->phone_number_without_codes}}</h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
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

        <script>
            $('#ConsumerInfo').on('change', function() {
                var id = this.value;
               // console.log(id);
                $.ajax({
                    method: "POST",
                    url: "/admin/update/contractor/modal/ajax",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#updatePage').empty();

                        $.each(response, function( key, info ) {
                            console.log(info.country.country_name);
                            $('#updatePage').append(
                                '<tr>'+
                                '<td class="col-md-3" data-toggle="modal" data-target="#myModal'+info.id +'">'+info.country.country_name+'</td>'+
                                '<td class="col-md-3" data-toggle="modal" data-target="#myModal'+info.id +'">'+info.infokind.info_kind_name+'</td>'+
                                '<td class="col-md-3" data-toggle="modal" data-target="#myModal'+info.id +'">'+info.infotype.info_type_name+'</td>'+
                                '<td class="col-md-3" data-toggle="modal" data-target="#myModal'+info.id +'">'+info.representation+'</td>'+
                                '</tr>'
                            );
                        });
                    }
                });
            });

            $('#CompanyInfo').on('change', function() {
                var id = this.value;
                $.ajax({
                    method: "POST",
                    url: "/admin/update/company/modal/ajax",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(response) {
                       console.log(response);
                        $('#updatePage2').empty();

                        $.each(response, function( key, info2 ) {
                            console.log(info2.country.country_name);
                            $('#updatePage2').append(
                                '<tr>'+
                                '<td class="col-md-3" data-toggle="modal" data-target="#Modal'+info2.id +'">'+info2.country.country_name+'</td>'+
                                '<td class="col-md-3" data-toggle="modal" data-target="#Modal'+info2.id +'">'+info2.infokind.info_kind_name+'</td>'+
                                '<td class="col-md-3" data-toggle="modal" data-target="#Modal'+info2.id +'">'+info2.infotype.info_type_name+'</td>'+
                                '<td class="col-md-3" data-toggle="modal" data-target="#Modal'+info2.id +'">'+info2.representation+'</td>'+
                                '</tr>'
                            );
                        });
                    }
                });

            });
        </script>
        <!-- footer content -->

        @include('auth.admin.layouts.footer')

        <!-- /footer content -->
    </div>
    <!-- /page content -->

@endsection

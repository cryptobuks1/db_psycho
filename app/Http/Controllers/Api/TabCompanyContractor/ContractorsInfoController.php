<?php

namespace App\Http\Controllers\Api\TabCompanyContractor;

use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\CompanyInfo;
use App\Models\ControllerLink;
use App\Models\DbTypeController;
use App\Models\InfoKind;
use App\Models\InfoType;
use App\Models\ModelTables;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Contractor;
use App\Http\Controllers\Api\Controller;
use App\Models\ContractorInfo;
use App\Models\DbArea;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ChangeRequest;
use App\Models\ChangeRequestController;
use App\Models\ChangeRequestControllerField;
use App\Models\ChangeRequestControllerFieldValue;
use App\Http\Classes\ConsumerParameters;
use Illuminate\Support\Facades\Route;
use App\Http\Classes\CheckController;
use Illuminate\Support\Facades\URL;


class ContractorsInfoController extends Controller
{
    use HasList, HasCard;

    /**
     * @var Contractor
     */
    protected $dependent_contractor;

    public function index()
    {
        if(config('app.VueBlade'))
        {
            $consumer = Auth::user();
            //            $texts = DB::table('_TranslationCaptions')
            //                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            //                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
            //                ->where('languages.language_code', config('app.locale'))
            //                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $country = Country::select('id', 'country_name')->get();
            $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();
            $infotype = InfoType::with('infokind')->get();

            $contractors = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
                'consumerAccess', 'contractorinfo', 'contractorinfo.infokind',
                'contractorinfo.infotype', 'contractorinfo.regions', 'contractorinfo.regions.country')
                ->get(); //todo 'consumerAccess',
            return response()->json([
                'texts'      => $texts,
                'consumer'   => $consumer,
                'contractor' => $contractors,
                'country'    => $country,
                'dbarea'     => $dbarea,
                'infotype'   => $infotype,
            ]);

        }
        else
        {
            $consumer = Auth::user();
            //            $texts = DB::table('_TranslationCaptions')
            //                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            //                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
            //                ->where('languages.language_code', config('app.locale'))
            //                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $company = Company::all();
            $contractors = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
                'consumerAccess', 'contractorinfo', 'contractorinfo.infokind',
                'contractorinfo.infotype', 'contractorinfo.regions', 'contractorinfo.regions.country')->get();
            $country = Country::all();
            $dbarea = DbArea::all();
            $infokind = InfoKind::all();
            $infotype = InfoType::all();
            $companyInfo = CompanyInfo::all();
            $contractorInfo = ContractorInfo::with('country', 'contractors', 'infokind', 'infotype')
                ->get();

            return view('/auth.admin.page.accesses',
                compact('consumer', 'texts',
                    'contractors', 'country', 'dbarea', 'company', 'infokind',
                    'infotype', 'companyInfo', 'contractorInfo'
                ));
        }
    }

    public function show(Request $request)
    {
        if(config('app.VueBlade'))
        {
            $contractor = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
                'consumerAccess', 'contractorinfo', 'contractorinfo.infokind',
                'contractorinfo.infotype', 'contractorinfo.regions', 'contractorinfo.regions.country')
                ->where('id', $request->id)
                ->get(); //todo вернуть связь consumerAccesses

            $consumer = Auth::user();
            //            $texts = DB::table('_TranslationCaptions')
            //                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            //                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
            //                ->where('languages.language_code', config('app.locale'))
            //                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $country = Country::select('id', 'country_name')->get();
            $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();
            $infotype = InfoType::with('infokind')->get();


            ///юзай TypeContractor, т.к. он наиболее струетурированный
            $TypeContractor = DB::table('Contractors')
                ->join('ContractorInfo', 'Contractors.id', '=', 'ContractorInfo.contractor_id')
                ->join('_Info_types', 'ContractorInfo.info_type_id', '=', '_Info_types.id')
                ->join('_Info_kinds', 'ContractorInfo.info_kind_id', '=', '_Info_kinds.id')
                ->where('Contractors.id', $request->id)
                ->select('_Info_types.id', 'info_type_name', 'info_kind_id', 'info_kind_name', 'ContractorInfo.*')
                ->groupBy('info_type_name', 'ContractorInfo.id')
                ->get();

            $type = DB::table('Contractors')
                ->join('ContractorInfo', 'Contractors.id', '=', 'ContractorInfo.contractor_id')
                ->join('_Info_types', 'ContractorInfo.info_type_id', '=', '_Info_types.id')
                ->where('Contractors.id', $request->id)
                ->select('_Info_types.id', 'info_type_name')
                ->groupBy('info_type_name', '_Info_types.id')
                ->get();

            $kind = DB::table('Contractors')
                ->join('ContractorInfo', 'Contractors.id', '=', 'ContractorInfo.contractor_id')
                ->join('_Info_kinds', 'ContractorInfo.info_kind_id', '=', '_Info_kinds.id')
                ->join('_Info_types', '_Info_kinds.info_type_id', '=', '_Info_types.id')
                ->where('Contractors.id', $request->id)
                ->select('info_kind_id', 'info_kind_name', 'info_type_name', '_Info_types.id')
                ->get();

            $allContractor = Contractor::select('id', 'contractor_short_name')->get();

            return response()->json([
                'texts'          => $texts,
                'consumer'       => $consumer,
                'contractor'     => $contractor,
                'country'        => $country,
                'dbarea'         => $dbarea,
                'TypeContractor' => $TypeContractor,
                'type'           => $type,
                'kind'           => $kind,
                'infotype'       => $infotype,
                'allContractor'  => $allContractor,
            ]);
        }
    }

    public function showCard(Request $request)
    {
        $ContractorInfo = DB::table('ContractorInfo')
            ->join('_Info_types', 'ContractorInfo.info_type_id', '=', '_Info_types.id')
            ->join('_Info_kinds', 'ContractorInfo.info_kind_id', '=', '_Info_kinds.id')
            ->join('_Countries', 'ContractorInfo.country_id', '=', '_Countries.id')
            ->where('ContractorInfo.id', $request->id)
            ->select('_Info_types.id', 'info_type_name', 'info_type_code', 'info_kind_id', 'info_kind_name',
                'country_id', 'country_name', 'ContractorInfo.*')
            ->first();
        $country = Country::all();
        //        $texts = DB::table('_TranslationCaptions')
        //            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
        //            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
        //            ->where('languages.language_code', config('app.locale'))
        //            ->get();
        $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

        if($ContractorInfo->info_type_code == "АдресЭлектроннойПочты")
        {
            $caption = [
                [
                    'id'    => $ContractorInfo->info_type_id,
                    'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_type_name
                ],
                [
                    'id'    => $ContractorInfo->info_kind_id,
                    'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_kind_name
                ],
                [
                    'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->representation
                ],
                [
                    'title' => $texts->where('caption_name', "Url")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->url_name
                ],
                [
                    'title' => $texts->where('caption_name', "cardEmail")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->email
                ],
                [
                    'id'    => $ContractorInfo->country_id,
                    'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->country_name
                ]
            ];
        }
        if($ContractorInfo->info_type_code == "Адрес")
        {
            $caption = [
                [
                    'id'    => $ContractorInfo->info_type_id,
                    'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_type_name
                ],
                [
                    'id'    => $ContractorInfo->info_kind_id,
                    'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_kind_name
                ],
                [
                    'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->representation
                ],
                [
                    'id'    => $ContractorInfo->country_id,
                    'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->country_name
                ]
            ];
        }
        if($ContractorInfo->info_type_code == "Телефон")
        {
            $caption = [
                [
                    'id'    => $ContractorInfo->info_type_id,
                    'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_type_name
                ],
                [
                    'id'    => $ContractorInfo->info_kind_id,
                    'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_kind_name
                ],
                [
                    'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->representation
                ],
                [
                    'title' => $texts->where('caption_name', "profilePhoneNumber")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->phone_number
                ],
                [
                    'title' => $texts->where('caption_name', "PhoneNumberWithoutCode")->first()->caption_translation,

                    'type'  => 'label',
                    'value' => $ContractorInfo->phone_number_without_codes
                ],
                [
                    'id'    => $ContractorInfo->country_id,
                    'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->country_name
                ]
            ];
        }
        if($ContractorInfo->info_type_code == "Skype")
        {
            $caption = [
                [
                    'id'    => $ContractorInfo->info_type_id,
                    'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_type_name
                ],
                [
                    'id'    => $ContractorInfo->info_kind_id,
                    'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_kind_name
                ],
                [
                    'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->representation
                ],
                [
                    'id'    => $ContractorInfo->country_id,
                    'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->country_name
                ]
            ];
        }
        if($ContractorInfo->info_type_code == "Факс")
        {
            $caption = [
                [
                    'id'    => $ContractorInfo->info_type_id,
                    'title' => $texts->where('caption_name', "Type")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_type_name
                ],
                [
                    'id'    => $ContractorInfo->info_kind_id,
                    'title' => $texts->where('caption_name', "kind")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->info_kind_name
                ],
                [
                    'title' => $texts->where('caption_name', "Representation")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->representation
                ],
                [
                    'id'    => $ContractorInfo->country_id,
                    'title' => $texts->where('caption_name', "accCountry")->first()->caption_translation,
                    'type'  => 'label',
                    'value' => $ContractorInfo->country_name
                ]
            ];
        }

        return response()->json([
            'caption'        => $caption,
            'ContractorInfo' => $ContractorInfo
        ]);
    }

    public function updateOld(Request $request)
    {
        $model = $request->ContractorInfo[0];

        //exclude key from array
        $modelNew = array_except($model,
            [
                'country_name',
                'db_area_code',
                'server_name',
                'db_name',
                'created_by',
                'updated_at',
                'info_type',
                'info_kind',
            ]
        );

        //get changes fields from front
        $getObject = ContractorInfo::where('id', $model['id'])->get()->toArray();
        $contractorDiffFields = array_diff($modelNew, $getObject[0]);
        //END get changes fields from front

        //$getObject from all relations
        $getObjectDbarea = Contractor::with('dbarea.dBase')
            ->where('id', $model['contractor_id'])->get()->toArray();

        $getObjectDbTypeId = $getObjectDbarea[0]['dbarea']['d_base']['db_type_id'];

        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
            ->where('controller_code', class_basename(Route::current()->controller))->get()->toArray();

        $changeFields = [];
        $DbTypeId = [];

        foreach($dbTypesControllers as $dbTypeControllers)
        {
            foreach($dbTypeControllers['db_type_controller'] as $dbTypeController)
            {
                if(($dbTypeController['db_type_id'] == $getObjectDbTypeId))
                {
                    $DbTypeId = $dbTypeController['id'];
                    foreach($dbTypeController['controller_fields'] as $fields)
                    {
                        foreach($contractorDiffFields as $key => $value)
                        {
                            if($fields['table_field_name'] == $key)
                            {
                                array_push($fields, $value); //add new value from front to array $fields
                                $changeFields[] = $fields;
                            }
                        }
                    }
                }
            }
        }

        //if contractorDiffFields not empty to create ChangeRequest
        if(!empty($contractorDiffFields))
        {

            $DataRequest = new ChangeRequest();
            $DataRequest->db_area_id = $getObjectDbarea[0]['db_area_id'];
            $DataRequest->status = (int)3; //status default (in processing)
            $DataRequest->db_area_id = $getObjectDbarea[0]['db_area_id'];
            $DataRequest->created_by = (new ConsumerParameters())->consumerCode();
            $DataRequest->save();

            $ChangeRequestController = new ChangeRequestController();
            $ChangeRequestController->change_request_id = $DataRequest->id;

            $ChangeRequestController->db_type_controller_id = $DbTypeId;

            $ChangeRequestController->row_id = $getObject[0]['id'];
            if(!empty($dbTypeController['object_owner_id']))
            {
                $ChangeRequestController->row_id_dep = $getObjectDbarea[0]['id'];
            }

            $ChangeRequestController->created_by = (new ConsumerParameters())->consumerCode();
            $ChangeRequestController->save();

            //            exit();

            foreach($changeFields as $field)
            {
                $changeRequestControl = new ChangeRequestControllerField();
                $changeRequestControl->change_request_controller_id = $ChangeRequestController->id;
                $changeRequestControl->db_type_controller_field_id = $field['id'];

                if(isset($getObject[0]['line_n']))
                {
                    $changeRequestControl->line_n = $getObject[0]['line_n'];
                }

                $changeRequestControl->status = (int)1;
                $changeRequestControl->created_by = (new ConsumerParameters())->consumerCode();
                $changeRequestControl->save();

                $changeReqControlField = new ChangeRequestControllerFieldValue();
                $changeReqControlField->change_request_controller_field_id = $changeRequestControl['id'];
                //                $changeReqControlField->db_type_controller_id = $dbTypeController['db_type_controller']['id'];
                $changeReqControlField->field_value_type_code = 'current';
                $changeReqControlField->field_value = $field[0]; //new value from front
                $changeReqControlField->created_by = (new ConsumerParameters())->consumerCode();
                $changeReqControlField->save();

                $changeReqControlField = new ChangeRequestControllerFieldValue();
                $changeReqControlField->change_request_controller_field_id = $changeRequestControl['id'];
                //                $changeReqControlField->db_type_controller_id = $dbTypeController['db_type_controller']['id'];
                $changeReqControlField->field_value_type_code = 'new';
                $changeReqControlField->field_value = $field[0]; //new value from front
                $changeReqControlField->created_by = (new ConsumerParameters())->consumerCode();
                $changeReqControlField->save();

                $changeReqControlField = new ChangeRequestControllerFieldValue();
                $changeReqControlField->change_request_controller_field_id = $changeRequestControl['id'];
                //                $changeReqControlField->db_type_controller_id = $dbTypeController['db_type_controller']['id'];
                $changeReqControlField->field_value_type_code = 'old';
                $changeReqControlField->field_value = $getObject[0][$field['table_field_name']]; //get old value from databases
                $changeReqControlField->created_by = (new ConsumerParameters())->consumerCode();
                $changeReqControlField->save();
            }
        }

        return ContractorInfo::where('id', $model['id'])->update([
            //            'contractor_id'=> $model['contractor_id'],
            //            'info_kind_id' => $model['info_kind_id'],
            //            'info_type_id' => $model['info_type_id'],
            //            'country_id' => $model['country_id'],
            //            'region_id' => $model['region_id'],WWWWW
            //            'representation' => $model['representation'],
            'city_name' => $model['city_name'],
            'email'     => $model['email'],
            //            'url_name' => $model['url_name'],
            //            'phone_number' => $model['phone_number'],
            //            'phone_number_without_codes' => $model['phone_number_without_codes'],
            //            'actual_l' => $model['actual_l'],
        ]);
    }

    public function update(Request $request)
    {
        $model = $request->ContractorInfo[0]; //get array from front

        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
            ->where('controller_code', class_basename(Route::current()->controller))
            ->get()->toArray();

        //exclude key from array
        $modelNew = array_except($model,
            [
                'country_name',
                'db_area_code',
                'server_name',
                'db_name',
                'created_by',
                'updated_at',
                'info_type',
                'info_kind',
            ]
        );

        //get changes fields from front
        $getObject = ContractorInfo::/*with('country')->*/
        where('id', $model['id'])->get()->toArray();
        $contractorDiffFields = array_diff($modelNew, $getObject[0]);
        //END get changes fields from front

        /*-----------------------*/
        //$getObject from all relations

        if($dbTypesControllers['0']['db_type_controller'][0]['object_owner_id'] != NULL)
        {

            $getObjectDbarea = Contractor::with('dbarea.dBase.dbType')
                //                ->where('id', $dbTypesControllers['0']['db_type_controller'][0]['object_owner_id'])
                ->where('id', $model['contractor_id'])
                ->get()->toArray();
        }
        elseif($dbTypesControllers['0']['db_type_controller'][0]['object_owner_id'] == NULL)
        {
            $getObjectDbarea = Contractor::with('dbarea.dBase.dbType')
                ->where('id', $model['id'])
                ->get()->toArray();
        }


        /*-----------------------*/

        $getObjectDbTypeId = $getObjectDbarea[0]['dbarea']['d_base']['db_type_id'];

        //        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
        //            ->where('controller_code', class_basename(Route::current()->controller))
        //            ->get()->toArray();

        $changeFields = [];
        $DbTypeId = [];

        foreach($dbTypesControllers as $dbTypeControllers)
        {
            foreach($dbTypeControllers['db_type_controller'] as $controller)
            {
                if(($controller['db_type_id'] == $getObjectDbTypeId))
                {
                    $DbTypeId = $controller['id'];
                    foreach($controller['controller_fields'] as $fields)
                    {
                        foreach($contractorDiffFields as $key => $value)
                        {
                            if($fields['table_field_name'] == $key)
                            {
                                array_push($fields, $value); //add new value from front to array $fields
                                $changeFields[] = $fields;
                            }
                        }
                    }
                }
            }
        }
        //if contractorDiffFields not empty to create ChangeRequest

        //         if (!empty($contractorDiffFields)){
        //
        //            $DataRequest = new ChangeRequest();
        //            $DataRequest->db_area_id = $getObjectDbarea[0]['db_area_id'];
        //            $DataRequest->status = (int)3; //status default (in processing)
        //            $DataRequest->db_area_id = $getObjectDbarea[0]['db_area_id'];
        //            $DataRequest->created_by = (new ConsumerParameters())->consumerCode();
        //            $DataRequest->save();
        //
        //            $ChangeRequestController = new ChangeRequestController();
        //            $ChangeRequestController->change_request_id = $DataRequest->id;
        //            $ChangeRequestController->db_type_controller_id = $DbTypeId;
        //            $ChangeRequestController->row_id = $getObject[0]['id'];
        //            if (!empty($controller['object_owner_id'])){
        //                $ChangeRequestController->row_id_dep = $getObjectDbarea[0]['id'];
        //            }
        //            $ChangeRequestController->created_by = (new ConsumerParameters())->consumerCode();
        //            $ChangeRequestController->save();
        //
        // //                        exit();
        //
        //            foreach ($changeFields as $field){
        //                $changeRequestControl = new ChangeRequestControllerField();
        //                $changeRequestControl->change_request_controller_id = $ChangeRequestController->id;
        //                $changeRequestControl->db_type_controller_field_id = $field['id'];
        //                if (isset($getObject[0]['line_n'])) {
        //                    $changeRequestControl->line_n = $getObject[0]['line_n'];
        //                }
        //                $changeRequestControl->field_reference = $field['field_reference'];
        //                $changeRequestControl->status = (int)1;
        //                $changeRequestControl->created_by = (new ConsumerParameters())->consumerCode();
        //                $changeRequestControl->save();
        //
        //                $changeReqControlField = new ChangeRequestControllerFieldValue();
        //                $changeReqControlField->change_request_controller_field_id = $changeRequestControl['id'];
        //                $changeReqControlField->field_value_type_code = 'current';
        //                $changeReqControlField->field_value = $field[0]; //new value from front
        //                $changeReqControlField->created_by = (new ConsumerParameters())->consumerCode();
        //                $changeReqControlField->save();
        //
        //                $changeReqControlField = new ChangeRequestControllerFieldValue();
        //                $changeReqControlField->change_request_controller_field_id = $changeRequestControl['id'];
        //                $changeReqControlField->field_value_type_code = 'new';
        //                $changeReqControlField->field_value = $field[0]; //new value from front
        //                $changeReqControlField->created_by = (new ConsumerParameters())->consumerCode();
        //                $changeReqControlField->save();
        //
        //                $changeReqControlField = new ChangeRequestControllerFieldValue();
        //                $changeReqControlField->change_request_controller_field_id = $changeRequestControl['id'];
        //                $changeReqControlField->field_value_type_code = 'old';
        //                $changeReqControlField->field_value = $getObject[0][$field['table_field_name']]; //get old value from databases
        //                $changeReqControlField->created_by = (new ConsumerParameters())->consumerCode();
        //                $changeReqControlField->save();
        //            }
        //        }
        //        exit();

        $ChangeRequestGet = ChangeRequest::with('changeRequestController.changeRequestControllerField.changeRequestControllerFieldValue')
            //            ->where('id', $DataRequest->id)
            ->where('id', 18)
            ->get()->toArray();
        // Albert Topalu 08.01.19


        // /*---------------------------OLD CODE 26.04.18 14:14-------------------------------*/

        //Get Settings from  _DbTypeControllers where  ChangeRequests->db_type_controller_id == _DbTypeControllers->id ->relations(_DbTypeControllerFields)
        //        $dbTypeController = ChangeRequestController::with('dbTypeController.controllerFields')
        //            ->where('db_type_controller_id', $ChangeRequestGet[0]['change_request_controller'][0]['db_type_controller_id'])
        //            ->where('row_id', $getObject[0]['id'])
        //            ->get()->toArray();

        $GetDbTypeControllerActual = DbTypeController::where('id', $DbTypeId)->get()->toArray();
        if($GetDbTypeControllerActual[0]['object_kind_n'] == NULL)
        {
            $dbTypeController = ChangeRequestController::with('dbTypeController.controllerFields')
                ->where('db_type_controller_id',
                    $ChangeRequestGet[0]['change_request_controller'][0]['db_type_controller_id'])
                ->where('row_id', $getObject[0]['id'])
                ->get()->toArray();
        }

        elseif($GetDbTypeControllerActual[0]['object_kind_n'] == 3)
        {
            $dbTypeController = ChangeRequestController::with('dbTypeController.controllerFields')
                ->where('db_type_controller_id',
                    $ChangeRequestGet[0]['change_request_controller'][0]['db_type_controller_id'])
                ->where('row_id_dep', $GetDbTypeControllerActual[0]['object_owner_id'])
                //                ->where('row_id_dep', 1) //!!!!!!!!!!!!!!!!!!??????????????????????????
                ->get()->toArray();
        }


        //--------------------------------------------------------------------
        //provercu esli contractorInfo, viteanuti contractor id ->where('row_id', $getObject[0]['id'])

        $getNameTable = \App\Models\Controller::with('models')
            ->where('id', $dbTypeController[0]['db_type_controller'][0]['controller_id'])
            ->get()->toArray();


        $GetObjectChangeRequest = DB::table($getNameTable[0]['models']['table_name'])
            ->where('id', $dbTypeController[0]['row_id'])->get()
            ->toArray(); //get name Table (example Country from _DbTypeControllers)

        //add field_nam, field_name to Json ->1C from tales ChangeRequests.... //Contractor
        $object_block_fields = [];
        foreach($ChangeRequestGet[0]['change_request_controller'][0]['change_request_controller_field'] as $fields)
        {
            $fieldsArray = [];
            foreach($fields['change_request_controller_field_value'] as $key)
            {
                $fieldsArray[] = $key['field_value'];
            }

            if(($fields['db_type_controller_field']['field_reference']) == "0")
            {
                array_push($fieldsArray,
                    $fields['db_type_controller_field']['table_field_name'],
                    $fields['db_type_controller_field']['field_reference']
                );
                $object_block_fields[] = $fieldsArray;

            }
            elseif(($fields['db_type_controller_field']['field_reference']) == "1")
            {

                //Get Controller ID from Table  _DbTypeControllers
                $ControllerId = DbTypeController::select('controller_id')
                    ->where('id', '=', $DbTypeId)->value('controller_id');

                $controllerIdLink = ControllerLink::select('controller_id_link')
                    ->where('controller_id', '=', $ControllerId)
                    ->where('table_field_name', '=', $fields['db_type_controller_field']['table_field_name'])
                    ->value('controller_id_link');

                $objectKeyField = \App\Models\Controller::with('models')
                    ->with('dbTypeController')
                    //                    ->where('id', $fields['db_type_controller_field']['controller_id'])
                    ->where('id', $controllerIdLink)
                    ->get()->toArray();

                array_push($fieldsArray,
                    $objectKeyField[0]['db_type_controller'][0]['object_key_field'],
                    $fields['db_type_controller_field']['field_reference']
                );
                $object_block_fields[] = $fieldsArray;
            }
        }

        //!!!!!!!!!!!!!!!!!!!!!!!!!
        $objectFields = [];
        foreach($object_block_fields as $block_fields)
        {

            if( /*($fieldReference['db_type_controller_field']['field_reference'] == "0") and*/
            ($block_fields[4] == "0")
            )
            {

                $objectFields[] = [
                    "field_name"    => $block_fields[3],
                    //                    "field_is_link"=> $fieldReference['db_type_controller_field']['field_reference'], //"field_is_link"=> "True|False",
                    "field_values"  =>
                        [
                            "value_current" => $block_fields[0],
                            "value_old"     => $block_fields[1],
                            "value_new"     => $block_fields[2]
                        ],
                    "field_status"  => "1",
                    "field_comment" => ""
                ];
            }
        }

        foreach($ChangeRequestGet[0]['change_request_controller'][0]['change_request_controller_field'] as $fieldReference)
        {
            if(($fieldReference['db_type_controller_field']['field_reference'] == "1") and ($block_fields[4] == "1"))
            {
                $objectFieldsReferensId = [
                    "value_current" => $block_fields[0],
                    "value_new"     => $block_fields[1],
                    "value_old"     => $block_fields[2],
                ];
            }

            //-------------------country_code----------------
            if(($fieldReference['db_type_controller_field']['field_reference']) == 1)
            {


                $objectKeyFieldValueCurrent = DB::table($objectKeyField[0]['models']['table_name'])
                    ->where('id', $objectFieldsReferensId['value_current'])
                    ->get()->toArray();

                $keyField = $objectKeyField[0]['db_type_controller'][0]['object_key_field']; //get country_cod

                $objectKeyFieldValueNew = DB::table($objectKeyField[0]['models']['table_name'])
                    ->where('id', $objectFieldsReferensId['value_new'])
                    ->get()->toArray();

                $objectKeyFieldValueOld = DB::table($objectKeyField[0]['models']['table_name'])
                    ->where('id', $objectFieldsReferensId['value_old'])
                    ->get()->toArray();

                $objectFields[] = [
                    "field_name"    => $block_fields[3],
                    "field_values"  => [
                        "value_current" =>
                            [
                                "value_table_code" => $objectKeyField[0]['db_type_controller'][0]['object_type_code'],
                                "value_table_key"  => $objectKeyField[0]['db_type_controller'][0]['object_key_field'],
                                "value"            => $objectKeyFieldValueCurrent[0]->$keyField
                            ],
                        "value_old"     =>
                            [
                                "value_table_code" => $objectKeyField[0]['db_type_controller'][0]['object_type_code'],
                                "value_table_key"  => $objectKeyField[0]['db_type_controller'][0]['object_key_field'],
                                "value"            => $objectKeyFieldValueNew[0]->$keyField
                            ],
                        "value_new"     =>
                            [
                                "value_table_code" => $objectKeyField[0]['db_type_controller'][0]['object_type_code'],
                                "value_table_key"  => $objectKeyField[0]['db_type_controller'][0]['object_key_field'],
                                "value"            => $objectKeyFieldValueOld[0]->$keyField
                            ]
                    ],
                    "field_status"  => "1",
                    "field_comment" => ""
                ];
            }
            //-------------------END country_code----------------
        }

        //get controller in table _DbTypeControllers where object_owner_id = controller_id and db_type_id->ContractorInfo = db_type_id->Contractor

        //        if (isset($dbTypesControllers[0]['db_type_controller'][0]['object_owner_id'])){
        if(isset($dbTypesControllers[0]['db_type_controller']))
        {
            $objectOwnerArray = [];
            foreach($dbTypesControllers[0]['db_type_controller'] as $typeController)
            {
                if(($typeController['object_owner_id'] == NULL))
                {
                    if(isset($typeController) and ($typeController['db_type_id'] == $model['db_area_id'])
                        and ($typeController['controller_id'] == $getNameTable[0]['id']) //!!!!!!! controller_id
                        and ($typeController['object_owner_id']) == NULL
                    )
                    {
                        //                        $objectOwner = $typeController;
                        $typeController;
                        //                        $objectOwnerArray = [];
                    }
                }
                elseif(($typeController['object_owner_id'] != NULL) and ($typeController['object_kind_n'] == 3))
                {

                    if(isset($typeController) and ($typeController['db_type_id'] == $ChangeRequestGet[0]['db_area_id'])
                        and ($typeController['controller_id'] == $getNameTable[0]['id'])
                        and ($typeController['object_owner_id']) != NULL
                    )
                    {

                        $objectOwner = DB::table('_DbTypeControllers')
                            ->where('db_type_id', $dbTypeController[0]['db_type_controller'][0]['db_type_id'])
                            ->where('controller_id', $typeController['object_owner_id'])//?????????????????????????????
                            ->get()->toArray();

                        $getNameTableObjectOwner = \App\Models\Controller::with('models')
                            ->where('id', $objectOwner[0]->controller_id)
                            ->get()->toArray();

                        //$getOwnerObject = DB::table('Contractors') __ControllerLinks

                        //get relation field from table  _DbTypeControllers->__ControllerLinks
                        // where __ControllerLinks.controller_id == __Controllers.id
                        //$getOwnerObject = DB::table('Contractors') (example contractor_id or company_id)

                        $getDependentController = \App\Models\Controller::with('controllerLink')
                            ->where('id', $dbTypeController[0]['db_type_controller'][0]['controller_id'])->get()
                            ->toArray();

                        $fieldObjectOwnerId = $getDependentController[0]['controller_link']['table_field_name'];
                        //END get relation field from table  _DbTypeControllers->__ControllerLinks

                        $getOwnerObject = DB::table($getNameTableObjectOwner[0]['models']['table_name'])
                            ->where('id', $GetObjectChangeRequest[0]->$fieldObjectOwnerId)//contractor_id, company_id
                            ->get()->toArray();

                        $objectOwnerRelations = DB::table('_DbTypeControllers')
                            ->where('db_type_id', $typeController['db_type_id'])
                            ->where('controller_id', $typeController['object_owner_id'])
                            ->get()->toArray(); //->$objectOwnerRelations[0]->object_key_field

                        $objectOwnerKeyField = $objectOwnerRelations[0]->object_key_field; // get uid_1c_code from _DbTypeControllers ->ContractorInfo->object_owner_id

                        $objectOwner = $typeController;
                        $objectOwnerArray = [
                            "owner_name"      => $objectOwnerRelations[0]->object_type_code, //"owner_name" => "Contractor",
                            "owner_key"       => $objectOwnerRelations[0]->object_key_field, // "owner_key" => "uid_1c",
                            "owner_key_value" => $getOwnerObject[0]->$objectOwnerKeyField, //"owner_key_value" => "21235-56565"
                        ];  //
                    }

                    //Get name Table from _DbTypeControllers -> object_owner_id
                    //If object_owner_id from _DbTypeControllers null -> $objectOwner[0]->id) (example Contractor)
                    //If object_owner_id from _DbTypeControllers NotNull -> $objectOwner[0]->controller_id) (example ContractorInfo)
                    $getNameTableObjectOwner = \App\Models\Controller::with('models')
                        //get relation field from table  _DbTypeControllers->__ControllerLinks
                        // where __ControllerLinks.controller_id == __Controllers.id
                        ->with('controllerLink')
                        ->where('id', $typeController['controller_id'])
                        ->get()->toArray();
                    //$getOwnerObject = DB::table('Contractors') (example contractor_id or company_id)
                    //END get relation field from table  (example contractor_id, company_id)
                }
            }
        }

        //End get controller in table _DbTypeControllers

        if(isset($dbTypesControllers[0]['db_type_controller'][0]['object_owner_id'])
            and ($dbTypesControllers[0]['db_type_controller'][0]['object_kind_n'] == "3")
        )
        {
            $getOwnerObject = DB::table($getNameTableObjectOwner[0]['models']['table_name'])
                ->where('id', $GetObjectChangeRequest[0]->contractor_id)//!!!!!!!!!!!!!!!!!?????????
                //                ->where('id', $GetObjectChangeRequest[0]->$fieldObjectOwnerId)   //!!!!!!!!!!!!!!!!!?????????
                ->get()->toArray();
            //            $getOwnerObjectKeyField = $objectOwner->object_key_field; //get uid_1c_code from _DbTypeControllers
            $getOwnerObjectKeyField = $typeController['object_key_field']; //get uid_1c_code from _DbTypeControllers
        }
        elseif(!isset($dbTypesControllers[0]['db_type_controller'][0]['object_owner_id'])
            and ($dbTypesControllers[0]['db_type_controller'][0]['object_kind_n'] != "3")
        )
        {
            $getOwnerObject = $GetObjectChangeRequest;

            //            $getOwnerObjectKeyField = $objectOwner->object_key_field; //get uid_1c_code from _DbTypeControllers
            $getOwnerObjectKeyField = $typeController['object_key_field']; //get uid_1c_code from _DbTypeControllers
        }

        //get uid_1c_code->value from table Contractor
        foreach($getOwnerObject as $getOwnerObjectKey => $getOwnerObjectValue)
        {
            $getOwnerObjectKeyValue = $getOwnerObjectValue->$getOwnerObjectKeyField;
        }
        //END get uid_1c_code->value from table

        $getObjectKeyField = $dbTypeController[0]['db_type_controller'][0]['object_key_field'];
        $ChangeRequestSend1C = [
            "request" => [
                "request_name"       => "RequestForDataChanges",
                "request_number"     => $ChangeRequestGet[0]['id'],
                "request_parameters" => [
                    "number"            => $ChangeRequestGet[0]['id'],
                    "status"            => "3",
                    "comment"           => "",
                    "objects_to_change" => [
                        [
                            "object_type_code"        => $dbTypeController[0]['db_type_controller'][0]['object_type_code'], //"object_type_code" => "Contractor",
                            "object_kind"             => $dbTypeController[0]['db_type_controller'][0]['object_kind_n'], // "object_kind" => "1",
                            "object_key"              => $dbTypeController[0]['db_type_controller'][0]['object_key_field'], //"object_key" => "uid_1c_code",
                            "object_key_value"        => $GetObjectChangeRequest[0]->$getObjectKeyField, //"object_key_value" => "914aa641-ab9c-11e8-843f-002590762efe",
                            "object_id"               => $GetObjectChangeRequest[0]->id, //"object_id" => "1",
                            "object_owner"            => $objectOwnerArray,
                            //                                [
                            //                                "owner_name" => $typeController['object_type_code'], //"owner_name" => "Contractor",
                            //                                "owner_key" => $typeController['object_key_field'], // "owner_key" => "uid_1c",
                            //                                "owner_key_value" => $getOwnerObjectKeyValue, //"owner_key_value" => "21235-56565",
                            //                                 ],
                            "object_block_fields"     =>
                            //------object_ Contractor
                                $objectFields,

                            //------END object_ Contractor

                            //------object_tables_to_change
                            "object_tables_to_change" => [

                            ]
                            // ------END object_tables_to_change
                        ]
                    ]
                ]
            ]
        ];


        $ee = $ChangeRequestSend1C;
        dd($ee);
        return $ee;
        /*----------new Client()------ --------*/
        //        $getObjectDbAreaId = $getObjectDbarea[0]['db_area_id'];
        $getObjectDbAreaId = $ChangeRequestGet[0]['db_area_id'];
        $serverDb = DbArea::with('dBase.serverDb')->where('id', $getObjectDbAreaId)->get()->toArray();
        $serverUrl = $serverDb[0]['d_base']['server_db']['server_url'] . '/' . $serverDb[0]['d_base']['db_name'];
        $host = request()->root();
        $host = preg_replace('#^https?://#', '', rtrim($host, '/'));
        $client = new Client();

        $res = $client->request('POST', $serverUrl . '/hs/api_for_wc/signal', [
            'json'    => $ChangeRequestSend1C,
            'auth'    => ['WebCabinetEN', 'WebCabinet'],
            'headers' => [
                'Referer' => "$host",
            ]
        ]);

        $resArray = \GuzzleHttp\json_decode($res->getBody());

        /*----------END new Client()--------------*/

        return ContractorInfo::where('id', $model['id'])->update([
            //            'contractor_id'=> $model['contractor_id'],
            //            'info_kind_id' => $model['info_kind_id'],
            //            'info_type_id' => $model['info_type_id'],
            //            'country_id' => $model['country_id'],
            //            'region_id' => $model['region_id'],WWWWW
            //            'representation' => $model['representation'],
            'city_name' => $model['city_name'],
            'email'     => $model['email'],
            //            'url_name' => $model['url_name'],
            //            'phone_number' => $model['phone_number'],
            //            'phone_number_without_codes' => $model['phone_number_without_codes'],
            //            'actual_l' => $model['actual_l'],
        ]);
    }

    public function insert(Request $request)
    {
        return ContractorInfo::create([
            'info_kind_id'               => $request->info_kind_id,
            'info_type_id'               => $request->info_type_id,
            'country_id'                 => $request->country_id,
            'region_id'                  => $request->region_id,
            'representation'             => $request->representation,
            'city_name'                  => $request->city_name,
            'e_mail'                     => $request->e_mail,
            'url_name'                   => $request->url_name,
            'phone_number'               => $request->phone_number,
            'phone_number_without_codes' => $request->phone_number_without_codes,
            'actual_l'                   => $request->actual_l,
        ]);
    }

    protected function listQuery()
    {
        $request = request();

        $this->list_model = ContractorInfo::query()
            ->with('infotype', 'infokind')
            ->has("contractors")
            ->where('contractor_id', $request->id);

        $this->listAdditionalQuery($this->list_model);

        $contractor_informations = $this->list_model->get()->toArray();

        $this->list_model = [];

        foreach($contractor_informations as $contractor_information)
        {
            array_push($this->list_model, [
                "id"             => $contractor_information["id"],
                'info_kind'      => $contractor_information['infokind']['0']['info_kind_name'],
                'representation' => $contractor_information['representation']
            ]);
        }

        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "contactInfo";

        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title"         => "Block1",
                "block_zone_quantity" => 1,
                "block_model"         => $this->list_controller_alias,
                "block_type"          => "block_list_base",
                "block_fields"        => [
                    [
                        'key'      => 'actions',
                        'sortable' => false,
                        'class'    => 'list_checkbox',
                        'thStyle'  => 'width: 6%',
                        "zone"     => "1",
                        "order"    => "1"
                    ],
                    [
                        'key'      => 'info_kind',
                        'sortable' => true,
                        'class'    => 'info_kind',
                        'label'    => $this->getTranslatedListCaption("InfoKind"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "3"
                    ],
                    [
                        'key'      => 'representation',
                        'sortable' => true,
                        'class'    => 'representation',
                        'label'    => $this->getTranslatedListCaption("Value"),
                        'thStyle'  => 'width: 31%',
                        "zone"     => "1",
                        "order"    => "4"
                    ],
                ]
            ]
        ];

        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = [
            'ok', 'apply', 'back', 'Main',
            'Remark', 'Image', 'Country', 'SystemDetails', 'Actual',
            'contactInfo', 'Code', 'Name', 'InfoKind', 'InfoType',
            'Representation', 'Company', 'Country', 'Contractor',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'Value'
        ];

        $this->translateListCaptions();

        return $this;
    }

    public function setListDependent()
    {
        $this->list_dependent = true;

        return $this;
    }

    public function setListDependentBlock()
    {
        $request = request();

        $this->dependent_contractor = Contractor::query()
            ->where('id', $request->id)
            ->select('contractor_short_name')->first();

        $this->list_dependent_block = [
            "dependent_data_model" => "ContractorInfo",
            "dependent_fields"     => [
                "title"         => $this->getTranslatedListCaption("Contractor"),
                "model"         => "contractor_id",
                "type"          => "label",
                "current_value" => $this->dependent_contractor->contractor_short_name,
                "options"       => [],
                "options_data"  => [
                    "options_data_model"     => "Contractors",
                    "options_field_id"       => "id",
                    "options_field_id_value" => "",
                    "options_field_title"    => "contractor_short_name",
                    "search"                 => ''
                ],
            ],
            "width"                => "100%",
        ];

        return $this;
    }

    public function setListAddDataModels()
    {
        $this->list_add_data_models = [
            "Contractors" => $this->dependent_contractor,
        ];

        return $this;
    }


    //Add Albert Topalu 23.10.18 16:40
    //Add Alex Yar 30.01.19
    public function list_old(Request $request)
    {
        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark', 'Image', 'Country', 'SystemDetails', 'Actual',
            'contactInfo', 'Code', 'Name', 'InfoKind', 'InfoType',
            'Representation', 'Company', 'Country', 'Contractor',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'Value'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $contractors = Contractor::where('id', $request->id)->select('contractor_short_name')->get()->toArray();

        $contractorInfo = ContractorInfo::with('infotype', 'infokind')
            ->where('contractor_id', $request->id)
            ->get()->toarray();

        /*Albert Topalu 08.10.2018 11:56
         * Add key=>value to collections $info(info_type,info_kind, country, regions) */
        $contractorInfoArray = [];
        $ColumnContractorInfo = [];
        foreach($contractorInfo as $info)
        {
            $info['info_type'] = $info['infotype']['0']['info_type_name'];
            $info['info_kind'] = $info['infokind']['0']['info_kind_name'];
            $contractorInfoArray[] = $info;

            //Select column and send to front key=>value
            $ColumnContractorInfo[] = [
                'id'             => $info['id'],
                //                'info_type' => $info['info_type'],
                'info_kind'      => $info['info_kind'],
                'representation' => $info['representation']
            ];
            //END Select column and send to front key=>value
        }

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $list = [
            "main_data_models" => [
                $mainModel => $ColumnContractorInfo,
            ],
            "add_data_models"  => [
                "Contractors" => $contractors,
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['contactInfo']['translation_captions']['caption_translation'],
                "form_code"                     => "contractorInfo",
                "form_is_dependent"             => true, // {if true -> show field} {if false hidden field)
                "form_type"                     => "list",
                "form_base_data_model"          => "ContractorInfo",
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/contractorInfo/",
                    "form_search_field" => null,
                ],
            ],
            "dependent"        => [
                "dependent_data_model" => "ContractorInfo",
                "dependent_fields"     => [
                    "title"         => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                    "model"         => "contractor_id",
                    "type"          => "label",
                    "current_value" => $contractors[0]['contractor_short_name'],
                    "options"       => [],
                    "options_data"  => [
                        "options_data_model"     => "Contractors",
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "contractor_short_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ],
            "tabs"             => [
                [
                    "tab_title"       => $getArrayCaptions['contactInfo']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_title"         => "Block1",
                            "block_zone_quantity" => 1,
                            "block_model"         => $mainModel,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                [
                                    'key'      => 'actions',
                                    'sortable' => false,
                                    'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 6%',
                                    "zone"     => "1",
                                    "order"    => "1"
                                ],
                                /*[
                                    'key' => 'info_type',
                                    'sortable' => true,
                                    'class' => 'info_type',
                                    'label' => $getArrayCaptions['InfoType']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 32%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],*/
                                [
                                    'key'      => 'info_kind',
                                    'sortable' => true,
                                    'class'    => 'info_kind',
                                    'label'    => $getArrayCaptions['InfoKind']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 31%',
                                    "zone"     => "1",
                                    "order"    => "3"
                                ],
                                [
                                    'key'      => 'representation',
                                    'sortable' => true,
                                    'class'    => 'representation',
                                    //                                    'label' => $getArrayCaptions['Representation']['translation_captions']['caption_translation'],
                                    'label'    => $getArrayCaptions['Value']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 31%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ];
        return response()->json($list);
    }

    //    public function contactInfoCard(Request $request){
    //
    ////        $this->texts = DB::table('_TranslationCaptions')
    ////            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
    ////            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
    ////            ->where('languages.language_code', config('app.locale'))
    ////            ->get();
    //        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
    //
    //        $Contractors = Contractor::all()->toArray();
    //
    //        $contractorInfo = ContractorInfo::with('infotype','infokind','country')
    //            ->where('id', $request->id)->get()->toarray();
    //
    //        $contractorId= $contractorInfo['0']['contractor_id'];
    //
    //        $contractorShortName = \Illuminate\Support\Facades\DB::table('Contractors')
    //            ->select('contractor_short_name')
    //            ->where('id',  $contractorId)
    //            ->value('contractor_short_name');
    //
    //        $contractorInfoArray=[];
    //        $ColumnContractorInfo=[];
    //        foreach ($contractorInfo as $info ){
    //            $info['info_type'] = $info['infotype']['0']['info_type_name'];
    //            $info['info_kind'] = $info['infokind']['0']['info_kind_name'];
    //            $info['country_name'] = $info['country']['country_name'];
    //            $contractorInfoArray[]= $info;
    //
    //            //Select column and send to front key=>value
    //            $ColumnContractorInfo[]=[
    //                'id'=> $info['id'],
    //                'info_type'=>$info['info_type'],
    //                'info_kind'=>$info['info_kind'],
    //                'representation'=>$info['representation'],
    //                'country_name' => $info['country']['country_name'],
    //                'email' => $info['email'],
    //                'contractor_id' => $info['contractor_id'],
    //                'line_n' => $info['line_n'],
    //                'city_name' => $info['city_name'],
    //                'contractor_short_name' => $contractorShortName,
    //
    //            ];
    //        }
    //
    //        $contactInfoCard =[
    //
    //            "main_data_models" => [
    //                "ContractorInfo" => $ColumnContractorInfo,
    //            ],
    //
    //            "add_data_models" => [
    //                'Contractors' => $Contractors,
    //            ],
    //
    //            "form_parameters" => [
    //                "form_title" => "Contact Info Card",
    //                "form_code" => "contractorsInfo",
    //                "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
    //                "form_type" => "card",
    //                "form_base_data_model" => "ContractorInfo",
    //                "form_main_data_model_id_field" => "id",
    //                "form_type_list" => [
    //                    "form_card_url" => "/contractors_new_card/",
    //                    "form_search_field" => "contractor_full_name",
    //                ]
    //            ],
    //
    //            "dependent" => [
    //                "dependent_data_model" => "ContractorInfo",
    //                "dependent_fields" => [
    //                    "title"   => "Контрагент",
    //                    "model"   => "contractor_id",
    //                    "type"    => "lt-select",
    //                    "options" =>[],
    //                    "options_data" => [
    //                        "options_data_model"      => "Contractors",
    //                        "options_field_id"        => "id",
    //                        "options_field_id_value"  => "",
    //                        "options_field_title"     => "contractor_short_name",
    //                        "search" => ''
    //                    ],
    //                    "width" => "100%"
    //                ]
    //            ],
    //
    //            "actions" => [
    //                "actions_card" => [
    //                    ["title" => $this->texts->where('caption_name', "ok")->first()->caption_translation, "code" => "save", "class" => "btn btn-green", "link" => "admin/contractorInfo", "img" => ""],
    //                    ["title" => $this->texts->where('caption_name', "back")->first()->caption_translation, "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
    //                ]
    //            ],
    //
    //            "tabs" => [
    //                [
    //                    "tab_title" => "Контакт Инфо",
    //                    "blocks_quantity" => 1,
    //                    "blocks" => [
    //                        [
    //                            "block_title" => "Block1",
    //                            "block_zone_quantity" => 1,
    //                            "block_model" => "ContractorInfo",
    //                            "block_type" => "block_card",
    //                            "block_fields" => [
    //
    //                                ['title' => $this->texts->where('caption_name', "InfoType")->first()->caption_translation, 'width' => '25%', 'model' => 'info_type',
    //                                    'type' => 'label', "zone" => "1", "order" => "2"],
    //
    //                                ['title' => $this->texts->where('caption_name', "InfoKind")->first()->caption_translation, 'width' => '25%', 'model' => 'info_kind',
    //                                    'type' => 'label', "zone" => "1", "order" => "2"],
    //
    ////                                ['title' => $this->texts->where('caption_name', "ContactInformation")->first()->caption_translation, 'width' => '50%', 'model' => 'representation',
    ////                                    'type' => 'label', "zone" => "1", "order" => "2"],
    //
    //                                ['title' => $this->texts->where('caption_name', "BlockCountryCountryName")->first()->caption_translation, 'width' => '25%', 'model' => 'country_name',
    //                                    'type' => 'label', "zone" => "1", "order" => "2"],
    //
    //                                ['title' => $this->texts->where('caption_name', "YourEmail")->first()->caption_translation, 'width' => '25%', 'model' => 'email',
    //                                    'type' => 'text', "zone" => "1", "order" => "2"],
    //
    //                                ['title' => $this->texts->where('caption_name', "UserInfo")->first()->caption_translation, 'width' => '25%', 'model' => 'city_name',
    //                                    'type' => 'text', "zone" => "1", "order" => "2"],
    //
    ////                                ['key' => 'info_type', 'sortable' => true, 'class' => 'info_type', 'label'=>'Info Type',  "zone" => "1"],
    ////                                ['key' => 'info_kind', 'sortable' => true, 'class' => 'info_kind', 'label'=>'Info Kind',  "zone" => "1"],
    ////                                ['key' => 'representation', 'sortable' => true, 'class' => 'representation', "zone" => "1"],
    //                            ]
    //                        ],
    //
    ////                        [
    ////                            "block_title" => "Block2",
    ////                            "block_zone_quantity" => 1,
    ////                            "block_model" => "ContractorInfo",
    ////                            "block_type" => "block_card",
    ////                            "block_fields" => [
    ////
    ////                                ['title' => $this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'text', "zone" => "1", "order" => "1"],
    ////                                ['title' => $this->texts->where('caption_name', "ServerDB")->first()->caption_translation, 'width' => '50%', 'model' => 'server_name', 'type' => 'label', "zone" => "1", "order" => "2"],
    ////                                ['title' => $this->texts->where('caption_name', "code_reason_number")->first()->caption_translation, 'width' => '50%', 'model' => 'code_reason_number', 'type' => 'text', "zone" => "1", "order" => "3"],
    ////                                ['title' => $this->texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation, 'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'date', "zone" => "1", "order" => "4"],
    ////                                ['title' => $this->texts->where('caption_name', "social_security_number")->first()->caption_translation, 'width' => '50%', 'model' => 'social_security_number', 'type' => 'text', "zone" => "1", "order" => "5"],
    ////                                ['title' => $this->texts->where('caption_name', "Actual")->first()->caption_translation, 'width' => '50%', 'model' => 'actual_l', 'type' => 'checkbox', "zone" => "1", "order" => "6"],
    ////
    ////                            ]
    ////                        ]
    //                    ]
    //                ]
    //            ]
    //        ];
    //
    //        return response()->json($contactInfoCard);
    //    }

    public function setCardCaptions()
    {
        $this->card_captions = [
            'ok', 'apply', 'back', 'Main',
            'Remark', 'Image', 'Country', 'SystemDetails', 'Actual',
            'contactInfo', 'Code', 'Name', 'InfoKind', 'InfoType',
            'Representation', 'Company', 'Country', 'Contractor', 'UserInfo',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'YourEmail',
        ];

        $this->translateCardCaptions();

        return $this;
    }

    protected function cardQuery()
    {
        $request = request();

        $contractor_info_id = $request["id"];

        $this->setIsNewObject($contractor_info_id === "new");

        if($this->isNewObject())
        {
            $nameControllerMethod = [
                'controller' => class_basename(\Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if($access === false)
            {
                return abort('403');
            }

            $this->card_model = ContractorInfo::getNewObject();

            $this->cardAdditionalQuery($this->card_model);

        }
        else
        {
            $this->card_model = ContractorInfo::with('infotype', 'infokind', 'country', 'contractors')
                ->has("contractors")
                ->where('id', $contractor_info_id);

            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->first()->toArray();
        }

        return $this;
    }

    public function prepareCardModelData()
    {
        $request = request();

        $contractor_id = $request["dependent"]["id"];

        $contractorShortName = Contractor::query()
            ->where('id', $contractor_id)
            ->first();

        $model = $this->card_model;

        $this->card_model = [
            [
                'id'                         => $model['id'],
                'info_kind_name'             => $model['infokind'][0]['info_kind_name'],
                'contractor_id'              => $contractor_id,
                'contractor_short_name'      => $contractorShortName->contractor_short_name,
                'region_id'                  => $model['region_id'],
                'info_type_name'             => $model['infotype'][0]['info_type_name'],
                'info_type_id'               => $model['info_type_id'],
                'info_kind_id'               => $model['info_kind_id'],
                'country_name'               => $model['country']['country_name'],
                'line_n'                     => $model['line_n'],
                'representation'             => $model['representation'],
                'city_name'                  => $model['city_name'],
                'email'                      => $model['email'],
                'url_name'                   => $model['url_name'],
                'phone_number'               => $model['phone_number'],
                'phone_number_without_codes' => $model['phone_number_without_codes'],
                'actual_l'                   => $model['actual_l'],
                'created_at'                 => $model['created_at'],
                'created_by'                 => $model['created_by'],
                'updated_at'                 => $model['updated_at'],
                'updated_by'                 => $model['updated_by']
            ]
        ];

        return $this;
    }

    public function setCardBlockFields(): self
    {
        $this->card_block_fields = [
            [
                "tab_title"       => $this->getTranslatedCardCaption("Main"),
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 1,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            [
                                'title'        => $this->getTranslatedCardCaption("InfoType"),
                                'model_name'   => $this->card_controller_alias, 'model' => 'info_type_id',
                                'type'         => 'vue-select',
                                'width'        => '30%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "InfoType",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "info_type_name",
                                    "search"              => ""
                                ],
                                "zone"         => "1",
                                "order"        => "1",
                                "border_right" => false
                            ],

                            [
                                'title'        => $this->getTranslatedCardCaption("InfoKind"),
                                'model_name'   => $this->card_controller_alias, 'model' => 'info_kind_id',
                                'type'         => 'vue-select',
                                'width'        => '30%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "InfoKind",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "info_kind_name",
                                    "search"              => ""
                                ],
                                "zone"         => "1",
                                "order"        => "1",
                                "border_right" => false
                            ],

                            ['title' => '', 'model_name' => $this->card_controller_alias, 'model' => 'representation',
                             'width' => '40%', 'type' => 'text', "zone" => "1", "order" => "1"],
                        ]
                    ],
                ]
            ],
        ];

        return $this;
    }

    public function setCardAddDataModels(): self
    {
        $contractors = Contractor::all(['id', 'contractor_short_name']);
        $info_types = InfoType::all(['id', 'info_type_name']);
        $info_kinds = InfoKind::all(['id', 'info_kind_name']);
        $countries = Country::all(['id', 'country_name']);

        $this->card_add_data_models = [
            'Contractors' => $contractors,
            'InfoType'    => $info_types,
            'InfoKind'    => $info_kinds,
            'Country'     => $countries,
        ];

        return $this;
    }

    public function setCardMainDataModelName(): self
    {
        $this->card_main_data_model_name = $this->card_model[0]['info_type_name'] ?? "Новая контактная информация";

        return $this;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = "contactInfo";

        return $this;
    }

    public function setCardDependent(): self
    {
        $this->card_dependent = true;

        return $this;
    }

    public function setCardDependentBlock(): self
    {
        $this->card_dependent_block = [
            "dependent_data_model" => $this->card_controller_alias,
            "dependent_fields"     => [
                "title"        => $this->getTranslatedCardCaption("Contractor"),
                "model"        => "contractor_id",
                "type"         => "label",
                "options"      => [],
                "options_data" => [
                    "options_data_model"     => $this->card_controller_alias,
                    "options_field_id"       => "id",
                    "options_field_id_value" => "",
                    "options_field_title"    => "contractor_short_name",
                    "search"                 => ''
                ],
            ],
            "width"                => "100%",
        ];

        return $this;
    }

    //    public function contactInfoCard(Request $request)
    public function card_old(Request $request)
    {
        //        $methods = $request->accessMethods;
        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark', 'Image', 'Country', 'SystemDetails', 'Actual',
            'contactInfo', 'Code', 'Name', 'InfoKind', 'InfoType',
            'Representation', 'Company', 'Country', 'Contractor', 'UserInfo',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'YourEmail',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $Contractors = Contractor::select(['id', 'contractor_short_name'])->get()->toArray();


        $contReqId = $request["dependent"]["id"];
        //        $contractorId = $contReqId;

        $contractorShortName = Contractor::where('id', $contReqId)->get()->toArray();

        if(empty($contractorShortName))
        {

        }

        $contractor_info_id = $request["id"];

        if($contractor_info_id == "new")
        {
            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if($access === false)
            {
                return abort('403');
            }

            $contRequest = ContractorInfo::getNewObject();
        }
        else
        {


            $contRequest = ContractorInfo::with('infotype', 'infokind', 'country', 'contractors')
                ->where('id', $contractor_info_id)->first()->toarray();

        }
        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');
        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $InfoType = InfoType::select('id', 'info_type_name')->get()->toarray();
        $InfoKind = InfoKind::select('id', 'info_kind_name')->get()->toarray();
        $Country = Country::select('id', 'country_name')->get()->toarray();

        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 1,
                        "block_model"         => $mainModel,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            [
                                'title'        => $getArrayCaptions['InfoType']['translation_captions']['caption_translation'],
                                'model_name'   => $mainModel, 'model' => 'info_type_id',
                                'type'         => 'vue-select',
                                'width'        => '30%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "InfoType",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "info_type_name",
                                    "search"              => ""
                                ],
                                "zone"         => "1",
                                "order"        => "1",
                                "border_right" => false
                            ],

                            [
                                'title'        => $getArrayCaptions['InfoKind']['translation_captions']['caption_translation'],
                                'model_name'   => $mainModel, 'model' => 'info_kind_id',
                                'type'         => 'vue-select',
                                'width'        => '30%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "InfoKind",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "info_kind_name",
                                    "search"              => ""
                                ],
                                "zone"         => "1",
                                "order"        => "1",
                                "border_right" => false
                            ],

                            ['title' => ''/* $getArrayCaptions['UserInfo']['translation_captions']['caption_translation']*/, 'model_name' => $mainModel, 'model' => 'representation', 'width' => '40%', 'type' => 'text', "zone" => "1", "order" => "1"],
                        ]
                    ],
                ]
            ],
        ];
        if($formShowParam['show_system_tab'])
        {
            $tabSystem = [
                "tab_title"       => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_name"        => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model"         => $mainModel,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }
        $res = [
            [ //Итоговый массив рекизитов
              'id'             => $contRequest['id'],
              'info_kind_name' => $contRequest['infokind'][0]['info_kind_name'],

              'contractor_id'              => $contReqId,
              'contractor_short_name'      => $contractorShortName[0]['contractor_short_name'] ?? $contRequest['contractors']['contractor_short_name'],
              //                'contractor_short_name' => $contractorShortName,
              'region_id'                  => $contRequest['region_id'],
              'info_type_name'             => $contRequest['infotype'][0]['info_type_name'],
              'info_type_id'               => $contRequest['info_type_id'],
              'info_kind_id'               => $contRequest['info_kind_id'],
              'country_name'               => $contRequest['country']['country_name'],
              'line_n'                     => $contRequest['line_n'],
              'representation'             => $contRequest['representation'],
              'city_name'                  => $contRequest['city_name'],
              'email'                      => $contRequest['email'],
              'url_name'                   => $contRequest['url_name'],
              'phone_number'               => $contRequest['phone_number'],
              'phone_number_without_codes' => $contRequest['phone_number_without_codes'],
              'actual_l'                   => $contRequest['actual_l'],
              'created_at'                 => $contRequest['created_at'],
              'created_by'                 => $contRequest['created_by'],
              'updated_at'                 => $contRequest['updated_at'],
              'updated_by'                 => $contRequest['updated_by']
            ]
        ];


        $contactInfoCard = [
            "sets"             => $this->getButtonsList(['card_actions']),
            "main_data_models" => [
                $mainModel => $res,
                //                'contractorId' => $contractorId,
            ],

            "add_data_models" => [
                'Contractors' => $Contractors,
                'InfoType'    => $InfoType,
                'InfoKind'    => $InfoKind,
                'Country'     => $Country,
                //                'contractorId' => $contractorId,
            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['contactInfo']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "disable_inputs"                => $formShowParam['read_only'],
                "form_is_dependent"             => true, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                //                "form_main_data_model_name" => $ColumnContractorInfo[0]['info_type'],
                "form_main_data_model_name"     => $res[0]['info_type_name'] ?? "Новая контактная информация",
                "form_type_list"                => [
                    "form_card_url"     => "/contractors_new_card/",
                    "form_search_field" => "contractor_full_name",
                ]
            ],
            "dependent"       => [
                "dependent_data_model" => $mainModel,
                "dependent_fields"     => [
                    "title"        => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                    "model"        => "contractor_id",
                    "type"         => "label",
                    "options"      => [],
                    "options_data" => [
                        "options_data_model"     => $mainModel,
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "contractor_short_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ],

            "tabs" => $tabs
        ];

        return response()->json($contactInfoCard);
    }

    //END Add Albert Topalu 23.10.18 16:40

    public
    function getAnswerFrom1C(Request $request)
    {
        $resArray = json_decode($request->getContent(), true);


        $ModelName = ModelTables::select('table_name')
            ->where('table_code', '=',
                $resArray['request']['request_parameters']['objects_to_change']['0']['object_type_code'])
            ->value('table_name');


        $dbAreaId = DB::table((string)$ModelName)
            ->select('db_area_id')
            ->where($resArray['request']['request_parameters']['objects_to_change']['0']['object_key'], '=',
                $resArray['request']['request_parameters']['objects_to_change']['0']['object_key_value'])
            ->value('db_area_id');


        /*------------------------??????????????????????????-----------------------------*/
        //get name Controller from RequestForDataChanges in 1c


        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
            //            ->where('controller_code', class_basename(Route::current()->controller))
            ->where('controller_code', $resArray['request']['name_controller'])
            ->get()->toArray();

        /*------------------------??????????????????????????-----------------------------*/

        $fieldsDbTypesControllers = []; // GET FIELDS FROM table DbTypeController
        foreach($dbTypesControllers as $dbTypeControllers)
        {
            foreach($dbTypeControllers['db_type_controller'] as $controller)
            {
                if(($controller['db_type_id'] == $dbAreaId))
                {
                    $DbTypeId = $controller['id'];
                    foreach($controller['controller_fields'] as $fields)
                    {
                        $fieldsDbTypesControllers[$fields['id']] = $fields['field_alias'];
                    }
                }
            }
        }


        foreach($resArray['request']['request_parameters']['objects_to_change'] as $objectsToChange)
        {

            foreach($objectsToChange['object_block_fields'] as $objectBlockFields)
            {

                $GetNameTableObjectsToChange = ModelTables::select('table_name')
                    ->where('table_code', '=', $objectsToChange['object_type_code'])
                    ->value('table_name');

                if(!isset($objectBlockFields['field_is_link']))
                {

                    $fieldName = (string)$objectBlockFields['field_name'];
                    //                    $UpdateDetails = Contractor::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();


                    $UpdateDetails = DB::table('Contractors')
                        ->where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
                    //                    $UpdateDetails = json_decode(json_encode($UpdateDetails),true);


                    //                    $UpdateDetails[".'$fieldName'."] = $objectBlockFields['field_values']['value_new'];
                    //                    $UpdateDetails->$fieldName = $objectBlockFields['field_values']['value_new'];
                    $UpdateDetails['contractor_full_name'] = $objectBlockFields['field_values']['value_new'];
                    $UpdateDetails->save();
                }
                elseif(isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "1")
                {
                    $UpdateDetails = Contractor::where($objectsToChange['object_key'], '=',
                        $objectsToChange['object_key_value'])->first();

                    //                    $UpdateDetails = DB::table((string)$GetNameTableObjectsToChange)->where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();

                    $fieldNameIsLink = (string)$objectBlockFields['field_name'];

                    $ModelIsLink = ModelTables::select('table_name')
                        ->where('table_code', '=',
                            $objectBlockFields['field_values']['value_new']['value_table_code'])
                        ->value('table_name');

                    $IdModelIsLink = DB::table((string)$ModelIsLink)
                        ->select('id')
                        ->where($objectBlockFields['field_values']['value_new']['value_table_key'], '=',
                            $objectBlockFields['field_values']['value_new']['value'])
                        ->value('id');

                    $UpdateDetails->country_id = $IdModelIsLink;
                    $UpdateDetails->save();
                }


                if(isset($objectsToChange['object_tables_to_change']) and !empty($objectsToChange['object_tables_to_change']))
                {

                    $objectTablesArray = [];
                    foreach($objectsToChange['object_tables_to_change'] as $objectTablesToChange)
                    {

                        //                        $objectTablesToChange['table_type_code'];

                        $tableStringsArray = ['table_type_code' => $objectTablesToChange['table_type_code']];
                        foreach($objectTablesToChange['table_strings'] as $tableStrings)
                        {

                            $blockFields = ['string_line_n' => $tableStrings['string_line_n']];
                            foreach($tableStrings['string_block_fields'] as $string)
                            {
                                foreach($fieldsDbTypesControllers as $key => $value)
                                {
                                    if(isset($string['field_name']) and $string['field_name'] == $value)
                                    {
                                        $blockFields[] = $string;
                                    }
                                }
                                /*-----------------------Update Fields-------------------------*/
                                //                                $ModelName = ModelTables::select('table_name')
                                //                                    ->where('id', '=', $dbTypesControllers[0]['controller_table_n'])
                                //                                    ->value('table_name');
                                //
                                //
                                //                                $ModelName222 = DB::table((string)$ModelName)
                                //                                    ->select('id')
                                //                                    ->where('line_n', '=', $tableStrings['string_line_n'])
                                //                                    ->value('id');
                                //                                $tableToChangeModel = ModelTables::select('table_name')
                                //                                    ->where('table_code', '=', $objectTablesToChange['table_type_code'])
                                //                                    ->value('table_name');
                                //
                                //                                $update = DB::table((string)$tableToChangeModel)
                                //                                    ->where('line_n', '=', $tableStrings['string_line_n'])
                                //                                    ->update([
                                //                                        (string)$string['field_name'] => $string['field_values']['value_new']
                                //                                    ]);
                                //
                                //                                if ($update) {
                                //                                    return "update";
                                //                                } else {
                                //                                    return "no update";
                                //                                }
                                /*------------------------END Update Fields-------------------------*/
                            }
                            //                            $tableStringsArray[$objectTablesToChange['table_type_code']]=$blockFields; /*=====*/
                            $tableStringsArray[] = $blockFields; /*=====*/
                        }
                        $objectTablesArray[] = $tableStringsArray;
                    }
                }
            }
        }

        /*-----------------------Update Fields Object Tables To Change-------------------------*/
        $ModelName = ModelTables::select('table_name')
            ->where('id', '=', $dbTypesControllers[0]['controller_table_n'])
            ->value('table_name');


        foreach($objectTablesArray as $objectTables)
        {

            foreach($objectTables as $key => $value)
            {

                $exceptTableTypeCode = array_except($objectTables,
                    [
                        'table_type_code',
                    ]
                );

                $tableToChangeModel = ModelTables::select('table_name')
                    ->where('table_code', '=', $objectTables['table_type_code'])
                    ->value('table_name');

                foreach($exceptTableTypeCode as $exceptTableTypeCodeKey => $exceptTableTypeCodeValue)
                {

                    $exceptStringLineN = array_except($exceptTableTypeCodeValue,
                        [
                            'string_line_n',
                        ]
                    );

                    /*-------------------------!!!!!!!!!!-----------------------------*/

                    foreach($exceptStringLineN as $exceptStringLineNArray)
                    {

                        $IdDbTypeControllerFields = DB::table('_DbTypeControllerFields')
                            ->select('field_reference')
                            ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
                            ->where('db_type_controller_id', '=',
                                $dbTypesControllers[0]['db_type_controller'][0]['id'])
                            ->value('field_reference');


                        if(isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '0'))
                        {

                            $update = DB::table((string)$tableToChangeModel)
                                ->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
                                ->update([
                                    (string)$exceptStringLineNArray['field_name'] => $exceptStringLineNArray['field_values']['value_new']
                                ]);
                        }
                        elseif(isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '1'))
                        {

                            $ModelIsLinkDbTypeController = DB::table('_DbTypeControllers')
                                ->where('object_key_field', '=', $exceptStringLineNArray['field_name'])
                                ->where('db_type_id', '=', $dbAreaId)
                                ->get()->toArray();


                            $ModelIsLink = ModelTables::select('table_name')
                                ->where('table_code', '=', $ModelIsLinkDbTypeController[0]->object_type_code)
                                ->value('table_name');


                            $DbTypeControllerIdField = DB::table((string)$ModelIsLink)
                                ->select('id')
                                ->where((string)$exceptStringLineNArray['field_name'], '=',
                                    $exceptStringLineNArray['field_values']['value_new'])
                                ->value('id');


                            $DbTypeControllerNameField = DB::table('_DbTypeControllerFields')
                                ->select('table_field_name')
                                ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
                                ->where('db_type_controller_id', '=',
                                    $dbTypesControllers[0]['db_type_controller'][0]['id'])
                                ->value('table_field_name');


                            $update = DB::table((string)$tableToChangeModel)
                                ->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
                                ->update([
                                    (string)$DbTypeControllerNameField => $DbTypeControllerIdField
                                ]);
                        }
                    }
                }
            }
        }

        /*-----------------------END Update Fields Object Tables To Change-------------------------*/


        //        if ($update) {
        //            return "update";
        //        } else {
        //            return "no update";
        //        }


        return "update";
    }

    public
    function beforeWriteBe(&$bCancel)
    {
        parent::beforeWriteBe($bCancel);

        $line_n = $this->card_main_data_models[$this->main_model_name]["line_n"];

        if(is_null($line_n))
        {
            $contractor_id = $this->card_main_data_models[$this->main_model_name]["contractor_id"];
            $max_line_n = ContractorInfo::query()
                ->where("contractor_id", $contractor_id)
                ->max("line_n");

            $this->card_main_data_models[$this->main_model_name]["line_n"] = $max_line_n + 1;
        }

    }

}

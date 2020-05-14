<?php

namespace App\Http\Controllers\Api\TabAccess;

use App\Models\AccessType;
use App\Models\Caption;
use App\Models\CompanyInfo;
use App\Models\Consumer;
use App\Models\ConsumerAccessRow;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Contractor;
use App\Http\Controllers\Api\Controller;
use App\Texts;
use App\Models\Language;
use App\Models\InfoKind;
use App\Models\InfoType;
use App\ConsumerInfo;
use App\Models\DbArea;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ConsumerAccessRowController extends Controller
{
    public function index()
    {
        if (config('app.VueBlade')) {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $consumerInfo = Consumer::with('consumerAccess')->get();
            $company = Company::with('consumerAccess')->get();
            $contractor = Contractor::with('consumerAccess')->get();
            $dbarea = DbArea::with('consumerAccess')->get();
            $ConsAccess = ConsumerAccessRow::all();

            return response()->json([
                'texts' => $texts,
                'consumer' => $consumer,
                'company' => $consumerInfo,
                'consumerInfo' => $company,
                'contractor' => $contractor,
                'dbarea' => $dbarea,
                'ConsAccess' => $ConsAccess,
            ]);
        } else {
            $consumer = Auth::user();
//            $texts = DB::table('_TranslationCaptions')
//                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
//                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//                ->where('languages.language_code', config('app.locale'))
//                ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
            $consumerInfo = Consumer::with('consumerAccess')->get();
            $company = Company::with('consumerAccess')->get();
            $contractor = Contractor::with('consumerAccess')->get();
            $dbarea = DbArea::with('consumerAccess')->get();
            $ConsAccess = ConsumerAccessRow::all();

            return view('/auth.admin.page.consumerAccess',
                compact('consumer', 'texts', 'company',
                    'consumerInfo', 'contractor', 'dbarea', 'ConsAccess'
                ));
        }
    }

    public function show()
    {
        if (config('app.VueBlade')) {
            $consumer = Auth::user();
            $texts = DB::table('_TranslationCaptions')
                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
                ->join('__Captions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
                ->where('languages.language_code', config('app.locale'))
                ->get();
            $consumerInfo = Consumer::with('consumerAccess')->get();
            $company = Company::with('consumerAccess')->get();
            $contractor = Contractor::with('consumerAccess')->get();
            $dbarea = DbArea::with('consumerAccess')->get();
            $ConsAccess = ConsumerAccessRow::all();
            $access = AccessType::with('ConsumerAccess')->get();
            return response()->json([
                'texts' => $texts,
                'consumer' => $consumer,
                'company' => $consumerInfo,
                'consumerInfo' => $company,
                'contractor' => $contractor,
                'dbarea' => $dbarea,
                'ConsAccess' => $ConsAccess,
                'access' => $access
            ]);
        } else {
            $consumer = Auth::user();
            $texts = DB::table('_TranslationCaptions')
                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
                ->join('__Captions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
                ->where('languages.language_code', config('app.locale'))
                ->get();
            $consumerInfo = Consumer::with('consumerAccess')->get();
            $company = Company::with('consumerAccess')->get();
            $contractor = Contractor::with('consumerAccess')->get();
            $dbarea = DbArea::with('consumerAccess')->get();
            $ConsAccess = ConsumerAccessRow::all();
            $access = AccessType::with('ConsumerAccess')->get();
            return view('/auth.admin.page.consumerAccessShow',
                compact('consumer', 'texts', 'company',
                    'consumerInfo', 'contractor', 'dbarea', 'ConsAccess', 'access'
                ));
        }
    }

    public function update(Request $request)
    {
        if (config('app.VueBlade')) {
            return ConsumerAccessRow::where('id', $request->id)->update(
                [
                    'consumer_id' => $request->consumer_id,
                    'db_area_id' => $request->db_area_id,
                    'access_type_id' => $request->access_type_id,
                    'contractor_id' => $request->contractor_id,
                    'company_id' => $request->company_id,
                    'actual_l' => $request->actual_l,
                    'read_only_l' => $request->read_only_l,
                ]
            );
        } else {
            ConsumerAccessRow::create([
                'consumer_id' => $request->ConsumerAdd,
                'db_area_id' => $request->dbAreaAdd,
                'access_type_id' => $request->AccessesAdd,
                'contractor_id' => $request->ContractorAdd,
                'company_id' => $request->CompanyAdd,
                'actual_l' => $request->ActualAdd,
                'read_only_l' => $request->ReadOnlyAdd,
            ]);
            return back()->with('alert', trans('messages.createConsumerAccess'));
        }
    }

    public function insert(Request $request)
    {
        if (config('app.VueBlade')) {
            return ConsumerAccessRow::create([
                'consumer_id' => $request->consumer_id,
                'db_area_id' => $request->db_area_id,
                'access_type_id' => $request->access_type_id,
                'contractor_id' => $request->contractor_id,
                'company_id' => $request->company_id,
                'actual_l' => $request->actual_l,
                'read_only_l' => $request->read_only_l,
            ]);
        } else {
            ConsumerAccessRow::create([
                'consumer_id' => $request->ConsumerAdd,
                'db_area_id' => $request->dbAreaAdd,
                'access_type_id' => $request->AccessesAdd,
                'contractor_id' => $request->ContractorAdd,
                'company_id' => $request->CompanyAdd,
                'actual_l' => $request->ActualAdd,
                'read_only_l' => $request->ReadOnlyAdd,
            ]);
            return back()->with('alert', trans('messages.createConsumerAccess'));
        }
    }

}

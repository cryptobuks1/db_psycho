<?php

namespace App\Http\Controllers\Auth;

use App\Models\Questionnaires\Questionnaire;
use App\Models\Questionnaires\QuestionnaireAnswer;
use App\Models\Questionnaires\QuestionnaireQuestionAnswer;
use App\Models\Questionnaires\QuestionnaireQuestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BetaRegister;
use App\Mail\InfoBetaRegister;

class BetaRegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Consumers',
            'company' => 'required|string|max:255',
            'social' => 'required|string|max:255'
        ]);
    }

    protected function index()
    {
        $texts = DB::table('_TranslationCaptions')
            ->join('_Languages', '_TranslationCaptions.language_id', '=', '_Languages.id')
            ->join('__Captions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
            ->where('_Languages.language_code', config('app.locale'))
            ->get();
        $questions = QuestionnaireQuestion::select('que_que_text')->get();
        $name = $questions->firstWhere('que_que_text', 'Name:')->que_que_text;
        $surname = $questions->firstWhere('que_que_text', 'Surname:')->que_que_text;
        $email = $questions->firstWhere('que_que_text', 'Email:')->que_que_text;
        $company = $questions->firstWhere('que_que_text', 'Company:')->que_que_text;
        $social = $questions->firstWhere('que_que_text', 'Telegram, LinkedIn, Messenger or another link:')->que_que_text;

        return view('/auth.admin.page.questionnaire',
            compact('texts', 'name', 'surname', 'email', 'company', 'social'));
    }


    protected function createQuestionnaireAnswer(Request $request)
    {
        $name = Questionnaire::with('questionnairesAnswer')->first()->value('form_name');
        $questionnaireAnswer = QuestionnaireAnswer::create([
            'que_id' => 1,
            'que_ans_name' => $name,
        ]);
        $questionnaireAnswer->que_ans_name .= $questionnaireAnswer->id;
        $questionnaireAnswer->save();
        $createQuestionAnswer = (new BetaRegisterController())->createQuestionAnswer($request, $questionnaireAnswer);
        return redirect('/questionnaire/info');
    }

    protected function createQuestionAnswer($request, $questionnaireAnswer)
    {
        $answer = QuestionnaireQuestionAnswer::create([
            'que_ans_id' => $questionnaireAnswer->id,
            'que_que_ans_text' => $request['name'],
            'que_que_id' => QuestionnaireQuestion::where('que_que_text', 'Name:')->value('id'),
        ]);
        $answer = QuestionnaireQuestionAnswer::create([
            'que_ans_id' => $questionnaireAnswer->id,
            'que_que_ans_text' => $request['surname'],
            'que_que_id' => QuestionnaireQuestion::where('que_que_text', 'Surname:')->value('id'),
        ]);
        $answer = QuestionnaireQuestionAnswer::create([
            'que_ans_id' => $questionnaireAnswer->id,
            'que_que_ans_text' => $request['email'],
            'que_que_id' => QuestionnaireQuestion::where('que_que_text', 'Email:')->value('id'),
        ]);
        $answer = QuestionnaireQuestionAnswer::create([
            'que_ans_id' => $questionnaireAnswer->id,
            'que_que_ans_text' => $request['company'],
            'que_que_id' => QuestionnaireQuestion::where('que_que_text', 'Company:')->value('id'),
        ]);
        $answer = QuestionnaireQuestionAnswer::create([
            'que_ans_id' => $questionnaireAnswer->id,
            'que_que_ans_text' => $request['social'],
            'que_que_id' => QuestionnaireQuestion::where('que_que_text', 'Telegram, LinkedIn, Messenger or another link:')->value('id'),
        ]);
        $answer->save();
        $sendQuestionnaire = (new BetaRegisterController())->sendQuestionnaire($request, $answer);
    }

    protected function sendQuestionnaire($request, $answer){
        $emailQuestion = QuestionnaireQuestion::where('email_l', 1)->value('id');
        $email = $answer->latest()->where('que_que_id', $emailQuestion)->value('que_que_ans_text');
        $name = $answer->where('que_que_ans_text', $request['name'])->value('que_que_ans_text');
        $surname = $answer->where('que_que_ans_text', $request['surname'])->value('que_que_ans_text');
        $company = $answer->where('que_que_ans_text', $request['company'])->value('que_que_ans_text');
        $social = $answer->where('que_que_ans_text', $request['social'])->value('que_que_ans_text');


        $formText = Questionnaire::where('form_name', 'BetaRegister')->first()->message;
        $text = str_replace("%name%", $name, $formText);
        $text = str_replace("%login%", 'Test@gmail.com', $text);
        $text = str_replace("%password%", '2018$$2018', $text);
        $text  = str_replace("%link%", 'https://my.token.accountant/login', $text);
        Mail::to($email)->send(new BetaRegister($text));
        Mail::to('Helpme@token.accountant')->send(new InfoBetaRegister($email, $name, $surname, $social, $company));
    }


    protected function info()
    {
        $texts = DB::table('_TranslationCaptions')
            ->join('_Languages', '_TranslationCaptions.language_id', '=', '_Languages.id')
            ->join('__Captions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
            ->where('_Languages.language_code', config('app.locale'))
            ->get();
        return view('/auth.admin.page.questionnaire-info',
            compact('texts'));
    }
}

<?php

namespace App\Http\Controllers\Api\BankNet;

use App\Mail\BetaRegister;
use App\Mail\BankNetContact;
use App\Mail\InfoBetaRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BnContactsController extends Controller
{
    public function card()
    {
        $captionName = [
            'FeedbackForm','FeedbackFormText',
            'FeedbackFormName','FeedbackFormEmail','FeedbackFormComments','FeedbackFormButtonSubmit',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        return [
            "sets" => [
                "card" => "action",
                "code" => "send",
                "title" => $getArrayCaptions['FeedbackFormButtonSubmit']['translation_captions']['caption_translation'],
            ],

            "main_data_models" =>
                [
                    [
                        "name" => "",
                        "email" => "",
                        "message" => ""
                    ]
                ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['FeedbackForm']['translation_captions']['caption_translation'],
                "form_type" => "contacts"
            ],
            "tabs" => [
                [
                    "blocks" =>
                        [
                            [
                                "block_width" => "100%",
                                "block_description" => $getArrayCaptions['FeedbackFormText']['translation_captions']['caption_translation'],
                                "block_fields" => [
                                    [
                                        "title" => $getArrayCaptions['FeedbackFormName']['translation_captions']['caption_translation'],
                                        "model" => "name",
                                        "type" => "text",
                                        "width" => "100%",
                                        "validation" => [
                                            "required" => true,
                                            "min" => 4
                                        ]
                                    ],
                                    [
                                        "title" => $getArrayCaptions['FeedbackFormEmail']['translation_captions']['caption_translation'],
                                        "model" => "email",
                                        "type" => "text",
                                        "width" => "100%",
                                        "validation" => [
                                            "required" => true,
                                            "email" => true
                                        ]
                                    ],
                                    [
                                        "title" => $getArrayCaptions['FeedbackFormComments']['translation_captions']['caption_translation'],
                                        "model" => "message",
                                        "type" => "textarea",
                                        "width" => "100%",
                                        "validation" => [
                                            "required" => true,
                                            "min" => 4
                                        ]
                                    ]
                                ]
                            ]
                        ]
                ]
            ]
        ];
    }

    public function sendEmail(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $description = $request->message;

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new BankNetContact($email, $name, $description));


//        Mail::send('auth.emails.contactSendEmail', $data function ($message) {
//            $message->from('us@example.com', 'Laravel');
//
//            $message->to('foo@example.com')->cc('bar@example.com');
//        });

        return [
            'message' => "письмо было отправлено!"
        ];
    }
}



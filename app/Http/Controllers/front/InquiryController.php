<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Rules\MathCaptchaValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
  public function examPage(Request $request)
  {
    // printArray($request->toArray());
    // die;
    $request->validate(
      [
        'captcha_answer' => ['required', 'numeric', new MathCaptchaValidationRule()],
        'name' => 'required',
        'source' => 'required',
        'source_path' => 'required',
        'c_code' => 'required|numeric',
        'mobile' => 'required|numeric',
        'email' => 'required|email',
      ]
    );
    $field = new Student();
    $field->name = $request['name'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->email = $request['email'];
    $field->source =  $request['source'];
    $field->source_path =  $request['source_path'];
    $field->save();
    session()->flash('smsg', 'Your inquiry has been submitted succesfully. We will contact you soon.');

    $form_data = [
      'website' => 'BRI',
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'source' => 'Britannica Overseas Exam Page Enquiry',
    ];


    $api_url = "https://www.crm.britannicaoverseas.com/api/lead-from-britannica-overseas-book-demo";
    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'intrest' => $request['intrest'],
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Inquiry'];

    Mail::send(
      'mails.inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $emaildata2 = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'intrest' => $request['intrest'],
    ];

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry'];

    Mail::send(
      'mails.inquiry-mail-to-team',
      ['emaildata2' => $emaildata2],
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    return redirect($request->retpath);
  }
  public function jobPage(Request $request)
  {
    // printArray($request->toArray());
    // die;
    $request->validate(
      [
        'captcha_answer' => ['required', 'numeric', new MathCaptchaValidationRule()],
        'name' => 'required',
        'source' => 'required',
        'source_path' => 'required',
        'mobile' => 'required',
        'email' => 'required|email',
        'intrested_program' => 'required',
        'state' => 'required',
      ]
    );

    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->mobile = $request['mobile'];
    $field->state = $request['state'];
    $field->intrested_program = $request['intrested_program'];
    $field->source =  $request['source'];
    $field->source_path =  $request['source_path'];
    $field->save();

    session()->flash('smsg', 'Your inquiry has been submitted succesfully. We will contact you soon.');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'mobile' => $request['mobile'],
      'intrest' => $request['intrested_program'],
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Inquiry'];

    Mail::send(
      'mails.inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $emaildata2 = [
      'name' => $request['name'],
      'email' => $request['email'],
      'mobile' => $request['mobile'],
      'intrest' => $request['intrest'],
    ];

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry'];

    Mail::send(
      'mails.inquiry-mail-to-team',
      ['emaildata2' => $emaildata2],
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    return back();
  }
  public function submitCounselling(Request $request)
  {
    $seg1 = ($request['return_to'] != null) || ($request['return_to'] != '/') ? 'return_to=' . $request['return_to'] : null;
    $otp = rand(1000, 9999);
    $otp_expire_at = date("YmdHis", strtotime("+15 minutes"));
    // Validate and store data
    $request->validate([
      'name' => 'required|regex:/^[a-zA-Z ]*$/',
      'email' => 'required|email|unique:students,email',
      'c_code' => 'required|numeric',
      'mobile' => 'required|numeric',
      'current_qualification_level' => 'required',
      'intrested_course_category' => 'required',
      'country' => 'required'
    ], [
      'c_code' => 'Country Code is required',
    ]);

    $field = new Student();
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->country = $request['country'];
    $field->current_qualification_level = $request['current_qualification_level'];
    $field->intrested_course_category = $request['intrested_course_category'];
    $field->source = $request['source'];
    $field->source_path = $request['source_path'];
    $field->otp = $otp;
    $field->otp_expire_at = $otp_expire_at;
    $field->status = 0;
    $field->save();

    //session()->flash('smsg', ' Your inquiry has been submitted. we will contact you soon..');

    session()->flash('smsg', 'An OTP has been send to your registered email address.');
    $request->session()->put('last_id', $field->id);

    try {
      $form_data = [
        'website' => 'BRI',
        'name' => $request['name'],
        'email' => $request['email'],
        'c_code' => $request['c_code'],
        'mobile' => $request['mobile'],
        'country' => $request['country'],
        'current_qualification_level' => $request['current_qualification_level'],
        'interested_course_category' => $request['intrested_course_category'],
        'source' => $request['source'],
        'source_path' => $request['source_path'],
      ];

      $response = Http::asForm()
        ->withHeaders([
          'API-KEY' => config('services.crm_api_key'),
        ])
        ->timeout(10)
        ->post('https://www.crm.britannicaoverseas.com/api/bo-modal-form', $form_data);

      if (!$response->successful()) {
        Log::warning('CRM API failed', [
          'status' => $response->status(),
          'body' => $response->body(),
        ]);
      }
    } catch (\Exception $e) {
      Log::error('CRM API Exception: ' . $e->getMessage());
    }

    $emaildata = ['name' => $request['name'], 'otp' => $otp];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'OTP'];
    Mail::send(
      'mails.send-otp',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject('OTP');
        $message->priority(1);
      }
    );


    $emaildata2 = [
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['c_code'],
      'mobile' => $request['mobile'],
      'country' => $request['country'],
      'current_qualification_level' => $request['current_qualification_level'],
      'intrested_course_category' => $request['intrested_course_category'],
      'source' => $request['source'],
      'source_path' => $request['source_path'],
      'intrest' => false,
    ];

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry', 'bcc' => BCC_EMAIL, 'bcc_name' => BCC_NAME];

    Mail::send(
      'mails.inquiry-mail-to-team',
      ['emaildata2' => $emaildata2],
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->bcc($dd2['bcc'], $dd2['bcc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    //return redirect(url('thank-you/'));

    return response()->json(['success' => true, 'seg' => $seg1]);
  }
  public function testApi(Request $request)
  {
    // dd(config('services.crm_api_key'));

    try {
      $form_data = [
        'website' => 'BRI',
        'name' => 'Faraz',
        'email' => 'farazahmad280@gmail.com',
        'c_code' => '91',
        'mobile' => '9876543210',
        'country' => 'India',
        'current_qualification_level' => 'UG',
        'interested_course_category' => 'CS',
        'source' => 'Test Api',
        'source_path' => 'test-api',
      ];
      // 🔍 Log the API key being sent
      Log::info('Sending API Key new:', ['key' => config('services.crm_api_key')]);

      $response = Http::asForm()
        ->withHeaders([
          'API-KEY' => config('services.crm_api_key'),
        ])
        ->timeout(10)
        ->post('https://www.crm.britannicaoverseas.com/api/bo-modal-form', $form_data);

      if (!$response->successful()) {
        Log::warning('CRM API failed', [
          'status' => $response->status(),
          'body' => $response->body(),
        ]);

        return response()->json([
          'success' => false,
          'status' => $response->status(),
          'body' => $response->body(),
        ]);
      }

      return response()->json([
        'success' => true,
        'status' => $response->status(),
        'body' => $response->body(),
      ]);
    } catch (\Exception $e) {
      Log::error('CRM API Exception: ' . $e->getMessage());

      return response()->json([
        'success' => false,
        'error' => $e->getMessage(),
      ]);
    }
  }
}

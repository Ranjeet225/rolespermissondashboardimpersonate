<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\MasterLeadStatus;
use App\Http\Controllers\LeadsManageCotroller;
use App\Mail\SendGridEmail;
use App\Mail\UserNotification;
use App\Models\Agent;
use App\Models\Message;
use App\Models\Outbox;
use App\Models\SmsTemplate;
use App\Models\Student;
use App\Models\StudentByAgent;
use App\Services\TwilioService;
use Illuminate\Support\Facades\Auth;
use SendGrid\Mail\Mail;
use SendGrid;
use SendGrid\Mail\Attachment;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class MessageController extends Controller
{
    //
    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function message_lead(Request $request, $export = null)
    {
        $leadsManageController = new LeadsManageCotroller;
        $lead_list = $leadsManageController->filterLeads($request);
        $lead_list = $lead_list->paginate(12);
        $countries = Country::all();
        $smsTemplates =SmsTemplate::where('status',1)->get();
        $lead_status = MasterLeadStatus::get();
        return view('admin.message.message-lead', compact('lead_list', 'countries', 'lead_status','smsTemplates'));
    }

    public function sendSmsToLeadUsers(Request $request)
    {
        if(!$request->has('leadIds')){
            return response()->json(['status' => false, 'message' => 'Please select leads!'], 422);
        }
        $leadIds = $request->input('leadIds');
        $users = StudentByAgent::whereIn('id', $leadIds)->pluck('phone_number')->toArray();
        $this->twillio_sms($request, $users,$leadIds);
        return response()->json(['status' => 'success', 'message' => 'Sms sent successfully!']);
    }

    public function twillio_sms(Request $request,$users = null,$leadIds =null)
    {
        if($request->template_id){
           $text_sms = SmsTemplate::where('id',$request->template_id)->first();
           $sms_body =$text_sms->body;
        }
        if($request->custom_templete){
            $sms_body = $request->custom_templete;
        }
        $error_list = [];
        foreach ($users as $phone) {
            $message = new Message();
            $message->subject = $text_sms->heading;
            $message->body = $sms_body;
            $message->attachment = null;
            $message->type='sms';
            $message->recepients= $phone;
            $message->author_id= Auth::user()->id;
            $message->save();
            if (!empty($phone)) {
                $formattedPhone = $this->formatPhoneNumber($phone);
                try {
                    $this->twilio->sendSms($formattedPhone, $sms_body);
                } catch (\Exception $e) {
                    $error_list[] = 'Error sending SMS to ' . $formattedPhone . ': ' . $e->getMessage();
                }
            }
        }
        if(!empty($error_list)){
            return response()->json(['status' => 'error', 'message' => implode("\n", $error_list)]);
        }
        return;
    }

    public function sendEmailToLeadUsers(Request $request)
    {
        if (!$request->selectedLeads) {
            return response()->json(['status' => false, 'message' => 'Please select leads!'], 422);
        }
        if (!$request->subject) {
            return response()->json(['status' => false, 'message' => 'Please add subject'], 422);
        }
        if (!$request->email_body) {
            return response()->json(['status' => false, 'message' => 'Please add message!'], 422);
        }
         $leadIds = explode(',', $request->selectedLeads);
         $users = StudentByAgent::whereIn('id', $leadIds)->pluck('email')->toArray();
         $this->twillio_email($request,$users,$leadIds);
         return response()->json(['status' => 'success', 'message' => 'Email sent successfully!']);
    }

    public function twillio_email(Request $request,$users = null,$leadIds = null)
    {
        $subject = $request->subject;
        $email_body = $request->email_body;
        $attachment = $request->file('attachment') ?? null;

        $sendGrid = new SendGrid(env('SENDGRID_API_KEY'));
        $failed_emails = [];
        foreach ($users as $email) {
            if (!empty($email)) {
                $message = new Message();
                $message->subject = $subject;
                $message->body = $email_body;
                $message->attachment = $attachment ? $attachment->getClientOriginalName() : null;
                $message->type='mail';
                $message->recepients= $email;
                $message->author_id= Auth::user()->id;
                $message->save();

                $mail = new Mail();
                $mail->setFrom("ranjeet@amethitech.com", "Ranjeet");
                $mail->setSubject($subject);
                $mail->addTo($email, "Lead User");
                $mail->addContent("text/plain", strip_tags($email_body));
                $mail->addContent("text/html", $email_body);
                if ($attachment) {
                    $attachmentContent = base64_encode(file_get_contents($attachment->getRealPath()));
                    $mail->addAttachment(
                        $attachmentContent,
                        $attachment->getMimeType(),
                        $attachment->getClientOriginalName(),
                        'attachment'
                    );
                }

                try {
                    $sendGrid->send($mail);
                } catch (\Exception $e) {
                    $failed_emails[] = $email;
                }
            }
        }
        if(!empty($failed_emails)){
            foreach ($failed_emails as $email) {
                Outbox::create([
                    'email' => $email,
                    'subject' => $subject,
                    'body' => $email_body,
                ]);
            }
        }
        return;
    }

    private function formatPhoneNumber($phone)
    {
        if (!preg_match('/^\+/', $phone)) {
            return '+91' . $phone;
        }
        return $phone;
    }

    public function message_frenchise(Request $request, $export = null)
    {
        $countries =Country::get();
        $frenchise= new FrenchiseController;
        $frenchise = $frenchise->filterfrenchise($request);
        $smsTemplates =SmsTemplate::get();
        $frenchise = $frenchise->paginate(12);
        return view('admin.message.message-frenchise',compact('countries','frenchise','smsTemplates'));
    }

    public function sendSmsToFrenchise(Request $request){
        if(!$request->has('leadIds')){
            return response()->json(['status' => false, 'message' => 'Please select Frenchise!'], 422);
        }
        $leadIds = $request->input('leadIds');
        $users = Agent::whereIn('id', $leadIds)->pluck('phone')->toArray();
        $this->twillio_sms($request, $users,$leadIds);
        return response()->json(['status' => 'success', 'message' => 'Sms sent successfully!']);
    }

    public function sendEmailToFrenchise(Request $request)
    {
        if (!$request->selectedLeads) {
            return response()->json(['status' => false, 'message' => 'Please select Frenchise !'], 422);
        }
        if (!$request->subject) {
            return response()->json(['status' => false, 'message' => 'Please add subject'], 422);
        }
        if (!$request->email_body) {
            return response()->json(['status' => false, 'message' => 'Please add message!'], 422);
        }
         $leadIds = explode(',', $request->selectedLeads);

         $users = Agent::whereIn('id', $leadIds)->pluck('email')->toArray();
         $this->twillio_email($request,$users,$leadIds);
         return response()->json(['status' => 'success', 'message' => 'Email sent successfully!']);
    }


    public function message_student(Request $request)
    {
        $user = Auth::user();
        if ($user->hasRole('Administrator')) {
            $student_profile =Student::with('country','province')->paginate(20);
        } else {
            $student_profile =Student::with('country','province')->where('added_by', $user->id)->paginate(20);
        }
        $smsTemplates =SmsTemplate::get();
        return view('admin.message.message-student',compact('student_profile','smsTemplates'));
    }


    public function sendSmsToStudent(Request $request)
    {
        if(!$request->has('leadIds')){
            return response()->json(['status' => false, 'message' => 'Please select Student!'], 422);
        }
        $leadIds = $request->input('leadIds');
        $users = Student::whereIn('id', $leadIds)->pluck('phone_number')->toArray();
        $this->twillio_sms($request, $users,$leadIds);
        return response()->json(['status' => 'success', 'message' => 'Sms sent successfully!']);
    }

    public function sendEmailToStudent(Request $request)
    {
        if (!$request->selectedLeads) {
            return response()->json(['status' => false, 'message' => 'Please select Student!'], 422);
        }
        if (!$request->subject) {
            return response()->json(['status' => false, 'message' => 'Please add subject'], 422);
        }
        if (!$request->email_body) {
            return response()->json(['status' => false, 'message' => 'Please add message!'], 422);
        }
         $leadIds = explode(',', $request->selectedLeads);
         $users = Student::whereIn('id', $leadIds)->pluck('email')->toArray();
         $this->twillio_email($request,$users,$leadIds);
         return response()->json(['status' => 'success', 'message' => 'Email sent successfully!']);
    }



    public function outbox(){
        $outbox = Outbox::paginate(12);
        return view('admin.message.outbox',compact('outbox'));
    }

    public function delete_sms(Request $request)
    {
       if (!$request->leadIds) {
        return response()->json(['status' => false, 'message' => 'Please select SMS!'], 422);
       }else{
        $leadIds = $request->input('leadIds');
        Outbox::whereIn('id', $leadIds)->delete();
        return response()->json(['status' => 'success', 'message' => 'SMS deleted successfully!']);
       }
    }

    public function trash(){
        $outbox = Outbox::onlyTrashed()->paginate(12);
        return view('admin.message.trash',compact('outbox'));
    }

    public function delete_outbox(Request $request)
    {
        if (!$request->leadIds) {
            return response()->json(['status' => false, 'message' => 'Please select SMS!'], 422);
        }else{
            $leadIds = $request->input('leadIds');
            Outbox::whereIn('id', $leadIds)->forceDelete();
            return response()->json(['status' => 'success', 'message' => 'SMS deleted successfully!']);
        }
    }


    public function sms_template(){
        $sms_template = SmsTemplate::paginate(12);
        return view('admin.message.sms-template.index',compact('sms_template'));
    }

    public function sms_template_create(){
        return view('admin.message.sms-template.create');
    }

    public function sms_template_store(Request $request){
        $request->validate([
            'heading' => 'required',
            'body' => 'required',
        ]);
        SmsTemplate::create($request->all());
        return redirect()->route('sms-template')->with('success','Sms template created successfully!');
    }

    public function sms_template_edit($id){
        $sms_template = SmsTemplate::find($id);
        return view('admin.message.sms-template.edit',compact('sms_template'));
    }

    public function sms_template_update(Request $request,$id){
        $request->validate([
            'heading' => 'required',
            'body' => 'required',
        ]);
        SmsTemplate::find($id)->update($request->all());
        return redirect()->route('sms-template')->with('success','Sms template updated successfully!');
    }

    public function sms_template_delete($id){
        SmsTemplate::find($id)->delete();
        return redirect()->route('sms-template')->with('success','Sms template deleted successfully!');
    }

    public function show_msg(Request $request)
    {
        $message_data =Message::where('recepients',$request->phone_id)->where('type','sms')->get();
        return response()->json([
            'status'=>true,
            'data'=>$message_data
        ]);
    }
    public function show_email(Request $request)
    {
        $message_data =Message::where('recepients',$request->email)->where('type','mail')->get();
        return response()->json([
            'status'=>true,
            'data'=>$message_data
        ]);
    }

}

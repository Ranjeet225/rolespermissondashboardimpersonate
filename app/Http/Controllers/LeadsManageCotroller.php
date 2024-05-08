<?php

namespace App\Http\Controllers;

use App\Exports\LeadExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\LeadsExcelSheetImport;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentByAgent;
use App\Models\MasterLeadStatus;
use App\Models\ProgramPaymentCommission;
use Spatie\Permission\Models\Role;
use App\Models\Caste;
use App\Models\Subject;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Province;
use App\Models\Setting;
use App\Models\Pincode;
use App\Models\UserFollowUp;
use App\Models\EducationHistory;
use App\Models\Source;
use App\Models\EducationLevel;
use App\Models\PaymentsLink;
use App\Models\Intrested;
use App\Models\Fieldsofstudytype;
use App\Models\University;
use App\Models\Program;
use App\Models\ApplicationsApplied;
use Validator;
use App\Models\StudentScholorship;
use App\Models\Exam;
use App\Mail\FranchiseCreatedStudentProfileMail;
use App\Mail\StudentProfileCreatedMail;
use App\Mail\ApplyOel360Email;
use App\Mail\NewLeadAssignedMail;
use App\Mail\StudentPaymentMail;
use App\Jobs\SendOTPJob;
use App\Mail\assignLeadsMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Mail\PaymentLinkEmail;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\FuncCall;

class LeadsManageCotroller extends Controller
{
    public function lead_dashboard_data(Request $request)
    {
        $next_leads = '';
        $id = Auth::user()->id;
        $users = DB::table('users')->WHERE('id', $id)->first();
        $user = Auth::user();
        $roles = $user->roles;

        $page = $request->get('page');
        if ($page == 1) {
            $offset = 0;
        } else {
            $offset = ((($page - 1) * 12));
        }
        if ($user->hasRole('Administrator')) {
            $next_leads = StudentByAgent::where('next_calling_date', '>', DB::raw('DATE_ADD(now(),interval -1 day)'))
                ->skip($offset)
                ->take(12)
                ->orderBy('next_calling_date', 'asc')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id')
                ->select(
                    'student_by_agent.id',
                    'student_by_agent.name',
                    'student_by_agent.email',
                    'student_by_agent.phone_number',
                    'student_by_agent.next_calling_date',
                    'student_by_agent.created_at',
                    'student_by_agent.zip',
                    'student_by_agent.course',
                    'student_by_agent.intake',
                    'student_by_agent.intake_year',
                    'master_lead_status.name as status_name',
                    'A.email as assign_email',
                    'A.admin_type',
                    'A.parent_id',
                    'B.email as parent_email'
                );
            if (!empty($keywords)) {
                $next_leads = $next_leads->where(function ($query) use ($keywords) {
                    $query->WHERE('student_by_agent.name', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.zip', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.email', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.course', 'like', '%' . $keywords . '%')
                        ->orWHERE('master_lead_status.name', 'like', '%' . $keywords . '%');
                });
            }
            $next_leads = $next_leads->paginate(10);

            $next_leads_count = StudentByAgent::where('next_calling_date', '>', DB::raw('DATE_ADD(now(),interval -1 day)'))
                ->orderBy('next_calling_date', 'asc')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id')
                ->select('student_by_agent.id');
            if (!empty($keywords)) {
                $next_leads_count = $next_leads_count->where(function ($query) use ($keywords) {
                    $query->WHERE('student_by_agent.name', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.zip', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.email', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.course', 'like', '%' . $keywords . '%')
                        ->orWHERE('master_lead_status.name', 'like', '%' . $keywords . '%');
                });
            }
            $next_leads_count = $next_leads_count->count();
        } else if ($user->hasRole('agent') || $user->hasRole('sub_agent') || $user->hasRole('visa')) {

            $agents = DB::select("SELECT id FROM `users` WHERE `parent_id` = $user->id");
            $commaList = '';
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user->id;
            //=============
            $next_leads = StudentByAgent::where('next_calling_date', '>', DB::raw('DATE_ADD(now(),interval -1 day)'))
                ->skip($offset)
                ->take(12)
                ->orderBy('student_by_agent.next_calling_date', 'asc')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id')
                ->select(
                    'student_by_agent.id',
                    'student_by_agent.name',
                    'student_by_agent.email',
                    'student_by_agent.phone_number',
                    'student_by_agent.next_calling_date',
                    'student_by_agent.created_at',
                    'student_by_agent.zip',
                    'student_by_agent.course',
                    'student_by_agent.intake',
                    'student_by_agent.intake_year',
                    'master_lead_status.name as status_name',
                    'A.email as assign_email',
                    'A.admin_type',
                    'A.parent_id',
                    'B.email as parent_email'
                );
            // $next_leads = $next_leads->where(function ($query) use ($user) {
            //     $query->where('student_by_agent.added_by', $user->id);
            // });
            // $next_leads = $next_leads->where(function ($query) use ($user) {
            //     $query->where("student_by_agent.added_by IN($user)");
            // });
            $next_leads = $next_leads->where(function ($query) use ($user) {
                $query->orWhereRaw("student_by_agent.assigned_to IN($user)");
            });
            if (!empty($keywords)) {
                $next_leads = $next_leads->where(function ($query) use ($keywords) {
                    $query->orWHERE('student_by_agent.name', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.zip', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.email', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.course', 'like', '%' . $keywords . '%')
                        ->orWHERE('master_lead_status.name', 'like', '%' . $keywords . '%');
                });
            }
            $next_leads = $next_leads->paginate(10);
        }
        return $next_leads;
    }
    public function dashboard_lead_report(Request $request)
    {
        $id = Auth::user()->id;
        $users = DB::table('users')->WHERE('id', $id)->first();
        $user = Auth::user();
        $roles = $user->roles;
        $keywords = $request->get('keywords');

        $page = $request->get('page');
        if ($page == 1) {
            $offset = 0;
        } else {
            $offset = ((($page - 1) * 12));
        }

        if ($user->hasRole('Administrator')) {
            $lead_reports = StudentByAgent::select(
                'student_by_agent.id',
                'student_by_agent.name',
                'student_by_agent.email',
                'student_by_agent.phone_number',
                'student_by_agent.next_calling_date',
                'student_by_agent.created_at',
                'student_by_agent.zip',
                'student_by_agent.course',
                'student_by_agent.intake',
                'student_by_agent.intake_year',
                'master_lead_status.name as status_name',
                'A.email as assign_email',
                'A.account_type',
                'A.parent_id',
                'B.email as parent_email'
            )
            ->skip($offset)
            ->take(12)
            ->orderBy('id', 'DESC')
            ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
            ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
            ->LeftJoin('users as B', 'B.id', 'A.parent_id');
            if (!empty($keywords)) {
                $lead_reports = $lead_reports->where(function ($query) use ($keywords) {
                    $query->WHERE('student_by_agent.name', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.zip', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.email', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.course', 'like', '%' . $keywords . '%')
                        ->orWHERE('master_lead_status.name', 'like', '%' . $keywords . '%');
                });
            }
            $lead_reports = $lead_reports->paginate(10);
            $lead_reports_count = StudentByAgent::select('student_by_agent.id')
                ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
                ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
                ->LeftJoin('users as B', 'B.id', 'A.parent_id');
            if (!empty($keywords)) {
                $lead_reports_count = $lead_reports_count->where(function ($query) use ($keywords) {
                    $query->WHERE('student_by_agent.name', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.zip', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.email', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.course', 'like', '%' . $keywords . '%')
                        ->orWHERE('master_lead_status.name', 'like', '%' . $keywords . '%');
                });
            }
            $lead_reports_count = $lead_reports_count->count();
        } else if ($user->hasRole('agent') || $user->hasRole('sub_agent') || $user->hasRole('visa')) {
            $agents = DB::select("SELECT id FROM `users` WHERE `parent_id` = $user->id");
            $commaList = '';
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user->id;
            $lead_reports = StudentByAgent::select(
                'student_by_agent.id',
                'student_by_agent.name',
                'student_by_agent.email',
                'student_by_agent.phone_number',
                'student_by_agent.next_calling_date',
                'student_by_agent.created_at',
                'student_by_agent.zip',
                'student_by_agent.course',
                'student_by_agent.intake',
                'student_by_agent.intake_year',
                'master_lead_status.name as status_name',
                'A.email as assign_email',
                'A.account_type',
                'A.parent_id',
                'B.email as parent_email'
            )
            ->skip($offset)
            ->take(12)
            ->orderBy('id', 'DESC')
            ->LeftJoin('master_lead_status', 'master_lead_status.id', 'student_by_agent.lead_status')
            ->LeftJoin('users as A', 'A.id', 'student_by_agent.assigned_to')
            ->LeftJoin('users as B', 'B.id', 'A.parent_id');
            // $lead_reports = $lead_reports->where(function ($query) use ($user) {
            //     $query->where('student_by_agent.added_by', $user->id);
            // });
            $lead_reports = $lead_reports->where(function ($query) use ($user) {
                $query->orWhereRaw("student_by_agent.assigned_to IN($user)");
            });
            if (!empty($keywords)) {
                $lead_reports = $lead_reports->where(function ($query) use ($keywords) {
                    $query->orWHERE('student_by_agent.name', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.zip', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.phone_number', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.email', 'like', '%' . $keywords . '%')
                        ->orWHERE('student_by_agent.course', 'like', '%' . $keywords . '%')
                        ->orWHERE('master_lead_status.name', 'like', '%' . $keywords . '%');
                });
            }
            $lead_reports = $lead_reports->paginate(10);
        }
        return $lead_reports;
        // return view('admin.leads.dashboard',compact('lead_reports'));
    }
    public function leadsDashboard(Request $request)
    {

        $id = Auth::user()->id;
        $users = DB::table('users')->WHERE('id', $id)->first();
        $user_type = $users->admin_type;
        $user_ids = $users->id;
        // Total Leads
        $total_leads = 0;
        if ($user_type == 'Administrator') {
            $total_leads = StudentByAgent::count();
        } else if ($user_type == 'agent') {
            $total_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("added_by_agent_id", $user_ids)->orWhere('assigned_to', $user_ids);
            })->count();
        } else if ($user_type == 'sub_agent' || $user_type == 'visa') {
            $total_leads = StudentByAgent::where("assigned_to", $user_ids)->count();
        }
        // Cold Lead
        $lead_status_id = MasterLeadStatus::where("name", "Cold")->first()->id;
        $total_cold_leads = 0;
        if ($user_type == 'Administrator') {
            $total_cold_leads = StudentByAgent::where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'agent') {
            $total_cold_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("added_by_agent_id", $user_ids)->orWhere('assigned_to', $user_ids);
            })->where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa') {
            $total_cold_leads = StudentByAgent::where("assigned_to", $user_ids)->where('lead_status', $lead_status_id)->count();
        }
        // Hot Lead
        $lead_status_id = MasterLeadStatus::where("name", "Hot")->first()->id;
        $total_hot_leads = 0;
        if ($user_type == 'Administrator') {
            $total_hot_leads = StudentByAgent::where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'agent') {
            $total_hot_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("added_by_agent_id", $user_ids)->orWhere("assigned_to", $user_ids);
            })->where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa') {
            $total_hot_leads = StudentByAgent::where("assigned_to", $user_ids)->where('lead_status', $lead_status_id)->count();
        }
        // Future Lead
        $lead_status_id = MasterLeadStatus::where("name", "Future Lead")->first()->id;
        $total_future_leads = 0;
        if ($user_type == 'Administrator') {
            $total_future_leads = StudentByAgent::where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'agent') {
            $total_future_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("added_by_agent_id", $user_ids)->orWhere('assigned_to', $user_ids);
            })->where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa') {
            $total_future_leads = StudentByAgent::where("assigned_to", $user_ids)->where('lead_status', $lead_status_id)->count();
        }
        // New Lead
        $lead_status_id = MasterLeadStatus::where("name", "New")->first()->id;
        $total_new_leads = 0;
        if ($user_type == 'Administrator') {
            $total_new_leads = StudentByAgent::where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'agent') {
            $agents = DB::select("SELECT id FROM `users` WHERE `parent_id` = $user_ids");
            $commaList = '';
            foreach ($agents as $agent) {
                $commaList .= $agent->id . ',';
            }
            $user = $commaList . $user_ids;
            /*
            $query = StudentByAgent::whereRaw("assigned_to IN($user)");
            $query->where('lead_status', $lead_status_id);
            $query->where('added_by_agent_id', $user_ids);
            $query->get();
             $total_new_leads = $query;
             */
            $total_new_leads = StudentByAgent::where('lead_status', $lead_status_id)
                ->whereRaw("assigned_to IN($user)")
                ->where('added_by_agent_id', $user_ids)
                ->count();
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa') {
            $total_new_leads = StudentByAgent::where("assigned_to", $user_ids)->where('lead_status', $lead_status_id)->count();
        }
        // Not Useful Lead
        $lead_status_id = MasterLeadStatus::where("name", "Not Useful")->first()->id;
        $total_not_useful_leads = 0;
        if ($user_type == 'Administrator') {
            $total_not_useful_leads = StudentByAgent::where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'agent') {
            $total_not_useful_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("added_by_agent_id", $user_ids)->orWhere('assigned_to', $user_ids);
            })->where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa') {
            $total_not_useful_leads = StudentByAgent::where("assigned_to", $user_ids)->where('lead_status', $lead_status_id)->count();
        }
        // Warm Lead
        $lead_status_id = MasterLeadStatus::where("name", "Warm")->first()->id;
        $total_warm_leads = 0;
        if ($user_type == 'Administrator') {
            $total_warm_leads = StudentByAgent::where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'agent') {
            $total_warm_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("added_by_agent_id", $user_ids)->orWhere('assigned_to', $user_ids);
            })
                ->where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa') {
            $total_warm_leads = StudentByAgent::where("assigned_to", $user_ids)->where('lead_status', $lead_status_id)->count();
        }
        // Closed Leads
        $lead_status_id = MasterLeadStatus::where("name", "Closed")->first()->id;
        $total_closed_leads = 0;
        if ($user_type == 'Administrator') {
            $total_closed_leads = StudentByAgent::where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'agent') {
            $total_closed_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("added_by_agent_id", $user_ids)->orWhere('assigned_to', $user_ids);
            })->where('lead_status', $lead_status_id)->count();
        } else if ($user_type == 'sub_agent'  || $user_type == 'visa') {
            $total_closed_leads = StudentByAgent::where("assigned_to", $user_ids)->where('lead_status', $lead_status_id)->count();
        }

        // Total Assigned Leads --
        $total_assigned_leads = 0;
        if ($user_type == 'Administrator') {
            $total_assigned_leads = StudentByAgent::whereNotNull("assigned_to")->count();
        } else if ($user_type == 'agent' || $user_type == 'sub_agent'  || $user_type == 'visa') {
            $total_assigned_leads = StudentByAgent::where("assigned_to", $user_ids)->count();
        }

        // Total non-allocated Leads --
        $total_non_allocated_leads = 0;
        if ($user_type == 'Administrator') {
            $total_non_allocated_leads = StudentByAgent::whereNull("assigned_to")->count();
        } else if ($user_type == 'agent' || $user_type == 'sub_agent'  || $user_type == 'visa') {
            $total_non_allocated_leads = StudentByAgent::where("added_by_agent_id", $user_ids)->whereNull('assigned_to')->count();
        }

        // Leads by next calling date --
        $next_leads = [];
        if ($user_type == 'Administrator') {
            $next_leads = StudentByAgent::where('next_calling_date', '>', DB::raw('DATE_ADD(now(),interval -1 day)'))->orderBy('next_calling_date', 'asc')->paginate(10, ['*'], 'upcoming_lead_page');
        } else if ($user_type == 'agent' || $user_type == 'sub_agent'  || $user_type == 'visa') {
            $next_leads = StudentByAgent::where('next_calling_date', '>', DB::raw('DATE_ADD(now(),interval -1 day)'))->where(function ($sub_query) use ($user_ids) {
                return $sub_query->where('added_by', $user_ids)->orWhere("assigned_to", $user_ids);
            })->orderBy('next_calling_date', 'asc')->paginate(10, ['*'], 'upcoming_lead_page');
        }
        $next_leads = $this->lead_dashboard_data($request);
        $leads_report = $this->dashboard_lead_report($request);
        $data = array(
            "total_leads" => $total_leads,
            "total_cold_leads" => $total_cold_leads,
            "total_hot_leads" => $total_hot_leads,
            "total_future_leads" => $total_future_leads,
            "total_new_leads" => $total_new_leads,
            "total_not_useful_leads" => $total_not_useful_leads,
            "total_warm_leads" => $total_warm_leads,
            "total_closed_leads" => $total_closed_leads,
            "total_assigned_leads" => $total_assigned_leads,
            "total_non_allocated_leads" => $total_non_allocated_leads
        );
        return view('admin.leads.dashboard', compact('data', 'next_leads', 'leads_report'));
    }


    public function create_new_lead()
    {

        $user = auth()->user();
        $castes = Caste::where("status", 1)->get();
        $subjects = Subject::where("status", 1)->get();
        $countries = Country::all();
        $lead_status = MasterLeadStatus::where("status", 1)->orderBy('name', 'ASC')->get();
        $source = Source::where("status", 1)->orderBy('name', 'ASC')->get();
        $progLabel = EducationLevel::All();
        $preproLabel = Fieldsofstudytype::All();
        $interested = Intrested::WHERE('is_deleted', '0')->get();
        return view('admin.leads.add_lead', compact('preproLabel', 'castes', 'interested', 'subjects', 'countries', 'lead_status', 'source', 'progLabel'));
    }

    public function fetchStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $states = Province::where('country_id', $country_id)->pluck('name', 'id');
        return response()->json($states);
    }

    public function add_lead_data(Request $request)
    {
        if ($request->tab1) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'email' => 'required|unique:student_by_agent,email|max:225',
                'phone_number' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $user_id = Auth::user()->id;
            $StudentAgent = StudentByAgent::updateOrCreate(
                ['id' => $request->id],
                [
                    "user_id" => $user_id,
                    "source" => $request->source ?? '',
                    "name" => $request->first_name,
                    "middle_name" => $request->middle_name ?? '',
                    "last_name" => $request->last_name ?? '',
                    "father_name" => $request->father_name ?? '',
                    "email" => $request->email,
                    "phone_number" => $request->phone_number,
                    "phone_number_one" => $request->phone_number1 ?? '',
                    "dob" => $request->dob ?? '',
                ]
            );
            $data = [
                'id' => $StudentAgent->id,
                'student_agent' => $StudentAgent,
                'tab1' => 'tab1',
                'status' => true,
                'message' => 'Leads Added Successfully',
            ];
            return response()->json($data);
        } elseif ($request->tab2 && $request->id) {
            $studentAgent = StudentByAgent::where('id', $request->id)->first();
            $studentAgent->update([
                "cand_working" => $request->cand_working ?? '',
                "caste" => $request->caste,
                "country_id" => $request->country_id,
                "province_id" => $request->province_id,
                "zip" => $request->zip,
            ]);
            $data = [
                'student_agent' => $studentAgent,
                'tab2' => 'tab2',
                'status' => true,
                'message' => 'Leads Updated Successfully',
            ];
            return response()->json($data);
        } elseif ($request->tab3) {
            $studentAgent = StudentByAgent::where('id', $request->id)->first();
            $studentAgent->update([
                "program_label" => $request->program_label ?? '',
                "interested" => $request->interested ?? '',
                "subject" => $request->subject ?? '',
                "preferred_program_label" => $request->preferred_program_label ?? "",
                "school" => $request->school ?? "",
                "course" => $request->course ?? "",
                "preferred_country_id" => $request->preferred_country_id ?? "",
                "stream" => $request->stream,
                "status_study" => $request->status_study,
                "board" => $request->board_university,
            ]);
            $data = [
                'student_agent' => $studentAgent,
                'tab3' => 'tab3',
                'status' => true,
                'message' => 'Leads Updated Successfully',
            ];
            return response()->json($data);
        } elseif ($request->tab4) {
            $studentAgent = StudentByAgent::where('id', $request->id)->first();
            $studentAgent->update([
                "lead_status" => $request->lead_status ?? '',
                "next_calling_date" => $request->next_calling_date ?? '',
                "interested_in" => $request->interested_in ?? '',
                "intake" => $request->intakeMonth ?? '',
                "intake_year" => $request->year ?? '',
                "profile_created" => $request->profile_create ?? '',
                "student_comment" => $request->comment ?? '',
            ]);
            $data = [
                'student_agent' => $studentAgent,
                'tab4' => 'tab4',
                'status' => true,
                'message' => 'Leads Updated Successfully',
            ];
            if($request->profile_create == 'yes'){
                $input['is_active'] = 1;
                $input['name'] = $studentAgent->name;
                $input['password'] = Hash::make($studentAgent->name);
                $input['admin_type'] = 'student';
                $input['email'] = $studentAgent->email;
                $input['phone_number'] = $request->phone_number;
                $input['added_by'] = Auth::user()->id;
                $userInserted = DB::table('users')->insert($input);
                if ($userInserted) {
                    $user = User::where('email', $studentAgent->email)->first();
                    $role = Role::where('name','student')->first();
                    if ($role) {
                        $user->assignRole([$role->id]);
                    }
                }
            }
            return response()->json($data);
        }
    }

    public function lead_list(Request $request, $export = null)
    {
        $lead_list = $this->filterLeads($request);
        if ($request->has('export')) {
            return Excel::download(new LeadExport($lead_list->get()), 'leads.xlsx');
        }
        $lead_list = $lead_list->paginate(12);
        $countries = Country::all();
        $lead_status = MasterLeadStatus::get();
        if ($request->has('action') && $request->input('action') === 'export') {
            return Excel::download(new LeadExport($lead_list), 'leads.xlsx');
        }
        return view('admin.leads.lead-list', compact('lead_list', 'countries', 'lead_status'));
    }

    public function edit_lead_data(Request $request, $id)
    {
        $user = auth()->user();
        $castes = Caste::where("status", 1)->get();
        $subjects = Subject::where("status", 1)->get();
        $countries = Country::all();
        $lead_status = MasterLeadStatus::where("status", 1)->orderBy('name', 'ASC')->get();
        $source = Source::where("status", 1)->orderBy('name', 'ASC')->get();
        $progLabel = EducationLevel::All();
        $preproLabel = Fieldsofstudytype::All();
        $interested = Intrested::WHERE('is_deleted', '0')->get();
        $studentData = StudentByAgent::where('id', $id)->first();
        // dd($studentData);
        return view('admin.leads.edit_lead', compact('studentData', 'preproLabel', 'castes', 'interested', 'subjects', 'countries', 'lead_status', 'source', 'progLabel'));
    }


    private function filterLeads($request)
    {
        $lead_list = StudentByAgent::query();
        $user = Auth::user();
        $user_id = $user->id;
        if (($user->hasRole('agent'))) {
            $lead_list->where('assigned_to',$user->id)->orwhere('added_by_agent_id',$user->id);
        }
        if (($user->hasRole('sub_agent'))) {
            $lead_list->where('assigned_to',$user->id);
        }
        if ($request->name) {
            $lead_list->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->email) {
            $lead_list->where('email', 'LIKE', '%' . $request->email . '%');
        }
        if ($request->phone_number) {
            $lead_list->where('phone_number', 'LIKE', '%' . $request->phone_number . '%');
        }
        if ($request->zip) {
            $lead_list->where('zip', 'LIKE', '%' . $request->zip . '%');
        }
        if ($request->country_id) {
            $lead_list->where('country_id', 'LIKE', '%' . $request->country_id . '%');
        }
        if ($request->province_id) {
            $lead_list->where('province_id', 'LIKE', '%' . $request->province_id . '%');
        }
        if ($request->lead_status) {
            $lead_list->where('lead_status', 'LIKE', '%' . $request->lead_status . '%');
        }
        if ($request->assigned_status) {
            if (!($user->hasRole('Administrator'))) {
                if($request->assigned_status == 'allocated'){
                    $lead_list->where("assigned_to", $user_id)->whereNotNull('assigned_to');
                }elseif($request->assigned_status == 'notallocated'){
                    $lead_list->where("assigned_to", $user_id)->whereNull('assigned_to');
                }
            }
        }
        if ($request->intakeMonth) {
            $lead_list->where('intake', $request->intakeMonth);
        }
        if ($request->intake_year) {
            $lead_list->where('intake_year', $request->intake_year);
        }
        if ($request->from_date && $request->to_date) {
            $lead_list->whereBetween('created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59']);
        }

        return $lead_list;
    }

    public function manage_lead(Request $request, $id)
    {
        $studentAgentData = StudentByAgent::with('country')->find($id);
        $student_id = $id;
        $masterLeadStatus = MasterLeadStatus::get();
        $follow_up_list = DB::table('user_follow_up')
            ->join('users', 'user_follow_up.user_id', '=', 'users.id')
            ->where('student_id', $id)
            ->get();
        return view('admin.leads.manage-leads', compact('studentAgentData', 'student_id', 'masterLeadStatus', 'follow_up_list'));
    }

    public function add_user_follow_up(Request $request)
    {
        if ($request->payment_data == 'payment_form') {
            $studentEmail = StudentByAgent::where('id', $request->student_id)->select('email')->first();
            $paymentLink = "https://overseaseducationlane.com/";
            Mail::to($studentEmail->email)->send(new PaymentLinkEmail($paymentLink));
        }
        $data = [
            'student_id' => $request->student_id,
            'status' => $request->lead_status ?? '',
            'paymentType' => $request->paymentType ?? '',
            'paymentTypeRemarks' => $request->paymentTypeRemarks ?? '',
            'paymentMode' => $request->paymentMode ?? '',
            'paymentModeRemarks' => $request->paymentModeRemarks ?? '',
            'intake' => $request->intake ?? '',
            'intake_year' => $request->intake_year ?? '',
            'user_id' => Auth::user()->id,
            'comment' => $request->comment ?? '',
            'next_calling_date' => $request->next_calling_date,
            'amount' => $request->amount ?? '',
            'created_at' => now(),
        ];
        DB::table('user_follow_up')->insert($data);
        return response()->json(['message' => 'Data inserted Successfulyy']);
    }

    public function oel_360(Request $request)
    {
        $studentData = StudentByAgent::query();
        $user = Auth::user();
        if (!($user->hasRole('Administrator'))) {
            $userid = Auth::user()->id;
            $studentData->where('assigned_to',$user->id)->orwhere('added_by_agent_id',$user->id);
        }

        $studentData =$studentData->get();
        return view('admin.leads.oel-360', compact('studentData'));
    }


    public function lead_details(Request $request)
    {
        $leadDetails = StudentByAgent::with('caste_data', 'subject', 'country', 'state')->where('id', $request->lead_id)->first();
        return response()->json($leadDetails);
    }

    public function aply_360($id)
    {
        // dd($id);
        $leadDetails = StudentByAgent::with('caste_data', 'subject', 'country', 'state')->where('id', $id)->first();
        $university = University::where('country_id', $leadDetails->country_id)->get();
        $course = DB::table('course_tags')->get();
        $threesixtee = DB::table('tbl_three_sixtee')->Where('sba_id', $id)->first();
        $agent = DB::table('agents')->get();
        if (!empty($threesixtee)) {
            $university_id = explode(',', $threesixtee->college);
            $course_id = explode(',', $threesixtee->courses);
            $university_in_three_sixtee = University::wherein('id', $university_id)->get();
            $course_in_three_sixtee = DB::table('course_tags')->wherein('id', $course_id)->get();
            $table_three_sixtee_image = DB::table('tbl_three_sixtee_image')->where('image_type', 'offer')->where('sba_id', $id)->get();
        } else {
            $university_id = '';
            $course_id = '';
            $university_in_three_sixtee = '';
            $course_in_three_sixtee = '';
            $table_three_sixtee_image = '';
        }
        return view('admin.leads.apply_oel_360', compact('leadDetails', 'agent', 'table_three_sixtee_image', 'university', 'course', 'threesixtee', 'university_in_three_sixtee', 'course_in_three_sixtee'));
    }


    public function store_lead_360(Request $request)
    {
        $user_id = Auth::user()->id;
        $response = null;
        if ($request->tab1) {
            $validator = Validator::make($request->all(), [
                'collegeValues' => 'required',
                'sba_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }

            $college = implode(',', $request->collegeValues);
            $univerty = DB::table('tbl_three_sixtee')->where('sba_id', $request->sba_id)->first();
            if ($univerty == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $request->sba_id,
                    'user_id' => $user_id,
                    'college' => $college
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id)
                    ->update([
                        'sba_id' => $request->sba_id,
                        'user_id' => $user_id,
                        'college' => $college
                    ]);
            }
            $response = true;
        } elseif ($request->tab2) {
            $validator = Validator::make($request->all(), [
                'courseValues' => 'required',
                'sba_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $course = implode(',', $request->courseValues);
            $univerty = DB::table('tbl_three_sixtee')->where('sba_id', $request->sba_id)->first();
            if ($univerty == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $request->sba_id,
                    'user_id' => $user_id,
                    'courses' => $course
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id)
                    ->update([
                        'sba_id' => $request->sba_id,
                        'user_id' => $user_id,
                        'courses' => $course
                    ]);
            }
            $response = true;;
        } elseif ($request->tab3) {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $request->sba_id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $request->sba_id,
                    'user_id' => $user_id,
                    'application' => $request->application_status,
                    'remarks' => $request->remarks
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id)
                    ->update([
                        'sba_id' => $request->sba_id,
                        'user_id' => $user_id,
                        'application' => $request->application_status,
                        'remarks' => $request->remarks
                    ]);
            }
            $student = StudentByAgent::where('id', $request->sba_id)->select('email', 'name')->first();
            $threesixetee = DB::table('tbl_three_sixtee')->where('sba_id', $request->sba_id)->first();
            $collegeValues = explode(',', $threesixetee->college);
            $courseValues = explode(',', $threesixetee->courses);
            $universities = University::whereIn('id', $collegeValues)->pluck('university_name')->implode(', ');
            $course_in_three_sixtee = DB::table('course_tags')->wherein('id', $courseValues)->pluck('tag_name')->implode(', ');
            $data = [
                'university' => $universities,
                'student' => $student->name,
                'course' => $course_in_three_sixtee,
                'application' => $threesixetee->application,
                'remarks' => $threesixetee->remarks,
            ];
            if ($data) {
                Mail::to($student->email)->send(new ApplyOel360Email($data));
            }
            if ($request->application_status == 'rejected') {
                $status = 'Rejected';
            } else {
                $response = true;;
            }
        } elseif ($request->tab == 'tab4') {
            $validator = Validator::make($request->all(), [
                'document' => 'image|mimes:jpeg,png,jpg,gif|max:6048'
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $status = DB::table('tbl_three_sixtee')->where('sba_id', $request->sba_id)->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' =>  $request->sba_id,
                    'user_id' => $user_id,
                    'joining_date' => $request->joining_date ?? null,
                    'offer_amount' => $request->fee_amount ?? null,
                    'cource_details' => $request->course_details ?? null,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id,)
                    ->update([
                        'sba_id' => $request->sba_id ?? null,
                        'user_id' =>  $user_id ?? null,
                        'joining_date' => $request->joining_date ?? null,
                        'offer_amount' => $request->fee_amount  ?? null,
                        'cource_details' => $request->course_details  ?? null,
                    ]);
            }
            if ($request->images) {
                $images = $request->file('images');
                foreach ($images as $uploadedImage) {
                    $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                    $imagePath = 'imagesapi/' . $imageName;
                    $uploadedImage->move(public_path('imagesapi/'), $imageName);
                    DB::table('tbl_three_sixtee_image')
                        ->insert([
                            'sba_id' => $request->sba_id,
                            'user_id' =>  $user_id,
                            'image' => $imagePath,
                            'image_type' => 'offer'
                        ]);
                }
            }
            $response = true;
        } elseif ($request->tab == 'tab5') {
            $status = DB::table('tbl_three_sixtee')->where('sba_id', $request->sba_id)->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $request->sba_id,
                    'user_id' => $user_id,
                    'visa_document' => $request->visa_document ?? null,
                    'visa_apply_date' => $request->visa_apply_date ?? null,
                    'visa_agent' => $request->visa_agent ?? null,
                    'visa_manual' => $request->visa_manual ?? null,
                    'portal_url' => $request->portal_url ?? null,
                    'portal_email' => $request->portal_email ?? null,
                    'portal_userid' => $request->portal_userid ?? null,
                    'portal_password' => $request->portal_password ?? null,
                    'portal_question' => $request->portal_question ?? null,
                    'portal_answer' => $request->portal_answer ?? null,
                    'visa_document_type' => $request->visa_document_type ?? null,
                    'visa_application' => $request->visa_application ?? null
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id)
                    ->update([
                        'sba_id' => $request->sba_id,
                        'user_id' => $user_id,
                        'visa_document' => $request->visa_document ?? null,
                        'visa_apply_date' => $request->visa_apply_date ?? null,
                        'visa_agent' => $request->visa_agent ?? null,
                        'visa_manual' => $request->visa_manual ?? null,
                        'portal_url' => $request->portal_url ?? null,
                        'portal_email' => $request->portal_email ?? null,
                        'portal_userid' => $request->portal_userid ?? null,
                        'portal_password' => $request->portal_password ?? null,
                        'portal_question' => $request->portal_question ?? null,
                        'portal_answer' => $request->portal_answer ?? null,
                        'visa_document_type' => $request->visa_document_type ?? null,
                        'visa_application' => $request->visa_application ?? null
                    ]);
            }
            if ($request->hasFile('lead-document')) {
                $images = $request->file('lead-document');
                foreach ($images as $uploadedImage) {
                    $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                    $imagePath = 'imagesapi/' . $imageName;
                    $uploadedImage->move(public_path('imagesapi/'), $imageName);
                    DB::table('tbl_three_sixtee_image')
                        ->insert([
                            'sba_id' => $request->sba_id,
                            'user_id' =>  $user_id,
                            'image' => $imagePath,
                            'image_type' => 'visa_application'
                        ]);
                }
            }
            $response = true;;
        } elseif ($request->tab == 'tab6') {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $request->sba_id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $request->sba_id,
                    'user_id' => $user_id,
                    'visa_no' => $request->visa_no ?? null,
                    'visa_exp_date' => $request->visa_exp_date ?? null,
                    'remarks' => $request->remarks ?? null,
                    'visa_application' => $request->visa_application ?? ''
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id)
                    ->update([
                        'sba_id' => $request->sba_id,
                        'user_id' => $user_id,
                        'visa_no' => $request->visa_no ?? null,
                        'visa_exp_date' => $request->visa_exp_date ?? null,
                        'remarks' => $request->remarks ?? null,
                        'visa_application' => $request->visa_application ?? ''
                    ]);
            }
            $student = StudentByAgent::where('id', $request->sba_id)->select('email', 'name')->first();
            $threesixetee = DB::table('tbl_three_sixtee')->where('sba_id', $request->sba_id)->first();
            $data = [
                'visa_no' => $threesixetee->visa_no,
                'visa_exp_date' => $threesixetee->visa_exp_date,
                'remarks' => $threesixetee->remarks,
                'student' => $student->name,
                'joining_date' => $threesixetee->joining_date,
                'offer_amount' => $threesixetee->fee_amount,
                'course_details' => $threesixetee->cource_details,
                'student' => $student->name,
                'visa_document' => $threesixetee->visa_document ?? '',
                'visa_apply_date' => $threesixetee->visa_apply_date ?? null,
                'visa_agent' => $agent ?? '',
                'visa_manual' => $threesixetee->visa_manual ?? '',
                'portal_url' => $threesixetee->portal_url ?? '',
                'portal_email' => $threesixetee->portal_email ?? '',
                'portal_userid' => $threesixetee->portal_userid ?? '',
                'portal_password' => $threesixetee->portal_password ?? '',
                'portal_question' => $threesixetee->portal_question ?? '',
                'portal_answer' => $threesixetee->portal_answer ?? '',
                'visa_document_type' => $threesixetee->visa_document_type ?? '',
                'visa_application' => $threesixetee->visa_application ?? '',
                'visa_no' => $threesixetee->visa_no,
                'visa_exp_date' => $threesixetee->visa_exp_date,
                'remarks' => $threesixetee->remarks,
                'student' => $student->name
            ];
            if ($data) {
                Mail::to($student->email)->send(new ApplyOel360Email($data));
            }
            $response = true;;
        } elseif ($request->tab == 'tab7') {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $request->sba_id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $request->sba_id,
                    'user_id' => $user_id,
                    'fee_payment_mode' => $request->fee_payment_mode ?? null,
                    'fee_amount' => $request->fee_amount ?? null,
                    'fee_payment_by' => $request->fee_payment_by ?? null,
                    'fee_agent' => $request->fee_agent ?? null,
                    'fee_remarks' => $request->fee_remarks ?? null,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id)
                    ->update([
                        'sba_id' => $request->sba_id,
                        'user_id' => $user_id,
                        'fee_payment_mode' => $request->fee_payment_mode ?? null,
                        'fee_amount' => $request->fee_amount ?? null,
                        'fee_payment_by' => $request->fee_payment_by ?? null,
                        'fee_agent' => $request->fee_agent ?? null,
                        'fee_remarks' => $request->fee_remarks ?? null,
                    ]);
            }
            $response = true;;
        } elseif ($request->tab == 'tab8') {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $request->sba_id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $request->sba_id,
                    'user_id' => $user_id,
                    'flight_name' => $request->flight_name ?? null,
                    'flight_no' => $request->flight_no ?? null,
                    'flight_dep_date' => $request->flight_dep_date ?? null,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id)
                    ->update([
                        'sba_id' => $request->sba_id,
                        'user_id' => $user_id,
                        'flight_name' => $request->flight_name ?? null,
                        'flight_no' => $request->flight_no ?? null,
                        'flight_dep_date' => $request->flight_dep_date ?? null,
                    ]);
            }
            $response = true;;
        } elseif ($request->tab == 'tab9') {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $request->sba_id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $request->sba_id,
                    'user_id' => $user_id,
                    'agent_name' => $request->agent_name ?? null,
                    'hand_holding' => $request->hand_holding ?? null,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id)
                    ->update([
                        'sba_id' => $request->sba_id,
                        'user_id' => $user_id,
                        'agent_name' => $request->agent_name ?? null,
                        'hand_holding' => $request->hand_holding ?? null,
                    ]);
            }

            $response = true;;
        } elseif ($request->tab == 'tab10') {
            $status = DB::table('tbl_three_sixtee')
                ->where('sba_id', $request->sba_id)
                ->first();
            if ($status == NULL) {
                DB::table('tbl_three_sixtee')->insert([
                    'sba_id' => $request->sba_id,
                    'user_id' => $user_id,
                    'hostel' => $request->hostel ?? null,
                    'personal' => $request->personal ?? null,
                ]);
            } else {
                DB::table('tbl_three_sixtee')
                    ->Where('sba_id', $request->sba_id)
                    ->update([
                        'sba_id' => $request->sba_id,
                        'user_id' => $user_id,
                        'hostel' => $request->hostel ?? null,
                        'personal' => $request->personal ?? null,
                    ]);
            }
            $student = StudentByAgent::where('id', $request->sba_id)->select('email', 'name')->first();
            $threesixetee = DB::table('tbl_three_sixtee')->where('sba_id', $request->sba_id)->first();
            $data = [
                'hostel' => $request->hostel,
                'personal' => $request->personal,
                'agent_name' => $threesixetee->agent_name,
                'hand_holding' => $threesixetee->hand_holding,
                'student' => $student->name,
                'fee_payment_mode' => $threesixetee->fee_payment_mode,
                'fee_amount' => $threesixetee->fee_amount,
                'fee_payment_by' => $threesixetee->fee_payment_by,
                'fee_agent' => $threesixetee->fee_agent,
                'fee_remarks' => $threesixetee->fee_remarks,
                'student' => $student->name,
                'flight_name' => $threesixetee->flight_name,
                'flight_no' => $threesixetee->flight_no,
                'flight_dep_date' => $threesixetee->flight_dep_date,
            ];
            if ($data) {
                Mail::to($student->email)->send(new ApplyOel360Email($data));
            }
            $response = true;;
        }
        $data = [
            'success' => true,
            'status' => $response,
        ];
        return response()->json($data);
    }

    public function bulk_upload()
    {
        return view('admin.leads.leads_Excel_sheet_import');
    }

    public function excel_sheet_leads(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        $file = $request->file('file');
        Excel::import(new LeadsExcelSheetImport, $file);
        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }


    public function fetch_leads(Request $request)
    {
        $user = Auth::user();
        $user_type = $user->admin_type;
        $user_id = $user->id;
        $leads = StudentByAgent::query();
        if ($request->key == 'total-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads;
            } else if ($user_type == 'agent') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id);
            }
            $leads_name = 'Total Leads';
        }
        if ($request->key == 'total-cold-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 4);
            } else if ($user_type == 'agent') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 4);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 4);
            }
            $leads_name = 'Total Cold Leads';
        }
        if ($request->key == 'total-hot-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 3);
            } else if ($user_type == 'agent') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 3);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 3);
            }
            $leads_name = 'Total Hot Leads';
        }
        if ($request->key == 'total-future-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 6);
            } else if ($user_type == 'agent') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 6);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 6);
            }
            $leads_name = 'Total Future Leads';
        }
        if ($request->key == 'total-new-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 1);
            } else if ($user_type == 'agent') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 1);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 1);
            }
            $leads_name = 'Total New Leads';
        }
        if ($request->key == 'total-not-useful-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 5);
            } else if ($user_type == 'agent') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 5);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 5);
            }
            $leads_name = 'Total Not Useful Leads';
        }
        if ($request->key == 'total-warms-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 2);
            } else if ($user_type == 'agent') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 2);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 2);
            }
            $leads_name = 'Total Warms Lead';
        }
        if ($request->key == 'total-closed-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->where('lead_status', 7);
            } else if ($user_type == 'agent') {
                $leads = $leads->where("added_by_agent_id", $user_id)->orWhere('assigned_to', $user_id)->where('lead_status', 7);
            } else if ($user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->where('lead_status', 7);
            }
            $leads_name = 'Total Closed Lead';
        }
        if ($request->key == 'total-allocated-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->whereNotNull("assigned_to");
            } else if ($user_type == 'agent' || $user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->whereNotNull('assigned_to');
            }
            $leads_name = 'Total Allocated Leads';
        }
        if ($request->key == 'total-non-allocated-leads') {
            if ($user_type == 'Administrator') {
                $leads = $leads->whereNull("assigned_to");
            } else if ($user_type == 'agent' || $user_type == 'sub_agent') {
                $leads = $leads->where("assigned_to", $user_id)->whereNull('assigned_to');
            }
            $leads_name = 'Total Non-Allocated Leads';
        }

        $leads_data = $leads->paginate(12);
        $leads_data = [
            'leads' => $leads_data,
            'leads_name' => $leads_name,
        ];
        return view('admin.leads.leads-data', compact('leads_data'));
    }


    public function relocated_frenchise(Request $request)
    {
        $agent = User::query();
        $user = Auth::user();
        if ($user->hasRole('Administrator')) {
            $agent->where('admin_type','agent')->where('status',1);
        }elseif($user->hasRole('agent')){
            $agent->where('added_by',$user->id)->where('admin_type','sub_agent')->where('is_active',1);
        }
         $agentData =$agent->get();
         return response()->json($agentData);
    }

    public function allocate_franchise(Request $request)
    {
        $users = Auth::user();
        if(!empty($request->leadIds)){
            $std_by_id = DB::table('student_by_agent')->whereIn('id', $request->leadIds)->whereNotNull('zip')->get();
            if ($std_by_id->isEmpty()) {
                $data = "You can not assign without Pincode !!!!";
                return response()->json($data);
            }else{
                $user= User::where('id',$request->agentId)->select('id','added_by')->first();
                if($users->hasRole('Administrator')){
                    StudentByAgent::whereIn('id', $request->leadIds)->update([
                        'added_by_agent_id' => $request->agentId,
                        'assigned_to' =>$request->agentId,
                    ]);
                    $franchise_user = User::find($request->agentId);
                    if($franchise_user){
                        $data = [
                            'user_id' => $franchise_user->id,
                            'message' => "A Lead has been assigned to you",
                        ];
                        // Mail::to($franchise_user->email)->send(new assignLeadsMail($data));
                    }
                    $data = "Franchise Updated Successfully !!!!";
                }else if($users->hasRole('agent')){
                    StudentByAgent::whereIn('id',$request->leadIds)->update([
                        'assigned_to' =>$request->agentId,
                    ]);
                    $franchise_user = User::find($request->agentId);
                    if($franchise_user){
                        $data = [
                            'user_id' => $franchise_user->id,
                            'message' => "A Lead has been assigned to you",
                        ];
                        // Mail::to($franchise_user->email)->send(new assignLeadsMail($data));
                    }
                    $data = "Agent Updated Successfully !!!!";
                } else {
                    $data = "Something Went Wrong !!!!";
                }
            }
        }else{
            $data = "Please Select leads";
        }
        return response()->json($data);
    }
}

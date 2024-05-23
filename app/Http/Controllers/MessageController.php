<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\MasterLeadStatus;
use App\Http\Controllers\LeadsManageCotroller;
use App\Models\SmsTemplate;

class MessageController extends Controller
{
    //

    public function message_lead(Request $request, $export = null)
    {
        $leadsManageController = new LeadsManageCotroller;
        $lead_list = $leadsManageController->filterLeads($request);
        $lead_list = $lead_list->paginate(12);
        $countries = Country::all();
        $smsTemplates =SmsTemplate::get();
        $lead_status = MasterLeadStatus::get();
        return view('admin.message.message-lead', compact('lead_list', 'countries', 'lead_status','smsTemplates'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentsLink;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AccountingController extends Controller
{
        public function getFeesByMasterService($master_service) {
            $user = Auth::user();
            $query = PaymentsLink::with('payments')
                ->whereHas('payments', function($query) {
                    $query->where('payment_status', 'success');
                })
                ->wherein('master_service',[$master_service]);

            if ($user->hasRole('Administrator')) {
                return $query->sum('amount');
            }
            $userId = $user->id;

            if ($user->hasRole('agent')) {
                $usersId = User::where('added_by', $userId)
                    ->whereNotIn('admin_type', ['student'])
                    ->pluck('id')
                    ->toArray();

                if (!empty($usersId)) {
                    $usersId[] = $userId;
                }

                return $query->whereIn('user_id', $usersId)->sum('amount');
            }

            return $query->where('user_id', $userId)->sum('amount');
        }

        public function index()
        {
            $fees = [
                'oel_registration_fees' => $this->getFeesByMasterService(1),
                'university_application_fees' => $this->getFeesByMasterService(2),
                'course_tution_fees' => $this->getFeesByMasterService(3),
                'visa_processing_fees' => $this->getFeesByMasterService(4),
                'embassy_fees' => $this->getFeesByMasterService(5),
                'accommodation_fees' => $this->getFeesByMasterService(6),
                'ticket_fees' => $this->getFeesByMasterService(7),
                'english_test' => $this->getFeesByMasterService(8),
            ];
            return view('admin.accounting.index', $fees);
        }

}

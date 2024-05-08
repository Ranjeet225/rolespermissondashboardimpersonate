<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\StudentByAgent;

class LeadsExcelSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $values = [
            'name', 'email', 'father_name', 'country_id', 'province_id', 'zip', 'phone_number',
            'phone_number_one', 'stream', 'school', 'added_by', 'created_at', 'added_by_agent_id',
            'student_comment', 'next_calling_date', 'profile_created', 'student_user_id',
            'lead_status', 'preferred_country_id', 'received_date', 'interested_in', 'sent_date',
            'assigned_to', 'assigned_to_sub_sub_agents', 'course', 'source', 'intake', 'intake_year',
            'middle_name', 'last_name', 'phone_number1', 'dob', 'cand_working', 'interested',
            'status', 'profile', 'program_label', 'status_study', 'board', 'university', 'intrested',
            'preferred_program_label', 'status_threesixty', 'pay_update','caste','subject',
        ];

        $data = [];
        foreach ($values as $value) {
            $data[$value] = $row[$value] ?? null;
        }
        $data['user_id'] = Auth::id();
        $data['updated_at'] = now();
        $existingRecord = StudentByAgent::where('phone_number', $row['phone_number'])->first();
        return $existingRecord ? tap($existingRecord)->update($data) : new StudentByAgent($data);
    }
}

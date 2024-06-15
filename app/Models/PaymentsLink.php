<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsLink extends Model
{
    use HasFactory;


    protected $table ='payments_link';

    protected $guarded =[];

    public function master_service()
    {
        return $this->belongsTo(MasterService::class,'master_service','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsLink extends Model
{
    use HasFactory;


    protected $table ='payments_link';

    protected $guarded =[];
}

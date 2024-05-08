<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    protected $table = 'education_level';
    protected $fillable = [
        'name', 'item_order'
    ];

    public function program()
    {
        return $this->hasMany(Program::class, 'education_level_id');
    }

    public function educationHistory()
    {
        return $this->hasMany(EducationHistory::class, 'education_level_id');
    }
}

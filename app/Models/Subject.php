<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FacultyLoad;

class Subject extends Model
{
    protected $fillable =
    [
        'subject_code',

        'subject_title',

        'lec_hours',

        'lab_hours',

        'units',

        'year_level',

        'semester',

        'prerequisite'
    ];
    public function loads()
{
    return $this->hasMany(
        FacultyLoad::class
    );
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
    'google_id',
    'faculty_id',
    'first_name',
    'middle_name',
    'last_name',
    'email',
    'department',
    'specialization',
    'password',
    'status'
];

public function loads()
{
    return $this->hasMany(
        FacultyLoad::class
    );
}

}


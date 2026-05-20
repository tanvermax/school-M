<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
    //

    protected $fillable = [
    'user_id',
    'designation',
    'department',
    'qualification',
    'joining_date',
    'phone_number',
    'address',
];

public function user()
{
    return $this->belongsTo(User::class);
}
}

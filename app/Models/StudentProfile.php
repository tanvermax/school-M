<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    //
    protected $fillable = [
    'user_id',
    'class_name',
    'roll_no',
    'admission_year',
    'phone_number',
    'address',
];


public function user()
{
    return $this->belongsTo(User::class);
}
}

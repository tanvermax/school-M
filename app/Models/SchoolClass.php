<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    //
    use HasFactory;

    protected $fillable = ['class_name', 
    'teacher_id','subject_name', 'section'];

    // এই ক্লাসের নামের সাথে মিল থাকা সকল স্টুডেন্ট প্রোফাইল নিয়ে আসবে
    public function students()
    {
        return $this->hasMany(StudentProfile::class, 'class_name', 'class_name');
    }

    public function teacher()
{
    return $this->belongsTo(User::class, 'teacher_id');
}
}

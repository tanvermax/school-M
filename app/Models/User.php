<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'role', 'password'];

    protected $hidden = ['password', 'remember_token'];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    // Role based menu visibility
   public function canSeeAnalytics(): bool
    {
        return $this->isTeacher();           // শুধু Teacher দেখবে
    }

    public function canSeeResults(): bool
    {
        return $this->isStudent();           // শুধু Student দেখবে
    }

    public function canSeeAttendance(): bool
    {
        return $this->isTeacher();           // শুধু Teacher দেখবে
    }

    public function studentProfile()
{
    return $this->hasOne(StudentProfile::class);
}

}

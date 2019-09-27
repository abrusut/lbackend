<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role'];
    
    public function students()
    {
        return $this->hasMany('User', 'student_id');
    }
    
    public function teachers()
    {
        return $this->hasMany(User::class, 'teacher_id');
    }
}

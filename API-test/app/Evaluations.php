<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    protected $fillable = ['score'];
    
    public function students()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    
    public function teachers()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}

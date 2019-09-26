<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    protected $fillable = ['score'];
    
    public function students()
    {
        return $this->belongsTo('App\User', 'student_id');
    }
    
    public function teachers()
    {
        return $this->belongsTo('App\User', 'teacher_id');
    }
}

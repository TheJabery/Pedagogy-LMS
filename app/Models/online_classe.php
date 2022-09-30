<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class online_classe extends Model
{
    //protected $guarded=[''];
    public $fillable= [
        'Grade_id',
        'Classroom_id',
        'section_id',
        'created_by',
        'teacher_id',
        'meeting_id',
        'topic',
        'start_at',
        'duration',
        'password',
        'student_password',
        'user_id',
    ];

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id', 'subject_id', 'teacher_id', 'date', 'start_time', 'end_time',
    ];

    public function classSection()
    {
        return $this->belongsTo(Classes::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examinations extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id', 'subject_id', 'exam_name', 'exam_date', 'start_time', 'end_time',
    ];

    public function classSection()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
}


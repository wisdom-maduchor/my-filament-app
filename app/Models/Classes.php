<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id',
    ];

    // A class section belongs to a teacher (optional)
    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }

    // A class section has many students
    public function students()
    {
        return $this->hasMany(Students::class);
    }
}

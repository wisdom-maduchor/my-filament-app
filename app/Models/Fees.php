<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fees extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'amount', 'payment_date', 'payment_method',
    ];

    public function student()
    {
        return $this->belongsTo(Students::class);
    }
}

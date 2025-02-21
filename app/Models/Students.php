<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    // Define fillable fields for mass assignment
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'classes_id',
    ];

    // A student belongs to one class section
    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }
}

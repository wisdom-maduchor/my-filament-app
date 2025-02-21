<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teachers extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone',
    ];

    // A teacher may manage multiple class sections.
    public function classSections()
    {
        return $this->hasMany(ClassSection::class);
    }
}

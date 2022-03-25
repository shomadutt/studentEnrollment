<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = ['school_name'];

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'enrollment',
            'school_id',
            'student_id'
        );
    }
}

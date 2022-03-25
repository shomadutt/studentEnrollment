<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email_address'];

    public function schools()
    {
        return $this->belongsToMany(
            School::class,
            'enrollment',
            'sschool_id',
            'student_id'
        );
    }
}

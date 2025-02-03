<?php
//app/Models/Student.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'sex',
        'dob',
        'address',
        'email',
        'mobile_no',
        'lrn',
        'class',
        'section',
        'password',
        'fathers_name',
        'mothers_name',
        'guardians_name',
        'emergency_contact_no',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
}

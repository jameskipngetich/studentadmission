<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'schoolName',
        'contactPerson',
        'contactDetails',
        'schoolLocation',
    ];

    public function users(){
        $this -> hasMany(User::class);
    }
}

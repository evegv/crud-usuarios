<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table ='userprofile';
    protected $primaryKey = 'id_user';
    protected $fillable = ['names', 'first_lastname', 'second_lastname','email','phone'];
    public $timestamps = false;
}

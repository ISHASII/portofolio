<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'bio',
        'avatar',
        'resume_link',
        'email',
        'phone',
        'address',
        'github',
        'linkedin',
        'instagram',
    ];
}
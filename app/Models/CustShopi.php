<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustShopi extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'company_id',
        'industry',
        'user_id',
        'wheretosell',
    ];

    /**
     * The attributes that should be cast to native types
     */
    protected $casts = [];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assingnable
     * @var array
     */
    protected $fillable = [
        'group_name',
        'company_id'
    ];

    /**
     * The attributes that should be cast to native types
     */
    protected $casts = [
        'group_name' => 'string'
    ];
}
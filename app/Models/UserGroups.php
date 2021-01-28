<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'user_id',
        'group_id',
        'company_id',
    ];

    /**
     * The attributes that should be cast to native types
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'group_id' => 'int'
    ];
}
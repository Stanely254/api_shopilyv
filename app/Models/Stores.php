<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'active',
        'company_id',
        'location_name',
        'location_lat',
        'location_lng',
    ];

    /**
     * The attributes that should be cast to native types
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'location_lat' => 'string',
        'location_lng' => 'string',
    ];
}
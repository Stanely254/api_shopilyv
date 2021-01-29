<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable
     * @var array
     * 
     */
    protected $fillable = [
        'bill_no',
        'date_time',
        'gross_amount',
        'user_id',
        'company_id',
        'net_amount',
        'o_net',
    ];
}
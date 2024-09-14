<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'tracking_no',
        'fullname',
        'phone',
        'Method_of_delivery',
        'Oblast',
        'number_viddilennya',
        'Method_of_payment',
        'status',
        'messagePost',
        'email'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkin', 'checkout', 'adult', 'child', 'infant', 'attachment', 'notes', 'user_id'
    ];

    
}

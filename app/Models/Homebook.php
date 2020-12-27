<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkin', 'checkout', 'adult', 'child', 'infant', 'notes', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'address',
        'contact'
    ];
}

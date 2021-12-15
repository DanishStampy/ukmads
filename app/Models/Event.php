<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_event';
    public $incrementing = false;
    protected $keyType = 'string';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($events) {
            if (!$events->id_event) {
                $latest = Event::latest('id_event')->first();
                $count = 1;
                
                if ($latest!=null&&$latest->exists()) {
                    $count = substr($latest->id_event, 2)+1;
                }
                $events->id_event = 'EV' . $count;
                // $user->save();
            }
        });
    }
}

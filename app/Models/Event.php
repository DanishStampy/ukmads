<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_event';
    public $incrementing = false;

    protected $fillable=[
        'id_event',
        'creator_email',
        'name',
        'location',
        'organizer',
        'contact',
        'description',
        'picture',
        'reason',
        'join',
        'status',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($events) {
            if (!$events->id_event) {
                while (true) {
                    try {
                        $latest = Event::latest('id_event')->first();
                        $uid=1000;

                        if ($latest != null && $latest->exists()) {
                            $uid = random_int(1000, 9999);
                        }

                        $events->id_event = 'EV' . $uid;
                        break;
                    } catch (QueryException $exception) {
                        continue;
                    }
                }
                // $user->save();
            }
        });
    }

    public function setPictureAttribute($value){
        $this->attributes['picture'] = json_encode($value);
    }

    public function getPictureAttribute($value){
        return json_decode($value);
    }
}

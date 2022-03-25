<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Advertisement extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ads';
    public $incrementing = false;

    protected $fillable = [
        'id_ads',
        'creator_email',
        'name',
        'type',
        'price',
        'seller_name',
        'contact',
        'description',
        'picture',
        'reason',
        'status',
        'reads',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($ads) {
            if (!$ads->id_ads) {
                while (true) {
                    try {
                        $latest = Advertisement::latest('id_ads')->first();
                        $uid=1000;

                        if ($latest != null && $latest->exists()) {
                            $uid = random_int(1000, 9999);
                        }

                        $ads->id_ads = 'AD' . $uid;
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ads';
    public $incrementing = false;

    protected $fillable=[
        'id_ads',
        'creator_email',
        'name',
        'type',
        'price',
        'seller_name',
        'contact',
        'description',
        'picture',
        'status',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($ads) {
            if (!$ads->id_ads) {
                $latest = Advertisement::latest('id_ads')->first();
                $count = 1;

                if ($latest!=null&&$latest->exists()) {
                    $count = substr($latest->id_ads, 2)+1;
                }
                $ads->id_ads = 'AD' . $count;
                // $user->save();
            }
        });
    }
}

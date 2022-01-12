<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'payment_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'payment_id',
        'user_id',
        'payer_email',
        'amount',
        'currency',
        'payment_status',
    
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            if (!$payment->payment_id) {
                while (true) {
                    try {
                        $latest = Payment::latest('payment_id')->first();

                        $uid = 1000;

                        if ($latest != null && $latest->exists()) {
                            $uid = random_int(1001, 9999);
                        }
                        $payment->payment_id = 'PAY' . $uid;
                        break;

                    } catch (QueryException $exception) {
                        continue;
                    }
                }
            }
        });
    }
}

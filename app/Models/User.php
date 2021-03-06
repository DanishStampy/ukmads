<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->user_id) {
                while (true) {
                    try {
                        $latest = User::where('role', $user->role)->latest('user_id')->first();

                        $uid = 1000;

                        if ($latest != null && $latest->exists()) {
                            $uid = random_int(1001, 9999);
                        }
                        $user->user_id = ($user->role !== 'admin' ? 'S' : 'A').$uid;

                        break;

                    } catch (QueryException $exception) {
                        continue;
                    }
                }
            }
        });
    }
}

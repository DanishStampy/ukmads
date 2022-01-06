<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class JoinList extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = [
        'id_event',
        'guest_email',
        'guest_name',
        'guest_contact',
    ];

    // protected function setKeysForSaveQuery(Builder $query)
    // {
    //     $query
    //         ->where('id_event', '=', $this->getAttribute('id_event'))
    //         ->where('guest_email', '=', $this->getAttribute('guest_email'));

    //     return $query;
    // }

}

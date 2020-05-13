<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    const DB_CONNECTION = 'mysql';

    protected $connection = self::DB_CONNECTION;

    public $timestamps = false;

    protected $primaryKey = 'key';

    protected static function boot()
    {
        parent::boot();

        config(['database.connections.' . self::DB_CONNECTION =>
            config('database.connections.' . config('database.default')),
        ]);
    }
}

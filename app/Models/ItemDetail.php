<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    protected $primaryKey = 'item_id';

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id', 'item_id');
    }
}

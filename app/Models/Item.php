<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function detail()
    {
        return $this->hasOne('App\Models\ItemDetail', 'item_id', 'item_id');
    }
}

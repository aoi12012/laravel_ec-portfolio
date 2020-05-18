<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'item_id';

    protected $fillable = ['jancode13', 'jancode8', 'name', 'name_kana', 'category_id', 'maker_id', 'base_price', 'tax_free_fg', 'volume', 'description'];

    public function post()
    {
        return $this->hasOne('App\Models\Post', 'id',  'thumbnail');
    }

}

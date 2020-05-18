<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SearchController extends Controller
{
    public function productSearch($search)
    {
        $data = [];
        $items = Item::where('name', 'LIKE', "%$search%")->get();
        foreach ($items as $item)
        {
            $data[] = [
                'item_id' => $item->item_id,
                'jancode13' => $item->jancode13,
                'jancode8' => $item->jancode8,
                'name' => $item->name,
                'thumbnail' => $item->post->image_path
            ];
        }
        return $data;
    }

}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\ItemApiRequest;
use App\Models\Item;
use App\Models\Post;
use Storage;
use Sequence;
use DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $items = Item::all();
        foreach ($items as $item)
        {
            $data[] = [
                'item_id' => $item->item_id,
                'jancode13' => $item->jancode13,
                'jancode8' => $item->jancode8,
                'name' => $item->name
            ];
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemApiRequest $request)
    {
        $post = new Post;
        $data = $request->all();
        $path = Storage::disk('s3')->putFile('itemImages', $request->file('image'), 'public');
        $post->image_path = Storage::disk('s3')->url($path);
        $post->save();

        $item_id = Sequence::getNewItemId();

        $data['base_price'] = 10000;

        $item = new Item;
        $item->fill($data);
        $item->item_id = $item_id;
        $item->thumbnail = $post->id;
        $item->save();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::where('item_id', $id)->first();
        $item['thumbnail'] = $item->post->image_path;
        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemApiRequest $request, $id)
    {
        $data = $request->all();
        $item = new Item;
        $item->where('item_id', $id)->update($data);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = new Item;
        $item->where('item_id', $id)->delete();
    }
}

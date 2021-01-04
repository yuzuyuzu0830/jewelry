<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DoneItem;

class DoneItemsController extends Controller
{
    public function postItems(Request $request)
    {
        $done_items = DoneItem::select('done_id', 'title', 'start')->get();

        $newArr = [];
        foreach($done_items as $done_item) {
            $post_item["done_id"] = $done_item["done_id"];
            $post_item["title"] = $done_item["title"];
            $post_item["start"] = $done_item["start"];
            $newArr = $post_item;

            echo json_encode($newArr);
        }
    }

    public function formatDate($date) {
        return str_replace('T00:00:00+09:00', '', $date);
    }

    public function addItems(Request $request) {
        $item = new DoneItem();
        $item->start = $request->start;
        $item->title = $request->title;
        $item->save();

        return response()->json(['done_id' => $item->done_id]);
    }

    public function editDate(Request $request) {
        $data = $request->all();
        $done_item = DoneItem::find($data['done_id']);
        $done_item->date = $data['newDate'];
        return null;
    }
    //
}

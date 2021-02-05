<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\NewItem;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $user_id = Auth::id();
        $items = NewItem::where('user_id', $user_id);

        if($search !== null) {
            // 全角スペースを半角にする
            $search_split = mb_convert_kana($search, 's');
            // 空白で区切る(-1は文字数の制限なし、PREG_SPLIT_NO_EMPTYは空文字のみ返されるの意)
            $search_split2 = preg_split('/[\s,]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);

            foreach($search_split2 as $value)
            {
                $items
                    ->where('title', 'like', '%'.$value.'%')
                    ->orWhere('brand', 'like', '%'.$value.'%');
            }
        }

        $items->select('image', 'id', 'title', 'brand', 'start', 'created_at')->orderBy('created_at', 'desc');
        $new_items = $items->paginate(15);

        return view('new_items.list_of_item', ['user_id' => $user_id, 'new_items' => $new_items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_items.post_item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_item = new NewItem();

        $new_item->title = $request->input('title');
        $new_item->user_id = Auth::id();
        $new_item->color = $request->input('color');
        $new_item->brand = $request->input('brand');
        $new_item->price = $request->input('price');
        $new_item->start = $request->input('start');

        $form = $request->all();
        if (isset($form['image'])) {
            $file = $request->file('image');
            //  getClientOrientalExtension()でファイルの拡張子を取得する
            $extension = $file->getClientOriginalExtension();
            $file_token = Str::random(32);
            $filename = $file_token . '.' . $extension;
            // 表示を行うときに画像名が必要になるため、ファイル名を再設定
            $form['image'] = $filename;
            $file->move('upload/new_items', $filename);
        }

        // tag
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->labels, $match);
        $labels=[];
        foreach($match[1] as $label)
        {
            $records = Label::firstOrCreate(['name' => $label]);
            // $recordsを$tagsの配列に追加
            array_push($labels, $records);
        }

        $labels_id = [];
        foreach($labels as $label)
        {
            array_push($labels_id, $label['id']);
        }

        $new_item->fill($form)->save();

        $new_item->labels()->attach($labels_id);

        return redirect('new_items/list_of_item/{user_id}/new_items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new_item = NewItem::find($id);
        return view('new_items.show_item', compact('new_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new_item = NewItem::find($id);
        return view('new_items.edit_item', compact('new_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_item = NewItem::find($id);

        $new_item->title = $request->input('title');
        $new_item->color = $request->input('color');
        $new_item->brand = $request->input('brand');
        $new_item->price = $request->input('price');
        $new_item->start = $request->input('start');

        $form = $request->all();
        if (isset($form['image'])) {
            $file = $request->file('image');
            //  getClientOrientalExtension()でファイルの拡張子を取得する
            $extension = $file->getClientOriginalExtension();
            $file_token = Str::random(32);
            $filename = $file_token . '.' . $extension;
            // 表示を行うときに画像名が必要になるため、ファイル名を再設定
            $form['image'] = $filename;
            $file->move('upload/new_items', $filename);
        }
        $new_item->fill($form)->save();

        return redirect('new_items/list_of_item/{user_id}/new_items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new_item = NewItem::find($id);
        $new_item->delete();

        return redirect('new_items/list_of_item/{user_id}/new_items');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\StockCosmetic;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StockCosmeticController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // formの値を取得するため、引数にRequest $requestを指定
    public function index(Request $request, $id)
    {
        $search = $request->input('search');

        $user_id = Auth::id();
        $stocks = StockCosmetic::where('user_id', $user_id);

        if($search !== null) {
            // 全角スペースを半角にする
            $search_split = mb_convert_kana($search, 's');
            // 空白で区切る(-1は文字数の制限なし、PREG_SPLIT_NO_EMPTYは空文字のみ返されるの意)
            $search_split2 = preg_split('/[\s,]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);

            foreach($search_split2 as $value)
            {
                $stocks
                    ->where('product', 'like', '%'.$value.'%')
                    ->orWhere('brand', 'like', '%'.$value.'%')
                    ->orWhereHas('tags', function ($query) use ($value){
                        $query->where('name', 'like', '%' . $value . '%');
                    });

            }
        }

        $stocks->select('image', 'id', 'product', 'brand', 'created_at')->orderBy('created_at', 'desc');
        $stock_cosmetics = $stocks->paginate(15);

        return view('stock_cosmetics.list_of_stock', ['user_id' => $user_id, 'stock_cosmetics' => $stock_cosmetics]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock_cosmetics.post_stock');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Stock $request)
    {

        $stock_cosmetic = new StockCosmetic();

        $stock_cosmetic->product = $request->input('product');
        $stock_cosmetic->user_id = Auth::id();
        $stock_cosmetic->color = $request->input('color');
        $stock_cosmetic->brand = $request->input('brand');
        $stock_cosmetic->price = $request->input('price');
        $stock_cosmetic->purchaseDate = $request->input('purchaseDate');

        $stock_cosmetic->save();

        // image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->image->storePubliclyAs('/stock', $stock_cosmetic->id . '.jpg', ['disk' => 's3']);
            $stock_cosmetic->image = $path;
            $stock_cosmetic->save();
        }

        // tag
        // #で始まる単語を取得し、$matchに多次元配列で格納される
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tags, $match);
        $tags=[];
        foreach($match[1] as $tag)
        {
            $records = Tag::firstOrCreate(['name' => $tag]);
            // $recordsを$tagsの配列に追加
            array_push($tags, $records);
        }

        $tags_id = [];
        foreach($tags as $tag)
        {
            array_push($tags_id, $tag['id']);
        }

        $stock_cosmetic->tags()->attach($tags_id);

        return redirect('stock_cosmetics/list_of_stock/{user_id}/stock_cosmetics')->with('flash_message', '登録しました');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock_cosmetic = StockCosmetic::find($id);
        return view('stock_cosmetics.show_stock', compact('stock_cosmetic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock_cosmetic = StockCosmetic::find($id);
        return view('stock_cosmetics.edit_stock', compact('stock_cosmetic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Stock $request, $id)
    {
        $stock_cosmetic = StockCosmetic::find($id);

        $stock_cosmetic->product = $request->input('product');
        $stock_cosmetic->color = $request->input('color');
        $stock_cosmetic->brand = $request->input('brand');
        $stock_cosmetic->price = $request->input('price');
        $stock_cosmetic->save();
        // image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->image->storePubliclyAs('/stock', $stock_cosmetic->id . '.jpg', ['disk' => 's3']);
            $stock_cosmetic->image = $path;
            $stock_cosmetic->save();
        }

        return redirect('stock_cosmetics/list_of_stock/{user_id}/stock_cosmetics');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock_cosmetic = StockCosmetic::find($id);
        $stock_cosmetic->delete();

        return redirect('stock_cosmetics/list_of_stock/{user_id}/stock_cosmetics');
    }
}

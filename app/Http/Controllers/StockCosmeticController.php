<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\StockCosmetic;
use Illuminate\Http\Request;
use App\Http\Requests\Stock;

class StockCosmeticController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // formの値を取得するため、引数にRequest $requestを指定
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = DB::table('stock_cosmetics');
        if($search !== null) {
            // 全角スペースを半角にする
            $search_split = mb_convert_kana($search, 's');
            // 空白で区切る(-1は文字数の制限なし、PREG_SPLIT_NO_EMPTYは空文字のみ返されるの意)
            $search_split2 = preg_split('/[\s,]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);

            foreach($search_split2 as $value)
            {
                $query
                    ->where('product', 'like', '%'.$value.'%')
                    ->orWhere('brand', 'like', '%'.$value.'%');
            }
        }

        $query->select('image', 'id', 'product', 'brand');
        $stock_cosmetics = $query->paginate(24);

        return view('stock_cosmetics.list_of_stock', compact('stock_cosmetics'));

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
        $stock_cosmetic->color = $request->input('color');
        $stock_cosmetic->brand = $request->input('brand');
        $stock_cosmetic->price = $request->input('price');
        $stock_cosmetic->purchaseDate = $request->input('purchaseDate');
        $stock_cosmetic->main_category = $request->input('main_category');
        $stock_cosmetic->category = $request->input('category');


        $form = $request->all();
        if (isset($form['image'])) {
            $file = $request->file('image');
            //  getClientOrientalExtension()でファイルの拡張子を取得する
            $extension = $file->getClientOriginalExtension();
            $file_token = Str::random(32);
            $filename = $file_token . '.' . $extension;
            // 表示を行うときに画像名が必要になるため、ファイル名を再設定
            $form['image'] = $filename;
            $file->move('upload/stock_cosmetics', $filename);
        }
        $stock_cosmetic->fill($form)->save();

        return redirect('stock_cosmetics/list_of_stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
    public function update(Request $request, $id)
    {
        //
        $stock_cosmetic = StockCosmetic::find($id);

        $stock_cosmetic->product = $request->input('product');
        $stock_cosmetic->color = $request->input('color');
        $stock_cosmetic->brand = $request->input('brand');
        $stock_cosmetic->price = $request->input('price');
        $stock_cosmetic->purchaseDate = $request->input('purchaseDate');

        $form = $request->all();
        if (isset($form['image'])) {
            $file = $request->file('image');
            //  getClientOrientalExtension()でファイルの拡張子を取得する
            $extension = $file->getClientOriginalExtension();
            $file_token = Str::random(32);
            $filename = $file_token . '.' . $extension;
            // 表示を行うときに画像名が必要になるため、ファイル名を再設定
            $form['image'] = $filename;
            $file->move('upload/stock_cosmetics', $filename);
        }
        $stock_cosmetic->fill($form)->save();

        return redirect('stock_cosmetics/list_of_stock');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $stock_cosmetic = StockCosmetic::find($id);
        $stock_cosmetic->delete();

        return redirect('stock_cosmetics/list_of_stock');
    }
}

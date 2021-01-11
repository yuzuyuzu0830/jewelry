<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockCosmetic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_cosmetics = DB::table('stock_cosmetics')->select('image', 'id', 'product', 'brand')->get();
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
    public function store(Request $request)
    {
        $stock_cosmetic = new StockCosmetic();

        $stock_cosmetic->product = $request->input('product');
        $stock_cosmetic->color = $request->input('color');
        $stock_cosmetic->brand = $request->input('brand');
        $stock_cosmetic->price = $request->input('price');
        $stock_cosmetic->purchaseDate = $request->input('purchaseDate');
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
            $request->image->storeAs('uploadImage', $filename);
        }
        $stock_cosmetic->fill($form)->save();

        return view('stock_cosmetics.list_of_stock');
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
        return view('stock_cosmetics.detail_stock', compact('stock_cosmetic'));

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
    }
}

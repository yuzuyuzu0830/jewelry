<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DoneItem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // fullcalendar
    public function postItem(Request $request)
    {
        $done_item = new DoneItem();
        $done_item->start = $request->input('start');
        $done_item->items = $request->input('items');
        $done_item->other = $request->input('other');


        $done_item->save();
        return $done_item;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoneTask;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Done;
use Illuminate\Support\Facades\Auth;

class DoneTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $data = DoneTask::where('user_id', $user_id);


        if ($request->ajax()) {

            $data->select('title', 'start', 'textColor')->get();

            return response()->json($data);

        }

        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Done $request)
    {
        $task = new DoneTask;
        $task->title = $request->input('title');
        $task->user_id = Auth::id();
        $task->start = $request->input('start');
        $task->textColor = $request->input('textColor');
        $task->save();
        return redirect('/home');
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

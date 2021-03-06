<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoneTask;
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

        if ($request->ajax())
        {
            $data = DoneTask::select('id','title', 'start', 'textColor')->where('user_id', $user_id)->get();
            return response()->json($data);

        }

        return view('home');
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
        $task->user_id = Auth::id();
        $task->start = $request->input('start');
        $task->textColor = $request->input('textColor');
        $title = $request->input('title');
        $task->title = implode(',', $title);

        $task->save();

        return redirect('/home');
    }

    public function editEventDate(Done $request)
    {
        $task = DoneTask::find($request->input('id'));
        $task->start = $request->input('start');
        $task->textColor = $request->input('textColor');
        $title = $request->input('title');
        $task->title = implode(',', $title);

        $task->save();

        return redirect('/home');
    }

    public function deleteTask(Request $request) {
        $task = DoneTask::findOrFail($request->input('id'));
        $task->delete();

        return redirect('/home');
    }

}

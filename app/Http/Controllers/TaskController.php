<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Signin;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks="";
        $tasks=Task::all();
        $users=Signin::all();
        return Inertia::render('Task/Index',['tasks'=> $tasks,'users'=>$users,]);
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
    public function store(Request $request)
    {
        // $tasks=Task::create($request->all());
        // return Inertia::render('Task/Index',['tasks'=> $tasks,]);
        // $tasks="";
        // $tasks=Task::create([
        //     'name'=>$request->name
        // ]);
        // return Inertia::render('Task/Index',['tasks'=> $tasks,]);
        Task::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task::find($request->input('id'))->update($request->all());
        return redirect()->back();
    }
    public function isdone(Request $request, $id)
    {
        // $task::find($request->input('id'))->update('1');
    //    $id= $request->input('id')
        Task::find($id)->update(['isdone' => '1']);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}

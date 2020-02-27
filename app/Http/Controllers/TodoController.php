<?php

namespace App\Http\Controllers;

use  App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Gate;
use File;


class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['showTable', 'addTask', 'storeTask', 'editTask', 'deleteTask', 'updateTask']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTable(){

        $tasks = Todo::all();

        return view ('todo.pages.table', compact('tasks'));

    }

    public function addTask(){

        return view ('todo.pages.addTask');

    }

    public function storeTask(Request $request)
    {
        $validateData = $request->validate([
            'subject' => 'required',
            'priority' => 'required',
            'due_date' => 'required',
            'status' => 'required',
            'progress' => 'required'
        ]);


        $task = Todo::create([
            'subject' => request('subject'),
            'priority' => request('priority'),
            'due_date' => request('due_date'),
            'status' => request('status'),
            'progress' => request('progress'),
            'userID' => Auth::id()
        ]);



        return redirect('/table');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function editTask(Todo $todo)
    {
        Todo::where('id', $todo->id)
            ->update(['subject' => request('subject'),
                'priority' => request('priority'),
                'due_date' => request('due_date'),
                'status' => request('status'),
                'progress' => request('progress')]);

        return redirect('table');
    }

    public function deleteTask(Todo $todo)
    {

        if(Gate::allows('deleteTask', $todo)) {

            $todo->delete();
            return redirect('table', compact('todo'));
        }
     return view ('todo.pages.wrongUser');

    }

    public function wrongUser()
    {

        return view('todo.pages.wrongUser');
    }

    public function updateTask(Todo $todo)
    {

        if(Gate::allows('updateTask', $todo)) {


            return view('todo.pages.updateTask', compact('todo'));

        }
        return view ('todo.pages.wrongUser');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}

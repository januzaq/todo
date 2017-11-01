<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$tasks = $request->user()->tasks()->get();
    	return view('task.list', ['tasks' => $tasks]);
    }
    public function create()
    {
    	return view('task.create');
    }
    public function store(Request $request)
    {
    	$task = new Task;
    	$task->user_id = $request->user()->id;
    	$task->text = $request->text;
    	if($task->save())
    	{
    		return redirect()->route('tasks')->with('Success', 'Задача сохранены!');
    	}
    	return redirect()->back()->with('error', 'Ошибка!');
    }

    public function edit($id)
    {
    	$task = Task::find($id);
    	return view('task.edit', ['task' => $task]);
    }
    public function update(Request $request,$id)
    {
    	$task = Task::find($id);
    	$task->user_id = $request->user()->id;
    	$task->text = $request->text;
    	if($task->save())
    	{
    		return redirect()->route('tasks')->with('Success', 'Задача сохранены!');
    	}
    	return redirect()->back()->with('error', 'Ошибка!');
    }
    public function delete($id)
    {
    	$task = Task::find($id);
    	$task->delete();
    	return redirect()->route('tasks');
    }
}

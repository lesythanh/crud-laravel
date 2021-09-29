<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        
        return view('tasks', compact('tasks'));
    }
    
    public function store(Request $request )
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect('listtask');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        
        return redirect('listtask');
    }

    public function edit($task)
    {
        $task = Task::find($task);

        return view('update', compact('task'));
    }

    public function update(Request $request, $task)
    {
        $task = Task::find($task);
        $task->name = $request->name;
        $task->save();

        return redirect('listtask');
    }

    public function changeLanguage($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }
}

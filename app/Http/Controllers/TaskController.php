<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function index()
    {
        $tasks = $this->task->paginate(1);
        return view('task.index', compact('tasks'));
    }

    public function getFormAdd()
    {
        return view('task.formAdd');
    }

    public function add(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->content = $request->inputContent;
        $task->due_date = $request->due_date;

        if (!$request->hasFile('image')) {
            $task->image = $request->image;
        }else{
        $image= $request->file('image');
         $path = $image->store('images','public');
         $task->image= $path;
        }
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function delete($id)
    {
        $task = $this->task->findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function getFormEdit($id)
    {
        $task = $this->task->findOrFail($id);
        return view('task.formEdit', compact('task'));
    }

    public function edit(Request $request, $id)
    {
        $task = $this->task->findOrFail($id);
        $task->title = $request->title;
        $task->content = $request->inputContent;
        $task->due_date = $request->due_date;
        if ($request->image){
            File::delete($task->image);
            $image= $request->file('image');
            $path = $image->store('images','public');
            $task->image= $path;
        }

        $task->save();

        return redirect()->route('tasks.index');
    }

    public function search(Request $request){
        $search = $request->get('inputSearch');
        $tasks= DB::table('tasks')->where("title","Like","%$search%")->paginate(2);
        return view('task.index',compact('tasks'));
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function get(Request $request)
    {
        $tasks = Task::orderBy('completed')->orderBy('id', 'desc')->get();

        if($request->get('table') == 'true')
        {
            return view('tables/tasks_table', ['tasks' => $tasks]);
        }

        return view('tasks', ['tasks' => $tasks]);
    }

    public function add(Request $request)
    {
        // validating input
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:1', 'max:255']
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Check input fields!']);
        }

        // inserting task to DB
        $task = new Task();
        $task->name = trim($request->input('name'));

        if(!$task->save())
        {
            return response()->json(['success' => false, 'message' => 'Error while adding task!']);
        }

        return response()->json(['success' => true, 'id' => $task->id]);
    }

    public function toggle(int $id)
    {
        $task = Task::find($id);
        $task->completed = !$task->completed;

        return response()->json(['success' => $task->save()]);
    }

    public function delete(int $id)
    {
        $task = Task::find($id);

        return response()->json(['success' => $task->delete()]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskUser;
use App\Models\User;
use Inertia\Inertia;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskDetail extends Controller
{
    public function index(Request $request)
    {
        $teacher = Auth::user();
        // simple rights management
        assert($teacher->is_teacher);

        $request->validate([
            'task_id' => ['required', 'integer'],
        ]);

        $task = Task::find($request->input('task_id'));

        $students = array();
        foreach(TaskUser::where("task_id", $task->id)
                ->join('users', 'user_id', '=', 'users.id')
                ->select('task_user.*', 'users.*')
                ->get() as $student_task) {
            array_push($students, ['id' => $student_task->user_id, 
                    'name' => $student_task->name, 
                    'done' => ($student_task->finished_date != NULL)]);
        }
        // $students = TaskUser::where("task_id", $task->id)
        //         ->join('users', 'user_id', '=', 'users.id')
        //         ->select('user_id', 'users.name')
        //         ->get();

        return Inertia::render('TaskDetails', ["task_id" => $task->id, 
                "task_name" => $task->name, 
                "students" => $students]);
    }

    public function store(Request $request)
    {
        $teacher = Auth::user();
        // simple rights management
        assert($teacher->is_teacher);

        $request->validate([
            'task_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'done' => ['required', 'boolean'],
        ]);

        $done = $request->input('done');
        $task_user = TaskUser::where("task_id", $request->input('task_id'))
                ->where("user_id", $request->input("user_id"))
                ->first();
        if($done) {
            # set it to undone again
            $task_user->finished_date = NULL;
        }
        else {
            # set it to done
            $task_user->finished_date = time();
        }
        $task_user->update();

        return back();
    }
}

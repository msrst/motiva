<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskUser;
use App\Models\User;
use Inertia\Inertia;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $teacher = Auth::user();
        // simple rights management
        assert($teacher->is_teacher);

        $tasks_array = array();
        foreach(User::find($teacher->id)->teacher_tasks as $task) {
            $done = TaskUser::where("task_id", $task->id)
                    ->where("finished_date", "!=", NULL)
                    ->count();
            array_push($tasks_array, ["id" => $task->id,
                    "name" => $task->name, 
                    "students_done" => $done]);
        }
        return Inertia::render('Tasks', [
            // return some more properties than only the tasks (just for test usage)
            //'test' => User::where('id', $teacher->id)->first(),
            //'test2' => User::find($teacher->id),
            'teacher_tasks' => $tasks_array,
            //'student_tasks' => User::find(Auth::id())->student_tasks,
            //'student_items' => User::find(Auth::id())->student_items,
            'students_count' => User::where('teacher_id', $teacher->id)->count(),
        ]);
    }

    public function store(Request $request)
    {
        $teacher = Auth::user();
        // simple rights management
        assert($teacher->is_teacher);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'days' => ['required', 'integer', 'max:365'],
        ]);

        $now = time();
        $due_date = time() + strtotime(sprintf("+%d days", $request->input('days')));
        $task = new Task;
        $task->user = $teacher->id;
        $task->name = $request->input('name');
        $task->assignment_date = $now;
        $task->due_date = $due_date;
        $task->save();

        foreach(User::where('teacher_id', $teacher->id)->get() as $student) {
            TaskUser::factory(1)->create(['user_id' => $student->id,
                    'task_id' => $task->id,
                    'assignment_date' => strtotime('27.09.2020'),
                    'finished_date' => NULL]);
        }

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Tasks', [
            // return some more properties than only the tasks (just for test usage)
            'test' => User::where('id', 1)->first(),
            'test2' => User::find(1),
            'teacher_tasks' => User::find(1)->teacher_tasks,
            'student_tasks' => User::find(1)->student_tasks,
            'student_items' => User::find(1)->student_items,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(Request $request) {
    	$task = new Task();

    	$validated = $request->validate([
    		'title' => 'required|string|min:3|max:24',
    		'description' => 'string|min:5|max:1000',
    		'status' => 'required|string|min:3|max:24'
    	]);

    	$task->title = $validated['title'];
    	$task->description = $validated['description'];
    	$task->status = $validated['status'];
    	$task->save();

    	$tasks = Task::all();

    	return response()->json($tasks);
    }

    public function readAll() {
    	$task = Task::all();
        return response()->json($task);
    }

    public function read($id) {
    	$task = Task::find($id);

    	return response()->json($task);
    }

    public function edit(Request $request, $id) {
    	$task = Task::find($id);
    	$tasks = Task::all();

    	$validated = $request->validate([
    		'title' => 'required|string|min:3|max:24',
    		'description' => 'string|min:5|max:1000',
    		'status' => 'required|string|min:3|max:24'
    	]);

    	$task->title = $validated['title'];
    	$task->description = $validated['description'];
    	$task->status = $validated['status'];
    	$task->save();

    	return response()->json($tasks);
    }

    public function delete($id) {
    	$task = Task::find($id);

    	$task->delete();
    	$tasks = Task::all();

    	return response()->json($tasks);
    }
}

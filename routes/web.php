<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// home
Route::get("/", function () {
    return redirect()->route("tasks.index");
});
//index route  (list of tasks)
Route::get('/tasks', function () {
    return view("index", [
        "tasks" => Task::latest()->paginate(5)
    ]);
})->name("tasks.index");


// create route
Route::view("/tasks/create", "create")->name("tasks.create");


// show route (display details of task)
Route::get("/tasks/{task}", function (Task $task) {
    return view("show", [
        "task" => $task
    ]);
})->name("tasks.show");


// edit task route
Route::get("/tasks/{task}/edit", function (Task $task) {
    return view("edit", [
        "task" => $task
    ]);
})->name("tasks.edit");

// add task route
Route::post("/tasks", function (TaskRequest $request) {
    Task::create($request->validated());

    return redirect()->route("tasks.index")->with("sucess", "Task has been added sucessfully");
})->name("tasks.store");

// toggle complete route
Route::post("/tasks{task}/toggle-complete", function (Task $task) {
    $task->toggleComplete();
    return redirect()->route("tasks.show", ["task" => $task->id])->with("sucess", "Task updated sucessfully");
})->name("tasks.toggle-complete");

// checkbox toggle
Route::patch("/tasks/{task}/toggle-checkbox", function (Task $task) {
    $task->toggleComplete();
    return redirect()->route("tasks.index")->with("sucess", 'Tasks updated  sucessfully');
})->name("tasks.toggle-checkbox");


// update route
Route::put("/tasks/{task}", function (Task $task, TaskRequest $request) {;
    $task->update($request->validated());
    return redirect()->route("tasks.show", ["task" => $task])->with("sucess", "Task has been updated sucessfully");
})->name("tasks.update");

// delete route
Route::delete("/tasks/{task}", function (Task $task) {
    $task->delete();
    return redirect()->route("tasks.index")->with("sucess", "Task deleted sucessfully!");
})->name("tasks.destroy");



















// Route::get("/home", function () {
//     return redirect(route("landing-page"));
// });

// Route::get("/client/{name}", function ($clientName) {
//     return "Welcome $clientName good to have you back!";
// });

// Route::fallback(function () {
//     return "i doubt we have that page available";
// });

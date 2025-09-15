<?php

use Illuminate\Http\Response;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Monolog\Registry;

 // Routes
Route::get("/", function () {
    return redirect()->route("tasks.index");
});
Route::get('/tasks', function ()  {
    return view("index",[
        "tasks"=> Task::latest()->get()
    ]);
})->name("tasks.index");
Route::view("/tasks/create", "create")->name("tasks.create");

Route::get("/tasks/{task_id}", function ($id) {
    $task = Task::findOrFail($id);
    return view("show", [
        "task" => $task
    ]);
})->name("tasks.show");

Route::get("/tasks/{task_id}/edit", function ($id) {
    $task = Task::findOrFail($id);
    return view("edit", [
        "task" => $task
    ]);
})->name("tasks.edit");

Route::post("/tasks", function (Request $request) {
    $formData = $request->validate([
        "title" => "required|max:255",
        "description" => "required",
        "long_description" => "required",
    ]);
    $task = new Task;
    $task->title = $formData["title"];
    $task->description = $formData["description"];
    $task->long_description = $formData["long_description"];
    $task->save();
    return redirect()->route("tasks.index")->with("sucess","Task has been added sucessfully");
})->name("tasks.store");

Route::post("/tasks/{id}", function ($id,Request $request) {
    $formData = $request->validate([
        "title" => "required|max:255",
        "description" => "required",
        "long_description" => "required",
    ]);
    $task = Task::findOrFail($id);
    $task->title = $formData["title"];
    $task->description = $formData["description"];
    $task->long_description = $formData["long_description"];
    $task->save();
    return redirect()->route("tasks.index")->with("sucess", "Task has been updated sucessfully");
})->name("tasks.update");
// Route::get("/home", function () {
//     return redirect(route("landing-page"));
// });

// Route::get("/client/{name}", function ($clientName) {
//     return "Welcome $clientName good to have you back!";
// });

// Route::fallback(function () {
//     return "i doubt we have that page available";
// });

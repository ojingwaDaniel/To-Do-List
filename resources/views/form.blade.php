@extends("layouts.app")
@section("header",isset($task) ? "Edit Task" : "Add a New Task")

@section("content")
<form method="POST" action="{{ isset($task) ? route("tasks.update",["task"=>$task->id]) : route("tasks.store") }}">
    @csrf
    @isset($task)
    @method("PUT")

    @endisset
    <div class="mb-4 mt-4">
        <label for="title">Title</label>
        <input class="@error("title") border-red-500 @enderror" type="text" name="title" id ="title" value=" {{ $task->title  ?? old("title") }}">
        @error("title")
          <p class="error">{{ $message }}</p>

        @enderror
    </div>

    <div class="mb-4">
        <label for="description">Description</label>
        <textarea class="@error("description") border-red-500 @enderror"  name="description" id="description" rows="5">{{ $task->description ?? old("description") }}</textarea>
        @error("description")
          <p class="error">{{ $message }}</p>

        @enderror
    </div>

    <div class="mb-4">
        <label for="long_description">Long Description</label>
        <textarea class="@error("long_description") border-red-500 @enderror"  name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old("long_description") }}</textarea>
         @error("long_description")
          <p class="error">{{ $message }}</p>

        @enderror
    </div>
    <div class="flex gap-2 items-center">
        <button class="btn" type="submit">{{ isset($task) ? "Edit Task": "Add Task "}}</button>
        <a class="font-medium text-grey-700 underline decoration-red-500" href="{{ route("tasks.index") }}">Cancel</a>
    </div>

</form>

@endsection


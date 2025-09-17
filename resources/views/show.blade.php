@extends("layouts.app")

@section("header")
<nav class="mb-4 mt-4">
<a class="font-medium text-grey-700 underline decoration-red-500" href="{{route("tasks.index")}}"> ⬅ Go Back to Task List</a>

</nav>
  <h1 class="mb-4 font-medium">{{ $task->title}}</h1>
@endsection
@section("content")


<p>{{ $task->description }} </p>
@if ($task->long_description)
     <p>{{$task->long_description}}</p>
@endif
<div>

</div>
<p class="mt-4 text-slate-500 text-sm"> Created : {{$task->created_at->diffForHumans()}} ◼ Updated : {{$task->updated_at->diffForHumans()}}</p>
<div class="mb-4 mt-3">
    @if ($task->completed)
  <p class="font-medium text-green-500">Completed Task</p>

@else
<p class="font-medium text-red-500" >Not Completed </p>

@endif

</div>

<div  class="flex gap-2">
    <a class="btn" href="{{ route("tasks.edit",["task"=> $task->id]) }}">Edit Task</a>

        <form action="{{ route("tasks.toggle-complete",["task"=>$task->id]) }}" method="POST">
            @csrf
            <button class="btn" type="submit">
            {{ $task->completed ? "Mark not completed" : "Mark Completed" }}
        </button>
        </form>



<form action="{{ route("tasks.destroy",["task"=>$task->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task')">
    @csrf
    @method("DELETE")
    <button type="submit" class="btn">Delete Task</button>

</form>

</div>


@endsection


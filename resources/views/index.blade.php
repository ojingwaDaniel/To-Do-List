@extends("layouts.app")
@section("header")
<h3 class="mb-4"> Good Day good to see you</h3>
@endsection

@section("content")
{{-- method 1 --}}
<nav class="mb-4">
<a class="font-medium text-grey-700 underline decoration-red-500" href="{{ route("tasks.create") }}">Add a New Task</a>

</nav>
@if (count($tasks))

<h2 class="mb-4">Lists of Tasks Available</h2>

@endif

 @forelse ($tasks as $task)
 <form action="{{ route("tasks.toggle-checkbox",["task"=>$task->id]) }}" method="POST">
    @csrf
    @method("PATCH")
    <a href= {{ route("tasks.show",["task"=> $task->id]) }} class="flex items-center gap-2">
        <input type="checkbox" onchange="this.form.submit()" @checked($task->completed)>
        <span>{{ $task->title }}</span>
         </a>

 </form>


 @empty
   <p>No Tasks Available at the moment add a Task!</p>

 @endforelse

 @if ($tasks->count())
   <p class="mt-4">{{$tasks->links("vendor.pagination.tailwind")}}</p>
 @endif
@endsection






  {{-- method 1 --}}
  {{-- @if (count($tasks))
   <h2>
      List of tasks available today
</h2>
   @foreach ($tasks as $task )
     <p>{{$task->title}}</p>

   @endforeach

 @else
    <p>There no task at the moment you can always add one</p>

 @endif --}}

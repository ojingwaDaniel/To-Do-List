@extends("layouts.app")
@section("header")
<h3> Good Day good to see you</h3>
@endsection


@section("content")
{{-- method 1 --}}
@if (count($tasks))

<h2>Lists of Tasks available today</h2>

@endif

 @forelse ($tasks as $task)
     <a href= {{ route("tasks.show",["task_id"=> $task->id]) }}>
        <p>{{$task->title}}</p>
     </a>

 @empty
   <p>No Tasks Available at the moment add a Task!</p>

 @endforelse

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

<!DOCTYPE html>
<html>
    <title>Laravel To-Do-List App </title>
    @yield("style")
    <body>
         <h1>To Do List</h1>
         @if (session()->has("sucess"))
            <div>{{ session('sucess') }}</div>

         @endif
         <header>@yield("header")</header>
         <div>
            @yield("content")
         </div>

    </body>


</html>

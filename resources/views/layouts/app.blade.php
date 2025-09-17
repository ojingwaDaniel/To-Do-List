<!DOCTYPE html>
<html>
    <title>Laravel To-Do-List App </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply ring-1 ring-slate-500 rounded-md py-1 px-2 text-slate-700 text-center font-medium shadow-md hover:bg-slate-900 hover:text-slate-300
        }
        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input[type="text"],textarea{
            @apply w-full shadow-sm border appearance-none leading-tight py-2 px-3 text-slate-700 focus:outline-none
        }
        input[type="checkbox"] {
    @apply h-4 w-4 text-slate-700 border-gray-300 rounded focus:ring-slate-500;
}
        .error{
            @apply text-sm text-red-500
        }

    </style>
     {{-- blade-formatter-enable --}}

    @yield("style")
    <body class="container mx-auto mt-10 mb-10 max-w-lg">
         <h1 class="text-3xl mb-4">To Do List</h1>
         @if (session()->has("sucess"))
            <div>{{ session('sucess') }}</div>

         @endif
         <header>@yield("header")</header>
         <div>
            @yield("content")
         </div>

    </body>


</html>

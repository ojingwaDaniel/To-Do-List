<!DOCTYPE html>
<html>
    <title>Laravel To-Do-List App </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply ring-1 ring-slate-500 rounded-md py-1 px-2 text-slate-700 text-center font-medium shadow-md hover:bg-slate-900 hover:text-slate-300
        }
        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input[type="text"],textarea{
            @apply w-full shadow-sm border appearance-none leading-tight py-2 px-3 text-slate-700
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
            <div x-data={flash:true}>
             <div x-show= "flash" class="relative mb-10 bg-green-100 px-4 py-3 border border-green-400 text-lg text-green-700">
            <strong>Sucess!</strong>
             <div>
                 {{ session("sucess") }}
            </div>
            <span @click="flase" class="absolute top-0 bottom-0 right-0 px-3 py-4">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" @click="flash = false"
            stroke="currentColor" class="h-6 w-6 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
            </span>
        </div>

         </div>

         @endif


         <header>@yield("header")</header>
         <div>
            @yield("content")
         </div>

    </body>


</html>

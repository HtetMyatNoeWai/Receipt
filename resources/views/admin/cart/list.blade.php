<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400;1,700;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Myanmar:wght@100;200;300;400&family=Padauk:wght@400;700&family=Poppins:ital,wght@0,400;0,600;1,400;1,700;1,900&display=swap" rel="stylesheet">


</head>
<body class="h-screen">
    <nav class="flex flex-row sm:justify-between justify-center bg-white h-auto sticky top-0 ">

            <img src="{{ asset('admin/images/OIP (2).jpg') }}" class="w-24 h-20 sm:ml-16 mb-1 ml-44">

        <div class=" ">
            <ul class="sm:grid gap-2 grid-cols-6 mt-6 mr-6  hidden">
                <li class="mt-2.5">
                    <a href="{{route('cart#create')}}" class="text-md text-blue-900">
                        @yield('receipt')
                    </a>
                </li>
                <li class="mt-2.5">
                    <a href="{{ route('auth#category') }}" class="text-md  text-blue-900 ">
                        @yield('something')
                    </a>
                </li>
                <li class="ml-3.5 mt-2.5">
                    <a href="{{ route('detail#create') }}" class="text-md  text-blue-900">
                        @yield('nothing')
                    </a>
                </li>
                <li class="mt-2.5">
                    <a href="{{ route('title#create') }}" class="text-md  text-blue-900">
                        @yield('anything')
                    </a>
                </li>
                <li class="mt-2.5">
                    <a href="{{ route('Donor#create') }}" class="text-md  text-blue-900">
                        @yield('everything')
                    </a>
                </li>
                <li class="mt-1.5">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="border-2 border-indigo-100 bg-yellow-200 text-blue-900 text-md text-center py-1 px-1 mb-1 rounded-md  shadow-sm">Logout</button>
                    </form>
                </li>
            </ul>
    </div>

    {{-- Menu Icon --}}

    <button id="first" class="sm:hidden block mt-6 ml-44">
        <i class="fa-solid fa-bars text-2xl"></i>
    </button>

     <!-- Overlay element -->
     <div id="load" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

     <!-- The dialog -->
     <div id="information"
         class="hidden fixed z-50  w-auto bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
         <button id="shutting" class="ml-96 my-1 text-red-500 background-transparent font-bold uppercase  text-2xl  ease-linear transition-all duration-150">
             <i class="fa-solid fa-rectangle-xmark"></i>
         </button>
             <ul class="">
                <li>
                    <a href="{{route('cart#create')}}" class="text-lg text-blue-900 ml-40 my-2">
                        @yield('receipt')
                    </a>
                </li>
                <div class="border-b-2 border-gray-300 w-96 my-4">

                </div>
                 <li>
                     <a href="{{ route('auth#category') }}" class="text-lg text-blue-900 ml-40 my-2">
                         @yield('something')
                     </a>
                 </li>
                 <div class="border-b-2 border-gray-300 w-96 my-4">

                 </div>
                 <li>
                    <a href="{{ route('detail#create') }}" class="text-lg text-blue-900 ml-40 my-2">
                        @yield('nothing')
                    </a>
                </li>
                <div class="border-b-2 border-gray-300 w-96 my-4">

                </div>
                 <li>
                     <a href="{{ route('title#create') }}" class="text-lg text-blue-900 ml-40 my-2">@yield('anything')</a>
                 </li>
                 <div class="border-b-2 border-gray-300 w-96 my-4">

                 </div>
                 <li >
                    <a href="{{ route('Donor#create') }}" class="text-lg text-blue-900 ml-40 my-2">
                        @yield('everything')
                    </a>
                </li>
                <div class="border-b-2 border-gray-300 w-96 my-4">

                </div>
                 <li>
                     <form action="{{ route('logout') }}" method="post" class="ml-40 my-2">
                         @csrf
                         <button type="submit" class="border-1 border-red-500 bg-red-400 text-lg text-center py-1 px-1 mb-1 rounded-2 shadow-sm">Logout</button>
                     </form>
                 </li>
             </ul>



     <!-- Javascript code -->
     <script>
         var firstButton = document.getElementById('first');
         var information = document.getElementById('information');
         var shuttingButton = document.getElementById('shutting');
         var load = document.getElementById('load');

         // show the overlay and the dialog
         firstButton.addEventListener('click', function () {
             information.classList.remove('hidden');
             load.classList.remove('hidden');
         });

         // hide the overlay and the dialog
         shuttingButton.addEventListener('click', function () {
             information.classList.add('hidden');
             load.classList.add('hidden');
         });
     </script>


    {{-- End Menu Icon --}}

</nav>

    @yield('content')
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>


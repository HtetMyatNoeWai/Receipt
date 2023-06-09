<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

            <img src="{{ asset('admin/images/R.jpg') }}" class="w-16 h-16 sm:ml-16 mb-1 ml-44">

        <div class=" ">
            <ul class="sm:grid gap-3 grid-cols-7 mt-6 mr-6  hidden">
                <li>
                    <a href="{{ route('receipt#create') }}" class="text-md text-blue-900">
                        @yield('receipt')
                    </a>
                </li>
                <li>
                    <a href="{{ route('auth#category') }}" class="text-md text-blue-900">
                        @yield('something')
                    </a>
                </li>
                <li class="ml-3">
                    <a href="{{ route('title#create') }}" class="text-md  text-blue-900">
                        @yield('anything')
                    </a>
                </li>
                <li >
                    <a href="{{ route('detail#create') }}" class="text-md text-blue-900">
                        @yield('nothing')
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('Donor#create') }}" class="text-md  text-blue-900">
                        @yield('everything')
                    </a>
                </li>
              
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="border-2 border-indigo-100 bg-yellow-200 text-blue-900 text-md text-center py-1 px-1 mb-1 rounded-md  shadow-sm">Logout</button>
                    </form>
                </li>
            </ul>
    </div>



{{-- Menu Icon --}}


                <button id="start" class="sm:hidden block mt-6 ml-44">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>

                <!-- Overlay element -->
                <div id="overload" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

                <!-- The dialog -->
                <div id="detail"
                    class="hidden absolute z-50 top-1/2  -translate-x-1/2 -translate-y-1/2 w-auto bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                    <button id="shut" class="ml-96 my-1 text-red-500 background-transparent font-bold uppercase  text-2xl  ease-linear transition-all duration-150">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                    </button>
                        <ul class="">
                            <li>
                                <a href="{{ route('receipt#create') }}" class="text-lg text-blue-900 ml-40 my-2">
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
                                <a href="{{ route('title#create') }}" class="text-lg text-blue-900 ml-40 my-2">@yield('anything')</a>
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
                            <li >
                                <a href="{{ route('Donor#create') }}" class="text-lg text-blue-900 ml-40 my-2">
                                    @yield('everything')
                                </a>
                            </li>
                            <div class="border-b-2 border-gray-300 w-96 my-4"></div>
                            <li>
                                <form action="{{ route('logout') }}" method="post" class="ml-40 my-1">
                                    @csrf
                                    <button type="submit" class="border-2 border-indigo-100 bg-yellow-200 text-blue-900 text-md text-center py-1 px-1 mb-1 rounded-md  shadow-sm">Logout</button>
                                </form>
                            </li>
                        </ul>



                <!-- Javascript code -->
                <script>
                    var startButton = document.getElementById('start');
                    var detail = document.getElementById('detail');
                    var shutButton = document.getElementById('shut');
                    var overload = document.getElementById('overload');

                    // show the overlay and the dialog
                    startButton.addEventListener('click', function () {
                        detail.classList.remove('hidden');
                        overload.classList.remove('hidden');
                    });

                    // hide the overlay and the dialog
                    shutButton.addEventListener('click', function () {
                        detail.classList.add('hidden');
                        overload.classList.add('hidden');
                    });
                </script>

{{-- End Menu Icon --}}


    </nav>
<div style="background-image:url('{{ asset('admin/images/viber_image_2023-05-04_16-38-44-478.jpg') }}')"class="flex justify-center items-center h-80 bg-no-repeat bg-cover ">
    <h1 class=" sm:text-4xl text-3xl text-white font-bold shadow-xl  ">@yield('detail') </h1>
</div>
    @yield('content')

</body>
</html>

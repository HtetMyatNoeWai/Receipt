@extends('admin.category.list')
@section('title','Category')
@section('content')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('detail','လှူဒါန်းနိုင်သော အလှူပဒေသာပင်များ')

    <div class=" bg-gray-100  w-full  " >
            <div class=" ml-10 mb-4 ">
                <div class=" bg-gray-100  w-full flex justify-around" >
                    <div class="pt-5 ml-10 ">
                        <button class=" text-dark bg-blue-200 font-bold rounded-lg border-1 border-dark shadow-md py-2 sm:px-4 px-2 mr-1 mb-1  duration-150" type="button" onclick="toggleModal('modal-id')">
                            +Add Category
                          </button>

                    </div>
                    <div class="pt-5 ">
                        <button class=" text-dark bg-blue-200 font-bold rounded-lg border-1 border-dark shadow-md py-2 sm:px-4 px-2 mr-1 mb-1">
                           <a href="{{ route('test#create') }}" >Product</a>
                        </button>
                    </div>

                    <div class="hidden overflow-x-hidden  fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                        <div class="relative ">

                          <!--content-->
                          <div class="border-2 border-gray-100 rounded-lg shadow-lg relative flex flex-col  bg-yellow-100 ">
                                <button class="ml-96 mr-2 my-2 text-red-500 background-transparent font-bold uppercase  text-2xl  ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                    <i class="fa-solid fa-rectangle-xmark"></i>
                                </button>
                            <!--header-->
                                <h1 class="text-xl ml-12 text-indigo-700 ">Add Category</h1>

                                    <form action="{{ route('auth#post') }}" method="post" class="bg-yellow-100 rounded flex justify-center mb-14">
                                        @csrf
                                            <div class="w-4/5 ">
                                                <input class=" ml-11 border-2 border-blue-300 rounded-lg mt-6 w-full py-2.5 px-2 text-dark bg-gray-50 outline-none" id="username" type="text" name="cat_name" placeholder="Add Category">
                                            </div>

                                            <div class="  w-5/12 ">
                                                <button class="shadow mt-6 w-2/4 ml-14 border-2 rounded-lg py-2 px-2 text-dark bg-blue-500  outline-none" type="submit">
                                                    <h6 class="text-white text-lg">Save   </h6>
                                                </button>
                                            </div>

                                    </form>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
                      <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                      <script type="text/javascript">
                        function toggleModal(modalID){
                          document.getElementById(modalID).classList.toggle("hidden");
                          document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                          document.getElementById(modalID).classList.toggle("flex");
                          document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                        }
                      </script>




            <div class=" sm:px-auto pt-4 sm:mx-24 h-96 mt-4">
                <table class=" border-spacing rounded-sm border-2 shadow-lg w-full ">
                    <thead>
                      <tr class="bg-green-300 text-center">
                        <th class="border  sm:text-xl text-sm px-2 py-2 font-bold">စဉ်</th>
                        <th class="border  sm:text-xl text-sm px-12 py-2 font-bold">အလှူပဒေသာပင်များ</th>
                        <th class="border  sm:text-xl text-sm px-2 py-2 font-bold">အခြား</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $index => $posts )
                      <tr class="bg-yellow-100 ">

                        <td class="border  sm:text-lg text-sm px-2 py-6 text-center">{{$loop->iteration }}</td>
                        <td class="border sm:text-lg text-sm px-12 py-6 text-left">{{ $posts->type_of_donation }}</td>
                        <td class="border sm:text-lg text-sm px-2 py-6 text-center">

                                {{-- For Update Buton --}}
                                <button id="opening{{ $index }}" class="text-dark cursor-pointer">
                                    <i class="fa-solid fa-pen-nib " >
                                    </i>
                                </button>

                                <!-- Overlay element -->
                                <div id="over{{ $index }}" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60 "></div>

                                <!-- The dialog -->
                                <div id="content{{ $index }}"
                                    class="h-52 hidden sm:fixed absolute z-50 sm:top-1/4 top-1/3 sm:left-1/2 left-1/4 -translate-x-1/2 -translate-y-1/2 w-96 rounded-md px-8 py-1.5 space-y-5 drop-shadow-lg bg-yellow-100 mb-12">
                                    <button id="finish{{ $index }}" class="ml-80 my-1 text-red-500 background-transparent font-bold uppercase  text-2xl  ease-linear transition-all duration-150">
                                        <i class="fa-solid fa-rectangle-xmark"></i>
                                    </button>
                                    <h1 class="text-xl font-semibold mt-1 text-indigo-900 ">Update Category</h1>
                                        <form action="{{ route('auth#update') }}" method="post" class="bg-yellow-100 rounded  flex justify-center">
                                            @csrf
                                            <div class="w-full mr-1">
                                                <input type="hidden" name="cat_id" value="{{ $posts->id }}">
                                                <input class="text-sm border-2 border-blue-300 rounded-lg mt-2  w-full py-2 px-2 text-dark bg-gray-50 outline-none" id="username" type="text" name="cat_name" placeholder="Update Category" value="{{ old('cat_name',$posts->type_of_donation) }}">
                                            </div>
                                            @error('cat_name')
                                            <small class="text-red-500 ">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                            <div class="  w-1/4 ">
                                                <button class="shadow  border rounded-lg my-2 py-2 px-2 text-dark bg-blue-500  outline-none" type="submit">
                                                    <h6 class="text-white text-md">Update</h6>
                                                </button>
                                            </div>
                                        </form>
                                    </div>


                                <!-- Javascript code -->
                                <script>
                                {
                                    let openingButton = document.getElementById('opening{{ $index }}');
                                    let content = document.getElementById('content{{$index}}');
                                    let finishButton = document.getElementById('finish{{ $index }}');
                                    let over = document.getElementById('over{{ $index }}');

                                    // show the overlay and the dialog
                                    openingButton.addEventListener('click', function () {
                                        content.classList.remove('hidden');
                                        over.classList.remove('hidden');
                                    });

                                    // hide the overlay and the dialog
                                    finishButton.addEventListener('click', function () {
                                        content.classList.add('hidden');
                                        over.classList.add('hidden');
                                    });
                                }
                                </script>

                          {{-- end for update buttom --}}


                            {{-- For Delete Button --}}
                                <button id="open{{ $index }}" class=" text-dark cursor-pointer ">
                                    <i class="fa-solid fa-trash ml-4 duration-150 " >
                                    </i>
                                </button>

                                <!-- Overlay element -->
                                <div id="overlay{{ $index }}" class=" fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

                                <!-- The dialog -->
                                <div id="dialog{{ $index }}"
                                    class="hidden sm:fixed relative  z-50 top-1/4  sm:left-1/2  -translate-x-1/2 -translate-y-1/2 w-80 bg-yellow-100 rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                                    <h1 class="text-xl mt-2 font-semibold text-red-800 ">Are You Sure?</h1>
                                    <h6 class="text-sm mt-0.5 font-bold">Do you really want to delete this category? </h6>

                                    <div class="flex justify-center">
                                        <!-- This button is used to close the dialog -->
                                        <button id="close{{ $index }}" class=" px-2 py-0.5 bg-indigo-400 hover:bg-indigo-700 text-white cursor-pointer rounded-md my-2 mr-6 text-sm">
                                            Cancel
                                        </button>
                                        <a href="{{ route('auth#delete',$posts->id) }}" id="close" class="px-2 py-0.5 bg-red-600 hover:bg-red-700 text-white cursor-pointer rounded-md my-2 ml-6 text-sm">
                                            Delete
                                        </a>

                                    </div>
                                </div>

                                <!-- Javascript code -->
                                <script>
                                    {
                                        const openButton = document.getElementById('open{{ $index }}');
                                        const dialog = document.getElementById('dialog{{ $index }}');
                                        const closeButton = document.getElementById('close{{ $index }}');
                                        const overlay = document.getElementById('overlay{{ $index }}');

                                        // show the overlay and the dialog
                                        openButton.addEventListener('click', function () {
                                            dialog.classList.remove('hidden');
                                            overlay.classList.remove('hidden');
                                        });

                                        // hide the overlay and the dialog
                                        closeButton.addEventListener('click', function () {
                                            dialog.classList.add('hidden');
                                            overlay.classList.add('hidden');
                                        });
                                    }
                                </script>

                        </td>
                      </tr>

                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <br>
        <br>
        
        <br>
        <br>


@endsection









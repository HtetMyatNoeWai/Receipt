@extends('admin.title.list')
@section('title','Create Title')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('detail','အလှူပဒေသာပင် အသေးစိတ်')
@section('content')
<div class=" bg-gray-100  w-full " >
<div class="flex justify-around">
    <div class="pt-5 ">
        <button class=" text-dark bg-blue-200 font-bold rounded-lg border-1 border-dark shadow-md py-2 sm:px-4 px-2 mr-1 mb-1  duration-150" type="button" onclick="toggleModal('modal-id')">
            +Add Title

        </button>
    </div>



    <div class="hidden overflow-x-hidden  fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="relative ">

          <!--content-->
            <div class="border-2 border-indigo-700 rounded-lg shadow-lg relative flex flex-col  bg-yellow-100  ">
                <button class="ml-96 pr-8 mt-3.5 mb-2 text-red-500 background-transparent font-bold uppercase  text-2xl  ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                </button>
            <!--header-->
                <h1 class="text-2xl ml-44 mr-32 text-indigo-700">Add Title</h1>
                    <div class="relative p-2.5 flex-auto w-full">
                        <form action="{{ route('title#post') }}" method="post" class="bg-yellow-100 rounded  flex flex-col items-center justify-center mb-4">
                            @csrf


                            <div class="w-96  flex flex-col items-center justify-center">
                                <input class="mt-3 border-2 border-blue-300 rounded-lg my-2 w-11/12 py-2 px-1.5 text-dark bg-green-50 outline-none" id="username" type="text" name="name" placeholder="Add Category" value="{{ old('name') }}">
                            </div>

                            <div class="mt-2 w-2/4">
                                <button class="shadow ml-20 border rounded-lg my-2 py-2.5 px-3 text-dark bg-blue-500  outline-none" type="submit">
                                    <h6 class="text-white text-md">Save</h2>
                                </button>
                            </div>
                        </form>
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

{{-- Search Box --}}
<div class="p-12  bg-gray-100"></div>

<div class="pt-5 ">
<form action="{{ route('title#create') }}" method="get">
    @csrf
    <input type="text" name="key" class="bg-blue-100 p-2 rounded-md outline-none border-2 border-gray-300" value="{{request('key')}}">
    <button type="submit">
        <i class="fa-solid fa-magnifying-glass  bg-blue-700  text-white py-2 px-3.5 rounded-md text-lg"  ></i>
    </button>
</form>
</div>

</div>

    <div class=" sm:px-auto pt-4 sm:mx-10 h-96">
        <table class=" border-spacing rounded-sm border-2 shadow-lg w-full " id="tabl">
            <thead>
              <tr class="bg-green-300 text-center">
                <th class="border  sm:text-xl text-sm px-2 py-2 font-bold">စဉ်</th>

                <th class="border  sm:text-xl text-sm px-1 py-2 font-bold">အလှူပဒေသာပင်များ အသေးစိတ်</th>

                <th class="border  sm:text-xl text-sm px-1 py-2 font-bold">အခြား</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($product as $index=>$pr)
              <tr class="bg-yellow-100 ">
                <td class="border  sm:text-lg  text-sm px-2 py-3 text-center">{{$loop->iteration }}</td>

                <td class="border sm:text-lg  text-sm px-1.5 py-3 text-center">{{ $pr->product_name}}</td>

                <td class="border sm:text-lg  text-sm px-0.5 py-3 text-center">



                    {{-- For Update Icon --}}
                    <button id="updateOpening{{ $index }}" class="text-dark cursor-pointer">
                        <i class="fa-solid fa-pen-nib" >
                        </i>
                    </button>

                    <!-- Overlay element -->
                    <div id="UpdateOverlay{{ $index }}" class="fixed hidden z-40 w-full h-screen inset-0 bg-gray-900 bg-opacity-60 "></div>

                    <!-- The dialog -->
                    <div id="UpdateDialog{{ $index }}"
                        class="border-2 border-yellow-500 hidden sm:fixed absolute z-50 top-1/2  left-1/2  -translate-x-1/2 -translate-y-1/2 w-96 rounded-md px-8 py-2  drop-shadow-lg bg-yellow-100">
                        <button id="updateClose{{ $index }}" class="  ml-80  my-1 text-red-500 background-transparent font-bold uppercase  text-2xl  ease-linear transition-all duration-150">
                            <i class="fa-solid fa-rectangle-xmark "></i>
                        </button>
                        <h1 class="text-xl font-semibold text-indigo-900 mt-3">Update Category</h1>
                        <div class="relative  flex-auto w-full mb-3.5">
                            <form action="{{ route('title#update') }}" method="post" class="bg-yellow-100 rounded p-3 mb-1.5 flex flex-col items-center justify-center ">
                                @csrf



                                <div class="w-96  flex flex-col items-center justify-center">
                                    <input type="hidden" name="title_id" value="{{ $pr->id }}">
                                    <input class="shadow-sm text-md border-2 border-blue-300 rounded-lg my-2 w-11/12 py-1 px-1.5 text-dark bg-green-50  outline-none" id="username" type="text" name="name" placeholder="Update Category" value="{{ old('name',$pr->product_name) }}">
                                </div>


                                <div class="mt-2.5 flex justify-center w-full ">
                                    <button class="w-1/3 shadow   border rounded-lg my-2 py-2 px-2.5 text-dark bg-indigo-500 mr-1.5 outline-none" type="submit">
                                        <h6 class="text-white text-md">Update</h6>
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Javascript code -->
                    <script>
                    {
                        let updateOpeningButton = document.getElementById('updateOpening{{ $index }}');
                        let UpdateDialog = document.getElementById('UpdateDialog{{$index}}');
                        let updateCloseButton = document.getElementById('updateClose{{ $index }}');
                        let UpdateOverlay = document.getElementById('UpdateOverlay{{ $index }}');

                        // show the overlay and the dialog
                        updateOpeningButton.addEventListener('click', function () {
                            UpdateDialog.classList.remove('hidden');
                            UpdateOverlay.classList.remove('hidden');
                        });

                        // hide the overlay and the dialog
                        updateCloseButton.addEventListener('click', function () {
                            UpdateDialog.classList.add('hidden');
                            UpdateOverlay.classList.add('hidden');
                        });
                    }
                    </script>

                    {{-- end for update buttom --}




                    {{-- delete icons --}}


                    <button id="titleOpen{{ $index }}" class=" text-dark cursor-pointer ">
                        <i class="fa-solid fa-trash ml-4" >
                        </i>
                    </button>

                    <!-- Overlay element -->
                    <div id="titleOverlay{{ $index }}" class=" fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

                    <!-- The dialog -->
                    <div id="titleDialog{{ $index }}"
                        class="border-2 border-gray-700 hidden sm:fixed relative shadow z-50 top-1/2  sm:left-1/2  -translate-x-1/2 -translate-y-1/2 w-80 bg-yellow-100 rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                        <h1 class="text-xl mt-2 font-semibold text-red-800 ">Are You Sure?</h1>
                        <h6 class="text-sm mt-0.5 font-bold">Do you really want to delete this title? </h6>

                        <div class="flex justify-center">
                            <!-- This button is used to close the dialog -->
                            <button id="titleClose{{ $index }}" class=" px-2 py-0.5 bg-indigo-400 hover:bg-indigo-700 text-white cursor-pointer rounded-md my-2 mr-6 text-sm">
                                Cancel
                            </button>
                            <a href="{{ route('title#delete',$pr->id) }}" id="close" class="px-2 py-0.5 bg-red-600 hover:bg-red-700 text-white cursor-pointer rounded-md my-2 ml-6 text-sm">
                                Delete
                            </a>

                        </div>
                    </div>

                    <!-- Javascript code -->
                    <script>
                        {
                            const titleOpenButton = document.getElementById('titleOpen{{ $index }}');
                            const titleDialog = document.getElementById('titleDialog{{ $index }}');
                            const titleCloseButton = document.getElementById('titleClose{{ $index }}');
                            const titleOverlay = document.getElementById('titleOverlay{{ $index }}');

                            // show the overlay and the dialog
                            titleOpenButton.addEventListener('click', function () {
                                titleDialog.classList.remove('hidden');
                                titleOverlay.classList.remove('hidden');
                            });

                            // hide the overlay and the dialog
                            titleCloseButton.addEventListener('click', function () {
                                titleDialog.classList.add('hidden');
                                titleOverlay.classList.add('hidden');
                            });
                        }
                    </script>



                </td>
              </tr>

            @endforeach

            </tbody>
        </table>
        <div class="my-3">
            {{$product->links()}}
        </div>

    </div>
</div>
<br>
<br>
<br>

@endsection

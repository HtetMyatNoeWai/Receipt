@extends('admin.cart.list')
@section('title','Donor')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('content')
    <div class="flex">
        <img src="{{ asset('admin/images/OIP (2).jpg') }}" class="w-36 h-28 mx-auto">
    </div>
    <div class="mt-3 flex ">
        <form action="{{ route('Donor#posting') }}" method="post" class="w-1/2 mt-8">
            @csrf
            <div class="ml-32">
                <label class="shadow-sm text-gray-700" >Name</label>
                <div class="mt-1.5">
                        <input class="mb-4 py-2 px-2.5 bg-green-50 border-2 border-blue-500 rounded-lg text-md w-3/5 outline-none shadow-md" type="text" name="donorName" placeholder="Enter Name">
                </div>
                <label class="shadow-sm text-gray-700">Address</label>
                <div class="mt-1.5">
                        <input class="mb-4 py-2 px-2.5 bg-green-50 border-2 border-blue-500 rounded-lg text-md w-3/5 outline-none shadow-md" type="text" name="donorAddress" placeholder="Enter Address">
                </div>
                <label class="shadow-sm text-gray-700">Receiver</label>
                <div class="mt-1.5">
                        <input class="mb-4 py-2 px-2.5 bg-green-50 border-2 border-blue-500 rounded-lg text-md w-3/5 outline-none shadow-md" type="text" name="donorReceiver" placeholder="Enter Receiver Name">
                </div>

                <div class="ml-28">
                    <button type="submit" class="shadow-md py-2 px-3.5 text-center text-md border-2 border-green-100 bg-indigo-600 rounded-md text-white font-bold">Save</button>
                </div>
            </div>

        </form>

            <div class="mt-6 ml-10 w-1/2">
                @foreach ($posting as $index=>$pose)
                    <div class="flex-col">
                        <table class="w-4/5 mb-4 ">
                            <tr>
                                <td class="w-2/5">Name</td>
                                <td class="w-3/5 text-center">{{ $pose->name }}</td>
                            </tr>
                            <tr>
                                <td class="w-2/5">Address</td>
                                <td class="w-3/5 text-center">{{ $pose->address }}</td>
                            </tr>
                            <tr class="border-b-2 border-gray-200 mb-6">
                                <td class="w-2/5">Receiver</td>
                                <td class="w-3/5 text-center">{{ $pose->receiver_name }}</td>

                                {{-- For Update Buton --}}
                                <td>
                                <button id="opening{{ $index }}" class="px-1.5  bg-blue-700 rounded-md mb-1.5 mr-1.5 cursor-pointer">
                                    <i class="fa-solid fa-pen-nib text-white text-sm" >
                                    </i>
                                </button>

                                <!-- Overlay element -->
                                <div id="over{{ $index }}" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60 "></div>

                                <!-- The dialog -->
                                <div id="content{{ $index }}"
                                    class="h-auto hidden sm:fixed absolute z-50 top-1/2  left-1/2  -translate-x-1/2 -translate-y-1/2 w-96 rounded-md px-8 py-1.5 space-y-5 drop-shadow-lg bg-yellow-100 mb-12">

                                    <h1 class="text-xl font-semibold mt-8 text-indigo-900 ml-24">Update Donor</h1>
                                        <form action="{{ route('Donor#update') }}" method="post" class="bg-yellow-100 rounded  ">
                                            @csrf
                                            <div class="w-full mr-1">
                                                <input type="hidden" name="donorId" value="{{ $pose->id }}">
                                                <input class="text-sm border-2 border-blue-300 rounded-lg mt-1  w-full py-2 px-2 text-dark bg-gray-50 outline-none" id="username" type="text" name="donorName" placeholder="Update Category" value="{{ old('donorName',$pose->name) }}">
                                            </div>

                                            <div class="w-full mr-1">
                                                <input class="text-sm border-2 border-blue-300 rounded-lg mt-2  w-full py-2 px-2 text-dark bg-gray-50 outline-none" id="address" type="text" name="donorAddress" placeholder="Update Category" value="{{ old('donorAddress',$pose->address) }}">
                                            </div>

                                            <div class="w-full mr-1">
                                                <input class="text-sm border-2 border-blue-300 rounded-lg mt-2  w-full py-2 px-2 text-dark bg-gray-50 outline-none" id="receiver" type="text" name="donorReceiver" placeholder="Update Category" value="{{ old('donorReceiver',$pose->receiver_name) }}">
                                            </div>


                                            <div class="  w-1/4 flex justify-center ml-32 my-4">
                                                <button class="mr-2 shadow  border rounded-lg my-2 py-2 px-2 text-dark bg-blue-500  outline-none" type="submit">
                                                    <h6 class="text-white text-md">Update</h6>
                                                </button>
                                                <button id="finish{{ $index }}" class="ml-2 my-2 py-2 px-2 text-dark bg-red-500 shadow  border rounded-lg outline-none ease-linear transition-all duration-150">
                                                    <h6 class="text-white text-md">Close</h6>
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
                        </td>
                          {{-- end for update buttom --}}



                                {{-- Delete --}}
                                <td>
                                    <button class="px-1.5 bg-red-700 first-letter rounded-md mb-1.5 cursor-pointer" id="dOpen{{ $index }}">
                                            <i class="text-sm fa-solid fa-trash text-white"></i>
                                    </button>


                                      <!-- Overlay element -->
                    <div id="dOverlay{{ $index }}" class=" fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

                    <!-- The dialog -->
                    <div id="dDialog{{ $index }}"
                        class="border-2 border-gray-700 hidden sm:fixed relative shadow z-50 top-1/2  sm:left-1/2  -translate-x-1/2 -translate-y-1/2 w-80 bg-yellow-100 rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                        <h1 class="text-xl mt-2 font-semibold text-red-800 ">Are You Sure?</h1>
                        <h6 class="text-sm mt-0.5 font-bold">Do you really want to delete this title? </h6>

                        <div class="flex justify-center">
                            <!-- This button is used to close the dialog -->
                            <button id="dClose{{ $index }}" class=" px-2 py-0.5 bg-indigo-400 hover:bg-indigo-700 text-white cursor-pointer rounded-md my-2 mr-6 text-sm">
                                Cancel
                            </button>
                            <a href="{{ route('Donor#delete',$pose->id) }}" id="close" class="px-2 py-0.5 bg-red-600 hover:bg-red-700 text-white cursor-pointer rounded-md my-2 ml-6 text-sm">
                                Delete
                            </a>

                        </div>
                    </div>

                    <!-- Javascript code -->
                    <script>
                        {
                            const dOpenButton = document.getElementById('dOpen{{ $index }}');
                            const dDialog = document.getElementById('dDialog{{ $index }}');
                            const dCloseButton = document.getElementById('dClose{{ $index }}');
                            const dOverlay = document.getElementById('dOverlay{{ $index }}');

                            // show the overlay and the dialog
                            dOpenButton.addEventListener('click', function () {
                                dDialog.classList.remove('hidden');
                                dOverlay.classList.remove('hidden');
                            });

                            // hide the overlay and the dialog
                            dCloseButton.addEventListener('click', function () {
                                dDialog.classList.add('hidden');
                                dOverlay.classList.add('hidden');
                            });
                        }
                    </script>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endforeach
                <div class="my-3">
                    {{$posting->links()}}
                </div>
            </div>

@endsection

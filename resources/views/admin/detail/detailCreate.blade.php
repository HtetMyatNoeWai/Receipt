@extends('admin.title.list')
@section('title','Create Title Detail')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('detail','လှူဒါန်းနိုင်သော အလှူပဒေသာပင်အခွဲများ')
@section('content')

        <div class=" bg-gray-100  w-full  " >
            <div class=" ml-10 mb-4">
                <div class=" bg-gray-100  w-full " >
                    <div class="pt-5 ml-10 ">
                        <button class=" text-dark bg-blue-200 font-bold rounded-lg border-1 border-dark shadow-md py-2 sm:px-4 px-2 mr-1 mb-1  duration-150" type="button" onclick="toggleModal('modal-id')">
                            +Add Detail
                          </button>

                    </div>

                    <div class="hidden overflow-x-hidden  fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                        <div class="relative ">

                          <!--content-->
                          <div class="border-2 border-gray-100 rounded-lg shadow-lg relative flex flex-col  bg-yellow-100 ">
                                <button class="ml-96 mr-3 my-2 text-red-500 background-transparent font-bold uppercase  text-2xl  ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                    <i class="fa-solid fa-rectangle-xmark"></i>
                                </button>
                            <!--header-->
                                <h1 class="text-xl ml-44 mb-3 text-indigo-900 ">Add Detail</h1>

                                    <form action="{{ route('detail#post') }}" method="post" class="bg-yellow-100 rounded  mb-14">
                                        @csrf
                                        <div class="mt-1 w-96 ml-8">
                                            <select name="productName" id="" class="border-2 border-blue-300 rounded-lg my-2 w-11/12 py-2 px-0.5 text-dark bg-green-50 outline-none">
                                                <option value="">Choose Products</option>
                                                @foreach ($product as $p )
                                                <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class=" w-96 mb-2">
                                            <input class="shadow-sm ml-8 border-2 border-blue-300 rounded-lg w-11/12 py-2.5 px-2 text-dark bg-gray-50 outline-none" id="username" type="text" name="detail_name" placeholder="Add Detail">
                                        </div>

                                        <div class=" w-5/12 ml-44 mt-3">
                                            <button class="shadow  w-2/4   border-2 rounded-lg py-2 px-2.5 text-dark bg-blue-500  outline-none" type="submit">
                                                <h6 class="text-white text-lg">Save</h6>
                                            </button>
                                        </div>
                                    </form>
                                </div>
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
                        <th class="border  sm:text-xl text-sm px-12 py-2 font-bold">အလှူပဒေသာပင်</th>
                        <th class="border  sm:text-xl text-sm px-12 py-2 font-bold">အကြောင်းအရာ</th>
                        <th class="border  sm:text-xl text-sm px-2 py-2 font-bold">အခြား</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $index=>$posts )
                      <tr class="bg-yellow-100 ">

                        <td class="border  sm:text-lg text-sm px-2 py-6 text-center">{{$loop->iteration }}</td>
                        <td class="border sm:text-lg text-sm px-12 py-6 text-left">{{ $posts->product_name }}</td>
                        <td class="border sm:text-lg text-sm px-12 py-6 text-left">{{ $posts->title }}</td>
                        <td class="border sm:text-lg text-sm px-2 py-6 text-center">

                                {{-- For Update Button --}}
                                <button id="opening{{ $index }}" class="text-dark cursor-pointer">
                                    <i class="fa-solid fa-pen-nib " >
                                    </i>
                                </button>

                                <!-- Overlay element -->
                                <div id="over{{ $index }}" class="fixed hidden z-40 w-full h-screen inset-0 bg-gray-900 bg-opacity-60 "></div>

                                <!-- The dialog -->
                                <div id="content{{ $index }}"
                                    class=" hidden sm:fixed absolute z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-auto rounded-md px-8 py-2 space-y-5 drop-shadow-lg bg-yellow-200 mb-12">
                                    <button id="finish{{ $index }}" class="ml-80 my-1 text-red-500 background-transparent font-bold uppercase  text-2xl  ease-linear transition-all duration-150">
                                        <i class="fa-solid fa-rectangle-xmark"></i>
                                    </button>
                                    <h1 class="text-xl font-semibold mt-1 text-indigo-900  ">Update Detail</h1>

                                        <form action="{{ route('detail#update') }}" method="post" class="bg-yellow-200 rounded   ">
                                            @csrf
                                            <div class="mt-1 w-96 ">
                                                <select name="productName" id="" class="border-2 border-blue-300 rounded-lg my-2 w-11/12 py-2 px-0.5 text-dark bg-green-50 outline-none">
                                                    <option value="">Choose Products</option>
                                                    @foreach ($product as $p )
                                                    <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="w-96 ">
                                                <input type="hidden" name="detail_id" value="{{ $posts->id }}">
                                                <input class="text-sm border-2 border-blue-300 rounded-lg mt-2 w-11/12 py-2 px-2 text-dark bg-gray-50 outline-none" id="username" type="text" name="detail_name" placeholder="Update Detail" value="{{ old('detail_name',$posts->title) }}">
                                            </div>
                                            @error('detail_name')
                                            <small class="text-red-500 ">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                            <div class="  w-1/4 mt-1 mx-auto">
                                                <button class="shadow border rounded-lg my-2 py-2 px-2 text-dark bg-blue-500  outline-none" type="submit">
                                                    <h6 class="text-white text-md">Update</h6>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Javascript code -->
                                <script>
                                {
                                    let openingButton = document.getElementById('opening{{ $index }}');
                                    let content = document.getElementById('content{{ $index }}');
                                    let finishButton = document.getElementById('finish{{ $index }}');
                                    let over = document.getElementById('over{{ $index }}');

                                    // show the overlay and the dialog
                                    openingButton.addEventListener('click', function () {
                                        content{{ $index }}.classList.remove('hidden');
                                        over{{ $index }}.classList.remove('hidden');
                                    });

                                    // hide the overlay and the dialog
                                    finishButton.addEventListener('click', function () {
                                        content{{ $index }}.classList.add('hidden');
                                        over{{ $index }}.classList.add('hidden');
                                    });
                                }
                                </script>

                          {{-- end for update buttom --}}


                            {{-- For Delete Button --}}
                                <button id="detailOpen{{ $index }}" class=" text-dark cursor-pointer ">
                                    <i class="fa-solid fa-trash ml-4 duration-150 " >
                                    </i>
                                </button>

                                <!-- Overlay element -->
                                <div id="detailOverlay{{ $index }}" class=" fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

                                <!-- The dialog -->
                                <div id="detailDialog{{ $index }}"
                                    class="hidden sm:fixed relative  z-50 top-1/4  sm:left-1/2  -translate-x-1/2 -translate-y-1/2 w-80 bg-yellow-200 rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                                    <h1 class="text-xl mt-2 font-semibold text-red-800 ">Are You Sure?</h1>
                                    <h6 class="text-sm mt-0.5 font-bold">Do you really want to delete this title's detail? </h6>

                                    <div class="flex justify-center">
                                        <!-- This button is used to close the dialog -->
                                        <button id="detailClose{{ $index }}" class=" px-2 py-0.5 bg-indigo-400 hover:bg-indigo-700 text-white cursor-pointer rounded-md my-2 mr-6 text-sm">
                                            Cancel
                                        </button>
                                        <a href="{{ route('detail#delete',$posts->id) }}" id="close" class="px-2 py-0.5 bg-red-600 hover:bg-red-700 text-white cursor-pointer rounded-md my-2 ml-6 text-sm">
                                            Delete
                                        </a>

                                    </div>
                                </div>

                                <!-- Javascript code -->
                                <script>
                                    {
                                        const detailOpenButton = document.getElementById('detailOpen{{ $index }}');
                                        const detailDialog = document.getElementById('detailDialog{{ $index }}');
                                        const detailCloseButton = document.getElementById('detailClose{{ $index }}');
                                        const detailOverlay = document.getElementById('detailOverlay{{ $index }}');

                                        // show the overlay and the dialog
                                        detailOpenButton.addEventListener('click', function () {
                                            detailDialog.classList.remove('hidden');
                                            detailOverlay.classList.remove('hidden');
                                        });

                                        // hide the overlay and the dialog
                                        detailCloseButton.addEventListener('click', function () {
                                            detailDialog{{ $index }}.classList.add('hidden');
                                            detailOverlay{{ $index }}.classList.add('hidden');
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




@endsection









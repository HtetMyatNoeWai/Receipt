@extends('admin.cart.list')
@section('title','Create Receipt')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('content')

<div class="bg-yellow-100 mt-1.5 py-16 flex justify-center">
    <img src="{{ asset('admin/images/logo.jpg') }}" class="w-36 h-24  mb-1 mr-8">
    <div class="text-3xl ml-20">
        <h1 class="text-red-500 mb-2.5">Shan State Buddhist University</h1>
        <h1 class="text-blue-500 text-center">ရှမ်းပြည်နယ် ဗုဒ္ဓတက္ကသိုလ်</h1>
    </div>
</div>


<div class="flex justify-between">
        <div class="pt-5 ">
            <button class=" text-dark bg-blue-200 font-bold rounded-lg border-1 border-dark shadow-md py-2 sm:px-4 px-2 mr-1 mb-1 ml-10 duration-150" type="button" onclick="toggleModal('modal-id')">
                +Add Donation
            </button>
            </button>
        </div>


        <div class="hidden overflow-x-hidden  fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
            <div class="relative ">

            <!--content-->

            <div class="border-2 border-indigo-700 rounded-lg shadow-lg relative flex flex-col  bg-yellow-200  ">
                <!--header-->
                    <h1 class="text-2xl mt-10 mx-auto text-indigo-700">Add Donation</h1>
                        <div class="relative  flex-auto w-full mt-4">
                            <form action="{{ route('cart#post') }}" method="post" class=" flex flex-col items-center justify-center mb-4">
                                @csrf
                                

                                    <select name="categoryName" class="mt-1.5 border-2 border-blue-300 rounded-md py-2 w-11/12 text-dark bg-gray-100 shadow-sm outline-none text-sm">
                                        <option value="">Choose Category</option>
                                        @foreach ($cat as $cate)
                                        <option value="{{ $cate->id }}" >{{ $cate->type_of_donation }}</option>
                                        @endforeach
                                    </select>

                                    <select name="productName" class="mt-3 border-2 border-blue-300 rounded-md py-2 w-11/12 text-dark bg-gray-100 shadow-sm outline-none text-sm">
                                        <option value=""> Choose Title</option>
                                        @foreach ($pro as $prod)
                                        <option value="{{ $prod->id }}">{{ $prod->product_name }}</option>
                                        @endforeach
                                    </select>


                                    <select name="detailsName" class="mt-3 border-2 border-blue-300 rounded-md py-2 w-11/12  text-dark bg-gray-100 shadow-sm outline-none text-sm">
                                        <option value="" >  Choose Detail</option>
                                        @foreach ($det as $deta)
                                        <option value="{{ $deta->id }}">{{ $deta->title }}</option>
                                        @endforeach
                                    </select>

                           
                                <div class="w-96  flex flex-col items-center justify-center">
                                   
                                    <input class="mt-3 border-2 border-blue-300 rounded-md  w-11/12 py-2 px-1.5 text-dark bg-gray-100 shadow-sm outline-none" id="username" type="text" name="cart_name" placeholder="Enter Name" value="{{ old('cart_name') }}">
                                </div>
                                @error('cart_name')
                                    <small class="text-red-500">
                                        {{$message}}
                                    </small>
                                @enderror
                                <div class="w-96  flex flex-col items-center justify-center">
                                   
                                    <input class="mt-3 border-2 border-blue-300 rounded-md  w-11/12 py-2 px-1.5 text-dark bg-gray-100 shadow-sm outline-none" id="username" type="text" name="address" placeholder="Enter Address" value="{{ old('address') }}">
                                </div>
                                @error('address')
                                    <small class="text-red-500">
                                        {{$message}}
                                    </small>
                                @enderror
                                <div class="w-96  flex flex-col items-center justify-center">
                                   
                                    <input class="mt-3 border-2 border-blue-300 rounded-md  w-11/12 py-2 px-1.5 text-dark bg-gray-100 shadow-sm outline-none" id="username" type="text" name="amount" placeholder="Enter Amount" value="{{ old('amount') }}">
                                </div>
                                @error('amount')
                                    <small class="text-red-500">
                                        {{$message}}
                                    </small>
                                @enderror
                                <div class="w-96  flex flex-col items-center justify-center">
                                   
                                    <input class="mt-3 border-2 border-blue-300 rounded-md  w-11/12 py-2 px-1.5 text-dark bg-gray-100 shadow-sm outline-none" id="username" type="text" name="receiver" placeholder="Enter Receiver Name" value="{{ old('receiver') }}">
                                </div>
                                <div class="mt-3 flex justify-center mb-6 ml-6">
                                    <button class="shadow  border rounded-md my-2 py-2 px-3 text-dark bg-indigo-500  outline-none" type="submit">
                                        <h6 class="text-white text-md">Save</h2>
                                    </button>
                                    <button class=" shadow ml-1.5 mr-1.5 border rounded-md my-2 py-2 px-3 text-dark bg-red-700  outline-none ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                        <h6 class="text-white text-md">Close</h2>
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




</div>



<div class=" sm:px-auto pt-4 sm:mx-10 h-96">
    <table class=" border-spacing rounded-sm border-2 shadow-lg w-full ">
        <thead>
          <tr class="bg-green-300 text-center">
            <th class="border  sm:text-xl text-sm px-2 py-2 font-bold">စဉ်</th>
            <th class="border  sm:text-xl text-sm px-2 py-2 font-bold">အမည်</th>
            <th class="border  sm:text-xl text-sm px-1 py-2 font-bold">လိပ်စာ</th>
            <th class="border  sm:text-xl text-sm px-1 py-2 font-bold">အလှူငွေ</th>
            <th class="border  sm:text-xl text-sm px-1 py-2 font-bold">မှတ်ချက်</th>
            <th class="border  sm:text-xl text-sm px-1 py-2 font-bold">ငွေလက်ခံသူ</th>
            <th class="border  sm:text-xl text-sm px-2 py-2 font-bold ">အခြား</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($rec as $index=>$rece )
            <tr class="bg-yellow-100 ">
                <td class="border  sm:text-lg  text-sm px-2 py-3 text-center">{{$loop->iteration }}</td>
                <td class="border  sm:text-lg  text-sm px-2 py-3 text-left">{{ $rece->name }}</td>
                <td class="border sm:text-lg  text-sm px-1.5 py-3 text-left">{{ $rece->address }}</td>
                <td class="border sm:text-lg  text-sm px-1.5 py-3 text-left">{{ $rece->amount }}</td>
                <td class="border sm:text-lg  text-sm px-5 py-3 text-left">{{ $rece->product_name }}</td>
                <td class="border sm:text-lg  text-sm px-5 py-3 text-left mr-2">{{ $rece->receiver_name }}</td>
                <td class="border sm:text-md text-sm px-0.5 py-3 text-center">

                {{-- Print Icon --}}
                <a href="{{ route('receipt#pdf',$rece->id) }}" >
                     <i class="fa-solid fa-print"></i>
                </a>

                {{-- End Print Icon --}}


                {{-- Certificate Icon --}}
                <a href="{{route('certificate#pdf',$rece->id)}}">
                    <i class="fa-solid fa-certificate ml-1.5"></i>
                </a>
                {{-- End Certificate Icon --}}



                 {{-- For Update Icon --}}
                    <button id="cupdateOpen{{ $index }}" class="text-dark cursor-pointer">
                        <i class="fa-solid fa-pen-nib ml-1.5" >
                        </i>
                    </button>


                    <!-- Overlay element -->
                    <div id="cupdateOverlay{{ $index }}" class="fixed hidden z-40 w-full h-screen inset-0 bg-gray-900 bg-opacity-60 "></div>

                    <!-- The dialog -->
                    <div id="cupdateDialog{{ $index }}"
                        class="border-2 border-yellow-500 hidden sm:fixed absolute z-50 top-1/2  left-1/2  -translate-x-1/2 -translate-y-1/2 w-96 rounded-md px-8 py-2  drop-shadow-lg bg-green-200">
                        <button id="cupdateClose{{ $index }}" class="ml-72  text-red-500 background-transparent font-bold uppercase  text-2xl my-1.5 ease-linear transition-all duration-150">
                            <i class="fa-solid fa-rectangle-xmark"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-indigo-900 " >Update Donation</h1>
                        <div class="relative  flex-auto w-full mt-3 mb-3.5">
                            <form action="{{ route('cart#update') }}" method="post" class=" flex flex-col items-center justify-center mb-4">
                                @csrf
                                <div class="mt-2.5 w-full flex justify-center mx-1.5 ">

                                    <select name="categoryName" class="border-2 border-blue-300 rounded-md py-2 w-3/12 mr-2.5 text-dark bg-yellow-300 outline-none text-sm">
                                        <option value="" class="text-center ">Choose Category</option>
                                        @foreach ($cat as $cate)
                                        <option value="{{ $cate->id }}" >{{ $cate->type_of_donation }}</option>
                                        @endforeach
                                    </select>

                                    <select name="productName" class="border-2 border-blue-300 rounded-md py-2 w-3/12 mr-2.5 text-dark bg-yellow-300 outline-none text-sm">
                                        <option value="" class="text-center"> Choose Title</option>
                                        @foreach ($pro as $prod)
                                        <option value="{{ $prod->id }}">{{ $prod->product_name }}</option>
                                        @endforeach
                                    </select>


                                    <select name="detailsName" class="border-2 border-blue-300 rounded-md py-2 w-3/12  text-dark bg-yellow-300 outline-none text-sm">
                                        <option value="" class="text-center">  Choose Detail</option>
                                        @foreach ($det as $deta)
                                        <option value="{{ $deta->id }}">{{ $deta->title }}</option>
                                        @endforeach
                                    </select>

                            </div>
                                <div class="w-96  flex flex-col items-center justify-center">

                                    <input type="hidden" name="cartId" value="{{ $rece->id }}">
                                    <input class="mt-3 border-2 border-blue-300 rounded  w-11/12 py-2 px-1.5 text-dark bg-yellow-100 outline-none" id="username" type="text" name="cart_name" placeholder="Enter Name" value="{{ old('cart_name',$rece->name) }}">
                                </div>
                                @error('cart_name')
                                    <small class="text-red-500">
                                        {{$message}}
                                    </small>
                                @enderror
                                <div class="w-96  flex flex-col items-center justify-center">
                                    <input class="mt-3 border-2 border-blue-300 rounded  w-11/12 py-2 px-1.5 text-dark bg-yellow-100 outline-none" id="username" type="text" name="address" placeholder="Enter Address" value="{{ old('address',$rece->address) }}">
                                </div>
                                @error('address')
                                    <small class="text-red-500">
                                        {{$message}}
                                    </small>
                                @enderror
                                <div class="w-96  flex flex-col items-center justify-center">
                                    <input class="mt-3 border-2 border-blue-300 rounded  w-11/12 py-2 px-1.5 text-dark bg-yellow-100 outline-none" id="username" type="text" name="amount" placeholder="Enter Amount" value="{{ old('amount',$rece->amount) }}">
                                </div>
                                @error('amount')
                                    <small class="text-red-500">
                                        {{$message}}
                                    </small>
                                @enderror
                                <div class="w-96  flex flex-col items-center justify-center">
                                    <input class="mt-3 border-2 border-blue-300 rounded  w-11/12 py-2 px-1.5 text-dark bg-yellow-100 outline-none" id="username" type="text" name="receiver" placeholder="Enter Receiver Name" value="{{ old('receiver',$rece->receiver_name) }}">
                                </div>
                                <div class="mt-2 ">
                                    <button class="shadow ml-52 border rounded my-2 py-1.5 px-3 text-dark bg-gray-700  outline-none" type="submit">
                                        <h6 class="text-white text-sm">Update</h2>
                                    </button>

                                </div>


                            </form>
                        </div>
                    </div>

                    <!-- Javascript code -->
                    <script>
                    {
                        let cupdateOpenButton = document.getElementById('cupdateOpen{{ $index }}');
                        let cupdateDialog = document.getElementById('cupdateDialog{{$index}}');
                        let cupdateCloseButton = document.getElementById('cupdateClose{{ $index }}');
                        let cupdateOverlay = document.getElementById('cupdateOverlay{{ $index }}');

                        // show the overlay and the dialog
                        cupdateOpenButton.addEventListener('click', function () {
                            cupdateDialog.classList.remove('hidden');
                            cupdateOverlay.classList.remove('hidden');
                        });

                        // hide the overlay and the dialog
                        cupdateCloseButton.addEventListener('click', function () {
                            cupdateDialog.classList.add('hidden');
                            cupdateOverlay.classList.add('hidden');
                        });
                    }
                    </script>
                    {{-- end update icon --}}


                     {{-- delete icons --}}


                     <button id="cdeleteOpen{{ $index }}" class=" text-dark cursor-pointer ">
                        <i class="fa-solid fa-trash ml-1.5" >
                        </i>
                    </button>

                    <!-- Overlay element -->
                    <div id="cdeleteOverlay{{ $index }}" class=" fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

                    <!-- The dialog -->
                    <div id="cdeleteDialog{{ $index }}"
                        class="border-2 border-gray-700 hidden sm:fixed relative shadow z-50 top-1/2  sm:left-1/2  -translate-x-1/2 -translate-y-1/2 w-80 bg-yellow-300 rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                        <h1 class="text-xl mt-2 font-semibold text-red-800 ">Are You Sure?</h1>
                        <h6 class="text-sm mt-0.5 font-bold">Do you really want to delete this ? </h6>

                        <div class="flex justify-center">
                            <!-- This button is used to close the dialog -->
                            <button id="cdeleteClose{{ $index }}" class=" px-2 py-0.5 bg-indigo-400 hover:bg-indigo-700 text-white cursor-pointer rounded-md my-2 mr-6 text-sm">
                                Cancel
                            </button>
                            <a href="{{ route('cart#delete',$rece->id) }}" id="close" class="px-2 py-0.5 bg-red-600 hover:bg-red-700 text-white cursor-pointer rounded-md my-2 ml-6 text-sm">
                                Delete
                            </a>

                        </div>
                    </div>

                    <!-- Javascript code -->
                    <script>
                        {
                            const cdeleteOpenButton = document.getElementById('cdeleteOpen{{ $index }}');
                            const cdeleteDialog = document.getElementById('cdeleteDialog{{ $index }}');
                            const cdeleteCloseButton = document.getElementById('cdeleteClose{{ $index }}');
                            const cdeleteOverlay = document.getElementById('cdeleteOverlay{{ $index }}');

                            // show the overlay and the dialog
                            cdeleteOpenButton.addEventListener('click', function () {
                                cdeleteDialog.classList.remove('hidden');
                                cdeleteOverlay.classList.remove('hidden');
                            });

                            // hide the overlay and the dialog
                            cdeleteCloseButton.addEventListener('click', function () {
                                cdeleteDialog.classList.add('hidden');
                                cdeleteOverlay.classList.add('hidden');
                            });
                        }
                    </script>

                    {{-- end Delete Icon --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-3">
        {{$rec->links()}}
    </div>
</div>




    @endsection

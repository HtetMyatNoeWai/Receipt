@extends('admin.cart.list')
@section('title','Receipt')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('content')

<div class="flex p-2">
    <div class=" w-9/12">
        <form action="{{ route('receipt#post') }}" method="post">
            @csrf
           <div class="flex">
            <select  name="donorName" id="" class="w-4/12 outline-none rounded-md bg-lime-200 p-1 ">
                <option value="">Choose Donors</option>
                @foreach ($donor as $d)
                <option value="{{$d->id  }}">{{ $d->name }}</option>
                @endforeach
            </select>
            <select name="productName" id="" class="w-4/12 outline-none rounded-md bg-lime-200 p-1 ml-1.5">
                <option value="">Choose Donation Title</option>
                @foreach ($product as $p)
                    <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                @endforeach
            </select>
            <div class="w-3/12 outline-none rounded-md bg-lime-200 p-1 ml-1.5">
                <input type="text" class="outline-none rounded-md ml-0.5 mt-1" name="amount">
            <label for="">Amount</label>
            </div>
            <button type="submit" class="bg-lime-200 ml-1.5 px-2.5 py-2 rounded-md">Save</button>
           </div>
        </form>
            <hr class="border_b-2 text-gray-300 mt-3">
        <div class="mt-2.5 pr-2">
            <table class="w-full  rounded-sm shadow-sm">
                <tr class="">
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-400 font-bold">Name</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-400 font-bold">Title</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-400 font-bold">Amount</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-400 font-bold text-center">Other</td>
                </tr>
                @foreach ($data as $index=> $da)
                <tr>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold">{{ $da->dname }}</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold">{{ $da->pname }}</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold">{{ $da->amount }}</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold text-center">
                        <a href="{{ route('receipt#pdf',$da->id) }}">
                            <i class="fa-solid fa-file-pdf mr-3">
                            </i>
                        </a>

                           {{-- For Update Buton --}}
                           <button id="opening{{ $index }}" class="text-dark cursor-pointer">
                            <i class="fa-solid fa-pen-nib mr-3" >
                            </i>
                        </button>

                        <!-- Overlay element -->
                        <div id="over{{ $index }}" class="fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60 "></div>

                        <!-- The dialog -->
                        <div id="content{{ $index }}"
                            class="h-auto hidden sm:fixed absolute z-50 sm:top-1/4 top-1/3 sm:left-1/2 left-1/4 -translate-x-1/2 -translate-y-1/2 w-96 rounded-md px-8 py-1.5 space-y-5 drop-shadow-lg bg-yellow-100 ">
                            <button id="finish{{ $index }}" class="ml-72 mt-2 text-red-500 background-transparent font-bold uppercase  text-2xl  ease-linear transition-all duration-150">
                                <i class="fa-solid fa-rectangle-xmark"></i>
                            </button>
                            <h1 class="text-xl font-semibold  text-indigo-900 ">Update </h1>
                                <form action="{{ route('receipt#update') }}" method="post" class="bg-yellow-100 rounded ">
                                    @csrf
                                    <div class="w-full mr-1">
                                        <input type="hidden" name="donorId" value="{{ $da->id }}">
                                        <select class="text-sm border-2 border-blue-300 rounded-lg mt-0.5  w-full py-2 px-2 text-dark bg-gray-50 outline-none"  name="donorName"  >
                                            <option >Choose Donors</option>
                                            @foreach ($donor as $d)
                                            <option value="{{$d->id  }}">{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                        <select name="productName" id="" class="text-sm border-2 border-blue-300 rounded-lg mt-2  w-full py-2 px-2 text-dark bg-gray-50 outline-none">
                                            <option value="">Choose Donation Title</option>
                                            @foreach ($product as $p)
                                                <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                            @endforeach
                                        </select>

                                            <input type="text" class="text-sm border-2 border-blue-300 rounded-lg mt-2  w-full py-2 px-2 text-dark bg-gray-50 outline-none" name="amount" value="{{ old('amount',$da->amount) }}" >


                                    </div>

                                    <div class="  w-1/4 mx-auto">
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



                        {{-- Delete Icon --}}
                        <button id="open{{ $index }}" class=" text-dark cursor-pointer ">
                            <i class="fa-solid fa-trash duration-150 " >
                            </i>
                        </button>

                         <!-- Overlay element -->
                         <div id="overlay{{ $index }}" class=" fixed hidden z-40 w-screen h-screen inset-0 bg-gray-900 bg-opacity-60"></div>

                         <!-- The dialog -->
                         <div id="dialog{{ $index }}"
                             class="hidden sm:fixed relative  z-50 top-1/4  sm:left-1/2  -translate-x-1/2 -translate-y-1/2 w-80 bg-yellow-100 rounded-md px-8 py-6 space-y-5 drop-shadow-lg border-2 border-dark">
                             <h1 class="text-xl mt-2 font-semibold text-red-800 ">Are You Sure?</h1>
                             <h6 class="text-sm mt-0.5 font-bold">Do you really want to delete? </h6>

                             <div class="flex justify-center">
                                 <!-- This button is used to close the dialog -->
                                 <button id="close{{ $index }}" class=" px-2 py-0.5 bg-indigo-400 hover:bg-indigo-700 text-white cursor-pointer rounded-md my-2 mr-6 text-sm">
                                     Cancel
                                 </button>
                                 <a href="{{ route('receipt#delete',$da->id) }}" id="close" class="px-2 py-0.5 bg-red-600 hover:bg-red-700 text-white cursor-pointer rounded-md my-2 ml-6 text-sm">
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

            </table>
            <div class="my-3">
                {{$data->links()}}
            </div>
            <br>
            <br>
        </div>
    </div>
    <br>
    <br>
    <div class="bg-green-700 w-3/12  rounded-md h-auto">
        <h1 class="mt-9 text-2xl font-bold text-gray-200 text-center">Certificate
            <i class="fa-solid fa-crown"></i>

        </h1>
        <hr class="my-5 border-b-2 text-gray-200 ">
        @foreach($donor as $donate)

        <a href="{{ route('certificate#pdf',$donate->id) }}" class="text-lg px-5 text-gray-200 hover:text-yellow-500">{{$loop->iteration }}.  {{ $donate->name }}</a>
        <br>

        @endforeach
    </div>
</div>
<br>
<br>
@endsection

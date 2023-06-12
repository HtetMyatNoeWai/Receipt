@extends('admin.cart.list')
@section('title','Filter')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('content')

<div class="flex mt-5">
    <div>
        <div class="flex ml-8">
            <form action="{{ route('test#post') }}" method="post">
                @csrf
                <select name="catName" id="" class="w-3/12 outline-none rounded-md bg-lime-200 px-1 py-2 ml-3.5" >
                    <option value="">Choose Category</option>
                    @foreach ($categories as $c )
                        <option value="{{ $c->id }}">{{ $c->type_of_donation }}</option>
                    @endforeach
                </select>
                <select name="pName" id="" class="w-3/12 outline-none rounded-md bg-lime-200 px-1 py-2 ml-3.5" >
                    <option value="">Choose Title</option>
                    @foreach ($products as $p )
                        <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                    @endforeach
                </select>
                <select name="tName" id="" class="w-3/12 outline-none rounded-md bg-lime-200 px-1 py-2 ml-3.5" >
                    <option value="">Choose Category</option>
                    @foreach ($titles as $t )
                        <option value="{{ $t->id }}">{{ $t->title }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-lime-400 ml-3.5 px-2.5 py-2 rounded-md">Save</button>
            </form>
        </div>
        <hr class="border_b-2 text-gray-300 mt-3">
        <div class="mt-2.5 px-2">
            <table class="w-full  rounded-md shadow-sm">
                <tr class="">
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-400 font-bold">Category</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-400 font-bold">Title</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-400 font-bold">Detail</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-400 font-bold text-center">Other</td>
                </tr>
                @foreach ($carts as $index=> $ca)
                <tr>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold">{{ $ca->type_of_donation }}</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold">{{ $ca->product_name }}</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold">{{ $ca->title }}</td>
                    <td class="border-2 border-gray-200 py-2 px-1.5 bg-lime-200 font-bold text-center">

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
                                <form action="{{ route('test#update') }}" method="post" class="bg-yellow-100 rounded ">
                                    @csrf
                                    <div class="w-full mr-1">
                                        <input type="hidden" name="cId" value="{{ $ca->id }}">

                                            <select name="catName" id="" class="text-sm border-2 border-blue-100 rounded-lg   w-full py-2 px-2 text-dark bg-gray-50 outline-none" >
                                                <option value="">Choose Category</option>
                                                @foreach ($categories as $c )
                                                    <option value="{{ $c->id }}">{{ $c->type_of_donation }}</option>
                                                @endforeach
                                            </select>


                                            <select name="pName" id="" class="text-sm border-2 border-blue-100 rounded-lg   w-full py-2 px-2 text-dark bg-gray-50 outline-none mt-1.5" >
                                                <option value="">Choose Title</option>
                                                @foreach ($products as $p )
                                                    <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                                @endforeach
                                            </select>


                                            <select name="tName" id="" class="text-sm border-2 border-blue-100 rounded-lg   w-full py-2 px-2 text-dark bg-gray-50 outline-none mt-1.5" >
                                                <option value="">Choose Detail</option>
                                                @foreach ($titles as $t )
                                                    <option value="{{ $t->id }}">{{ $t->title }}</option>
                                                @endforeach
                                            </select>

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
                                 <a href="{{ route('test#delete',$ca->id) }}" id="close" class="px-2 py-0.5 bg-red-600 hover:bg-red-700 text-white cursor-pointer rounded-md my-2 ml-6 text-sm">
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
        </div>
    </div>
    <div class="w-3/12 bg-green-700 rounded-md shadow-sm mr-3 ">
        <h1 class="mt-9 text-xl font-bold text-gray-200 text-center">Category
            <i class="fa-solid fa-clipboard-list"></i>

        </h1>
        <hr class="my-5 border-b-2 text-gray-200 ">
        @foreach($categories as $ca)

        <button class="category text-sm text-gray-200 px-1.5 py-2" value="{{$ca->id}}" >
           >>{{ $ca->type_of_donation }}

        <br>

        @endforeach
    </div>


</div>
<div class="bg-lime-50">
    <br>
</div>
<div class="bg-lime-50 ">
    <div id="tbody" class="bg-lime-200 mx-auto w-4/12 rounded-md">

    </div>
    <br>
    <br>
    <div class="mr-3">
        {{$carts->links()}}
    </div>
</div>

@endsection

@section('scriptSource')
    <script>
        $(document).ready(function(){
            $('.category').on('click',function(){
                var category=$(this).val();
                $.ajax({
                    url:"http://127.0.0.1:8000/Tables/testFilter",
                    type: 'GET',
                    data:{'category':category},
                    success:function(data){
                        var carts=data.carts;
                        let list='';
                        let alist='';

                                for(let i=0;i<carts.length;i++){
                                    list+=`<p class=" pt-3 px-6 font-bold">${carts[i].product_name}</P>\
                                           <p class=" px-6 mt-1 font-bold">>>>${carts[i].title}</p> \
                                           <br>`;





                                }
                                $("#tbody").html(list);


                    }
                });
            });
        });
    </script>

@endsection

@extends('admin.title.list')
@section('title','Create Title')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('detail','အလှူပဒေသာပင် အသေးစိတ်')
@section('content')
<div class="flex mt-10">

    <div class="border-2 border-violet-100 shadow-lg w-2/6 bg-violet-100 h-2/3 p-3 rounded-md ml-8 mt-3">
        <h1 class="text-2xl text-violet-900 text-center -auto font-bold mb-3.5 underline ">Category</h1>
        <input type="checkbox" value="cat" id="allcat">
                    <label class="text-lg text-violet-700 " >All</label>
            <table class="mb-3.5" >
                    <tr >
                    <select name="category" id="category" class="w-full text-lg text-violet-700  -auto font-bold bg-violet-100">
                        <option value="">Choose Category</option>

                        @foreach ($categories as $c )
                            <option value="{{ $c->id }}">{{ $c->type_of_donation }}</option>
                        @endforeach
                    </select>
                    </tr>
            </table>


    </div>
    <div class="border-2 border-violet-100 shadow-lg w-5/12 ml-4 bg-violet-200  h-auto p-3 rounded-md mt-3"  >
       <table class="mb-3.5">
            <tr>
                <td><h1 class="text-2xl text-violet-900 text-center -auto font-bold mb-3.5 underline">Title</h1></td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" value="pro" id="all">
                    <label class="text-lg text-violet-700 " >All</label>
                </td>
            </tr>
            <tbody id="tbody">
                @foreach ($products as $t)
                    <tr>
                        <td>
                            {{-- <select name="title" class="title " class="w-full text-lg text-violet-700  -auto font-bold bg-violet-100">
                                <option value="">Choose Title</option>

                                @foreach ($products as $t)
                                    <option value="{{ $t->id }}">{{ $t->product_name }}</option>
                                @endforeach
                            </select> --}}
                            <input type="checkbox" value="{{ $t->id }}" class="title ">
                            <label class="text-lg text-violet-700 " >{{ $t->product_name }}</label>

                        </td>
                    </tr>
                    @endforeach
            </tbody>
       </table>
    </div>




    <div class="border-2 border-violet-100 shadow-lg w-3/12 ml-4 bg-violet-300  h-2/3 p-3 rounded-md mr-4 mt-3" >
       <table class="mb-3.5">
            <tr>
                <td>
                    <h1 class="text-2xl text-violet-900 text-center -auto font-bold mb-3.5 underline">Detail</h1>
                </td>
            </tr>
            <tbody id="tfoot">
                @foreach ($detail as $d)
                    <tr>
                        <td><h1 class="text-lg text-violet-700 ">{{ $d->title }}</h1></td>
                    </tr>
                @endforeach
            </tbody>
       </table>
    </div>
</div>

@endsection

@section('scriptSource')


    <script>
        $(document).ready(function(){

            $('#category').on('change',function(){
                var category=$(this).val();
                $.ajax({
                    url:"http://127.0.0.1:8000/Tables/linkCreate",
                    type: 'GET',
                    data:{'category':category},
                    success:function(data){
                        var products=data.products;
                        let list='';

                            for(let i=0;i<products.length;i++){
                               list +=`<table class="mb-3.5" >\
                                            <tr>\
                                                <input type="checkbox"  value="${products[i].id}">\
                                                    <label class="text-lg  text-violet-700">${products[i].product_name}</label>\
                                            </tr> \
                                        </table> `;

                        }
                         $("#tbody").html(list);
                    }
                });
            });

            $('.title').on('click',function(){
                var product=$(this).val();

                $.ajax({
                    url:"http://127.0.0.1:8000/Tables/filterLink",
                    type:'GET',
                    data:{'product':product},
                    success:function(data){

                       var details=data.title_details;
                       let connect='';


                       for(let j=0;j<details.length;j++){

                        connect +=' <table class="mb-3.5">\
                                            <tr>\
                                                <h1 class="text-violet-700">'+details[j]['title']+'</h1>\
                                            </tr> \
                                    </table> ';
                       }

                        $("#tfoot").html(connect);

                    }
                });
            });


            $('#all').on('click',function(){
                $allcheckbox=$(this).val();

                if($allcheckbox=='pro'){
                    $.ajax({
                        type:'get',
                        url:"http://127.0.0.1:8000/Tables/allLink",
                        data:{'status' : 'pro'},
                        dataType:'json',
                        success:function(response){
                            $alist='';
                            for($i=0;$i<response.length;$i++){
                                $alist +=`<table class="mb-3.5" >\
                                            <tr>\
                                                    <h1 class="text-violet-700">${response[$i].title}</h1>\
                                            </tr> \
                                        </table> `;
                            }
                            $("#tfoot").html($alist);
                        }

                    });
                }
            });
            $('#allcat').on('click',function(){
                $allbox=$(this).val();

                if($allbox=='cat'){
                    $.ajax({
                        type:'get',
                        url:"http://127.0.0.1:8000/Tables/allCatLink",
                        data:{'status' : 'cat'},
                        dataType:'json',
                        success:function(response){
                            $blist='';
                            for($i=0;$i<response.length;$i++){
                                $blist +=`<table class="mb-3.5" >\
                                            <tr>\

                                                    <h1 class="text-violet-700 mb-3.5">${response[$i].product_name}</h1>\
                                            </tr> \
                                        </table> `;
                            }
                            $("#tbody").html($blist);
                        }

                    });
                }
            });


        });


    </script>

@endsection


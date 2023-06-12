Route::get('linkCreate',[ProductTitleController::class,'linkCreate'])->name('link#create');

Route::get('filter/{id}',[ProductTitleController::class,'filter'])->name('link#filter');

Route::get('filterP/{id}',[ProductTitleController::class,'filterP'])->name('link#filterP');


public function linkCreate(){
    $cat=Category::get();
    $tit=Product::get();
    $det=TitleDetail::get();
    return view('admin.link',compact('cat','tit','det'));
}

public function filter($categoryId){
    $cat=Category::get();
    $tit=Product::where('category_id',$categoryId)->get();
    $det=TitleDetail::get();
    return view('admin.link',compact('cat','tit','det'));
}

public function filterP($productId){
    $cat=Category::get();
    $tit=Product::get();
    $det=TitleDetail::where('p_id',$productId)->get();
    return view('admin.link',compact('cat','tit','det'));
}


<div id="categoryName">
    @foreach ($cat as $c )
    <a href="{{route('link#filter',$c->id) }}" class="text-lg text-violet-700" id="catName"> {{ $c->type_of_donation }}</a><br>
    @endforeach
</div>


<a href="{{ route('link#filterP',$t->id) }}" class="text-lg text-violet-700"  >{{ $t->product_name }}</a>






////////
<h1 class="text-2xl text-violet-900 text-center -auto font-bold mb-3.5 underline">Title</h1>
<h1 class="text-lg text-violet-700 "><a href="{{ route('link#create') }}">All</a></h1>
<hr class="w-full text-dark mb-3.5">

@foreach ($products as $t)
<table class="mb-3.5" >
    <tr>
        <input type="checkbox" value="{{ $t->id }}" class="title title1">
            <label class="text-lg text-violet-700 text1" >{{ $t->product_name }}</label>

    </tr>
    <tr>
        <hr class="w-full text-dark">
    </tr>
</table>
@endforeach

</div>


/////
<h1 class="text-2xl text-violet-900 text-center -auto font-bold mb-3.5 underline">Detail</h1>

@foreach ($detail as $d)
<table class="mb-3.5">
    <tr>
        <h1 class="text-lg text-violet-700 ">{{ $d->title }}</h1>
    </tr>
</table>
@endforeach



{{-- Certificate File --}}
public function certificatePDF($product_id){


    $mpdf = new \Mpdf\Mpdf();
    $mpdf->showImageErrors = true;
    $mpdf->debug = true;


    $certificate=donor_product::select('donor_products.*','donors.name as dname','donors.address as daddress','donors.receiver_name as dreceiver','products.product_name as pname')
                                ->join('donors','donor_products.donor_id','donors.id')
                                ->join('products','donor_products.product_id','products.id')
                                ->where('donor_products.donor_id',$product_id)
                                ->get();

    $attribute=donor_product::select('donor_products.*','donors.name as dname','donors.address as daddress','donors.receiver_name as dreceiver')
                            ->join('donors','donor_products.donor_id','donors.id')
                            ->where('donor_products.donor_id',$product_id)
                            ->first();

                            $totalPrice=0;
                            foreach($certificate as $c)
                            $totalPrice += $c->amount;

    $pdf= LaravelMpdf::loadView('admin.receipt.certificate', compact('certificate','attribute','totalPrice'),['format'=>'A4']);

    return $pdf->stream();
}



{{-- web --}}
Route::get('certificate/{product_id}',[DonorProductController::class,'certificatePDF'])->name('certificate#pdf');

/////

$certificate=donor_product::select('donor_products.*','donors.name as dname','donors.address as daddress','donors.receiver_name as dreceiver','products.product_name as pname')
                                ->join('donors','donor_products.donor_id','donors.id')
                                ->join('products','donor_products.product_id','products.id')
                                ->where('donor_products.donor_id',$product_id)
                                ->get();

    $attribute=donor_product::select('donor_products.*','donors.name as dname','donors.address as daddress','donors.receiver_name as dreceiver')
                            ->join('donors','donor_products.donor_id','donors.id')
                            ->where('donor_products.donor_id',$product_id)
                            ->first();
/////

                            <a href="{{ route('certificate#pdf',$da->product_id) }}">PDF</a>



{{-- Blade --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <link rel="stylesheet" href="{{ public_path('admin/css/next.css') }}">
</head>
<body>
    <div class="back">
        <table class="table">
            <tr>
                <td class="blank"></td>
                <td>
                     <img src="{{ public_path('admin/images/OIP (2).jpg') }}" class="image">
                </td>
            </tr>
            <tr>
                <th class="t"></th>
                <th class="text">အနုမောဒနာဂုဏ်ပြုလွှာ</th>
            </tr>
        </table>
        <table>
            <tr>
                {{-- <th class="n"></th> --}}
                <td class="title1">ရှမ်းပြည်နယ်၊ တောင်ကြီးမြို့၊ ပန်းတင်ကျေးရွာအုပ်စု၊ ပညာဗောဒိရိပ်သာလမ်း၊ ဗောဓိတောင်ကုန်း</td>
            </tr>
            <tr>
                {{-- <td class="n"></td> --}}
                <td class="title2">ကျေးဇူးတော်ရှင် ကမ္ဘာ့ဗုဒ္ဓသာသနာပြု အောက်စဖို့ဒ်ဆရာတော် ဦးစီးတည်ထောင် ဖွင့်လှစ်တော်မူသော </td>
            </tr>
            <tr>
                {{-- <td class="n"></td> --}}
                <td class="title3">ရှမ်းပြည်နယ်ဗုဒ္ဓတက္ကသိုလ် အဓွန့်ရှည်တည်တန့်နိုင်ရန်</td>
            </tr>
        </table>
        <table>

            <tr>
                <td class="cer"></td>
                <td class="certificate1">{{$attribute->daddress }} နေ</td>
            </tr>
            <tr>
                <td class="cer"></td>
                <td class="certificate2">{{$attribute->dname }} မှ</td>
            </tr>

        </table>
        {{-- <div>{{ $certificate }}</div> --}}
        <table>
            @foreach($certificate as $cer)
            <tr>
                <td class="pro">{{$cer->pname  }}အတွက် အလှူတော်ငွေ-{{$cer->amount }} </td>
            </tr>
            @endforeach
            <tr>
                <td class="pro"> စုစုပေါင်း{{ $totalPrice }} လှူဒါန်းပါသည်။</td>
            </tr>
            <tr>
                <td class="pro1">ဤကဲ့သို့ ဗုဒ္ဓမြတ်စွာ သာသနာတော်အတွက် နိဗ္ဗာန်ရည်မှန်း၍ လှူဒါန်းချီးမြှောက်ထောက်ပံ့သည့်အတွက်</td>
            </tr>
            <tr>
                <td class="pro2">ရှမ်းပြည်နယ်ဗုဒ္ဓတက္ကသိုလ်မှ ကျေးဇူးတင် ဝမ်းမြောက်ဝမ်းသာ သာဓုအနုမောဒနာခေါ်ဆို၍</td>
            </tr>
            <tr>
                <td class="pro3">ဤဂုဏ်ပြုမှတ်တမ်းလွှာဖြင့် မှတ်တမ်းတင် ဂုဏ်ပြုအပ်ပါသည်။</td>
            </tr>


        </table>

    </div>
    <div>
        <table>
            <tr>
                <td class="foot">ရှမ်းပြည်နယ်ဗုဒ္ဓတက္ကသိုလ် ဦးစီးတည်ထောင်သူ</td>
            </tr>
             <tr>
                <td class="foot1">အောက်စဖို့ဒ်ဆရာတော် ပါမောက္ခချုပ် ဒေါက်တာဘဒ္ဒန္တ ဓမ္မသာမိ,DPhil (Oxford)</td>
            </tr>
            <tr>
                <td class="foot2">အဂ္ဂမဟာသဒ္ဓမ္မဇောတိကဓဇ၊ အဂ္ဂမဟာဂန္ထဝါစကပဏ္ဍိတ၊ မဟာဓမ္မကထိကဗဟုဇနဟိတရေ</td>
            </tr>
            <tr>
                <td class="foot3">{{$attribute->created_at->Format('j-F-Y') }}</td>
            </tr>
        </table>
    </div>
</body>
</html>






{{-- Filter each  --}}
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

{{-- controller for Filter each --}}
<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Product;
use App\Models\Category;
use App\Models\TitleDetail;
use Illuminate\Http\Request;
use App\Models\product_title;

class ProductTitleController extends Controller
{
     //Create

    public function linkCreate(Request $request){

        $query=Product::query();
        $categories=Category::all();
        $details=TitleDetail::query();


            if($request->ajax()){
                $products=$query->where(['category_id'=>$request->category])->get();
                return response()->json(['products'=>$products]);
            }


            $products=$query->get();
            $detail=$details->get();
            return view('admin.link',compact('categories','products','detail'));
    }

    public function filterLink(Request $request){
        $products=Product::get();
        $query=TitleDetail::query();

        if($request->ajax()){
            $details=$query->where(['p_id'=>$request->product])->get();
            return response()->json(['title_details'=>$details]);
        }
        $details=$query->get();
        return view('admin.link',compact('products','details'));
    }

    public function allLink(Request $request){
        if($request->status=='pro'){
            $data=TitleDetail::get();
        }
        return $data;
    }

    public function allCatLink(Request $request){
        if($request->status=='cat'){
            $data=Product::get();
        }
        return $data;
    }


    public function chooseFilter(Request $request){
        $products=Product::get();
        $query=TitleDetail::query();

        if($request->ajax()){
            $details=$query->where(['p_id'=>$request->product])->get();
            return response()->json(['title_details'=>$details]);
        }
        $details=$query->get();
        return view('admin.link',compact('products','details'));
    }



}

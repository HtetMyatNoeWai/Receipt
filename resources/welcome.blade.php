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

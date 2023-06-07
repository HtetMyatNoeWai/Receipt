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

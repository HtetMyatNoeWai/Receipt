@extends('admin.title.list')
@section('title','Create Title')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('detail','အလှူပဒေသာပင် အသေးစိတ်')
@section('content')

<form action="{{ route('test#post') }}" method="post">
    @csrf
<select name="catName" id="">
    <option value="">Choose Category</option>
    @foreach ($categories as $c)
        <option value="{{ $c->id }}">{{ $c->type_of_donation }}</option>
    @endforeach
</select>
<select name="pName" id="">
    <option value="">Choose Category</option>
    @foreach ($products as $p)
        <option value="{{ $p->id }}">{{ $p->product_name }}</option>
    @endforeach
</select>
<select name="tName" id="">
    <option value="">Choose Category</option>
    @foreach ($titles as $t)
        <option value="{{ $t->id }}">{{ $t->title }}</option>
    @endforeach
</select>
<button type="submit">Save</button>
</form>

<div class="flex">
    <div>
        @foreach ($carts as $ca )
        <h1>{{ $ca->type_of_donation }}</h1>
        <h1 class="ml-3">{{ $ca->product_name }}</h1>
        <h1 class="ml-3">{{ $ca->title }}</h1><br>
    @endforeach
    </div>
    <div class="ml-72 mt-12">
        @foreach ($categories as $c)
           <input type="checkbox" class="category" value="{{ $c->id }}"> {{ $c->type_of_donation }}<br>
        @endforeach
    </div>



    <div id="tbody" class="bg-lime-100 h-auto ml-5 ">

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

                                for(let i=0;i<carts.length;i++){
                                    list+=`<p>${carts[i].product_name}</P>\
                                            <p>${carts[i].title}</p>`;


                                }
                                $("#tbody").html(list);

                    }
                });
            });
        });
    </script>
@endsection

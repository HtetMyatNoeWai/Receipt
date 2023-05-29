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

    <div class="border-2 border-violet-100 shadow-lg w-2/6 bg-violet-100 h-2/3 p-3 rounded-md ml-12 mt-3">
        <h1 class="text-2xl text-violet-900 text-center -auto font-bold mb-3.5 underline ">Category</h1>
        <h1 class="text-lg text-violet-700 mb-3.5"><a href="{{ route('link#create') }}">All</a></h1>
            @foreach ($cat as $c )
            <table class="mb-3.5">
                    <tr >
                        <a href="{{ route('link#filter',$c->id) }}" class="text-lg text-violet-700">{{ $c->type_of_donation }} </a>
                    </tr>
            </table>
            @endforeach
    </div>
    <div class="border-2 border-violet-100 shadow-lg w-2/6 ml-4 bg-violet-200  h-auto p-3 rounded-md mt-3">
        <h1 class="text-2xl text-violet-900 text-center -auto font-bold mb-3.5 underline">Title</h1>
        <h1 class="text-lg text-violet-700 "><a href="{{ route('link#create') }}">All</a></h1>
        <hr class="w-full text-dark mb-3.5">
        @foreach ($tit as $t)
        <table class="mb-3.5">
            <tr>
                <a href="{{ route('link#filterP',$t->id) }}" class="text-lg text-violet-700 ">{{ $t->product_name }}</a>
            </tr>
            <tr>
                <hr class="w-full text-dark">
            </tr>
        </table>
        @endforeach
    </div>
    <div class="border-2 border-violet-100 shadow-lg w-3/12 ml-4 bg-violet-300  h-2/3 p-3 rounded-md mr-4 mt-3">
        <h1 class="text-2xl text-violet-900 text-center -auto font-bold mb-3.5 underline">Detail</h1>

        @foreach ($det as $d)
        <table class="mb-3.5">
            <tr>
                <h1 class="text-lg text-violet-700">{{ $d->title }}</h1>
            </tr>
        </table>
        @endforeach
    </div>
</div>


@endsection

@extends('admin.cart.list')
@section('title','Receipt')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('content')
    <div class="flex">
        <img src="{{ asset('admin/images/OIP (2).jpg') }}" class="w-36 h-28 mx-auto">
    </div>
    <form action="{{ route('receipt#post') }}" method="post">
        @csrf
        @foreach ($donor as $d )
        <input type="checkbox" name="donorName" value="{{ $d->id }}">{{ $d->name }} | {{ $d->address }} | {{$d->receiver_name}}  <br>
        @endforeach
        @foreach ($product as $p)
        <input type="checkbox" name="productName" value="{{ $p->id }}"> {{ $p->product_name }}<br>
        @endforeach

    <input type="text" name="amount" class="bg-green-500">

    <button type="submit">Save</button>

</form>
    <div>
        @foreach ($data as $da )
            <h1>{{ $da->dname }} | {{ $da->daddress }} | {{$da->dreceiver}}</h1>
            <h1>{{ $da->pname }}</h1>
            <h1>{{ $da->amount }}</h1>
            <h1></h1>

           
            <a href="{{ route('receipt#pdf',$da->id) }}">Rec</a>
        @endforeach

    </div>
    <br>
    <br>
    <div>
        @foreach($donor as $donate)
        <a href="{{ route('certificate#pdf',$donate->id) }}">{{ $donate->name }}</a>
        @endforeach
    
    </div>
    <div>

    </div>

    <br>
    <br>

@endsection

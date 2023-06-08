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
                <input type="text" class="outline-none rounded-sm mt-1" name="amount">
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
                @foreach ($data as $da)
                <tr>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold">{{ $da->dname }}</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold">{{ $da->pname }}</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold">{{ $da->amount }}</td>
                    <td class="border-2 border-gray-200 py-2 px-3 bg-lime-200 font-bold text-center">
                        <a href="{{ route('receipt#pdf',$da->id) }}"> 
                            <i class="fa-solid fa-file-pdf mr-3">
                            </i>
                        </a>
                        <i class="fa-solid fa-pen-nib mr-3" >
                        </i>
                        <i class="fa-solid fa-trash duration-150 " >
                        </i>
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
    <div class="bg-green-700 w-3/12  rounded-md ">
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

@extends('admin.cart.list')
@section('title','Donor')
@section('receipt','Receipt')
@section('something','Category')
@section('nothing','Detail')
@section('anything','Title')
@section('everything','Donor')
@section('content')
    <div >
        <img src="{{ asset('admin/images/OIP (2).jpg') }}" class="w-36 h-28 mx-auto">
    </div>
    <div class="mt-3 flex ">
        <form action="{{ route('Donor#posting') }}" method="post" class="w-1/2 mt-8">
            @csrf
            <div class="ml-32">
                <label class="shadow-sm text-gray-700" >Name</label>
                <div class="mt-1.5">
                        <input class="mb-4 py-2 px-2.5 bg-green-50 border-2 border-blue-500 rounded-lg text-md w-3/5 outline-none shadow-md" type="text" name="donorName" placeholder="Enter Name">
                </div>
                <label class="shadow-sm text-gray-700">Address</label>
                <div class="mt-1.5">
                        <input class="mb-4 py-2 px-2.5 bg-green-50 border-2 border-blue-500 rounded-lg text-md w-3/5 outline-none shadow-md" type="text" name="donorAddress" placeholder="Enter Address">
                </div>
                <label class="shadow-sm text-gray-700">Receiver</label>
                <div class="mt-1.5">
                        <input class="mb-4 py-2 px-2.5 bg-green-50 border-2 border-blue-500 rounded-lg text-md w-3/5 outline-none shadow-md" type="text" name="donorReceiver" placeholder="Enter Receiver Name">
                </div>
                <div class="ml-32">
                    <button type="submit" class="shadow-md py-2 px-3.5 text-center text-md border-2 border-green-100 bg-indigo-600 rounded-md text-white font-bold">Save</button>
                </div>
            </div>

        </form>

            <div class="mt-6 ml-10 w-1/2">
                @foreach ($posting as $pose)
                    <div class="flex-col">
                        <table class="w-4/5 mb-4 ">
                            <tr>
                                <td class="w-2/5">Name</td>
                                <td class="w-3/5 text-center">{{ $pose->name }}</td>
                            </tr>
                            <tr>
                                <td class="w-2/5">Address</td>
                                <td class="w-3/5 text-center">{{ $pose->address }}</td>
                            </tr>
                            <tr >
                                <td class="w-2/5">Receiver</td>
                                <td class="w-3/5 text-center">{{ $pose->receiver_name }}</td>
                            </tr>
                            <tr class="border-b-2 border-gray-200">

                            </tr>
                        </table>
                    </div>
                @endforeach
            </div>
@endsection

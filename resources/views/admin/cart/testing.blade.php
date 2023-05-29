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

<table>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Address</th>
        <th>Receiver</th>
        <th>Product</th>
        <th>Amount</th>
        <th>Total</th>

    </tr>
    <tr>
        <td>{{$connect->id}}</td>
        <td>{{ $donors->name }}</td>
        <td>{{ $donors->address }}</td>
        <td>{{ $donors->receiver_name }}</td>
        <td>{{ $products->product_name }}</td>
        <td>{{ $connect->amount }}</td>
        <td>0</td>
    </tr>
</table>


@endsection

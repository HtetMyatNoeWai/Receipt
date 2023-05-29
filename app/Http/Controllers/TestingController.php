<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\donor;
use App\Models\Product;
use Illuminate\Http\Request;

class TestingController extends Controller

{//Testing Page Create
    public function createtesting(){
        $donors=donor::select('donors.id','donors.name','donors.address','donors.receiver_name')->get();
        $products=Product::select('products.id','products.product_name')->get();
        $connect=Cart::select('carts.*','donors.name','donors.address','donors.receiver_name','products.product_name')
                    ->join('donors','carts.donor_id','donors.id')
                    ->join('products','carts.product_id','products.id')
                    ->get();
        return view('admin.cart.testing',compact('donors','products','connect'));
    }

    //Post testing
    public function postTesting(Request $request){
        $data=$this->createDonor($request);
     Cart::create($data);
     return redirect()->route('$data');
}


private function createDonor($request){
    return[
        'donor_id'=>$request->donorName,
        'donor_id'=>$request->donorAddress,
        'donor_id'=>$request->donorReceiver,
        'product_id'=>$request->productName,
        'amount'=>$request->amount,
        'total'=>'0',
       ];

}


// public function createtesting(){
//     $donor=donor::select('donors.id','donors.name','donors.address','donors.receiver_name')->get();
//     $product=Product::select('products.id','products.product_name')->get();
//     $connect=Cart::select('carts.*','donors.name','donors.address','donors.receiver_name','products.product_name')
//                 ->join('donors','carts.donor_id','donors.id')
//                 ->join('products','carts.product_id','products.id')
//                 ->get();
//     return view('admin.donor.donation',compact('connect','product','donor'));
// }

// public function postTesting(Request $request){
//     $data=$this->creationDonor($request);
//     Cart::create($data);
//     return redirect()->route('Donor#create');
// }

// private function creationDonor($request){
//     return[
//         'amount'=>$request->amount,
//         'donor_id'=>$request->donorName,
//         'product_id'=>$request->productName,
//         'total'=>'0',

//     ];
// }

}

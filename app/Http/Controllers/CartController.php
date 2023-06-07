<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Cart;
use App\Models\donor;

// use Barryvdh\DomPDF\Facade\PDF;

use App\Models\Product;
use App\Models\Category;
use App\Models\donor_product;
use App\Models\TitleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

class CartController extends Controller
{
    //Post Cart
    public function createCart(){
        $cat=Category::select('categories.id','categories.type_of_donation')->get();
        $pro=Product::select('products.id','products.product_name')->get();
        $det=TitleDetail::select('title_details.id','title_details.title')->get();
        // $dor=donor::select('donor.id','donor.name','donor.address','donor.receiver_name');
        $rec=Cart::select('carts.*','categories.type_of_donation','products.product_name','title_details.title')
                ->join('categories','carts.category_id','categories.id')
                ->join('products','carts.product_id','products.id')
                ->join('title_details','carts.title_id','title_details.id')
                // ->join('donor','carts.donor_id','donor.id')
                ->orderBy('carts.id','desc')
                ->paginate(10);
        return view('admin.cart.cartCreate',compact('cat','pro','det','rec'));
    }

    //Create Cart
    public function cartPost(Request $request){
        $this->cartValidate($request);
        $cartData=$this->cartCreate($request);
        Cart::create($cartData);
        return redirect()->route('cart#create');
    }

    //Delete Cart
    public function cartDelete($id){
        Cart::where('id',$id)->delete();
        return back();
    }

    //Update Cart
    public function cartUpdate(Request $request){
        $this->cartValidate($request);
        $updateData=$this->cartCreate($request);
        Cart::where('id',$request->cartId)->update($updateData);
        return redirect()->route('cart#create');
    }


    private function cartValidate($request){
        Validator::make($request->all(),[
            'cart_name'=>'required|min:3',
            'address'=>'required',
            'amount'=>'required',
            'receiver'=>'required|min:3',

        ]);
    }

    private function cartCreate($request){
        return[
            'category_id'=>$request->categoryName,
            'product_id'=>$request->productName,
            'title_id' =>$request->detailsName,
            'name'=>$request ->cart_name,
            'address'=>$request->address,
            'amount'=>$request->amount,
            'receiver_name'=>$request->receiver,
        ];
    }



    // public function viewPDF(){
    //     $users=Cart::get();
    //     $pdf=PDF::loadView('admin.receipt.receiptCreate',compact('users'))->setPaper('A4', 'landscape');
    //     return $pdf->stream();
    // }

    public function receiptPDF($id){



        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        $mpdf->debug = true;


        $users=Cart::select('carts.*','categories.type_of_donation','products.product_name','title_details.title')
                ->join('categories','carts.category_id','categories.id')
                ->join('products','carts.product_id','products.id')
                ->join('title_details','carts.title_id','title_details.id')
                ->where('carts.id',$id)
                ->first();

        $pdf= LaravelMpdf::loadView('admin.receipt.receiptCreate', compact('users'),['format'=>'A5']);

        return $pdf->stream();


    }

    // Certificate Create
    public function certificatePDF($id){


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        $mpdf->debug = true;


        $certificate=Cart::select('carts.*','categories.type_of_donation','products.product_name','title_details.title')
                ->join('categories','carts.category_id','categories.id')
                ->join('products','carts.product_id','products.id')
                ->join('title_details','carts.title_id','title_details.id')
                ->where('carts.id',$id)
                ->first();

        $pdf= LaravelMpdf::loadView('admin.receipt.certificate', compact('certificate'),['format'=>'A4']);

        return $pdf->stream();
    }



}



<?php

namespace App\Http\Controllers;

use App\Models\donor;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\donor_product;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

class DonorProductController extends Controller
{
    //Create Receipt
    public function createReceipt(){
        $donor=donor::select('donors.id','donors.name','donors.address','donors.receiver_name')
                    ->orderBy('donors.id','desc')
                    ->get();
        $product=Product::select('products.id','products.product_name')->get();
        $data=donor_product::select('donor_products.*','donors.name as dname','donors.address as daddress','donors.receiver_name as dreceiver','products.product_name as pname')
                            ->join('donors','donor_products.donor_id','donors.id')
                            ->join('products','donor_products.product_id','products.id')
                            ->orderBy('donors.id','desc')
                            ->paginate(20);




        return view('admin.receipt.receipt',compact('donor','product','data'));
    }

    //Post Recipt
    public function postReceipt(Request $request){
        $receipt=$this->creationReceipt($request);
        donor_product::create($receipt);
        return redirect()->route('receipt#create');
    }


    private function creationReceipt($request){
        return[
            'donor_id'=>$request->donorName,
            'product_id'=>$request->productName,
            'amount'=>$request->amount,

        ];
    }

// Certificate Create
public function certificatePDF($donorId){


    $mpdf = new \Mpdf\Mpdf();
    $mpdf->showImageErrors = true;
    $mpdf->debug = true;


    $data=donor_product::select('donor_products.*','donors.name as dname','donors.address as daddress','donors.receiver_name as dreceiver','products.product_name as pname')
                        ->join('donors','donor_products.donor_id','donors.id')
                        ->join('products','donor_products.product_id','products.id')
                        ->where('donor_id',$donorId)->get();


    $donor=donor_product::select('donor_products.*','donors.name as dname','donors.address as daddress','donors.receiver_name as dreceiver')
                        ->join('donors','donor_products.donor_id','donors.id')
                        ->where('donor_id',$donorId)->first();

        $totalPrice=0;
        foreach($data as $c)
        $totalPrice += $c->amount;

$pdf= LaravelMpdf::loadView('admin.receipt.certificate', compact('donor','data','totalPrice'),['format'=>'A4']);

return $pdf->stream();
}


public function receiptPDF($id){


    $mpdf = new \Mpdf\Mpdf();
    $mpdf->showImageErrors = true;
    $mpdf->debug = true;

    $users=donor_product::select('donor_products.*','donors.name as dname','donors.address as daddress','donors.receiver_name as dreceiver','products.product_name as pname')
                        ->join('donors','donor_products.donor_id','donors.id')
                        ->join('products','donor_products.product_id','products.id')
                        ->where('donor_products.id',$id)
                        ->first();





    $pdf= LaravelMpdf::loadView('admin.receipt.receiptCreate', compact('users'),['format'=>'A4']);

    return $pdf->stream();
}






}

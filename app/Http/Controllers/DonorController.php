<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\donor;
use App\Models\Product;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    //Create Donor
    public function createDonor(){

         $posting=donor::paginate(3);

        return view('admin.donor.donation',compact('posting'));
    }

    //Creation Donor
    public function postingDonor(Request $request){


        $data=$this->donorCreation($request);

        donor::Create($data);



       return redirect()->route('Donor#create');
    }

    //Delete Donor
    public function deleteDonor($id){
        donor::where('id',$id)->delete();
        return redirect()->route('Donor#create');
    }

    //Update Donor
    public function updateDonor(Request $request){
        $change=$this->donorCreation($request);
        donor::where('id',$request->donorId)->update($change);
        return redirect()->route('Donor#create');
    }

    private function donorCreation($request){

        return[
            'name'=>$request->donorName,
            'address'=>$request->donorAddress,
            'receiver_name'=>$request->donorReceiver,

        ];
    }



}

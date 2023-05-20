<?php

namespace App\Http\Controllers;

use App\Models\donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    //create
    public function createDonor(){
        $posting=donor::get();
        return view('admin.donor.donation',compact('posting'));
    }

    //creation
    public function postingDonor(Request $request){
       $donate= $this->donorCreation($request);
       donor::create($donate);
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

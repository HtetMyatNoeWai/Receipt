<?php

use App\Models\Category;
use App\Models\TitleDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorProductController;
use App\Http\Controllers\ProductTitleController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TitleDetailController;
use App\Models\Cart;
use GuzzleHttp\Middleware;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login+register
Route::redirect('/','loginPage');
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('auth#dashboard');
    // Create Category
    Route::group(['prefix'=>'category','middleware'=>'admin_middleware'],function(){

        Route::get('create',[CategoryController::class,'create'])->name('auth#category');
        // Route::get('addCategory',[CategoryController::class,'addCategory'])->name('auth#add');
        Route::post('postCategory',[CategoryController::class,'postCategory'])->name('auth#post');

        //  Delete Category
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('auth#delete');

        // Update Category
        Route::post('update',[CategoryController::class,'update'])->name('auth#update');
    });


    Route::group(['prefix'=>'title','middleware'=>'admin_middleware'],function(){


        // Create Title Page
        Route::get('createTitle',[ProductController::class,'createPage'])->name('title#create');
        // Route::get('addTitle',[ProductController::class,'addTitle'])->name('title#add');
        Route::post('postTitle',[ProductController::class,'postTitle'])->name('title#post');

        //Delete Title Page
        Route::get('deleteTitle/{id}',[ProductController::class,'deleteTitle'])->name('title#delete');

        //Update Category
        Route::post('updateTitle',[ProductController::class,'updateTitle'])->name('title#update');
    });




    //Title Details
    Route::group(['prefix'=>'titledetails','middleware'=>'admin_middleware'],function(){
        //Create Title Details
        Route::get('createDetail',[TitleDetailController::class,'createDetail'])->name('detail#create');

        //Post Title Details
        Route::post('postDetail',[TitleDetailController::class,'postDetail'])->name('detail#post');

        //Delete Title Details
        Route::get('deleteDetail/{id}',[TitleDetailController::class,'deleteDetail'])->name('detail#delete');

        //Update Title Details
        Route::post('updateDetail',[TitleDetailController::class,'updateDetail'])->name('detail#update');
    });


    //Cart Page
    Route::group(['prefix'=>'Cart','middleware'=>'admin_middleware'],function(){

        //Create Cart Page
        Route::get('createCart',[CartController::class,'createCart'])->name('cart#create');

        //Post Cart
        Route::post('cartPost',[CartController::class,'cartPost'])->name('cart#post');

        //Delete Cart
        Route::get('cartDelete/{id}',[CartController::class,'cartDelete'])->name('cart#delete');

        //Update Cart
        Route::post('cartUpdate',[CartController::class,'cartUpdate'])->name('cart#update');

        // //PDF
        // Route::post('view-pdf',[CartController::class,'viewPDF'])->name('view-pdf');


        Route::get('receiptPDF/{id}',[CartController::class,'receiptPDF'])->name('receipt#pdf');

        Route::get('certificate/{id}',[CartController::class,'certificatePDF'])->name('certificate#pdf');
    });



        //Donor
        Route::group(['prefix'=>'Donor','middleware'=>'admin_middleware'],function(){

            //Create Donor
            Route::get('createDonor',[DonorController::class,'createDonor'])->name('Donor#create');

            //Post Donor
            Route::post('postingDonor',[DonorController::class,'postingDonor'])->name('Donor#posting');

            //Delete Donor
            Route::get('deleteDonor/{id}',[DonorController::class,'deleteDonor'])->name('Donor#delete');

            //Update Donor
            Route::post('updateDonor',[DonorController::class,'updateDonor'])->name('Donor#update');

        });

    //Receipt Page
    Route::group(['prefix'=>'Receipt','middleware'=>'admin_middleware'],function(){

        //Create Receipt
        Route::get('createReceipt',[DonorProductController::class,'createReceipt'])->name('receipt#create');

        //Post Receipt
        Route::post('postReceipt',[DonorProductController::class,'postReceipt'])->name('receipt#post');

        //PDF
        Route::get('certificate/{product_id}',[DonorProductController::class,'certificatePDF'])->name('certificate#pdf');

        Route::get('receiptPDF/{id}',[DonorProductController::class,'receiptPDF'])->name('receipt#pdf');
    });




    //Join Table
    Route::group(['prefix'=>'Tables','middleware'=>'admin_middleware'],function(){

      

        Route::get('linkCreate',[ProductTitleController::class,'linkCreate'])->name('link#create');

        Route::get('filter/{id}',[ProductTitleController::class,'filter'])->name('link#filter');

        Route::get('filterP/{id}',[ProductTitleController::class,'filterP'])->name('link#filterP');

        // Route::get('linkPost',[ProductController::class,'linkPost'])->name('link#post');
    });



});

Route::group(['prefix'=>'user','middleware'=>'user_middleware'],function(){
    Route::get('home',function(){
        return view('user.home');
    })->name('user#home');
});





// Route::get('/test', function () {
//     $pdf = LaravelMpdf::loadHTML("ကခဂဃင");
//     return $pdf->stream('myanmar test');
// });

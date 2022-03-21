<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\RegistrationController;
use App\Models\Customers;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RelationController;
use Illuminate\Http\Request;

Route::get('/',function(){
    return view('index');
});
Route::get('/course',SingleActionController::class);
Route::get('/register',[RegistrationController::class,'index']);
Route::post('/register',[RegistrationController::class,'register']);
Route::get('/upload',[UploadController::class,'index']);
Route::post('/upload',[UploadController::class,'create']);
Route::get('/show',[UploadController::class,'showAll']);
Route::get('/l',function(){
    return view('livesearch');
});
Route::get('/search',[CustomerController::class,'search'])->name('liveSearch');
Route::group(['prefix'=>'/customer'],function(){

    Route::get('create',[CustomerController::class,'create'])->name('customer.create');
    Route::post('/',[CustomerController::class,'store']);
    Route::get('view',[CustomerController::class,'show'])->name('customer.view');
    Route::get('delete/{id}',[CustomerController::class,'destroy'])->name('customer.delete');
    Route::get('edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::post('update/{id}',[CustomerController::class,'update'])->name('customer.update');
    Route::get('trash',[CustomerController::class,'trash'])->name('customer.trash');
    Route::get('restore/{id}',[CustomerController::class,'restore'])->name('customer.restore');
    Route::get('forcedelete/{id}',[CustomerController::class,'forcedelete'])->name('customer.forcedelete');

});

Route::get('/data',[RelationController::class,'index']);

Route::get('/get-all-session',function(){
    $session = session()->all();
    p($session);
});



Route::get('set-session',function(Request $request){
    $request->session()->put('username','afser');
    $request->session()->put('user_id','123');
    $request->session()->flash('statu','success');
    return redirect('get-all-session');
});

Route::get('destroy-session',function(){
    //session()->forget('username');
   session()->forget(['username','user_id']);
   // session()->flush();

    return redirect('get-all-session');
});

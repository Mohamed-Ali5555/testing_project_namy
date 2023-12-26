<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function(){
    Route::get('login',[\App\Http\Controllers\Admin\loginController::class,'show_login_view'])->name('admin.showlogin');
    Route::post('login',[\App\Http\Controllers\Admin\loginController::class,'login'])->name('admin.login');

});

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){
    Route::get('logout',function(){
      auth()->logout();
  });

  Route::get('/',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');
  Route::get('logout',[\App\Http\Controllers\Admin\loginController::class,'logout'])->name('admin.logout');

  Route::resource('admin-view',\App\Http\Controllers\Admin\AdminController::class);

});
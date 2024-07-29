<?php

use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', function(){
    try {
        Mail::to('freedom01022001@gmail.com')->send(new ContactMailable());
        return "Mensaje enviado";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

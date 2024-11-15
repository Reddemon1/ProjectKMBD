<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PendingController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Article;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Production;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'dashboard')->name('dashboard');
Route::get('/', function () {
    return view('Home', ['title'=>'Home Page']);
})->name("home");

Route::get('/Login', function () {
    return view('auth.Login', ['title'=>'Login Page']);
});
Route::get('/Register', function () {
    return view('auth.Register', ['title'=>'Register Page']);
});


Route::post('/RequestLogin', [UserController::class,'login'])->name('RequestLogin');
Route::post('/RequestRegister', [UserController::class,'register'])->name('RequestRegister');
Route::get('/logout', [UserController::class,'logout'])->name('logout');


Route::get('/AboutUs', function () {
    return view('AboutUs',['title'=>'About Us']);
});

Route::get('/Production', function () {
    return view('Production',['title'=>'Production']);
});

Route::get('/Events', function () {
    return view('Events',['title'=>'Events']);
});
Route::get('/Article', function () {
    return view('Article',['title'=>'Article','datas' => Article::all()]);
});

Route::get('/Partner', function () {
    return view('Partner',['title'=>'Partner']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware([RoleMiddleware::class.':admin:aktivis'])->prefix("Control-Panel")->group(function(){
    Route::get('/', function () {
        return view("admin/Admin");
    });

    Route::get('/about-us', function(){
        return view("admin/Admin");
    })->name('about-us');

    Route::prefix("admin-article")->group(function(){
        Route::get('/all-articles', [ArticleController::class,'index'])->name("all-articles");
        Route::get('/add-article', [ArticleController::class,'create'])->name("add-new-article");
        Route::get('/edit-article/{id}', [ArticleController::class,'edit'])->name("edit-article");


        Route::delete('/req-delete-article/{id}', [ArticleController::class,'destroy'])->name("req-delete-article");
        Route::post('/req-new-article',[ArticleController::class,"store"])->name('req-new-article');
        Route::put('/req-edit-article/{id}',[ArticleController::class,"update"])->name('req-edit-article');
        // Route::post('/req-new-article',[ArticleController::class,"store"]);
    });


    Route::prefix("admin-event")->group(function(){
        Route::get('/all-events', [EventController::class,'index'])->name("all-events");
        Route::get('/add-event', [EventController::class,'create'])->name("add-new-event");
        Route::get('/edit-event/{id}', [EventController::class,'edit'])->name("edit-event");

        Route::get('/pending-event', [PendingController::class,'index'])->name("pending-event-req");
        Route::post('/change-status/{id}', [PendingController::class,'updateStatus'])->name("change-status");
        Route::post('/update-message/{id}', [PendingController::class,'updateMessage'])->name("update-message");


        Route::delete('/req-delete-event/{id}', [EventController::class,'destroy'])->name("req-delete-event");
        Route::post('/req-new-event',[EventController::class,"store"])->name('req-new-event');
        Route::put('/req-edit-event/{id}',[EventController::class,"update"])->name('req-edit-event');
        // Route::post('/req-new-article',[ArticleController::class,"store"]);
    });


    Route::prefix("admin-production")->middleware(RoleMiddleware::class.':admin')->group(function(){
        Route::get('/all-productions', function() {
            $datas = Production::all();
            return view("admin/production/allproduction",compact('datas'));
        })->name("all-productions");
        Route::get('/add-production', function(){
            return view("admin/production/addproduction");
        })->name("add-new-production");
        Route::get('/delete-production/{id}', function($id){
            return view("admin/production/deleteproduction");
        })->name("delete-production");
        Route::get('/edit-production/{id}', function($id){
            return view("admin/production/editproduction");
        })->name("edit-production");

        Route::post('/req-new-production',[ProductionController::class,"store"]);
        Route::post('/req-edit-production',[ProductionController::class,"store"]);
        Route::post('/req-new-production',[ProductionController::class,"store"]);
    });

    Route::prefix("admin-partner")->middleware(RoleMiddleware::class.':admin')->group(function(){
        Route::get('/all-partners', function() {
            $datas = Partner::all();
            return view("admin/partner/allpartner",compact('datas'));
        })->name("all-partners");
        Route::get('/add-partner', function(){
            return view("admin/partner/addpartner");
        })->name("add-new-partner");
        Route::get('/delete-partner/{id}', function($id){
            return view("admin/partner/deletepartner");
        })->name("delete-partner");
        Route::get('/edit-partner/{id}', function($id){
            return view("admin/partner/editpartner");
        })->name("edit-partner");

        Route::post('/req-new-partner',[PartnerController::class,"store"]);
        Route::post('/req-edit-partner',[PartnerController::class,"store"]);
        Route::post('/req-new-partner',[PartnerController::class,"store"]);
    });

    Route::prefix("admin-production")->group(function(){
        Route::get('/all-productions', function() {
            $datas = Production::all();
            return view("admin/production/allproduction",compact('datas'));
        })->name("all-production");
        Route::get('/add-production', function(){
            return view("admin/production/addproduction");
        })->name("add-new-production");
        Route::get('/delete-production/{id}', function($id){
            return view("admin/production/deleteproduction");
        })->name("delete-production");
        Route::get('/edit-production/{id}', function($id){
            return view("admin/production/editproduction");
        })->name("edit-production");

        Route::post('/req-new-production',[ProductionController::class,"store"]);
        Route::post('/req-edit-production',[ProductionController::class,"store"]);
        Route::post('/req-new-production',[ProductionController::class,"store"]);
    });
});


require __DIR__.'/auth.php';

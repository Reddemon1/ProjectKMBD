<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PendingController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth as MiddlewareAuth;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Article;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Pending;
use App\Models\Production;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'dashboard')->name('dashboard');
Route::get('/', function () {
        $article = Article::all()->take(4);
        $event = Event::all()->take(4);
        $production = Production::all()->take(4);
        $partner = Partner::all()->take(4);
    return view('Home',compact(['article','event','production','partner']));
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
    $production = Production::all();
    return view('Production',compact('production'));
});

Route::get('/Events', function () {
    $event = Event::all()->take(4);
    return view('Events',compact('event'));
});
Route::get('/Article', function () {
    return view('Article',['title'=>'Article','datas' => Article::all()]);
});

Route::get('/Partner', function () {
        $partner = Partner::all()->take(4);
    return view('Partner',compact('partner'));
});


Route::middleware(MiddlewareAuth::class)->group(function() {
    Route::get('/article-detail/{id}',[ArticleController::class,'show'])->name('article-detail');
    Route::get('/event-detail/{id}',[EventController::class,'show'])->name('event-detail');
    
});


Route::middleware([RoleMiddleware::class.':admin:aktivis'])->prefix("Control-Panel")->group(function(){
    Route::get('/', function () {
        if(Auth::user()->role == 'admin'){
            $article = Article::all()->take(4);
            $event = Event::all()->take(4);
            $production = Production::all()->take(4);
            $partner = Partner::all()->take(4);
            return view("admin/Admin", compact(['article','event','production','partner']));
        }else{
            $event = Event::where('user_id','=',Auth::id())->get()->take(4);
            return view("admin/Admin", compact(['event']));
        }
    });

    Route::middleware([RoleMiddleware::class.':admin'])->group(function(){
        Route::get('/about-us', [OrganizationController::class,'index'])->name('about-us');
        Route::put('/req-edit-about', [OrganizationController::class,'update'])->name('req-edit-about');
    });
    

    Route::middleware([RoleMiddleware::class.':admin'])->prefix("admin-article")->group(function(){
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
        Route::middleware([RoleMiddleware::class.':admin'])->group(function() {
            Route::get('/edit-event/{id}', [EventController::class,'edit'])->name("edit-event");
            Route::put('/req-edit-event/{id}',[EventController::class,"update"])->name('req-edit-event');
            Route::delete('/req-delete-event/{id}', [EventController::class,'destroy'])->name("req-delete-event");
            Route::post('/change-status/{id}', [PendingController::class,'updateStatus'])->name("change-status");
            Route::post('/update-message/{id}', [PendingController::class,'updateMessage'])->name("update-message");    
        });
        Route::get('/edit-pending-event/{id}', [PendingController::class,'edit'])->name("edit-pending-event");
        Route::get('/pending-event', [PendingController::class,'index'])->name("pending-event-req");
        Route::put('/req-edit-pending-event/{id}',[PendingController::class,"update"])->name('req-edit-pending-event');
        Route::delete('/req-delete-pending-event/{id}',[PendingController::class,"destroy"])->name('req-delete-pending-event');
        
        Route::post('/req-new-event',[EventController::class,"store"])->name('req-new-event');
        // Route::post('/req-new-article',[ArticleController::class,"store"]);
    });


    Route::middleware([RoleMiddleware::class.':admin'])->prefix("admin-partner")->group(function(){
        Route::get('/all-partners', [PartnerController::class,'index'])->name("all-partners");
        Route::get('/add-partner', [PartnerController::class,'create'])->name("add-new-partner");
        Route::get('/edit-partner/{id}', [PartnerController::class,'edit'])->name("edit-partner");

        Route::delete('/req-delete-partner/{id}', [PartnerController::class,'destroy'])->name("req-delete-partner");
        Route::post('/req-new-partner',[PartnerController::class,"store"])->name('req-new-partner');
        Route::put('/req-edit-partner/{id}',[PartnerController::class,"update"])->name('req-edit-partner');
        // Route::post('/req-new-article',[ArticleController::class,"store"]);
    });

    Route::middleware([RoleMiddleware::class.':admin'])->prefix("admin-production")->group(function(){
        Route::get('/all-productions', [ProductionController::class,'index'])->name("all-productions");
        Route::get('/add-production', [ProductionController::class,'create'])->name("add-new-production");
        Route::get('/edit-production/{id}', [ProductionController::class,'edit'])->name("edit-production");

        Route::delete('/req-delete-production/{id}', [ProductionController::class,'destroy'])->name("req-delete-production");
        Route::post('/req-new-production',[ProductionController::class,"store"])->name('req-new-production');
        Route::put('/req-edit-production/{id}',[ProductionController::class,"update"])->name('req-edit-production');
        // Route::post('/req-new-article',[ArticleController::class,"store"]);
    });
});


require __DIR__.'/auth.php';

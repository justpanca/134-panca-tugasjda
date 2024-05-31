<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\UserIsLoggedIn;
use App\Http\Middleware\UserRole;


Route::middleware(UserIsLoggedIn::class)->group(function() {
    Route::controller(CarController::class)->group(function() {
        Route::get("/", "index")->name("homepage");
        Route::get("/courses/{id}", "detail")->name("courses-detail");
        Route::get("/courses", "show")->name("courses");
        
        Route::middleware(UserRole::class)->group(function() {
            Route::get("/add", "create")->name("add");
            Route::post("/add", "store")->name("car-store");
            Route::get("/edit/{id}", "edit")->name("car.edit");
            Route::patch("/edit/{id}", "update")->name("car-update");
            Route::get("/delete/{id}", "delete")->name("car.delete");
            Route::delete("/delete/{id}", "destroy")->name("car-destroy");
        });
    });

    Route::controller(TransactionController::class)->group(function() {
        Route::get("/transaction", "index")->name("transaction");
        Route::post("/car/{id}", "store")->name("transaction-store");
        Route::patch("/transaction", "update")->name("transaction-update")->middleware(UserRole::class);
    });

});

Route::controller(AuthController::class)->group(function() {
    Route::get("/login", "loginPage")->name("login-page");
    Route::post("/login", "login")->name("login");
    Route::get("/signup", "signupPage")->name("signup-page");
    Route::post("/signup", "signup")->name("signup");
    Route::get("/logout", "logout")->name("logout")->middleware(UserIsLoggedIn::class);
});

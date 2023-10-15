<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Product;

// User routes

Route::get(
    "/register", function () {
        return view('signup');
    }
)->name("register");

Route::post("/signup", [User::class , 'register']);
Route::get("/login", [User::class, "visitLogin"])->name("login");
Route::post("/login", [User::class, "signin"]);

Route::get("/", [User::class, "visitHomepage"])->name("homepage");
Route::get("/product/{id}", [Product::class, "visitProduct"])->name("product");

Route::get(
    "/logout", function () {
        session()->forget('userId');
        return redirect()->route('login');
    }
)->name("logout");


// Admin routes

Route::get("/admin-login", [Admin::class, "visitLogin"])->name("adminlogin");
Route::post("/admin-login", [Admin::class, 'login']);

Route::post("/admin-register", [Admin::class , 'register']);
Route::get(
    "/admin-register", function () {
        return view('adminregister');
    }
)->name("adminregister");

Route::get("/dashboard", [Admin::class, "visitDashboard"])->name("dashboard");

Route::get(
    "/addproduct", function () {
        $adminId = session()->get('adminId');
        if(!$adminId){
            return redirect()->route('adminlogin');
        }
        return view("addproduct");
    }
)->name("addproduct");

Route::get(
    "/manage-product", [Product::class, "manageProducts"]
)->name("manageproduct");

Route::post("/addproduct", [Product::class, 'addProduct']);
Route::get("/editproduct/{id}", [Product::class, 'editProduct'])->name("editproduct");
Route::post("/editproduct/{id}", [Product::class, 'updateProduct'])->name("updateproduct");

Route::get("/deleteproduct/{id}", [Product::class , "deleteProduct"])->name("deleteproduct");

Route::get(
    "/admin-logout", function () {
        session()->forget('adminId');
        return redirect()->route('adminlogin');
    }
)->name("admin-logout");

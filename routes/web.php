<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = [];
    if(auth()->check()){
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

Route::post("/register", [UserController::class, "register"]);
Route::post("/logout", [UserController::class, "logout"]);
Route::post("/login", [UserController::class, "login"]);

Route::post("/create-post", [PostController::class, "createPost"]);
Route::get("/edit-post/{post}", [PostController::class, "showEditPost"]);
Route::put("/edit-post/{post}", [PostController::class, "updatePost"]);
Route::delete("/edit-post/{post}", [PostController::class, "deletePost"]);


<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\MailchimpNewsletter;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post("newsletter", NewsletterController::class);

Route::get('/', [PostController::class, "index"])->name("home");
Route::get("posts/{post:slug}", [PostController::class, "show"]);

Route::post("posts/{post:slug}/comments", [PostCommentsController::class, "store"]);

Route::get("register", [RegisterController::class, "create"])->middleware("guest");
Route::post("register", [RegisterController::class, "store"])->middleware("guest");

Route::get("login", [SessionsController::class, "create"])->middleware("guest");
Route::post("sessions", [SessionsController::class, "store"])->middleware("guest");
Route::post("logout", [SessionsController::class, "destroy"])->middleware("auth");

// Admin
Route::get("admin/posts/create", [AdminPostController::class, "create"])->middleware("admin");
Route::post("admin/posts", [AdminPostController::class, "store"])->middleware("admin");
Route::get("admin/posts", [AdminPostController::class, "index"])->middleware("admin");
Route::get("admin/posts/{post}/edit", [AdminPostController::class, "edit"])->middleware("admin");
Route::patch("admin/posts/{post}", [AdminPostController::class, "update"])->middleware("admin");
Route::delete("admin/posts/{post}", [AdminPostController::class, "destroy"])->middleware("admin");
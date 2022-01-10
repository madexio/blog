<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
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

Route::post("newsletter", function () {
    request()->validate(["email" => "required|email"]);
    $client = new \MailchimpMarketing\ApiClient();

    $client->setConfig([
        'apiKey' => config("services.mailchimp.key"),
        'server' => "us20",
    ]);

    try
    {
        $response = $client->lists->addListMember("d0bf16600d", [
            "email_address" => request("email"),
            "status"        => "subscribed",
        ]);
    } catch (\Exception $e)
    {
        throw \Illuminate\Validation\ValidationException::withMessages([
            "email" => "This email could not be added to our newsletter list"
        ]);
    }

    return redirect("/")->with("success", "Thank you for signing up for our newsletter");
});

Route::get('/', [PostController::class, "index"])->name("home");
Route::get("posts/{post:slug}", [PostController::class, "show"]);
Route::post("posts/{post:slug}/comments", [PostCommentsController::class, "store"]);

Route::get("register", [RegisterController::class, "create"])->middleware("guest");
Route::post("register", [RegisterController::class, "store"])->middleware("guest");

Route::get("login", [SessionsController::class, "create"])->middleware("guest");
Route::post("sessions", [SessionsController::class, "store"])->middleware("guest");
Route::post("logout", [SessionsController::class, "destroy"])->middleware("auth");
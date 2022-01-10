<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(["email" => "required|email"]);
        $client = new ApiClient();

        $client->setConfig([
            'apiKey' => config("services.mailchimp.key"),
            'server' => "us20",
        ]);

        try
        {
            $newsletter->subscribe(request("email"));
        } catch (\Exception $e)
        {
            throw ValidationException::withMessages([
                "email" => "This email could not be added to our newsletter list",
            ]);
        }

        return redirect("/")->with("success", "Thank you for signing up for our newsletter");
    }
}

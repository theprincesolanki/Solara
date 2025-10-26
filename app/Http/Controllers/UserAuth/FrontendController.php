<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Enquiry;

class FrontendController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contact_submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => [
                'required',
                'regex:/^\+?[0-9]{9,15}$/',
                function ($attribute, $value, $fail) {
                    if (preg_match('/^(123456789|111111111|000000000)$/', $value)) {
                        $fail('Please enter a valid phone number.');
                    }
                },
            ],

            'subject' => 'required|string|in:General Inquiry,Support / Help,Other',
            'note' => 'required|string',
        ]);

        try {
            Enquiry::create($validated);

            // Mail::send('emails.contact', ['data' => $validated], function ($message) use ($validated) {
            //     $message->to('ps9429528740@gmail.com')
            //         ->subject('New Contact Form Submission')
            //         ->from($validated['email'], $validated['name']);
            // });

            return response()->json([
                'status' => true,
                'message' => 'Thank you! Your message has been sent.'
            ]);
        } catch (\Exception $e) {
            Log::error('Contact form submission error: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Error occurred while sending email. Please try again later.'
            ], 500);
        }
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function products()
    {
        return view('frontend.products');
    }
}

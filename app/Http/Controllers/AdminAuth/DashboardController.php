<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Enquiry;
use App\Models\Banner;

class DashboardController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function dashboard(Request $request): View
    {
        $enquiryCount = Enquiry::count(); 
        $bannerCount = Banner::count();

        return view('backend.dashboard', [
            'user' => $request->user(),
            'enquiryCount' => $enquiryCount,
            'bannerCount' => $bannerCount,
        ]);
    }
}

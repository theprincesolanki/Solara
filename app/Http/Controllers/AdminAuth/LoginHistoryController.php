<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LoginHistory;

class LoginHistoryController extends Controller
{
    // public function index()
    // {
    //     /** @var User $user */
    //     $user = Auth::user();
    //     $histories = $user?->loginHistories()->latest()->get() ?? collect();
    //     return view('profile.login-history', compact('histories'));
    // }
}

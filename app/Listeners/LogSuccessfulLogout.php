<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use App\Models\LoginHistory;

class LogSuccessfulLogout
{
    public function handle(Logout $event): void
    {
        $lastLogin = LoginHistory::where('user_id', $event->user->getAuthIdentifier())
            ->latest('id')
            ->first();

        if ($lastLogin && is_null($lastLogin->logged_out_at)) {
            $lastLogin->update([
                'logged_out_at' => now(),
            ]);
        }
    }
}

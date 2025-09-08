<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\LoginHistory;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;

class LogSuccessfulLogin
{
    public function handle(Login $event): void
    {
        $ip = request()->ip();
        $agent = new Agent();
        $agent->setUserAgent(request()->userAgent());

        $device  = $agent->device() ?: 'Unknown';
        $browser = $agent->browser() ?: 'Unknown';
        $os      = $agent->platform() ?: 'Unknown';

        $location = null;
        $lat = null;
        $lon = null;

        try {
            $res = Http::get("http://ip-api.com/json/{$ip}?fields=status,country,city,lat,lon");
            if ($res->json('status') === 'success') {
                $location = $res->json('city') . ', ' . $res->json('country');
                $lat = $res->json('lat');
                $lon = $res->json('lon');
            }
        } catch (\Exception $e) {}

        LoginHistory::create([
            'user_id'     => $event->user->getAuthIdentifier(),
            'ip_address'  => $ip,
            'user_agent'  => request()->userAgent(),
            'device'      => $device,
            'browser'     => $browser,
            'os'          => $os,
            'location'    => $location,
            'latitude'    => $lat,
            'longitude'   => $lon,
            'logged_in_at'=> now(),
        ]);
    }
}

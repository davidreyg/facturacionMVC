<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class InstallationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Storage::disk('local')->exists('database_created')) {
            return redirect('/on-boarding');
        }

        if (Storage::disk('local')->exists('database_created')) {
            if (Setting::getSetting('profile_complete') !== 'COMPLETED') {
                return redirect('/on-boarding');
            }
        }

        return $next($request);
    }
}

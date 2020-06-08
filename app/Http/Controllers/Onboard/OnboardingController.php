<?php

namespace App\Http\Controllers\Onboard;

use App\Models\User;
use App\Models\Setting;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Configuration\TimeZones;
use App\Configuration\DateFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;

class OnboardingController extends Controller
{

    /**
     * Retrieve Onboarding data.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    // Obtiene los datos actuales de nuestra aplicacion cuando estamos
    // haciendo los pasos respectivos al crearlo.
    public function getOnboardingData(Request $request)
    {
        if (!\Storage::disk('local')->exists('database_created')) {
            return response()->json([
                'profile_complete' => '0'
            ]);
        }

        $setting = Setting::getSetting('profile_complete');

        // Si la configuracion es igual a 'COMPLETED' quiere decir
        // que y completamos los pasos;
        if ($setting !== 'COMPLETED' && $setting < 4) {
            return response()->json([
                'profile_complete' => $setting
            ]);
        }

        $date_formats = DateFormatter::getListofDateFormats();
        $time_zones = TimeZones::getListofTimezones();
        $languages = [
            ["code" => "ar", "name" => "Arabic"],
            ["code" => "en", "name" => "English"],
            ["code" => "fr", "name" => "French"],
            ["code" => "es", "name" => "Spanish"],
            ["code" => "ar", "name" => "العربية"],
            ["code" => "de", "name" => "German"],
            ["code" => "pt-br", "name" => "Portuguese (Brazilian)"],
            ["code" => "it", "name" => "Italian"],
        ];
        $fiscal_years = [
            ['key' => 'january-december', 'value' => '1-12'],
            ['key' => 'february-january', 'value' => '2-1'],
            ['key' => 'march-february', 'value' => '3-2'],
            ['key' => 'april-march', 'value' => '4-3'],
            ['key' => 'may-april', 'value' => '5-4'],
            ['key' => 'june-may', 'value' => '6-5'],
            ['key' => 'july-june', 'value' => '7-6'],
            ['key' => 'august-july', 'value' => '8-7'],
            ['key' => 'september-august', 'value' => '9-8'],
            ['key' => 'october-september', 'value' => '10-9'],
            ['key' => 'november-october', 'value' => '11-10'],
            ['key' => 'december-november', 'value' => '12-11'],
        ];
        $user = User::with([
            'company'
        ])->find(1);

        return response()->json([
            'user' => $user,
            'profile_complete' => $setting,
            'languages' => $languages,
            'date_formats' => $date_formats,
            'time_zones' => $time_zones,
            'fiscal_years' => $fiscal_years,
            'currencies' => Currency::all()
        ]);
        // if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
        //     $producto->addMediaFromRequest('imagen')->toMediaCollection();
        // }
    }

    /**
     * Setup Admin Profile.
     *
     * @param  \Crater\Http\Requests\ProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adminProfile(ProfileRequest $request)
    {
        $setting = Setting::getSetting('profile_complete');

        if ($setting == '1' || $setting == 'COMPLETED') {
            return response()->json(['error' => 'Profile already created.']);
        } else {
            Setting::setSetting('profile_complete', 5);
        }

        $user = User::find(1);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * Setup Admin Avatar.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadAdminAvatar(Request $request)
    {
        $setting = Setting::getSetting('profile_complete');

        if ($setting == '1' || $setting == 'COMPLETED') {
            return response()->json(['error' => 'Profile already created.']);
        }
        $data = json_decode($request->admin_avatar);

        if ($data) {
            $user = User::find($data->id);
            if ($user) {
                $user->clearMediaCollection('admin_avatar');

                $user->addMediaFromBase64($data->data)
                    ->usingFileName($data->name)
                    ->toMediaCollection('admin_avatar');
            }
        }

        return response()->json([
            'user' => $user,
            'success' => true
        ]);
    }
}

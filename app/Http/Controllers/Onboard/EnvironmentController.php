<?php

namespace App\Http\Controllers\Onboard;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use App\Configuration\EnvironmentManager;
use App\Http\Requests\DatabaseEnvironmentRequest;

class EnvironmentController extends Controller
{
    /**
     * @var EnvironmentManager
     */
    protected $EnvironmentManager;

    /**
     * @param EnvironmentManager $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager)
    {
        $this->EnvironmentManager = $environmentManager;
    }

    /**
     *
     * @param DatabaseEnvironmentRequest $request
     */
    public function saveDatabaseEnvironment(DatabaseEnvironmentRequest $request)
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        $results = $this->EnvironmentManager->saveDatabaseVariables($request);

        if (array_key_exists("success", $results)) {
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            Artisan::call('storage:link');
            Artisan::call('key:generate --force');
            Artisan::call('migrate --seed --force');
            Artisan::call('migrate', ['--path' => 'vendor/laravel/passport/database/migrations', '--force' => true]);

            \Storage::disk('local')->put('database_created', 'database_created');

            Setting::setSetting('profile_complete', 3);
        }

        return response()->json($results);
    }
}

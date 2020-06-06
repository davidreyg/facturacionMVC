<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Onboarding
//----------------------------------
Route::group(['middleware' => 'redirect-if-installed'], function () {

    Route::get('/admin/onboarding', [
        'as' => 'admin.onboarding',
        'uses' => 'Onboard\OnboardingController@getOnboardingData'
    ]);

    Route::get('/admin/onboarding/requirements', [
        'as' => 'admin.onboarding.requirements',
        'uses' => 'Onboard\RequerimentsController@requirements'
    ]);

    Route::get('/admin/onboarding/permissions', [
        'as' => 'admin.onboarding.permissions',
        'uses' => 'Onboard\PermissionsController@permissions'
    ]);

    Route::post('/admin/onboarding/environment/database', [
        'as' => 'admin.onboarding.database',
        'uses' => 'Onboard\EnvironmentController@saveDatabaseEnvironment'
    ]);

    Route::get('/admin/onboarding/environment/mail', [
        'as' => 'admin.onboarding.mail',
        'uses' => 'Onboard\EnvironmentController@getMailDrivers'
    ]);

    Route::post('/admin/onboarding/environment/mail', [
        'as' => 'admin.onboarding.mail',
        'uses' => 'Onboard\EnvironmentController@saveMailEnvironment'
    ]);

    // Route::post('/admin/onboarding/profile', [
    //     'as' => 'admin.profile',
    //     'uses' => 'OnboardingController@adminProfile'
    // ]);

    // Route::post('/admin/profile/upload-avatar', [
    //     'as' => 'admin.on_boarding.avatar',
    //     'uses' => 'OnboardingController@uploadAdminAvatar'
    // ]);

    // Route::post('/admin/onboarding/company', [
    //     'as' => 'admin.company',
    //     'uses' => 'OnboardingController@adminCompany'
    // ]);

    // Route::post('/admin/onboarding/company/upload-logo', [
    //     'as' => 'upload.admin.company.logo',
    //     'uses' => 'CompanyController@uploadCompanyLogo'
    // ]);

    // Route::post('/admin/onboarding/settings', [
    //     'as' => 'admin.settings',
    //     'uses' => 'OnboardingController@companySettings'
    // ]);
});

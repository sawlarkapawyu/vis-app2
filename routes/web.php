<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\DeathController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('families', FamilyController::class);
//     Route::resource('households', HouseholdController::class);
//     Route::post('households/fetch-districts', [HouseholdController::class, 'fetchDistrict']);
//     Route::post('households/fetch-townships', [HouseholdController::class, 'fetchTownship']);
//     Route::post('households/fetch-ward-village-tract', [HouseholdController::class, 'fetchWardVillageTract']);
//     Route::post('households/fetch-village', [HouseholdController::class, 'fetchVillage']);

//     Route::get('statecitydropdown', Create::class);
// });

Route::redirect('/', '/en/');
// Route::get('/', function () { return redirect (app()->getLocale()); });
    Route::group(['prefix' => '{lang}', 'middleware' => 'locale'], function () {
        
        Auth::routes();

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        
        // Household Start
    
        Route::get('households/trashed/show', ['as' => 'households.trashed', 'uses' => 'App\Http\Controllers\HouseholdController@trashed']);    
        Route::get('households/kill/{household_id}', ['uses' => 'App\Http\Controllers\HouseholdController@kill', 'as' => 'households.kill']);
        Route::get('households/restore/{household_id}', ['uses' => 'App\Http\Controllers\HouseholdController@restore', 'as' => 'households.restore']);

        Route::post('households/fetch-districts', ['as' => 'households.fetchDistrict', 'uses' => 'App\Http\Controllers\HouseholdController@fetchDistrict']);
        Route::post('households/fetch-townships', ['as' => 'households.fetchTownship', 'uses' => 'App\Http\Controllers\HouseholdController@fetchTownship']);
        Route::post('households/fetch-ward-village-tract', ['as' => 'households.fetchWardVillageTract', 'uses' => 'App\Http\Controllers\HouseholdController@fetchWardVillageTract']);
        Route::post('households/fetch-village', ['as' => 'households.fetchVillage', 'uses' => 'App\Http\Controllers\HouseholdController@fetchVillage']); 
        // Household End 

        Route::get('households', ['as' => 'households.index', 'uses' => 'App\Http\Controllers\HouseholdController@index']);
        Route::get('households/create', ['as' => 'households.create', 'uses' => 'App\Http\Controllers\HouseholdController@create']);
        Route::post('households/store', ['as' => 'households.store', 'uses' => 'App\Http\Controllers\HouseholdController@store']);    
        Route::get('households/edit/{household_id?}', ['as' => 'households.edit', 'uses' => 'App\Http\Controllers\HouseholdController@edit']);
        Route::post('households/{household_id}', ['as' => 'households.update', 'uses' => 'App\Http\Controllers\HouseholdController@update']);    
        Route::delete('households/{household_id}', ['as' => 'households.destroy', 'uses' => 'App\Http\Controllers\HouseholdController@destroy']);    
        Route::get('households/{household_id?}', ['as' => 'households.show', 'uses' => 'App\Http\Controllers\HouseholdController@show']);

        // Family Start
        Route::get('families', ['as' => 'families.index', 'uses' => 'App\Http\Controllers\FamilyController@index']);
        Route::get('families/create', ['as' => 'families.create', 'uses' => 'App\Http\Controllers\FamilyController@create']);
        Route::post('families/store', ['as' => 'families.store', 'uses' => 'App\Http\Controllers\FamilyController@store']);    
        Route::post('families/death/store', ['as' => 'families.deathStore', 'uses' => 'App\Http\Controllers\FamilyController@deathStore']); 

        Route::get('families/edit/{id?}', ['as' => 'families.edit', 'uses' => 'App\Http\Controllers\FamilyController@edit']);
        Route::post('families/{id}', ['as' => 'families.update', 'uses' => 'App\Http\Controllers\FamilyController@update']);    
        Route::delete('families/{id}', ['as' => 'families.destroy', 'uses' => 'App\Http\Controllers\FamilyController@destroy']);    
        Route::get('families/{id?}', ['as' => 'families.show', 'uses' => 'App\Http\Controllers\FamilyController@show']);

        Route::get('families/trashed/show', ['as' => 'families.trashed', 'uses' => 'App\Http\Controllers\FamilyController@trashed']);    
        Route::get('families/kill/{id?}', ['uses' => 'App\Http\Controllers\FamilyController@kill', 'as' => 'families.kill']);
        Route::get('families/restore/{id}', ['uses' => 'App\Http\Controllers\FamilyController@restore', 'as' => 'families.restore']);

        Route::get('families/show/by_household', ['uses' => 'App\Http\Controllers\FamilyController@by_household', 'as' => 'families.by_household']);

        // Family End 

         //Death Start
         Route::get('family/deaths/', ['as' => 'deaths.index', 'uses' => 'App\Http\Controllers\DeathController@index', 'as' => 'deaths.index']);
         Route::get('deaths/restore/{id}', ['uses' => 'App\Http\Controllers\DeathController@restore', 'as' => 'deaths.restore']);
         //Death End

        // User Start
        Route::get('users', ['as' => 'users.index', 'uses' => 'App\Http\Controllers\UserController@index']);
        Route::get('users/create', ['as' => 'users.create', 'uses' => 'App\Http\Controllers\UserController@create']);
        Route::post('users/store', ['as' => 'users.store', 'uses' => 'App\Http\Controllers\UserController@store']);    
        Route::get('users/{id?}', ['as' => 'users.show', 'uses' => 'App\Http\Controllers\UserController@show']);
        Route::get('users/edit/{id?}', ['as' => 'users.edit', 'uses' => 'App\Http\Controllers\UserController@edit']);
        Route::post('users/update/{id?}', ['as' => 'users.update', 'uses' => 'App\Http\Controllers\UserController@update']);    
        Route::delete('users/{id?}', ['as' => 'users.destroy', 'uses' => 'App\Http\Controllers\UserController@destroy']);    
        Route::get('users/show_profile/{id?}', ['as' => 'users.show_profile', 'uses' => 'App\Http\Controllers\UserController@show_profile']);
        Route::get('users/edit_profile/{id?}', ['as' => 'users.edit_profile', 'uses' => 'App\Http\Controllers\UserController@edit_profile']);
        Route::post('users/update_profile/{id?}', ['as' => 'users.update_profile', 'uses' => 'App\Http\Controllers\UserController@update_profile']);    

        // User End

        // Role Start
        Route::get('roles', ['as' => 'roles.index', 'uses' => 'App\Http\Controllers\RoleController@index']);
        Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'App\Http\Controllers\RoleController@create']);
        Route::post('roles/store', ['as' => 'roles.store', 'uses' => 'App\Http\Controllers\RoleController@store']);    
        Route::get('roles/{id?}', ['as' => 'roles.show', 'uses' => 'App\Http\Controllers\RoleController@show']);
        Route::get('roles/edit/{id?}', ['as' => 'roles.edit', 'uses' => 'App\Http\Controllers\RoleController@edit']);
        Route::put('roles/update/{id}', ['as' => 'roles.update', 'uses' => 'App\Http\Controllers\RoleController@update']);    
        Route::delete('roles/{id?}', ['as' => 'roles.destroy', 'uses' => 'App\Http\Controllers\RoleController@destroy']);    
        // Role End 
    });


// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
}); 

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});
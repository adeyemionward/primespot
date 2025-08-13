<?php

use App\Http\Controllers\ScreenController;
use Illuminate\Support\Facades\Route;

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

Route::get('/testmail', function () {
    return view('testmail');

});

Route::get('/invoice', function () {
    return view('invoice_attachment');

});




Route::group(['namespace' => 'App\Http\Controllers'],  function () {
    Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::group(['prefix' => '/screens', 'as' => 'screens.'], function () {
            Route::get('/add', 'ScreenController@create')->name('add');
            Route::post('/add', 'ScreenController@store')->name('add');
            Route::get('/list', 'ScreenController@list')->name('list');
            Route::get('/edit/{id}', 'ScreenController@edit')->name('edit');
            Route::post('/edit/{id}', 'ScreenController@update')->name('edit');
            Route::get('/view/{id}', 'ScreenController@show')->name('view');
            Route::get('/deactivate/{id}', 'ScreenController@deactivate')->name('deactivate');
            Route::get('/activate/{id}', 'ScreenController@activate')->name('activate');
            Route::get('/delete/{id}', 'ScreenController@destroy')->name('delete');
        });

        Route::group(['prefix' => '/venues', 'as' => 'venues.'], function () {
            Route::get('/add', 'VenueController@create')->name('add');
            Route::post('/add', 'VenueController@store')->name('add');
            Route::get('/list', 'VenueController@list')->name('list');
            Route::get('/edit/{id}', 'VenueController@edit')->name('edit');
            Route::post('/edit/{id}', 'VenueController@update')->name('edit');
            Route::get('/view/{id}', 'VenueController@show')->name('view');
            Route::get('/deactivate/{id}', 'VenueController@deactivate')->name('deactivate');
            Route::get('/activate/{id}', 'VenueController@activate')->name('activate');
            Route::get('/screens/{id}', 'VenueController@screens')->name('screens');
        });

        Route::group(['prefix' => '/bookings', 'as' => 'bookings.'], function () {
            Route::get('/add', 'BookingController@create')->name('add');
            Route::post('/add', 'BookingController@store')->name('add');
            Route::get('/list', 'BookingController@list')->name('list');
            Route::get('/completed', 'BookingController@completed')->name('completed');
            Route::get('/pending', 'BookingController@pending')->name('pending');
            Route::get('/ongoing', 'BookingController@ongoing')->name('ongoing');
            Route::get('/edit/{id}', 'BookingController@edit')->name('edit');
            Route::post('/edit/{id}', 'BookingController@update')->name('edit');
            Route::get('/view/{id}', 'BookingController@show')->name('view');
            Route::post('/payment_status/{id}', 'BookingController@payment_status')->name('payment_status');
            Route::get('/deactivate/{id}', 'BookingController@deactivate')->name('deactivate');
            Route::get('/activate/{id}', 'BookingController@activate')->name('activate');



        });

        Route::group(['prefix' => '/users', 'as' => 'users.'], function () {
            Route::get('/add', 'UserController@create')->name('add');
            Route::post('/add', 'UserController@store')->name('add');
            Route::get('/list', 'UserController@index')->name('list');
            Route::get('/edit/{id}', 'UserController@edit')->name('edit');
            Route::post('/edit/{id}', 'UserController@update')->name('edit');
            Route::get('/view/{id}', 'UserController@show')->name('view');
            Route::get('/deactivate/{id}', 'UserController@deactivate')->name('deactivate');
            Route::get('/activate/{id}', 'UserController@activate')->name('activate');
            Route::get('/delete/{id}', 'UserController@destroy')->name('delete');
        });

        Route::group(['prefix' => '/settings', 'as' => 'settings.'], function () {
            Route::group(['prefix' => '/theme', 'as' => 'theme.'], function () {
                Route::get('/add', 'SettingController@create_theme')->name('create_theme');
                Route::post('/add', 'SettingController@store_theme')->name('store_theme');
                Route::get('/list', 'SettingController@list_theme')->name('list_theme');
                Route::get('/edit/{id}', 'SettingController@edit_theme')->name('edit_theme');
                Route::post('/edit/{id}', 'SettingController@update_theme')->name('edit_theme');
                Route::get('/delete/{id}', 'SettingController@delete_theme')->name('delete_theme');

                Route::get('/admin_roles', 'SettingController@admin_roles')->name('admin_roles');
                Route::post('/admin_roles', 'SettingController@update_admin_roles')->name('admin_roles');
            });
        });

        Route::group(['prefix' => '/users', 'as' => 'users.'], function () {
            Route::get('/add_user', 'UserController@create')->name('add_user');
            Route::post('/add_user', 'UserController@store')->name('add_user');
            Route::get('/all_users', 'UserController@index')->name('all_users');
            Route::get('/edit_user/{id}', 'UserController@edit')->name('edit_user');
            Route::post('/edit_user/{id}', 'UserController@update')->name('edit_user');
            Route::get('/view_user/{id}', 'UserController@show')->name('view_user');
            Route::get('/delete_user/{id}', 'UserController@destroy')->name('delete_user');


            Route::get('/view_profile', 'UserController@view_profile')->name('view_profile');
            Route::get('/edit_profile', 'UserController@edit_profile')->name('edit_profile');
            Route::post('/edit_profile', 'UserController@update_profile')->name('edit_profile');
            Route::get('/change_password', 'UserController@change_password')->name('change_password');
            Route::post('/change_password', 'UserController@update_change_password')->name('change_password');

        });

        Route::group(['prefix' => '/roles', 'as' => 'roles.'], function () {
            Route::get('/all_roles', 'RoleController@index')->name('all_roles');
            Route::get('/add_role', 'RoleController@create')->name('add_role');
            Route::post('/add_role', 'RoleController@store')->name('add_role');
            Route::get('/edit_role/{id}', 'RoleController@edit')->name('edit_role');
            Route::post('/edit_role/{id}', 'RoleController@update')->name('edit_role');
            Route::get('/delete_role/{id}', 'RoleController@destroy')->name('delete_role');
        });


    });


    Route::get('/booking_invoice_pdf/{id?}', 'BookingController@orderInvoicePdf')->name('booking_invoice_pdf');
});



    // customer
Route::group(['namespace' => 'App\Http\Controllers\customer'],  function () {
    Route::group(['prefix' => '/customer', 'as' => 'customer.'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::group(['prefix' => '/bookings', 'as' => 'bookings.'], function () {
            Route::get('/add', 'BookingController@create')->name('add');
            Route::post('/add', 'BookingController@store')->name('add');
            Route::get('/list', 'BookingController@list')->name('list');
            Route::get('/completed', 'BookingController@completed')->name('completed');
            Route::get('/pending', 'BookingController@pending')->name('pending');
            Route::get('/ongoing', 'BookingController@ongoing')->name('ongoing');
            Route::get('/edit/{id}', 'BookingController@edit')->name('edit');
            Route::post('/edit/{id}', 'BookingController@update')->name('edit');
            Route::get('/view/{id}', 'BookingController@show')->name('view');
        });

        Route::group(['prefix' => '/settings', 'as' => 'settings.'], function () {
            Route::group(['prefix' => '/theme', 'as' => 'theme.'], function () {
                Route::get('/add', 'SettingController@create_theme')->name('create_theme');
                Route::post('/add', 'SettingController@store_theme')->name('store_theme');
                Route::get('/list', 'SettingController@list_theme')->name('list_theme');
                Route::get('/edit/{id}', 'SettingController@edit_theme')->name('edit_theme');
                Route::post('/edit/{id}', 'SettingController@update_theme')->name('edit_theme');
                Route::get('/delete/{id}', 'SettingController@delete_theme')->name('delete_theme');

                Route::get('/admin_roles', 'SettingController@admin_roles')->name('admin_roles');
                Route::post('/admin_roles', 'SettingController@update_admin_roles')->name('admin_roles');
            });
        });

        Route::group(['prefix' => '/users', 'as' => 'users.'], function () {
            Route::get('/add_user', 'UserController@create')->name('add_user');
            Route::post('/add_user', 'UserController@store')->name('add_user');
            Route::get('/all_users', 'UserController@index')->name('all_users');
            Route::get('/edit_user/{id}', 'UserController@edit')->name('edit_user');
            Route::post('/edit_user/{id}', 'UserController@update')->name('edit_user');
            Route::get('/view_user/{id}', 'UserController@show')->name('view_user');
            Route::get('/delete_user/{id}', 'UserController@destroy')->name('delete_user');


            Route::get('/view_profile', 'UserController@view_profile')->name('view_profile');
            Route::get('/edit_profile', 'UserController@edit_profile')->name('edit_profile');
            Route::post('/edit_profile', 'UserController@update_profile')->name('edit_profile');
            Route::get('/change_password', 'UserController@change_password')->name('change_password');
            Route::post('/change_password', 'UserController@update_change_password')->name('change_password');

        });

        Route::group(['prefix' => '/roles', 'as' => 'roles.'], function () {
            Route::get('/all_roles', 'RoleController@index')->name('all_roles');
            Route::get('/add_role', 'RoleController@create')->name('add_role');
            Route::post('/add_role', 'RoleController@store')->name('add_role');
            Route::get('/edit_role/{id}', 'RoleController@edit')->name('edit_role');
            Route::post('/edit_role/{id}', 'RoleController@update')->name('edit_role');
            Route::get('/delete_role/{id}', 'RoleController@destroy')->name('delete_role');
        });
    });
 });


    Route::group(['namespace' => 'App\Http\Controllers'],  function () {

        Route::get('login/', 'AuthController@login')->name('login');
        Route::post('login/', 'AuthController@postLogin')->name('login');

        Route::get('/', 'AuthController@register')->name('register');
        Route::post('/', 'AuthController@postregister')->name('post.register');




    });

    Route::group(['middleware'=>['auth']],function(){
        Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    });

    Route::group(['prefix' => 'api'], function() {
        Route::get('/venues/{venue}/screens', [ScreenController::class, 'getVenueScreens']);
    });






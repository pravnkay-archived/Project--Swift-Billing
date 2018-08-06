<?php

use App\Contact;

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


/************************* Initialization Routes *****/
Route::get('/install', [
    'as'        => 'InitInstall',
    'uses'      =>  'InitController@index'
]);
Route::post('/install/execute', [
    'as'        => 'InitExecute',
    'uses'      =>  'InitController@execute'
]);

/************************* Home Frontend *****/
Route::get('/', [
    'as'        => 'Home',
    'uses'      =>  'Frontend\PagesController@index'
]);

/************************* Authentication *****/
Auth::routes();

/************************* Backend *****/
Route::get('/dashboard', [
    'as'    => 'Dashboard',
    'uses'  => 'Backend\DashboardController@index',
    'page-heading'  => 'DB Dashboard'
]);

Route::resource('users', 'Backend\UsersController', [
    'as'            => 'Users',
])->middleware('AuthAdmin');

Route::resource('contacts', 'Backend\ContactsController', [
    'as'            => 'Contacts',
    'page-heading'  =>  'CM',
])->middleware('AuthUser');

Route::post('/products/uploadexcel', 'Backend\ProductsController@uploadexcel', [
	'as'            => 'ProductsUpload',
])->middleware('AuthUser');

Route::get('/products/downloadexcel', 'Backend\ProductsController@downloadexcel', [
	'as'            => 'ProductsDownload',
])->middleware('AuthUser');

Route::resource('products', 'Backend\ProductsController', [
    'as'            => 'Products',
])->middleware('AuthUser');

Route::get('/invoices/select_customer/{customerName}', 'Backend\InvoicesController@selectCustomer', [
    'as'            => 'SelectCustomer',
])->middleware('AuthUser');
Route::get('/invoices/select_product/{description}', 'Backend\InvoicesController@selectProduct', [
    'as'            => 'SelectProduct',
])->middleware('AuthUser');

Route::get('/invoices/print/{id}/{copy}', [
    'as'    => 'PrintInvoice',
    'uses'  => 'Backend\InvoicesController@printinvoice',
])->middleware('AuthUser');

Route::resource('invoices', 'Backend\InvoicesController', [
    'as'            => 'Invoices',
])->middleware('AuthUser');

/************************* Setting Group *****/
Route::group(['prefix' => 'settings', 'namespace' => 'Backend\Settings'], function()
{
    Route::resource('profile', 'ProfileSettingsController', [
        'as'            => 'Settings',
    ])->middleware('AuthAdmin');

    Route::resource('invoice', 'InvoiceSettingsController', [
        'as'            => 'Settings',
    ])->middleware('AuthAdmin');
    
});


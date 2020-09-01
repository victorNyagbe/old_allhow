<?php

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

Route::get('/', 'MainController@accueil')->name('visitors.home');

Route::get('pdf', 'MainController@accueilpdf')->name('visitors.homepdf');

Route::get('en/home','MainController@home' )->name('visitors.english.home');

Route::get('en/pdf', 'MainController@homepdf')->name('visitors.english.homepdf');

Route::group(['prefix' => 'admin'], function () {

    Route::get('register', 'Administration\RegisterController@registrationForm')->name('administration.registerForm');

    Route::post('register/processing', 'Administration\RegisterController@register')->name('administration.register');

    Route::get('login', 'Administration\LoginController@loginForm')->name('administration.loginForm');

    Route::post('login/processing', 'Administration\LoginController@login')->name('administration.login');

    Route::get('dashboard', 'Administration\MainController@dashboard')->name('administration.dashboard');

    Route::get('documents/en-attente', 'Administration\MainController@documentsPending')->name('administration.docPending');

    Route::get('documents/approuves', 'Administration\MainController@documentsApproved')->name('administration.docApproved');
    
    Route::get('documents/rejetes', 'Administration\MainController@documentsRejected')->name('administration.docRejected');

    Route::get('liste-vendeurs', 'Administration\MainController@listSellers')->name('administration.listSellers');

    Route::get('documents/{document}/validate-doc', 'Administration\DocController@showDocToBeApproved')->name('administration.showDocToBeApproved');

    Route::post('documents/validating-processing', 'Administration\DocController@approveDocumentByAdmin')->name('administration.approveDocument');

    Route::delete('document/{document}/rejecting-processing', 'Administration\DocController@rejectDocumentByAdmin')->name('administration.rejectDocument');
});



// seller's routes

Route::get('register-seller', 'VendeurController@registrationForm')->name('sellers.registrationForm');

Route::post('register-seller/registration-processing', 'VendeurController@register')->name('sellers.register');

Route::get('login-seller', 'VendeurController@loginForm')->name('sellers.loginForm');

Route::post('login-seller/login-processing', 'VendeurController@login')->name('sellers.login');

Route::get('sellers/profile', 'VendeurController@updateProfileForm')->name('sellers.updateProfileForm');

Route::post('sellers/profile/update-processing', 'VendeurController@updateProfile')->name('sellers.updateProfile');

Route::get('sellers/dashboard', 'VendeurController@index')->name('sellers.home');

Route::get('sellers/documents', 'DocumentController@listDoc')->name('sellers.documents');

Route::get('sellers/envoyer-document', 'DocumentController@SellerSendDocumentForm')->name('sellers.sendDocForm');

Route::post('sellers/envoyer-document/processing', 'DocumentController@SellerSendDocument')->name('sellers.sendDoc');

Route::get('sellers/logout', 'VendeurController@logout')->name('sellers.logout');

Route::get('sellers/forgotPassword', 'VendeurController@forgotPasswordForm')->name('sellers.forgotPasswordForm');

Route::post('sellers/forgotPassword/processing', 'VendeurController@forgotPassword')->name('sellers.forgotPassword');

Route::get('sellers/resetPassword', 'VendeurController@resetPasswordForm')->name('sellers.resetPasswordForm');

Route::post('sellers/resetPassword/processing', 'VendeurController@resetPassword')->name('sellers.resetPassword');

Route::get('document/{id}-{slug}/show', 'MainController@showDoc')->name('visitors.showDoc');
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('login');
});

Route::get('login', function()
{
	return View::make('login');
});


Route::post('login', function()
{
	$auth = Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]);

	return Redirect::to($auth ? 'authorize-form' : 'login');
});

// @see https://github.com/lucadegasperi/oauth2-server-laravel#authorization-code-flow
Route::get('authorize-form', function()
{
	return View::make('authorize-form');
});

Route::post('oauth/authorize', array('before' => 'check-authorization-params|auth|csrf', function()
{
	// get the data from the check-authorization-params filter
	$params = Session::get('authorize-params');

	// get the user id
	$params['user_id'] = Auth::user()->id;

	$code = AuthorizationServer::newAuthorizeRequest('user', $params['user_id'], $params);

	Session::forget('authorize-params');

	return Redirect::to(AuthorizationServer::makeRedirectWithCode($code, $params));

//	// check if the user approved or denied the authorization request
//	if (Input::get('approve') !== null) {
//
//		$code = AuthorizationServer::newAuthorizeRequest('user', $params['user_id'], $params);
//
//		Session::forget('authorize-params');
//
//		return Redirect::to(AuthorizationServer::makeRedirectWithCode($code, $params));
//	}
//
//	if (Input::get('deny') !== null) {
//
//		Session::forget('authorize-params');
//
//		return Redirect::to(AuthorizationServer::makeRedirectWithError($params));
//	}
}));

Route::get('callback', function()
{
	return View::make('accesstoken-form');
});

// @see https://github.com/lucadegasperi/oauth2-server-laravel#issuing-an-access-token
Route::post('oauth/access_token', function()
{
	return AuthorizationServer::performAccessTokenFlow();
});

Route::get('scope1', array('before' => 'oauth:scope1', function(){
	return 'scope1 allowed';
}));

Route::get('scope2', array('before' => 'oauth:scope2', function(){
	return 'scope2 allowed';
}));

Route::get('scope3', array('before' => 'oauth:scope3', function(){
	return 'scope2 allowed';
}));

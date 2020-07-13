<?php



Route::get('/','FrontendController@index');
Route::get('/contact','FrontendController@contact');
Route::post('/contact','ContactController@sendEmail');
Route::get('/games','FrontendController@games')->name('games');//ne treba
Route::get('/reviews/{id_post}','FrontendController@review_single');
Route::get('/reviews','FrontendController@reviews');
Route::get('/ajax/reviews','FrontendController@fetch_data');
Route::get('/blog','FrontendController@blog');//ne treba
Route::get('/login','FrontendController@login');
Route::post('/login','AuthController@login');
Route::get('/logout','AuthController@logout');
Route::get('/register','FrontendController@register');
Route::post('/register','AuthController@register');
Route::post('/comment','CommentController@insertComment');
Route::get('/search','SearchController@search');

Route::get('/user','FrontendController@user')->middleware('IsUser');
//Route::get('')
//Route::get('/admin');



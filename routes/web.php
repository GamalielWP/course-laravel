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

Route::get('/', 'CourseController@index');

Route::get('/count-mentor', 'CourseController@countMentor');
Route::get('/count-member', 'CourseController@countMember');

Route::get('/add-index', 'CourseController@addIndex');
Route::post('/add-course', 'CourseController@addCourse');
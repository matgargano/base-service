<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/teachers', 'TeacherController@index');
$app->post('/teachers', 'TeacherController@store');
$app->get('/teachers/{teachers}', 'TeacherController@show');
$app->put('/teachers/{teachers}', 'TeacherController@updatePut');
$app->patch('/teachers/{teachers}', 'TeacherController@updatePatch');
$app->delete('/teachers/{teachers}', 'TeacherController@destroy');


$app->get('/students', 'StudentController@index');
$app->post('/students', 'StudentController@store');
$app->get('/students/{students}', 'StudentController@show');
$app->put('/students/{students}', 'StudentController@updatePut');
$app->patch('/students/{students}', 'StudentController@updatePatch');
$app->delete('/students/{students}', 'StudentController@destroy');


$app->get('/courses', 'CourseController@index');
$app->get('/courses/{courses}', 'CourseController@show');


$app->get('/teachers/{teachers}/courses', 'TeachersCourseController@index');
$app->post('/teachers/{teachers}/courses', 'TeachersCourseController@store');
$app->put('/teachers/{teachers}/courses/{courses}', 'TeachersCourseController@updatePut');
$app->patch('/teachers/{teachers}/courses/{courses}', 'TeachersCourseController@updatePatch');
$app->delete('/teachers/{teachers}/courses/{courses}', 'TeachersCourseController@destroy');


$app->get('/courses/{courses}/students', 'CourseStudentController@index');
$app->post('/courses/{courses}/students/{students}', 'CourseStudentController@store');
$app->put('/courses/{courses}/students/{students}', 'CourseStudentController@updatePut');

$app->post('/access_token', function() use ($app){
	return response()->json($app->make('oauth2-server.authorizer')->issueAccessToken());
});


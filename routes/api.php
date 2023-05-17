<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\resumeController;
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

Route::get('/', [Controller::class, 'routes'])
    ->name('route information')
    ->withoutMiddleware('api');
Route::get('/example', [Controller::class, 'example'])->name('example route');
Route::get('/error', [Controller::class, 'error'])->name('error route');
Route::get('/liststatic', [resumeController::class, 'ListStaticResume'])->name('resume list static route'); 

Route::get('/list', [resumeController::class, 'ListResumes'])->name('resume list route'); 

Route::get('/anthony', [resumeController::class, 'Anthony'])->name('resume list route'); 
Route::post('/editcandidate', [resumeController::class, 'EditCandidateEmail'])->name('edit candidate email route');

Route::post('/addskill', [resumeController::class, 'AddSkill'])->name('add skill route');

Route::delete('/deleteskill/{id}', [resumeController::class, 'DeleteSkill'])->name('delete skill route');

Route::post('/addexperience', [resumeController::class, 'AddExperience'])->name('add experience route');
Route::post('/editexperience', [resumeController::class, 'EditExperience'])->name('edit experience route');
Route::delete('/deleteexperience/{id}', [resumeController::class, 'DeleteExperience'])->name('delete experience route');


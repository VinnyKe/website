<?php

use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Route::get('', function () {
//     return view('app');
// })->where('any', '.*');

Route::get('/', function(){
    return view('app');
});

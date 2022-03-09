<?php

use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('{page}', 'MainController')->where('page', '.*');




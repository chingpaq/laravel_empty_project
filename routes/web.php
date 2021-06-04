<?php

use App\Http\Controllers\UserController;

Route::post('/addUser', [UserController::class, 'index']);
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

// Modular routes can be loaded from modules under app/Modules/*/routes.php

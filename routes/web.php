<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::view('/resources', 'pages.blog')->name('blog');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/quote', 'pages.quote')->name('quote');

Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');
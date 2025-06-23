<?php

// 📂 File: routes/web.php
// 🔍 Section: Full route list with sitemap generation
// 🎯 Purpose: Defines routes and generates an XML sitemap for real Laravel pages

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

// 🏠 Home
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// 📄 Public Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/specialists', [PageController::class, 'specialists'])->name('specialists');
Route::get('/brooks-gym-training', [PageController::class, 'brooksgymtraining'])->name('brooks.gym.training');
Route::get('/lyno-therapy-training', [PageController::class, 'lynotherapytraining'])->name('lyno.therapy.training');
Route::get('/brooks-and-bands-academy', [PageController::class, 'brooksandbands'])->name('brooks.bands.academy');

// 🛒 NEW: Store page route
Route::get('/store', [PageController::class, 'store'])->name('store');

// 🔁 Redirect /membership ➜ /brooks-gym-membership
Route::permanentRedirect('/membership', '/brooks-gym-membership');

// ✅ Real pages
Route::get('/brooks-gym-membership', [PageController::class, 'brooksmembership'])->name('brooks.membership');
Route::get('/lyno-therapy', [PageController::class, 'lynotherapymembership'])->name('lyno.therapy');

// 📞 Contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');

// 🗺️ Sitemap (including new store page)
Route::get('/generate-sitemap', function () {
    Sitemap::create()
        ->add(Url::create('/'))
        ->add(Url::create('/about'))
        ->add(Url::create('/contact'))
        ->add(Url::create('/membership'))
        ->add(Url::create('/lyno-therapy'))
        ->add(Url::create('/specialists'))
        ->add(Url::create('/brooks-gym-training'))
        ->add(Url::create('/lyno-therapy-training'))
        ->add(Url::create('/brooks-and-bands-academy'))
        ->add(Url::create('/store')) // 🛒 NEW: Added store to sitemap
        ->writeToFile(public_path('sitemap.xml'));

    return '✅ Sitemap generated successfully!';
});

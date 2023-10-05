<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/user/{id}', function ($id) {
    return "Perfil do usuário com ID: $id";
})->name('user.profile')->where('id', '[0-9]+');

Route::get('/post/{slug}', function ($slug) {
    return "Post do blog com slug: $slug";
})->name('blog.post');

Route::get('/category/{category}', function ($category) {
    return "Posts da categoria: $category";
})->name('blog.category');

Route::get('/user/{id}/language/{lang?}', function ($id, $lang = null) {
    if ($lang) {
        return "Perfil do usuário com ID: $id, na língua: $lang";
    } else {
        return "Perfil do usuário com ID: $id";
    }
})->name('user.profile.language')->where(['id' => '[0-9]+', 'lang' => '[a-zA-Z]+']);

Route::get('/products/{category}/{minPrice?}', function ($category, $minPrice = null) {
    if ($minPrice) {
        return "Produtos da categoria: $category com preço mínimo de: $minPrice";
    } else {
        return "Produtos da categoria: $category";
    }
})->name('products.category.price')->where(['minPrice' => '[0-9]+(\.[0-9]{1,2})?', 'category' => '[a-zA-Z]+']);

Route::get('/page/{page}', function ($page) {
    return "Página número: $page";
})->name('page.number')->where('page', '[0-9]+');

Route::get('/convert/{currency}', function ($currency) {
    return "Valor convertido de reais para dólar: $currency";
})->name('currency.converter')->where('currency', '[0-9]+(\.[0-9]{1,2})?');

Route::get('/sum/{number1}/{number2}', function ($number1, $number2) {
    $sum = $number1 + $number2;
    return "A soma de $number1 e $number2 é igual a: $sum";
})->name('sum.numbers')->where(['number1' => '[0-9]+', 'number2' => '[0-9]+']);

Route::get('/custom', function () {
    return "Rota personalizada";
})->name('custom.route');

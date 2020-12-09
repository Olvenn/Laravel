<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return 'welcome';
// });






Route::get('/homeNew', function () {
    $res = 2 + 3;
    $name = 'Jone';
    return view('home', compact('res', 'name'));
    // return view('home', ['res' => $res, 'name' => $name]);
});

Route::get('/about', function () {
    return '<h1>Page about</h1>';
});


/*
Route::get('/contact', function () {
    return view('contact');
}); //методом get создаем страничку с формой, но т.к. форма post, то получить информацию нельзя. Делаем метод post и в форме action="send-email"

Route::post('/send-email', function () {
    if(!empty($_POST)) {
        dump($_POST);//красивая распечатка массива 
    }
    return 'Send email';
});//передаем  данные на страницу send-email
*/

//чтобы это сделать проще Метод 2
// Route::match(['post', 'get'], '/contact', function() {
//     if(!empty($_POST)) {
//         dump($_POST);//красивая распечатка массива 
//     }
//     return view('contact');
// });

//Использование именованных маршрутов Метод 3
Route::match(['post', 'get'], '/contact2', function() {
    if(!empty($_POST)) {
        dump($_POST);
    }
    return view('contact');
}) -> name('contact');
// теперь при смене названия страницы '/contact2' на любую другую страница все равно будет называться '/contact' и если используется много вьюшек, то менять в верстке название страницы не придется
Route::view('/test', 'test', ['test' => 'Test data']);

//Переадресация Статус 302. Страница найдена но идет временно переадресация на другую страницу
// Route::redirect('/home', '/contact2');
// Route::redirect('/home', '/contact2', 301); //можем добавить статус 301, страница всегда переходит на другую
//аналог предудущей записи - код 301
// Route::permanentRedirect('home', 'contact');

//Выбираем пост с номером 5, который передается в id
// Route::get('/post/{id}', function($id) {
//     return "Post $id";
// });
//агрумент id(можем назвать его как угодно) имеет ограничения по символам [0-9, a-z_]

// Route::get('post/{id}/{slug}', function ($id, $slug) {
//     return "Post $id and $slug";
// });
//slug  - это транслитерация назания статьи(поста и т.д.) - Название статьи = nazvanit statii. id - только цифры
// Route::get('post/{id}/{slug}', function ($id, $slug) {
//     return "Post $id and $slug";
// })-> where('id', '[0-9]+');

// Route::get('post/{id}/{slug}', function ($id, $slug) {
//     return "Post $id and $slug";
// })-> where(['id' => '[0-9]+', 'slug' => '[A-Za-z0-9-]+']);

//Можно описать глобально правила для id, slug и других возможных вариантов в App Providers RouteServiceProvider в методе boot

// Route::get('post/{id}/{slug}', function ($id, $slug) {
//     return "Post $id and $slug";
// });

//Как сделать аргументы маршрутов не обязательными
// Route::get('post/{id}/{slug?}', function ($id, $slug = null) {
//     return "Post $id and $slug";
// });
//После аргумнта, который является не обязатльным ставим ?


//Группировка правил

//Список постов. Привила для показа, редактирования и тд. Мы должны все это делать в админке, т.е. добавить admin/

Route::prefix('admin') ->group(function($id) {
    Route::get('posts', function() {
        return 'Posts List';
    });
    Route::get('post/create', function() {
        return 'Posts Create';
    });
    Route::get('post/{id}/edit', function($id) {
        return "Edit Post $id";
    })->name('post');//Это правило должно стоять выше  
});

Route::get('post/{id}/{slug?}', function ($id, $slug = null) {
    return "Post $id and $slug";
})->name('post');
//Это правило должно стоять ниже    
// Более конкретное правило должно стоять выше


// Более конкретное правило должно стоять выше
//Имена маршрутов должны быть уникальными

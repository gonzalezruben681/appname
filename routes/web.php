<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::view('/', 'welcome') -> name('home');
Route::view('/contact', 'contact') -> name('contact');
//Route::view('/blog', 'blog', ['posts' => $posts])-> name('blog');

/*
//para mostrar el listado del post
Route::get('/blog',[PostController::class, 'index' ]) -> name('posts.index');

Route::get('/blog/create',[PostController::class,'create']) -> name('posts.create');
Route::post('/blog', [PostController::class,'store'])->name('posts.store');

// para mostrar el detalle de un recurso por ejemplo de un post
Route::get('/blog/{post}',[PostController::class, 'show' ])->name('posts.show');
Route::get('/blog/{post}/edit',[PostController::class, 'edit' ])->name('posts.edit');
Route::patch('/blog/{post}',[PostController::class, 'update'])->name('posts.update');
Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
*/

Route::resource('/blog', PostController::class,[
    'names' => 'posts',
    'parameters' => ['blog' => 'post']
]); //con esto se crean las rutas automaticamente con los
// los middleware nos permite filtrar e inspeccionar las peticiones entrantes de la app
Route::view('/about', 'about')-> name('about');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login',[AuthenticatedSessionController::class,'store']);
Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

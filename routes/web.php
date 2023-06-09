<?php

use App\Models\User;
use App\Models\Meme;
use App\Models\Evaluation;
use App\Models\News;
use App\Models\TierList;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RankingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TierListController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TagController;

use GuzzleHttp\Middleware;

Route::get('/', [IndexController::class, 'index'])->name('index'); // Lista de memes

Route::get('/ranking', [RankingController::class, 'show'])->name('ranking');

Route::get('/tierlist', function () {
    return view('tierlist');
})->name('tierlist');

Route::get('/entrada', function () {
    return view('entrada');
})->name('entrada');

Route::get('/comentarios', function () {
    return view('comentarios');
})->name('comentarios');

Route::get('/noticias', function () {
    return view('noticias');
})->name('noticias');

Route::get('/resultados', function () {
    return view('resultados');
})->name('resultados');

Route::get('/noticia-entrada', function () {
    return view('noticia-entrada');
})->name('noticia-entrada');

Route::get('/tierlist', function () {
    return view('tierlist');
})->name('tierlist');

//Route::get('/tierlist-crear', function () {
//    return view('tierlist-crear');
//})->name('tierlist-crear');

Route::get('/tierlist-buscar',[TierListController::class, 'index'])->name('tierlist.index');
Route::put('/tierlist-post',[TierListController::class,'store'])->name('tierlist.store');
Route::get('/tierlist-jugar/{tierlistId}', [TierListController::class, 'jugar'])->name('tierlist.jugar'); 

/*Route::get('/tierlist-jugar', function () {
    return view('tierlist-jugar');
})->name('tierlist-jugar');*/

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/signin', [UserController::class, 'signin'])->name('user.signin');
Route::post('/signin', [UserController::class, 'postsignin'])->name('user.postsignin');

Route::get('/signup', [UserController::class, 'signup'])->name('user.signup');
Route::put('/signup', [UserController::class, 'create'])->name('user.create');

Route::post('/signout', [UserController::class, 'signout'])->name('user.signout');

Route::get('/u/me', [UserController::class, 'me'])->name('user.me');
Route::get('/u', [UserController::class, 'index'])->name('user.list');
Route::delete('/u', [UserController::class, 'delete'])->name('user.delete');
Route::post('/u', [UserController::class, 'update'])->name('user.update');
Route::get('/u/{username}', [UserController::class, 'show'])->name('user.show');

Route::get('/m', [MemeController::class, 'index'])->name('meme.list'); // Lista de memes
Route::get('/m/create', [MemeController::class, 'create'])->name('meme.create'); // View de creacion de memes
Route::put('/m', [MemeController::class, 'store'])->name('meme.store'); // Recepcion de formulario de creacion de memes
Route::delete('/m', [MemeController::class, 'delete'])->name('meme.delete'); // Eliminar memes
Route::post('/m', [MemeController::class, 'update'])->name('meme.update'); // Modificar memes
Route::get('/m/{memeId}', [MemeController::class, 'show'])->name('meme.show'); // Ver meme
Route::post('/m/like', [MemeController::class, 'like'])->name('meme.like'); // Like memes
Route::post('/m/dislike', [MemeController::class, 'dislike'])->name('meme.dislike'); // Dislike memes

Route::put('/e', [EvaluationController::class, 'store'])->name('evaluation.store'); // Recepcion de formulario de creacion de evaluations
Route::delete('/e', [EvaluationController::class, 'delete'])->name('evaluation.delete'); // Recepcion de formulario de eliminacion de evaluations
Route::post('/e', [EvaluationController::class, 'update'])->name('evaluation.update'); // Recepcion de formulario de modificacion de evaluations

// Panel de control solo para admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin.interface');
    Route::get('/admin/users', [AdminPanelController::class, 'usersInterface'])->name('admin.users');
    Route::get('/admin/memes', [AdminPanelController::class, 'memesInterface'])->name('admin.memes');
    Route::get('/admin/evaluations', [AdminPanelController::class, 'evaluationsInterface'])->name('admin.evaluations');
    Route::get('/admin/tags', [AdminPanelController::class, 'tagsInterface'])->name('admin.tags');
    Route::get('/admin/news', [AdminPanelController::class, 'newsInterface'])->name('admin.news');
    Route::get('/admin/tierLists', [AdminPanelController::class, 'tierListsInterface'])->name('admin.tierLists');

    Route::delete('/tag', [TagController::class, 'delete'])->name('tag.delete'); // Eliminar tags
    Route::delete('/news', [NewsController::class, 'delete'])->name('news.delete'); // Eliminar noticia
    Route::delete('/tierlist', [TierListController::class, 'delete'])->name('tierlist.delete'); // Eliminar tierlists

    Route::post('/news', [NewsController::class, 'update'])->name('news.update'); // Modificar noticia
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create'); // Interfaz de crear noticia
    Route::put('/news', [NewsController::class, 'store'])->name('news.store'); // Crear noticia
});

Route::get('/news', [NewsController::class, 'index'])->name('news.list'); // Lista de noticias
Route::get('/news/{newsId}', [NewsController::class, 'show'])->name('news.show'); // Ver noticia

// Solo si estás logeado puedes entrar
Route::group(['middleware' => 'login'], function () {
    Route::get('/m', [MemeController::class, 'index'])->name('meme.list'); // Lista de memes
    Route::get('/m/create', [MemeController::class, 'create'])->name('meme.create'); // View de creacion de memes
    Route::put('/m', [MemeController::class, 'store'])->name('meme.store'); // Recepcion de formulario de creacion de memes
    Route::delete('/m', [MemeController::class, 'delete'])->name('meme.delete'); // Eliminar memes
    Route::post('/m', [MemeController::class, 'update'])->name('meme.update'); // Modificar memes
    // Route::get('/m/{memeId}', [MemeController::class, 'show'])->name('meme.show'); // Ver meme
    Route::get('/tierlist-crear', function () {
        return view('tierlist-crear');
    })->name('tierlist-crear');
    Route::get('/editar-perfil', function () {
        return view('editar-perfil');
    })->name('editar-perfil');
});

Route::get('/informacion', function () {
    return view('informacion');
})->name('informacion');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// Route::get('/admin/news', function () {
//     $news = News::all();
//     return view('panel-control-news', ['news' => $news]);
// })->name('admin.news');

// Route::get('/admin/evaluation', function () {
//     $evaluation = Evaluation::all();
//     return view('panel-control-evaluation', ['evaluation' => $evaluation]);
// })->name('admin.evaluation');

// Route::get('/admin/tierlist', function () {
//     $tierlist = TierList::all();
//     return view('panel-control-tier-list', ['tierlist' => $tierlist]);
// })->name('admin.tierlist');

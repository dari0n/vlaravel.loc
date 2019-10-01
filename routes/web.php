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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'digging_deeper'],function(){
    Route::get('collections','DiggingDeeperController@collections')->name('digging_deeper.collections');
});

$blogGroupData = [
    'namespace' => 'Blog', //folder with controllers
    'prefix' => 'blog'  //url
];

Route::group($blogGroupData, function() { //namespace == subfolder Blog
    Route::resource('posts','PostController')->names('blog.posts');
});
//Route::resource('rest','RestTestController')->names('RestTest');


$adminGroupData = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog'
];

Route::group($adminGroupData, function (){
    $methods = ['index', 'edit', 'store', 'update', 'create','show'];
    //Admin Categories
    Route::resource('categories','CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');
    //Admin Posts
    Route::resource('posts','PostController')
        ->except(['show'])
        ->names('blog.admin.posts');
    Route::get('/posts/restore/{post}', 'PostController@restore')->name('blog.admin.posts.restore');
});



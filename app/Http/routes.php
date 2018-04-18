<?php

use App\Country;
use  App\Post; //importing model
use  App\User; //importing model
use  App\Photo; //importing model
use  Carbon\Carbon; //importing model


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

//
///*
//|--------------------------------------------------------------------------
//| Data base Queries
//|--------------------------------------------------------------------------
//|
//|
//*/
//Route::get('/insert', function () {
//    //both queries are correct
//
//    //DB::insert('insert into posts(content,body) values(?,?)', ['PHP with Laravel and mysql','Laravel is the not best thing'] );
//    DB::table('posts')->insert(
//        ['content' => 'Another entry through Laravel', 'body' => 'Laravel is easy']
//    );
//});
//Route::get('/read', function () {
//
//
//    //   $posts = DB::table('posts')->select('body', 'content')->where('id','=','9')->get();
//    $posts = DB::select('select * from posts where id = ?', [9]);
//
//
////      return $posts;
//
//
//    foreach ($posts as $result) {
//
//        return $result->body;
//
//    }
//
//
//});
//Route::get('/update', function () {
//
//    DB::table('posts')->where('id', 1)->update(['content' => 'I am updated! Thanks']);
//});
//Route::get('/delete', function () {
//
//    DB::table('posts')->where('id', '=', 1)->delete();
//});
//
////-----------------------------------END of DATABASE-----------------------
//
//
///*
//|--------------------------------------------------------------------------
//|--------------------------Common routes-----------------------------------
//|--------------------------------------------------------------------------
//|
//|
//*/
//
//Route::get('/posts', function () {
//    return view('posts');
//});
////to get anything form the url
//Route::get('/posts/{id}/{name}', function ($id, $name) {
//
//    return "This is post number " . $id . " " . $name;
//});
//Route::get('admin/posts/example', array("as" => 'admin.home', function () {
//
//
//    $url = route('admin.home');
//
//    return "this url is " . $url;
//
//}));
////Route::resource('crud', 'PostsController'); //resouce method automatically cread the crud routes or posts just check by php artisan route:list
//Route::get('/contact', 'PostsController@contact');
//Route::get('/post/{id}/{name}', 'PostsController@show');
//
////------End of Common Routes-----------------------------------------------
//
//
///*
//|--------------------------------------------------------------------------
//|----------------------------ELOQUENT -------------------------------------
//|--------------------------------------------------------------------------
//|
//|
//*/
//
//Route::get('/find', function () {
//    $posts = post::all(); //it is pulling all the methods of the post model
//    foreach ($posts as $post) {
//        return $post->content;
//    }
//});
//Route::get('/findSpecificPost', function () {
//
//    $posts = post::find(17); //it is pulling all the methods of the post model
//
//    return $posts;
//});
//Route::get('/findwhere', function () {
//
//    $posts = Post::where('id', 10)->orderBy('id', 'desc')->take(1)->get();
//
//    return $posts;
//
//});
//Route::get('findmore', function () {
//
//    //  $posts = Post::FindorFail(2);
//    //  return $posts;
//
//    $posts = Post::where('users_count', '<', 50)->firstOrFail();
//
//});
//Route::get('/basicinsert', function () {
//
//    $post = new Post();
//    $post->body = 'New Eloquent';
//    $post->content = 'WoW Eloquent is really cool, look at this content';
//    $post->save();
//});
//Route::get('/basicupdate', function () {
//    $post = Post::find(8);
//    $post->body = 'New Eloq';
//    $post->content = 'WoW Eloque really cool, look at this content';
//    $post->save();
//    if ($post) {
//        return "Done!";
//    }
//});
//Route::get('/create', function () {
//
//    Post::create(['body' => 'the create methd', 'content' => 'WoW!I\'am learning the php with EDWIN']);
//
//});
//Route::get('/updatecondition', function () {
//
//
//    Post::where('id', 8)->where('body', 'New Eloq')->update(['body' => 'Updated thing', 'content' => 'Updated content']);
//
//
//});
//Route::get('/basicdelete', function () {
//
//    $post = Post::find(17);
//
//    $post->delete();
//
//
//});
//Route::get('/basicdelete2', function () {
//
//    //Post::destroy(8);
//    Post::destroy([9, 11]);
//    // Post::where('is_admin',0)->delete();
//
//
//});
//Route::get('/softdelete', function () {
//    Post::find(19)->delete();
//});
//Route::get('/readsoftdelete', function () {
//
//
////$result = Post::withTrashed()->where('id',17)->get();
//    //or
//    $result = Post::onlyTrashed()->where('male', 0)->get();
//
//    return $result;
//
//
//});
//Route::get('/restore', function () {
//
//    Post::withTrashed()->where('male', 0)->restore();
//
//});
//Route::get('/forcedelete', function () {
////Post::withTrashed()->where('male',0)->forceDelete(); //it will delete every thing
//    Post::onlyTrashed()->where('male', 0)->forceDelete();//it will delete only trashed items
//});
//
//
///*
//|--------------------------------------------------------------------------
//|----------------------------ELOQUENT Relationship-------------------------
//|--------------------------------------------------------------------------
//|
//|
//*/
//
////--------One to One relationship-----------------
//
//Route::get('/user/{id}/post', function ($id) {
////one 2 one
//    return User::find($id)->post;
//    //post is the function in the model USER
//
//});
//
//
//Route::get('/postEL/{id}/user', function ($id) {
//
//    //one 2 one reverse
//    return Post::find($id)->user->name;
//
//});
//
//Route::get('/postonetomany', function () {
//
////one to many relationship ---------------------
////one user could have multiple posts
//    $user = User::find(1);
//    foreach ($user->posts as $post) {
//
//        echo $post->body . "<br>";
//        //don't use return, it will only return the one value not more then that
//
//    }
//});
//
//
////Many to many relationship with pivot table
//
//Route::get('/postmanytomany/{id}/role', function ($id) {
//
//    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
//    echo $user;
//
//
////    $user = User::find($id);
////    echo $user;
//// foreach ($user->roles as $role){
////
////     echo $role->name;
//// };
//});
//
//
//// Accessing the intermediate table or accessing the piviot table
//
//
//Route::get('user/pivot', function () {
//
//    $user = User::find(1);
//
//    foreach ($user->roles as $role) {
//        return $role->pivot->created_at;
//    }
//
//
//});
//
//
////many tomany polymorphic Relations
//
//Route::get('user/photos', function () {
//
//    $user = User::find(1);
//
//        foreach ($user->photos as $photo) {
//        return $photo;
//    }
//
//
//});
//
////finding the post images of the first post.
//
//Route::get('post/photos', function () {
//
//    $post = Post::find(27);
//
//        foreach ($post->photos as $photo) {
//        echo     $photo;
//    }
//
//
//});
////inverse of polymorphic relationship
//
//Route::get('photo/{id}/user', function ($id) {
//
//   $photo = Photo::findOrFail($id);
//    return $photo->imageable;
//
//});
//
//
//
//////
////Route::get('post/tag', function () {
////    $post = Post::find(26);
////    foreach ($post->tags as $tag) {
////        echo     $tag->name;
////    }
////});
//

/*
|--------------------------------------------------------------------------
|CRUD Application
|--------------------------------------------------------------------------
|*/



//Route::resource('posts','PostsController');



    Route::resource('posts','PostsController');


/*
|--------------------------------------------------------------------------
|Date
|--------------------------------------------------------------------------
|*/


    Route::get('/dates',function(){

    echo Carbon::now();

    //0r
    echo "<br>";
    echo Carbon::now()->diffForHumans();
    //0r
        echo "<br>";
        echo Carbon::now()->subMonths(5)->diffForHumans();
    });

/*
|--------------------------------------------------------------------------
|Accessors/ Mutators
|--------------------------------------------------------------------------
|*/

    Route::get('/getname_accessors',function(){


        $user = User::find(1);

        echo $user->name;

    });

    Route::get('/setname_accessors',function(){


        $user = User::find(1);

        $user->name = "Mohsin Younas";
        $user->save();

    });
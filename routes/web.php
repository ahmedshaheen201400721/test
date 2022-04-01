<?php

use App\Container;
use App\Example;
use App\ExampleFacade;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

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

Auth::loginUsingId(1);
Route::get('/', function () {
    return inertia('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard',[
        'name' => "Welcome to the Laravel Jetstream Starter aaaaaaaaaaaaaaaaaaa",
    ]);
})->name('dashboard');

Route::get('test',function(){
    sleep(1);
   return inertia("Test");
})->name('test');

Route::post('test',function(){
    dd('ahmed');
   return inertia("Test");
})->name('test.post');


Route::get('about',function(){
    return inertia('About');
})->name('about');



Route::get('contact',function(){
    return inertia('Contact');
})->name('contact');


Route::get('/posts/{post}', function (Post $post) {
    return inertia('Posts/Show', [
        'post' => $post,
    ]);
})->name('posts.show');

Route::get('users',function(Request $request){
//    dd($request,request());
dd(File::getRequire(base_path('lang/en/test.php')));
echo asset('storage/example.txt');

Storage::put('example.txt', 'Contents');

dd( Storage::get('example.txt'));
dd( File::get(resource_path('views/app.blade.php')));


    dd(ExampleFacade::get());
    // dd(app(App\Example::class));
    app()->bind('example',function(){
        return new App\Example(config('services.foo'));
    });
dd( app('example'),resolve('example'),app()->make('example'));


    return inertia('Users',[
        'users' => User::query()
        ->when(request('search'), function ($query) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        })
        ->paginate(10)
        ->withQueryString()
        ->through(function($user){
            return [
                'name' => $user->name,
                'email' => $user->email,
                'posts' => $user->posts->count(),
            ];
        }),
        'search' => request('search'),
    ]);
})->name('users');

Route::get('users/create',function(){
    return inertia('CreateUsers');
})->name('users.create');

Route::post('users/store',function(Request $request){

    User::create( $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',

    ]));
    return redirect()->route('users')->with('error','User created successfully');
})->name('users.store');



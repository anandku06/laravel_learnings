<?php

use App\Http\Controllers\baseController;
use App\Http\Controllers\resController;
use App\Http\Controllers\singleController;
use App\Http\Middleware\countryCheck;
use App\Http\Middleware\elgibleUser;
use App\Http\Middleware\validUser;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('app');

// named route example
// This will return the 'home' view when the /home route is accessed, and you can use the route name 'home' to generate URLs or redirects to this route in your application
Route::view('/home', 'home')->name('home'); // This will return the 'home' view when the /home route is accessed

// Route::get('/about', function () {
//     return view('about'); // Assuming you have an 'about.blade.php' view file in your resources/views directory
// });

// Route::get('/about', [baseController::class, 'about']); // This will call the 'about' method of the 'baseController' when the /about route is accessed, and it assumes that you have an 'about.blade.php' view file in your resources/views directory

Route::get('/abc', function () {
    return 'abc'; // This will return a simple string response when the /abc route is accessed
});

// without using get method
Route::view('/contact', 'contact'); // This will return the 'contact' view when the /contact route is accessed

// route for multiplication table, takes a number as a parameter and returns the multiplication table for that number
Route::view('/multiplication-table/{number?}', 'table')->whereNumber('number'); // This will return the 'multiplication-table' view when the /multiplication-table/{number} route is accessed, where {number} is a parameter that can be used in the view to display the multiplication table for that number

// optional parameter example,
Route::view('/users/{name?}', 'users'); // This will return the 'users' view when the /users route is accessed

// routing parameters constraints example
Route::view('/posts/{id}', 'post')->where('id', '[0-9]+'); // This will return the 'post' view when the /posts/{id} route is accessed, where {id} is a parameter that must be a number (due to the regex constraint)

Route::view('/categories/{slug?}', 'category')->where('slug', '[a-z0-9-]+'); // This will return the 'category' view when the /categories/{slug} route is accessed, where {slug} is a parameter that must be a string containing lowercase letters, numbers, and hyphens (due to the regex constraint)

Route::get('/sum/{a}/{b}', function ($a, $b) {
    $sum = $a + $b;

    return "The sum of $a and $b is: $sum";
})->where(['a' => '[0-9]+', 'b' => '[0-9]+']); // This will return the sum of two numbers when the /sum/{a}/{b} route is accessed, where {a} and {b} are parameters that can be used in the closure to calculate the sum

Route::view('/student/{roll}/{name?}', 'student')->where('roll', '[0-9]+'); // This will return the 'student' view when the /student/{roll} route is accessed, where {roll} is a parameter that must be a number (due to the regex constraint)

// methods to pass data to views example
Route::get('/profile/{username}', function ($username) {
    return view('profile', ['username' => $username]); // This will return the 'profile' view when the /profile/{username} route is accessed, where {username} is a parameter that can be used in the view to display the user's profile information

    return view('profile')->with('username', $username); // This will return the 'profile' view when the /profile/{username} route is accessed, where {username} is a parameter that can be used in the view to display the user's profile information

    return view('profile', compact('username')); // This will return the 'profile' view when the /profile/{username} route is accessed, where {username} is a parameter that can be used in the view to display the user's profile information

    return view('profile')->withUsername($username); // This will return the 'profile' view when the /profile/{username} route is accessed, where {username} is a parameter that can be used in the view to display the user's profile information
})->where('username', '[a-zA-Z0-9_-]+'); // This will return the 'profile' view when the /profile/{username} route is accessed, where {username} is a parameter that must be a string containing letters, numbers, underscores, and hyphens (due to the regex constraint)

// fallback route example, this will catch any routes that are not defined and return a 404 error page
Route::fallback(function () {
    return view('not_found'); // Assuming you have a '404.blade.php' view file in your resources/views directory
});

// response() function example, this will return a JSON response when the /json route is accessed
// it returns a JSON object with a message and a status code of 200 (OK), and you can customize the response by adding more data to the array or changing the status code

// simple text response example
Route::get('/text', function () {
    return response('This is a simple text response', 200)
        ->header('Content-Type', 'text/plain'); // This will return a simple text response when the /text route is accessed, with a status code of 200 (OK) and a Content-Type header of 'text/plain'
});

// JSON response example
Route::get('/json', function () {
    $res = [
        'message' => 'This is a JSON response',
        'status' => 200,
    ];

    return $res; // This will return a JSON response when the /json route is accessed, with a status code of 200 (OK) and a Content-Type header of 'application/json'
});

// view response example
Route::get('/view', function () {
    return response()->view('home')
        ->header('Content-Type', 'text/html'); // This will return the 'home' view when the /view route is accessed, with a status code of 200 (OK) and a Content-Type header of 'text/html', and it also passes a variable 'name' to the view that can be used to display a personalized home message
});

// redirectTo() example
Route::get('/redirect', function () {
    return response()->redirectTo('/home'); // This will redirect the user to the /home route when the /redirect route is accessed, with a status code of 302 (Found)
});

// laravel cookies
// 1. setting a cookie -> cookie('cookie_name', 'cookie_value', $minutes);
Route::get('/set-cookie', function () {
    return response('Cookie has been set!')->cookie('my_cookie', 'cookie_value', 6); // This will set a cookie named 'my_cookie' with the value 'cookie_value' that expires in 6 minutes when the /set-cookie route is accessed
});

// 2. getting a cookie -> request()->cookie('cookie_name');
Route::get('/get-cookie', function () {
    $cookieValue = request()->cookie('my_cookie');

    return "The value of 'my_cookie' is:".($cookieValue ?? 'Cookie not found!'); // This will return the value of the 'my_cookie' cookie when the /get-cookie route is accessed, or it will return null if the cookie does not exist
});

// 3. deleting a cookie -> cookie()->forget('cookie_name');
// using Cookie facade to delete a cookie
Route::get('/delete-cookie', function () {
    $cook = Cookie::forget('my_cookie');

    return response('Cookie has been deleted!')->withCookie($cook); // This will delete the 'my_cookie' cookie when the /delete-cookie route is accessed, and it will return a response indicating that the cookie has been deleted
});

// using cookie helper function to delete a cookie
Route::get('/del-cookie', function () {
    return response('Cookie has been removed!')->cookie(cookie()->forget('my_cookie')); // This will delete the 'my_cookie' cookie when the /del-cookie route is accessed, and it will return a response indicating that the cookie has been removed
});

// using cookie facade to set a cookie with additional options
// Cookie::make('cookie_name', 'cookie_value', $minutes, $path, $domain, $secure, $httpOnly);
// Cookie::queue('cookie_name', 'cookie_value', $minutes, $path, $domain, $secure, $httpOnly);
// difference between Cookie::make() and Cookie::queue() is that Cookie::make() creates a cookie instance that you can then attach to a response using withCookie(), while Cookie::queue() automatically queues the cookie to be included in the next response without needing to manually attach it
Route::get('/set-secure-cookie', function () {
    $cookie = Cookie::make('secure_cookie', 'secure_value', 10, null, null, true, true);
    // $cookie = Cookie::queue('secure_cookie', 'secure_value', 10, null, null, true, true);

    return response('Secure cookie has been set!')->withCookie($cookie);
});

// get cookie using Cookie facade
Route::get('/get-secure-cookie', function () {
    $cookieValue = Cookie::get('secure_cookie');
    // $cookieValue = $request->cookie('secure_cookie');

    return "The value of 'secure_cookie' is:".($cookieValue ?? 'Cookie not found!');
});

// subviews example
Route::get('/dash', function () {
    return view('admin.dashboard'); // This will return the 'admin.dashboard' view when the /dash route is accessed, and it assumes that you have a 'dashboard.blade.php' file inside the 'admin' directory within your resources/views directory
});

// using controllers example
// Route::get('/base', [baseController::class, 'index']); // This will call the 'index' method of the 'baseController' when the /base route is accessed

// group function example, this will group the routes together and apply the same controller to all the routes defined within the group, so the /base route will call the 'index' method of the 'baseController' and the /about-us route will call the 'about' method of the 'baseController'
Route::controller(baseController::class)->group(function () {
    Route::get('/base', 'index'); // This will call the 'index' method of the 'baseController' when the /base route is accessed
    Route::get('/about-us', 'about'); // This will call the 'about' method of the 'baseController' when the /about-us route is accessed
});

// prefix function example, this will add the prefix 'admin' to all the routes defined within the group, so the /dashboard route will become /admin/dashboard and the /settings route will become /admin/settings
Route::prefix('admin')->group(function () {
    Route::get('/home', [baseController::class, 'index']); // This will call the 'index' method of the 'baseController' when the /admin/dashboard route is accessed
    Route::get('/about', [baseController::class, 'about']); // This will call the 'about' method of the 'baseController' when the /admin/settings route is accessed
})->middleware(validUser::class); // This will apply the 'validUser' middleware to all the routes defined within the group, so only valid users will be able to access these routes, and if a user is not valid, they will receive a 403 Unauthorized response

// single controller
Route::get('/single', singleController::class);

// // resource controller
Route::resource('/resource', resController::class);

// middleware example, this will apply the 'validUser' middleware to the /protected route, so only valid users will be able to access this route, and if a user is not valid, they will receive a 403 Unauthorized response
Route::get('/protected', function () {
    return 'This is a protected route that only valid users can access.';
})->middleware(validUser::class); // This will apply the 'validUser' middleware to the /protected route, so only valid users will be able to access this route, and if a user is not valid, they will receive a 403 Unauthorized response

Route::get('/eligible/{age}', function ($age) {
    return 'This route is only accessible to eligible users.';
})->middleware(elgibleUser::class); // This will apply the 'elgibleUser' middleware to the /eligible route, so only eligible users will be able to access this route, and if a user is not eligible, they will receive a 403 Unauthorized response

Route::get('/country-check/{country}', function ($country) {
    return 'This route is only accessible to users from allowed countries.';
})->middleware(countryCheck::class); // This will apply the 'countryCheck' middleware to the /country-check route, so only users from allowed countries will be able to access this route, and if a user is not from an allowed country, they will receive a 403 Unauthorized response, and if a user is from an allowed country, they will receive a JSON response indicating that their country is allowed to access the route

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

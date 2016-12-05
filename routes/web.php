<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

# Index page to show all the paintings
Route::get('/gallery', 'GalleryController@index')->name('gallery.index');
# Show an individual painting
Route::get('/gallery/{titlePaint}', 'GalleryController@show')->name('gallery.show');


# Show a form to request a new painting
Route::get('/request', 'RequestController@create')->name('request.create');
# Process the form to request a new painting
Route::post('/request', 'RequestController@store')->name('request.store');
# Show form to edit a request
Route::get('/request/{requestNum}/edit', 'RequestController@edit')->name('request.edit');
# Process form to edit a request
Route::put('/request/{requestNum}', 'RequestController@update')->name('request.update');
# Get route to confirm deletion of request
Route::get('/request/{requestNum}/delete', 'RequestController@delete')->name('request.destroy');
# Delete route to actually destroy the request
Route::delete('/books/{requestNum}', 'RequestController@destroy')->name('request.destroy');


Route::get('/about', 'PageController@about')->name('page.about');

# Make it so the logs can only be seen locally
if(App::environment() == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}


# For migrations
if(App::environment('local')) {
    Route::get('/drop', function() {
        DB::statement('DROP database requests');
        DB::statement('CREATE database requests');
        return 'Dropped requests; created requests.';
    });
};

// FOR PRACTICE
 // Route::get('/debug', function() {
//
//     echo '<pre>';
//
//     echo '<h1>Environment</h1>';
//     echo App::environment().'</h1>';
//
//     echo '<h1>Debugging?</h1>';
//     if(config('app.debug')) echo "Yes"; else echo "No";
//
//     echo '<h1>Database Config</h1>';
//     /*
//     The following line will output your MySQL credentials.
//     Uncomment it only if you're having a hard time connecting to the database and you
//     need to confirm your credentials.
//     When you're done debugging, comment it back out so you don't accidentally leave it
//     running on your live server, making your credentials public.
//     */
//     //print_r(config('database.connections.mysql'));
//
//     echo '<h1>Test Database Connection</h1>';
//     try {
//         $results = DB::select('SHOW DATABASES;');
//         echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
//         echo "<br><br>Your Databases:<br><br>";
//         print_r($results);
//     }
//     catch (Exception $e) {
//         echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
//     }
//
//     echo '</pre>';
//
// });

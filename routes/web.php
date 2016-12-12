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

Route::get('/', 'PageController@welcome');


# Index page to show all the artwork
Route::get('/artwork', 'GalleryController@index')->name('artwork.index')->middleware('auth');
# Show a form to submit a new piece
Route::get('/artwork/create', 'GalleryController@create')->name('artwork.create')->middleware('auth');
# Process the form to submit a new piece
Route::post('/artwork', 'GalleryController@store')->name('artwork.store');
# Show one painting
Route::get('/artwork/{title}', 'GalleryController@show')->name('artwork.show');
# Show form to edit a piece's information
Route::get('/artwork/{id}/edit', 'GalleryController@edit')->name('artwork.edit');
# Process form to edit one of your pieces
Route::put('/artwork/{id}', 'GalleryController@update')->name('artwork.update');
# Get route to confirm deletion of an art submission
Route::get('/artwork/{id}/delete', 'GalleryController@delete')->name('artwork.destroy');
# Delete route to actually destroy the art submission
Route::delete('/artwork/{id}', 'GalleryController@destroy')->name('artwork.destroy');


# Index page to show all the artworks
Route::get('/gallery', 'PageController@index')->name('page.gallery');
Route::get('/about', 'PageController@about')->name('page.about');

# Make it so the logs can only be seen locally
if(App::environment() == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}


# For migrations
if(App::environment('local')) {
    Route::get('/drop', function() {
        DB::statement('DROP database artworks');
        DB::statement('CREATE database artworks');
        return 'Dropped artworks; created artworks.';
    });
};

FOR PRACTICE
 Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'PageController@welcome');



Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');

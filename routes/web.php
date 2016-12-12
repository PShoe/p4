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


Route::get('/artwork', 'GalleryController@index')->name('artwork.index')->middleware('auth');
Route::get('/artwork/create', 'GalleryController@create')->name('artwork.create')->middleware('auth');
Route::post('/artwork', 'GalleryController@store')->name('artwork.store');
Route::get('/artwork/{title}', 'GalleryController@show')->name('artwork.show');
Route::get('/artwork/{id}/edit', 'GalleryController@edit')->name('artwork.edit');
Route::put('/artwork/{id}', 'GalleryController@update')->name('artwork.update');
Route::get('/artwork/{id}/delete', 'GalleryController@delete')->name('artwork.destroy');
Route::delete('/artwork/{id}', 'GalleryController@destroy')->name('artwork.destroy');

Route::get('/gallery', 'PageController@index')->name('page.gallery');
Route::get('/about', 'PageController@about')->name('page.about');

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/logout','Auth\LoginController@logout')->name('logout');

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

// FOR PRACTICE
 Route::get('/debug', function() {

    echo '<pre>';
    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';
    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";
    echo '<h1>Database Config</h1>';
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

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    //Home Section
    Route::get('/', ['uses' => 'HomeController@frontpage', 'as' => 'home']);

    Route::get('page/{slug}', ['uses' => 'PagesController@show', 'as' => 'pages']);
    Route::get('dealers', ['uses' => 'UsersController@showCompanyUsers', 'as' => 'companies']);
    Route::get('dealers-search', ['uses' => 'UsersController@searchDealers', 'as' => 'dealers-search']);
    Route::get('/imgresize', function(){
        header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 3600 * 24 * 30)); //One month
        if(isset($_GET['src'])){
            $_GET['src'] = public_path() . "/" . $_GET['src'];
            require public_path(). '/thumb/phpThumb.php';
        }else{
            return Response::view('errors.404');
        }
    });
    Route::get('create-ad', function(){
        return Redirect::route('select-category');
    });
    Route::group(['prefix' => 'member-area'], function () {
        // Member Area
        Route::get('/', ['uses' => 'UsersController@MemberArea', 'as' => 'member-area']);
        //Member Ads Route
        Route::get('my-ads', ['uses' => 'UsersController@userAds', 'as' => 'my-ads']);
        // Wishlist Routes
        Route::get('my-wishlist', ['uses' => 'WatchlistController@index', 'as' => 'my-wishlist']);
        Route::get('my-wishlist/delete/{postid}', ['uses' => 'WatchlistController@delete', 'as' => 'delete-wishlist']);
        Route::any('my-wishlist/add', ['uses' => 'WatchlistController@store', 'as' => 'add-wishlist']);
        Route::group(['middleware'=>'buyerandseller'], function(){
            Route::get('my-profile', ['uses' => 'UsersController@showProfile', 'as' => 'my-profile']);
            Route::post('my-profile', ['uses' => 'UsersController@updateProfile', 'as' => 'update-profile']);
        });
        Route::group(['middleware'=>'vendor'], function(){
            Route::get('company-profile', ['uses' => 'UsersController@showCompanyEditProfile', 'as' => 'edit-company-profile']);
            Route::post('company-profile', ['uses' => 'UsersController@updateCompanyProfile', 'as' => 'update-company-profile']);
        });
        // Comapny Profile

        // Change Password Routes
        Route::get('change-password', ['uses' => 'UsersController@changePassword', 'as' => 'change-password']);
        Route::post('change-password', ['uses' => 'UsersController@updatePassword', 'as' => 'update-password']);

        Route::group(['middleware'=>'sellerandvendor'], function() {
            // Post/Category Add Update Delete Route
            Route::get('create-ad/step1', ['uses' => 'PostsController@selectCategory', 'as' => 'select-category']);
            Route::get('create-ad/step2', ['uses' => 'PostsController@ShowCreate', 'as' => 'new-ad']);
            Route::post('create-ad/step2', ['uses' => 'PostsController@savePost', 'as' => 'create-ad']);
            Route::get('edit-ad/{postid}', ['uses' => 'PostsController@showEdit', 'as' => 'ad-edit']);
            Route::post('update-ad', ['uses' => 'PostsController@UpdatePost', 'as' => 'ad-update']);
            Route::get('delete-ad/{postid}', ['uses' => 'PostsController@deletePost', 'as' => 'ad-delete']);
            Route::get('mark-sold/{postid}', ['uses' => 'PostsController@markAsSold', 'as' => 'mark-sold']);
            Route::get('mark-publish/{postid}', ['uses' => 'PostsController@MarkAsPublished', 'as' => 'mark-publish']);
            Route::post('getsubcategory', ['uses' => 'CategoriesController@SelectSubCategory', 'as' => 'getsubcategory']);
            // Post Images Add/Update/Delete Routes
            Route::get('my-ad/uploadimage/{post_id}', ['uses' => 'GalleryController@uploadGalleryImages', 'as' => 'add-images']);
            Route::any('uploadimage', ['uses' => 'GalleryController@UploadImages', 'as' => 'upload-ad-images']);
            Route::any('showgalleryimages', ['uses' => 'GalleryController@showGalleryImagesInstantly', 'as' => 'show-gallery-image-ajax']);
            Route::any('my-ad/deleteimage/{imageid}', ['uses' => 'GalleryController@deleteImages', 'as' => 'delete-ad-images']);
        });
        Route::group(['middleware'=>'administrator'], function() {
            Route::get('mark-featured/{postid}', ['uses' => 'PostsController@MarkAsFeatured', 'as' => 'mark-featured']);
            Route::get('mark-unfeatured/{postid}', ['uses' => 'PostsController@MarkAsNotFeatured', 'as' => 'mark-notfeatured']);
        });
    });

    // User Section
    Route::get('login', 'Auth\AuthController@showLogin');
    Route::post('login', 'Auth\AuthController@doLogin');
    Route::get('logout', 'Auth\AuthController@doLogout');
    Route::get('register', 'Auth\AuthController@showRegister');
    Route::post('register', 'Auth\AuthController@RegisterUser');
    Route::get('resendEmail', [
        'as' => 'user',
        'uses' => 'Auth\AuthController@resendEmail'
    ]);
    Route::get('activate/{code}', [
        'as' => 'user',
        'uses' => 'Auth\AuthController@activateAccount'
    ]);
    // LARAVEL SOCIALITE AUTHENTICATION ROUTES
    Route::get('social/redirect/{provider}', [
        'as' => 'social.redirect',
        'uses' => 'Auth\AuthController@getSocialRedirect'
    ]);
    Route::get('social/handle/{provider}', [
        'as' => 'social.handle',
        'uses' => 'Auth\AuthController@getSocialHandle'
    ]);
    Route::controllers([
        'password' => 'Auth\PasswordController',
    ]);
    // Popular Post Routes
    Route::get('popular-ads', ['uses' => 'HomeController@popularAds', 'as' => 'popular-ads']);
    // Recent Post Route
    Route::get('recent-ads', ['uses' => 'HomeController@recentAds', 'as' => 'recent-ads']);
    //Search Route
    Route::get('search', ['uses' => 'PostsController@searchPosts', 'as' => 'search']);
    //Categories Section
    Route::get('categories/{hierarchy}', 'CategoriesController@show')->where('hierarchy', '(.*)?');
    // Single Post Section
    Route::get('{slug}', ['uses' => 'PostsController@show', 'as' => '{slug}']);
    //Route::any('select-subcategory', ['uses' => 'CategoriesController@SelectSubCategory', 'as' => 'select-subcategory']);
    // Company Profile Routes

    Route::get('dealers/{slug}', ['uses' => 'UsersController@showCompanyProfile', 'as' => 'company-profile']);
});
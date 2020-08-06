<?php

// Customer
Route::get('/','Customer\HomeController@getHome')->name('customer.home');//home user
Route::get('about','Customer\HomeController@getAbout')->name('customer.about');//home user
Route::get('chinh-sach-mua-hang','Customer\HomeController@getShip')->name('customer.ship');//home user
Route::get('seach','Customer\HomeController@getSeachResult');
Route::get('category/{id}/{unsigned_name}','Customer\CategoryController@getCategory'); // product by category
// show detail product and comment
Route::get('detail/{id}/{unsigned_name}.html','Customer\ProductController@getDetailProduct');
Route::get('banner/{id}/{unsigned_name}.html','Customer\HomeController@getSlideDetail')->name('bannerdetail');
Route::post('detail/{id}/{unsigned_name}.html','Customer\ProductController@postConment');

Route::get('all','Customer\ProductController@getAllProduct');

Route::group(['prefix'=>'cart'],function(){
    Route::get('addcart/{id}','Customer\CartController@getAddCart');
    Route::get('showcart','Customer\CartController@getShowCart');
    Route::get('deletecart/{id}','Customer\CartController@getDeleteCart');
    Route::get('updatecart','Customer\CartController@getUpdateCart');
    Route::post('postcart','Customer\CartController@postCart');
    Route::post('select-cart','Customer\CartController@selectCart')->name('select-cart');
});
Route::get('complete/{id}/{email}/{name}.html','Customer\CartController@getComplete')->middleware('checkcomplete');

// Admin

Route::get('admin/login', 'Admin\LoginController@getLogin')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@postLogin');
Route::get('admin/logout','Admin\LoginController@outLogin')->name('admin.logout');
// login with google
Route::get('login/google', 'Admin\LoginController@redirectToGoogle')->name('admin.login.google');
Route::get('login/google/callback', 'Admin\LoginController@handleGoogleCallback');

Route::get('ncovid', function(){
    $json_string = 'https://ncovi.huynhhieu.com/api.php?code=external';
    $jsondata = file_get_contents($json_string);
    $data = json_decode($jsondata,true);
    $data['data'] = ($data['data']);

    $cases = 0;
    $deaths = 0;
    $recovered = 0;

    foreach ($data['data'] as $value) {
        if ($value['country'] == "Vietnam") {
            $data['vn'] = [
                'cases' => $value['cases'],
                'deaths' => $value['deaths'],
                'recovered' => $value['recovered']
            ];
        }

        $cases += str_replace(",", "", $value['cases']);
        $deaths += str_replace(",", "", $value['deaths']);
        if (!($value['recovered'] == "N/A")) {
            $recovered += str_replace(",", "", $value['recovered']);
        }
    }

    $data['world'] = [
        'cases' => $cases,
        'deaths' => $deaths,
        'recovered' => $recovered + 205849
    ];
    return view("ncovid", ['data' => $data]);
});

Route::group(['prefix' => 'admin', 'middleware' => 'checklogin'], function() {

    Route::get('/', 'Admin\HomeController@getHome')->name('admin.home');
    Route::get('404','Admin\HomeController@get404')->name('404');

    Route::get('profile','Admin\HomeController@getProfile')->name('admin.profile');

    Route::get('edit-profile','Admin\HomeController@getEditProfile')->name('admin.edit');
    Route::post('edit-profile','Admin\HomeController@postEditProfile');

    Route::get('change-password','Admin\HomeController@getChangePass')->name('admin.changepass');
    Route::post('change-password','Admin\HomeController@postChangePass');
    // banner
    Route::group(['prefix' => 'banner', 'middleware' => 'banner'], function(){
        Route::get('/','Admin\BannerController@getIndex')->name('listbanner');

        Route::get('add','Admin\BannerController@getAdd')->name('addbanner');
        Route::post('add','Admin\BannerController@postAdd');

        Route::get('edit/{id}','Admin\BannerController@getEdit');
        Route::post('edit/{id}','Admin\BannerController@postEdit');

        Route::get('delete/{id}', 'Admin\BannerController@getDelete');
        
    });
    // nhà cung cấp
    Route::group(['prefix' => 'carrier', 'middleware' => 'carrier'], function() {
        Route::get('/', 'Admin\CarrierController@getIndex')->name('listcarrier');

        Route::get('add', 'Admin\CarrierController@getAdd')->name('addcarrier');
        Route::post('add', 'Admin\CarrierController@postAdd');

        Route::get('edit/{id}', 'Admin\CarrierController@getEdit');
        Route::post('edit/{id}', 'Admin\CarrierController@postEdit');

        Route::get('delete/{id}', 'Admin\CarrierController@getDelete');
    });

    Route::group(['prefix' => 'category', 'middleware' => 'category'], function() {
        Route::get('/', 'Admin\CategoryController@getIndex')->name('listcate');

        Route::get('add', 'Admin\CategoryController@getAdd')->name('addcate');
        Route::post('add', 'Admin\CategoryController@postAdd');

        Route::get('edit/{id}', 'Admin\CategoryController@getEdit');
		Route::post('edit/{id}', 'Admin\CategoryController@postEdit');

        Route::get('delete/{id}', 'Admin\CategoryController@getDelete');
    });

    Route::group(['prefix'=>'product', 'middleware' => 'product'], function(){
        Route::get('/','Admin\ProductController@getIndex')->name('listproduct');

        Route::get('add','Admin\ProductController@getAdd')->name('addproduct');
        Route::post('add','Admin\ProductController@postAdd');

        Route::get('edit/{id}','Admin\ProductController@getEdit')->name('editproduct');
        Route::post('edit/{id}','Admin\ProductController@postEdit');

        Route::get('delete/{id}', 'Admin\ProductController@getDelete');
    });

    Route::group(['prefix' => 'order'],function(){
        Route::get('/','Admin\OrderController@getOrder')->name('listorder')->middleware('listorder');
        Route::get('listdelivery','Admin\OrderController@getDelivery')->name('listdelivery')->middleware('listdelivery');
        Route::get('listshipped','Admin\OrderController@getShipped')->name('shiped')->middleware('listshipped');

        Route::get('orderdetail/delivery/{id}','Admin\OrderController@deliveryOrder')->name('delivery');
        Route::get('orderdetail/delivered/{id}','Admin\OrderController@deliveredOrder')->name('delivered');
        Route::get('orderdetail/cancelorder/{id}','Admin\OrderController@cancelOrder')->name('cancelorder');

        Route::get('orderdetail/{id}','Admin\OrderController@getDetailOrder')->name('orderdetail');
    });

    Route::group(['prefix' => 'position', 'middleware' => 'position'], function() {
        Route::get('/', 'Admin\PositionController@getIndex')->name('listposition');

        Route::get('add', 'Admin\PositionController@getAdd')->name('addposition');
        Route::post('add', 'Admin\PositionController@postAdd');

        Route::get('edit/{id}', 'Admin\PositionController@getEdit');
        Route::post('edit/{id}', 'Admin\PositionController@postEdit');

        Route::get('delete/{id}', 'Admin\PositionController@getDelete');
    });

    Route::group(['prefix' => 'user', 'middleware' => 'employee'], function(){
        Route::get('/','Admin\EmployeeController@getIndex')->name('listemployee');

        Route::get('add','Admin\EmployeeController@getAdd')->name('addemployee');
        Route::post('add','Admin\EmployeeController@postAdd');

        Route::get('edit/{id}','Admin\EmployeeController@getEdit')->name('editemployee');
        Route::post('edit/{id}','Admin\EmployeeController@postEdit');

        Route::get('changepass/{id}','Admin\EmployeeController@changePass');
        Route::post('changepass/{id}','Admin\EmployeeController@postChangePass');

        Route::get('delete/{id}', 'Admin\EmployeeController@getDelete');
    });

});

View::composer('*', function($view){
    $info = Auth::user();
    $view->with('userLogin', $info);
});
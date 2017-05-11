<?php

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

Route::get('/', function () {
    return view('login.login');
});
Route::get('login',['uses'=>'LoginController@getLogin']);
Route::post('login',['uses'=>'LoginController@postLogin']);
Route::group(['middleware'=>'isroleadmin'], function(){
	Route::group(['prefix' => 'adminsites'], function(){
		Route::get('/', function(){
    		return view('admins.dashboard.main');
    	});
    	Route::group(['prefix' => 'category'], function(){
    		Route::get('list',['uses'=>'CategoryController@getCateList']);
            
    		Route::group(['prefix' => 'ajax'], function(){
    			Route::get('list/{max}/{page}',['uses'=>'CategoryController@getCateListAjax']);
    			Route::get('total',['uses'=>'CategoryController@getTotalCategoriesAjax']);
    			Route::get('add',['uses'=>'CategoryController@getAddCateAjax']);
                Route::get('edit',['uses'=>'CategoryController@getEditCateAjax']);
                Route::get('delete/{id}',['uses'=>'CategoryController@getDeleteCateAjax']);
    		});
    	});
        Route::group(['prefix' => 'user'], function(){
            Route::get('list',['uses'=>'UserController@getUserList']);
            
            Route::group(['prefix' => 'ajax'], function(){
                Route::get('list/{max}/{page}',['uses'=>'UserController@getListUserAjax']);
                Route::get('total',['uses'=>'UserController@getTotalUserAjax']);
                Route::get('delete/{id}',['uses'=>'UserController@getDeleteUserAjax']);
            });
        });

	});
});
Route::group(['middleware'=>'isrolemanager'], function(){
	Route::group(['prefix' => 'managersites'], function(){
		Route::get('/', function(){
    		return view('managers.dashboard.main');
    	});
        Route::group(['prefix' => 'video'], function(){
            Route::get('list',['uses'=>'VideoController@getVideoListManager']);
            Route::get('add',['uses'=>'VideoController@getAddVideoManager']);
            Route::post('add',['uses'=>'VideoController@postAddVideoManager']);
            Route::get('edit/{id}',['uses'=>'VideoController@getEditVideoManager']);
            Route::post('edit/{id}',['uses'=>'VideoController@postEditVideoManager']);
            Route::get('upload',['uses'=>'VideoController@getUpload']);
            Route::post('upload',['uses'=>'VideoController@postUpload']);


            Route::group(['prefix' => 'ajax'], function(){
                Route::get('list/{max}/{page}',['uses'=>'VideoController@getVideoListAjax']);
                Route::get('total',['uses'=>'VideoController@getTotalVideosAjax']);
                Route::get('delete/{id}',['uses'=>'VideoController@getDeleteVideosAjax']);
                Route::post('upload',['uses'=>'VideoController@postFileUploadAjax']);
            });
        });
	});
});


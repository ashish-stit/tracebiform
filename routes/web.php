<?php
include_once 'web_builder.php';
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

Route::get('admin/pests','PestsController@getpests')->name('pets');
Route::get('admin/addpest','PestsController@addform')->name('addpest');
Route::get('admin/addgrowers','Admin\GrowersController@growersform')->name('addgrowers');
Route::post('admin/savepests','PestsController@storepests');
Route::get('delete_pests/{PestID}','PestsController@removepests');
Route::get('admin/edit_pests/{PestID}','PestsController@editpests')->name('edit_pests');
Route::post('admin/update_pests','PestsController@pestsupdate');
Route::post('admin/savegrowers','Admin\GrowersController@postgrowers')->name('admin/savegrowers');
Route::get('admin/growers','Admin\GrowersController@getgrowers')->name('admin/growers');
Route::get('delete_growers/{SupplierID}','Admin\GrowersController@trashgrowers')->name('delete_growers');
Route::get('admin/edit_growers/{SupplierID}','Admin\GrowersController@editgrowers')->name('admin/edit_growers');
Route::post('admin/growersupdate','Admin\GrowersController@updategrowers');
Route::post('admin/addmoregrowers','Admin\GrowersController@save_and_moregrowers');
Route::post('admin/register','Admin\AuthController@postRegister2')->name('adminregis');

Route::post('user/login', 'Admin\AuthController@USP_User_Login')->name('user');
Route::get('admin/pti','Admin\AuthController@pti')->name('pti');
Route::get('admin/farmfield','Admin\FarmFieldController@getform')->name('farmfield');
Route::get('admin/frmlist','Admin\FarmFieldController@farmlist')->name('frmlist');
Route::get('admin/farmfield/delete/{p_FarmFieldID}','Admin\FarmFieldController@farmfielddelete')->name('farmdelete');
Route::post('admin/addmoreform','Admin\FarmFieldController@addmoreform')->name('addmoreform');
Route::get('admin/farmfield/edit/{FarmFieldID}','Admin\FarmFieldController@editFarmFieldID')->name('FarmFieldID');
Route::post('admin/updatefarmfield','Admin\FarmFieldController@updatefarmfield')->name('updatefarmfield');

Route::get('admin/userlist','Admin\AuthController@userlist')->name('userlist');
Route::get('admin/user/delete/{id}','Admin\AuthController@userdeletes')->name('userdelete');
Route::get('admin/user/edit/{id}','Admin\AuthController@useredit')->name('useredit');
Route::post('admin/userupdate','Admin\AuthController@userupdate')->name('userupdate');
Route::post('admin/postpti','PtiController@addpost')->name('postpti');
Route::get('admin/addpestcides','Admin\PesticidesController@addpesticides')->name('pesticides');
Route::get('admin/pesticides','Admin\PesticidesController@pesticideslist')->name('pesticideslist');
Route::post('admin/postpesticides','Admin\PesticidesController@postpesticides')->name('postpesticides');
Route::get('admin/pesticideslist','Admin\PesticidesController@pesticideslist')->name('pesticideslist');
Route::get('admin/updtpesticides','Admin\PesticidesController@editpesticides')->name('updtpesticides');
Route::get('admin/Pesticide/delete/{p_PesticideID}','Admin\PesticidesController@pesticidesdelete')->name('pesticide');
Route::get('admin/Pesticide/edit/{p_PesticideID}','Admin\PesticidesController@pesticidesedit')->name('pesticidesedit');
Route::post('admin/updtpesticides','Admin\PesticidesController@updtpesticides')->name('updtpesticides');
Route::get('admin/addfarmfield','Admin\FarmFieldController@getform')->name('addfarmfield');
Route::post('admin/postfarm','Admin\FarmFieldController@postfarm')->name('postfarm');
Route::get('admin/addcustomer','Admin\CustommerController@addform')->name('addcustomer');
Route::post('admin/addcustomer','Admin\CustommerController@addcustomer')->name('postcustomer');

Route::get('customer/list','Admin\CustommerController@getdata')->name('customerlist');
Route::get('admin/customer/delete/{p_CustomerID}','Admin\CustommerController@deletedata')->name('delete');
Route::get('admin/customer/edit/{p_CustomerID}','Admin\CustommerController@editdata')->name('edit');
Route::post('admin/updatecustomer', 'Admin\CustommerController@Customerupdatedata')->name('updatecust');
Route::get('Product/Itemselllist','Admin\ItemController@Itemlist')->name('Itemselllist');
Route::get('product/additem','Admin\ItemController@addItem')->name('additem');
Route::post('product/saveitem','Admin\ItemController@savedata')->name('saveitem');
Route::get('item/product/delete/{p_ProductID}','Admin\ItemController@productdelete')->name('productdelete');
Route::get('item/product/edit/{p_ProductID}','Admin\ItemController@productedit')->name('productedit');
Route::post('product/update','Admin\ItemController@productupdate')->name('productupdate');
Route::get('purchase/list','Admin\PurchaseController@getform')->name('purchaselist');
Route::get('Purchase/orderadd','Admin\PurchaseController@showform')->name('purchaseord');
Route::post('admin/addorder','Admin\PurchaseController@addorder')->name('addorder');
Route::get('delete_ord/{PurchaseOrderID}','Admin\PurchaseController@orderdelete')->name('orddelete');
Route::get('admin/edit_ord/{PurchaseOrderID}','Admin\PurchaseController@editorder')->name('editord');
Route::post('admin/updateorder','Admin\PurchaseController@updateorder')->name('updateorder');
Route::get('wharehouse/single','Admin\WharehouseController@showform')->name('single');
 Route::get('admin/singlelist','Admin\WharehouseController@singlelist')->name('singlelist');
Route::post('getquantitydata',"Admin\WharehouseController@getid")->name('getquantitydata');
Route::post('admin/singlesave',"Admin\WharehouseController@savedata")->name('singlesave');
Route::get('admin/single/edit/{InventoryTransactionID}',"Admin\WharehouseController@editdata")->name('singleedit');
Route::get('admin/single/delete/{InventoryTransactionID}',"Admin\WharehouseController@deletedata")->name('singledelete');
Route::post('updateinventry', 'Admin\WharehouseController@updateinvtrans')->name('updateinventry');

Route::get('NewPlantApplication/form',"Admin\NewPlantApplication@getform")->name('NewPlantApplication');
Route::post('applicationdata',"Admin\NewPlantApplication@application")->name('applicationdata');
Route::post('getpetsdata',"Admin\NewPlantApplication@getpetsdata")->name('getpetsdata');
Route::post('admin/saveapplication','Admin\NewPlantApplication@saveformdata')->name('saveapplication');
Route::get('admin/newplantapplicationlist', 'Admin\NewPlantApplication@newapplist')->name('admin/newplantapplicationlist');
Route::get('deletenewplantapp/{FarmFieldApplicationID}', 'Admin\NewPlantApplication@removenewapp')->name('deletenewplantapp');
Route::get('admin/edit_newplantapp/{FarmFieldApplicationID}', 'Admin\NewPlantApplication@editplantnewapps')->name('admin/edit_newplantapp');
Route::post('upadtenewapps', 'Admin\NewPlantApplication@updatenewapplications')->name('upadtenewapps');



Route::get('admin/billsoflading','Admin\BillingController@showform')->name('billsoflading');
Route::post('getorderid','Admin\BillingController@getorderid')->name('getorderid');
Route::post('inventoryid','Admin\BillingController@inventoryid')->name('inventoryid');
Route::get('admin/billsofladinglist', 'Admin\BillingController@getbillingdata')->name('billsofladinglist');
Route::post('insertbillslading', 'Admin\BillingController@savebillslading')->name('insertbillslading');
Route::get('deletebillslading/{BillofLadingID}', 'Admin\BillingController@removebillslading')->name('deletebillslading');
Route::get('editbilling/{BillofLadingID}', 'Admin\BillingController@billedit')->name('editbilling');
Route::post('updatebillslading', 'Admin\BillingController@updlading')->name('updatebillslading');


Route::pattern('slug', '[a-z0-9- _]+');

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {

    # Error pages should be shown without requiring login
    Route::get('404', function () {
        return view('admin/404');
    });
    Route::get('500', function () {
        return view('admin/500');
    });
    # Lock screen
    Route::get('{id}/lockscreen', 'UsersController@lockscreen')->name('lockscreen');
    Route::post('{id}/lockscreen', 'UsersController@postLockscreen')->name('lockscreen');
    # All basic routes defined here
    Route::get('login', 'AuthController@getSignin')->name('login');
    Route::get('signin', 'AuthController@getSignin')->name('signin');
    Route::post('signin', 'AuthController@postSignin')->name('postSignin');
    Route::post('signup', 'AuthController@postSignup')->name('admin.signup');
    Route::post('forgot-password', 'AuthController@postForgotPassword')->name('forgot-password');
    Route::get('login2', function () {
        return view('admin/login2');
    });


    # Register2
    Route::get('register2', function () {
        return view('admin/register2');
    });
    Route::post('register2', 'AuthController@postRegister2')->name('register2');

    # Forgot Password Confirmation
//    Route::get('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm')->name('forgot-password-confirm');
//    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm');

    # Logout
    Route::get('logout', 'AuthController@getLogout')->name('logout');

    # Account Activation
    Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    # GUI Crud Generator
    Route::get('generator_builder', 'JoshController@builder')->name('generator_builder');
    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');
    // Model checking
    Route::post('modelCheck', 'ModelcheckController@modelCheck');

    # Dashboard / Index
    Route::get('/', 'JoshController@showHome')->name('dashboard');
    # crop demo
    Route::post('crop_demo', 'JoshController@crop_demo')->name('crop_demo');
    //Log viewer routes
    Route::get('log_viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
    Route::get('log_viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log_viewers.logs');
    Route::delete('log_viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log_viewers.logs.delete');
    Route::get('log_viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log_viewers.logs.show');
    Route::get('log_viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log_viewers.logs.download');
    Route::get('log_viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log_viewers.logs.filter');
    Route::get('log_viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log_viewers.logs.search');
    Route::get('log_viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');
    //end Log viewer
    # Activity log
    Route::get('activity_log/data', 'JoshController@activityLogData')->name('activity_log.data');
//    Route::get('/', 'JoshController@index')->name('index');
});

Route::group(['prefix' => 'admin','namespace'=>'Admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {

    # User Management
    Route::group([ 'prefix' => 'users'], function () {
        Route::get('data', 'UsersController@data')->name('users.data');
        Route::get('{user}/delete', 'UsersController@destroy')->name('users.delete');
        Route::get('{user}/confirm-delete', 'UsersController@getModalDelete')->name('users.confirm-delete');
        Route::get('{user}/restore', 'UsersController@getRestore')->name('restore.user');
//        Route::post('{user}/passwordreset', 'UsersController@passwordreset')->name('passwordreset');
        Route::post('passwordreset', 'UsersController@passwordreset')->name('passwordreset');


    });
    Route::resource('users', 'UsersController');
    /************ bulk import ****************************/
    Route::get('bulk_import_users', 'UsersController@import');
    Route::post('bulk_import_users', 'UsersController@importInsert');
    /****************bulk download **************************/
    Route::get('download_users/{type}', 'UsersController@downloadExcel');





    Route::get('deleted_users',['before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'])->name('deleted_users');

    // Email System
    Route::group(['prefix' => 'emails'], function () {
        Route::get('compose', 'EmailController@create');
        Route::post('compose', 'EmailController@store');
        Route::get('inbox', 'EmailController@inbox');
        Route::get('sent', 'EmailController@sent');
        Route::get('{email}', ['as' => 'emails.show', 'uses' => 'EmailController@show']);
        Route::get('{email}/reply', ['as' => 'emails.reply', 'uses' => 'EmailController@reply']);
        Route::get('{email}/forward', ['as' => 'emails.forward', 'uses' => 'EmailController@forward']);
    });
    Route::resource('emails', 'EmailController');

    # Group Management
    Route::group(['prefix' => 'groups'], function () {
        Route::get('{group}/delete', 'GroupsController@destroy')->name('groups.delete');
        Route::get('{group}/confirm-delete', 'GroupsController@getModalDelete')->name('groups.confirm-delete');
        Route::get('{group}/restore', 'GroupsController@getRestore')->name('groups.restore');
    });
    Route::resource('groups', 'GroupsController');

    /*routes for blog*/
    Route::group(['prefix' => 'blog'], function () {
        Route::get('{blog}/delete', 'BlogController@destroy')->name('blog.delete');
        Route::get('{blog}/confirm-delete', 'BlogController@getModalDelete')->name('blog.confirm-delete');
        Route::get('{blog}/restore', 'BlogController@restore')->name('blog.restore');
        Route::post('{blog}/storecomment', 'BlogController@storeComment')->name('storeComment');
    });
    Route::resource('blog', 'BlogController');

    /*routes for blog category*/
    Route::group(['prefix' => 'blogcategory'], function () {
        Route::get('{blogCategory}/delete', 'BlogCategoryController@destroy')->name('blogcategory.delete');
        Route::get('{blogCategory}/confirm-delete', 'BlogCategoryController@getModalDelete')->name('blogcategory.confirm-delete');
        Route::get('{blogCategory}/restore', 'BlogCategoryController@getRestore')->name('blogcategory.restore');
    });
    Route::resource('blogcategory', 'BlogCategoryController');
    /*routes for file*/
    Route::group(['prefix' => 'file'], function () {
        Route::post('create', 'FileController@store')->name('store');
        Route::post('createmulti', 'FileController@postFilesCreate')->name('postFilesCreate');
//        Route::delete('delete', 'FileController@delete')->name('delete');
        Route::get('{id}/delete', 'FileController@destroy')->name('file.delete');
        Route::get('data', 'FileController@data')->name('file.data');
        Route::get('{user}/delete', 'FileController@destroy')->name('users.delete');

    });

    /*routes for News*/
    Route::group(['prefix' => 'news'], function () {
        Route::get('data', 'NewsController@data')->name('news.data');
        Route::get('{news}/delete', 'NewsController@destroy')->name('news.delete');
        Route::get('{news}/confirm-delete', 'NewsController@getModalDelete')->name('news.confirm-delete');
    });
    Route::resource('news', 'NewsController');

    Route::get('crop_demo', function () {
        return redirect('admin/imagecropping');
    });


    /* laravel example routes */
    #Charts
    Route::get('laravel_chart', 'ChartsController@index')->name('laravel_chart');
    Route::get('database_chart', 'ChartsController@databaseCharts')->name('database_chart');

    # datatables
    Route::get('datatables', 'DataTablesController@index')->name('index');
    Route::get('datatables/data', 'DataTablesController@data')->name('datatables.data');

    # datatables
    Route::get('jtable/index', 'JtableController@index')->name('index');
    Route::post('jtable/store', 'JtableController@store')->name('store');
    Route::post('jtable/update', 'JtableController@update')->name('update');
    Route::post('jtable/delete', 'JtableController@destroy')->name('delete');



    # SelectFilter
    Route::get('selectfilter', 'SelectFilterController@index')->name('selectfilter');
    Route::get('selectfilter/find', 'SelectFilterController@filter')->name('selectfilter.find');
    Route::post('selectfilter/store', 'SelectFilterController@store')->name('selectfilter.store');

    # editable datatables
    Route::get('editable_datatables', 'EditableDataTablesController@index')->name('index');
    Route::get('editable_datatables/data', 'EditableDataTablesController@data')->name('editable_datatables.data');
    Route::post('editable_datatables/create', 'EditableDataTablesController@store')->name('store');
    Route::post('editable_datatables/{id}/update', 'EditableDataTablesController@update')->name('update');
    Route::get('editable_datatables/{id}/delete', 'EditableDataTablesController@destroy')->name('editable_datatables.delete');

//    # custom datatables
    Route::get('custom_datatables', 'CustomDataTablesController@index')->name('index');
    Route::get('custom_datatables/sliderData', 'CustomDataTablesController@sliderData')->name('custom_datatables.sliderData');
    Route::get('custom_datatables/radioData', 'CustomDataTablesController@radioData')->name('custom_datatables.radioData');
    Route::get('custom_datatables/selectData', 'CustomDataTablesController@selectData')->name('custom_datatables.selectData');
    Route::get('custom_datatables/buttonData', 'CustomDataTablesController@buttonData')->name('custom_datatables.buttonData');
    Route::get('custom_datatables/totalData', 'CustomDataTablesController@totalData')->name('custom_datatables.totalData');

    //tasks section
    Route::post('task/create', 'TaskController@store')->name('store');
    Route::get('task/data', 'TaskController@data')->name('data');
    Route::post('task/{task}/edit', 'TaskController@update')->name('update');
    Route::post('task/{task}/delete', 'TaskController@delete')->name('delete');

});



# Remaining pages will be called from below controller method
# in real world scenario, you may be required to define all routes manually

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('{name?}', 'JoshController@showView');
});

#FrontEndController
Route::get('login', 'FrontEndController@getLogin')->name('login');
//Route::post('login', 'Admin\AuthController@USP_User_Login')->name('login');
Route::get('register', 'FrontEndController@getRegister')->name('register');
Route::post('register','FrontEndController@postRegister')->name('register');
Route::get('activate/{userId}/{activationCode}','FrontEndController@getActivate')->name('activate');
Route::get('forgot-password','FrontEndController@getForgotPassword')->name('forgot-password');
Route::post('forgot-password', 'FrontEndController@postForgotPassword');

#Social Logins
Route::get('facebook', 'Admin\FacebookAuthController@redirectToProvider');
Route::get('facebook/callback', 'Admin\FacebookAuthController@handleProviderCallback');

Route::get('linkedin', 'Admin\LinkedinAuthController@redirectToProvider');
Route::get('linkedin/callback', 'Admin\LinkedinAuthController@handleProviderCallback');

Route::get('google', 'Admin\GoogleAuthController@redirectToProvider');
Route::get('google/callback', 'Admin\GoogleAuthController@handleProviderCallback');


# Forgot Password Confirmation
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
Route::get('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@getForgotPasswordConfirm')->name('forgot-password-confirm');
# My account display and update details
Route::group(['middleware' => 'user'], function () {
    Route::put('my-account', 'FrontEndController@update');
    Route::get('my-account', 'FrontEndController@myAccount')->name('my-account');
});
// Email System
Route::group(['prefix' => 'user_emails'], function () {
    Route::get('compose', 'UsersEmailController@create');
    Route::post('compose', 'UsersEmailController@store');
    Route::get('inbox', 'UsersEmailController@inbox');
    Route::get('sent', 'UsersEmailController@sent');
    Route::get('{email}', ['as' => 'user_emails.show', 'uses' => 'UsersEmailController@show']);
    Route::get('{email}/reply', ['as' => 'user_emails.reply', 'uses' => 'UsersEmailController@reply']);
    Route::get('{email}/forward', ['as' => 'user_emails.forward', 'uses' => 'UsersEmailController@forward']);
});
Route::resource('user_emails', 'UsersEmailController');
Route::get('logout', 'FrontEndController@getLogout')->name('logout');
# contact form
Route::post('contact', 'FrontEndController@postContact')->name('contact');

#frontend views
Route::get('/', ['as' => 'home', function () {
    return view('index');
}]);

Route::get('blog','BlogController@index')->name('blog');
Route::get('blog/{slug}/tag', 'BlogController@getBlogTag');
Route::get('blogitem/{slug?}', 'BlogController@getBlog');
Route::post('blogitem/{blog}/comment', 'BlogController@storeComment');

//news
Route::get('news', 'NewsController@index')->name('news');
Route::get('news/{news}', 'NewsController@show')->name('news.show');

Route::get('{name?}', 'FrontEndController@showFrontEndView');
# End of frontend views

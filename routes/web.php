<?php

use Illuminate\Support\Facades\Route;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/myAccount', 'MembersController@myAccount')->name('myAccount');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/send/message', 'SmsController@sendMessage');
Route::get('/addDept', 'DepartmentsController@deptForm')->name('addDept');
Route::resource('registerDept', 'DepartmentsController');

Route::get('/deptDetails', 'DepartmentsController@deptDetails')->name('deptDetails');
Route::get('/deptPDF', 'DepartmentsController@deptPDF')->name('deptPDF');
Route::get('/updateDept', 'DepartmentsController@updateDept');
Route::get('/updateDept/edit/{id}', 'DepartmentsController@editDept');
Route::post('editDept/update/{id}', 'DepartmentsController@update');
Route::get('/updateDept/delete/{id}', 'DepartmentsController@deleteDept');

Route::get('/addMember', 'MembersController@memberForm')->name('addMember');
Route::resource('registerMember', 'MembersController');
Route::get('/memberDetails', 'MembersController@memberDetails');
Route::get('/editMember/{id}', 'MembersController@editMember');
Route::post('/updateMember/{id}', 'MembersController@updateMember');

Route::get('/printMember/{id}', 'MembersController@printMember');
Route::get('/printList', 'MembersController@printList')->name('printList');
Route::get('/printDeptList/{id}', 'MembersController@printDeptList');
Route::get('/printAll', 'MembersController@printAll')->name('printAll');
Route::get('/sendMail', 'MembersController@sendMail')->name('sendMail');
Route::get('/mail', 'MembersController@mail')->name('mail');

Route::get('/payTithe', 'PaymentController@payTithe')->name('payTithe');
Route::post('/pay', 'PaymentController@pay')->name('pay');
Route::get('/updateTithe', 'PaymentController@updateTithe')->name('updateTithe');
Route::get('/updateTithe/edit/{id}', 'PaymentController@editTithe');
Route::post('/updateTithe/update/{id}', 'PaymentController@update');
Route::get('/titheReport', 'PaymentController@titheReport')->name('titheReport');

Route::get('/email', function(){
    Mail::to('nathanieldayan2020@gmail.com')->send(new SendMail());
    return new SendMail();
});

Route::get('send-mail', function (Request $request) {
   $input=$request->all();
    $details = [
        'title' => $input['subject'],
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('konahdjohnson@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});

Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');

Route::get('qr-code-g', function () {
  
    \QrCode::size(500)
            ->format('png')
            ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));
    
  return view('qrCode');
});
<?php

use App\Models\Invoice;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\TechController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\ContactControllers;
use App\Http\Controllers\MapimageController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PerposalController;
use App\Http\Controllers\SideImageController;
use App\Http\Controllers\ImageSlideController;
use App\Http\Controllers\YoutubeurlController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicServiceController;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('userLogin', 'Auth\LoginController@showLoginForm');
Route::group(['prefix' => 'artisan'], function () {
    Route::get('clear', function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        return 'Successfully Cleared !';
    });

    Route::get('migrate/fresh', function () {

        Artisan::call('migrate:fresh --seed');

        return 'Successfully Migrated !';
    });
    Route::get('seed', function () {

        Artisan::call('db:seed');

        return 'Successfully seeded !';
    });
    Route::get(
        'migrate',
        function () {

            Artisan::call('migrate');

            return 'Successfully Migrated !';
        }
    );

    Route::get('link', function () {
        Artisan::call('storage:link');
        return 'Storage link successfully';
    });
});
// Route::post('profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/', [RegisterController::class, 'homepage'])->name('/');
Route::post('createDesigner', [RegisterController::class, 'createDesigner'])->name('createDesigner');
Auth::routes();
Route::get('updateProfileMail', [HomeController::class, 'updateProfileMail'])->name('updateProfileMail');

Route::get('approval/{id}', [HomeController::class, 'approval'])->name('approval');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::resource('invoicess', InvoiceController::class);
Route::resource('perposal', PerposalController::class);
Route::get('invoices/pdf/{id}', [InvoiceController::class,'pdfInvoice'])->name('invoice.pdf');
Route::get('perposal/pdf/{id}', [PerposalController::class,'pdfProposal'])->name('purposal.pdf');  
Route::group(['middleware' => 'auth', 'varify','cors'], function () {
    Route::get('productOrder/{id}',[ProductController::class,'productOrder'])->name('productOrder');
    Route::post('add/product',[ProductController::class,'addProduct'])->name('addProduct');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('product/list',[ProductController::class,'listProduct'])->name('listProduct');
    Route::get('product/approve/{id}',[ProductController::class,'productApproval'])->name('product.approve');
    Route::get('product/delete/{id}',[ProductController::class,'productDelete'])->name('product.delete');
    Route::resource('medical', MedicalController::class);
    Route::resource('publics', PublicServiceController::class);
    //Resource Route
    Route::get('profile',[UserController::class,'profileUpdate'])->name('profileUser');         
    Route::get('invoices/{id}', [InvoiceController::class,'show'])->name('invoice');
    Route::get('perposal/{id}', [PerposalController::class,'show'])->name('purposal');    

    Route::group(['middleware' =>  'role:user'], function () {
        Route::get('/vieworder/{id}', [App\Http\Controllers\HomeController::class, 'vieworder'])->name('vieworder');
        Route::get('/vieworderpublic/{id}', [App\Http\Controllers\HomeController::class, 'vieworderpublic'])->name('vieworderpublic'); 
        Route::get('perposal/accept/{id}',[PerposalController::class,'perposalAccept'])->name('perposalAccept');
        Route::get('perposal/action/view/{id}',[PerposalController::class,'perposalAction'])->name('perposalAction');
        Route::post('identity',[UserController::class,'identity'])->name('identity');       
    });
    Route::group(['middleware' =>  'role:admin'], function () {
        Route::resource('about', AboutUsController::class);
        Route::resource('contact', ContactControllers::class);
        Route::resource('client', ClientController::class);
        Route::resource('image', ImageSlideController::class);

        Route::resource('social', SocialMediaController::class);
        Route::resource('tech', TechController::class);

        Route::resource('title', TitleController::class);
        Route::resource('map', MapimageController::class);
        Route::resource('youtubeurl', YoutubeurlController::class);
        Route::resource('counter', CounterController::class);

        Route::post('convertToInvoice',[InvoiceController::class,'convertToInvoice'])->name('convertToInvoice');

        Route::prefix('user')->name('user.')->group(function (){
            Route::get('list',[UserController::class,'index'])->name('list');
            Route::get('designer/list',[UserController::class,'designer'])->name('designer.list');
            Route::get('approve/{id}',[UserController::class,'approval'])->name('approve');
            Route::get('profile/list',[UserController::class,'profileList'])->name('profile.list');
            Route::get('profile/approve/{id}',[UserController::class,'profileApprove'])->name('profile.approve');
        });
        
        Route::get('send/mail/{id}',[InvoiceController::class,'sendViaMail'])->name('sendViaMail');
        Route::post('payment/added',[InvoiceController::class,'paymentAdded'])->name('paymentAdded');
        Route::get('payment', [MedicalController::class, 'payment'])->name('payment');
        Route::get('ProfileUpdate/view', [HomeController::class, 'viewSetting'])->name('profileupdate.view');
        Route::post('profile/setting', [HomeController::class, 'updateprofile'])->name('profile.setting');
        Route::get('editpassword', [HomeController::class, 'passView'])->name('editpassword');
        Route::get('medi/index', [MedicalController::class, 'index'])->name('medi.index');
        Route::get('medi/show/{id}', [MedicalController::class, 'show'])->name('medi.show');
        Route::post('updated.status', [MedicalController::class, 'updated'])->name('updated.status');
        Route::post('public.updated.status', [MedicalController::class, 'updatedpublic'])->name('public.updated.status');
        Route::post('password/updates', [HomeController::class, 'password_updates'])->name('password_updates');
        Route::resource('side', SideImageController::class);
        Route::resource('logo', LogoController::class);

        Route::get('payment/pdf/{id}', [InvoiceController::class,'pdfPayment'])->name('payment.pdf');
        Route::post('edituser_profile/{id}', [HomeController::class, 'edituser'])->name('edituser_profile');
        Route::get('view/{id}', [ImageSlideController::class, 'view'])->name('view');
        Route::get('register_profile', [HomeController::class, 'register_profile'])->name('register_profile');
        Route::post('send/question', [MedicalController::class, 'askQuestion'])->name('ask.question');
        Route::get('payment',[PaymentController::class,'index'])->name('payment');
        Route::get('order_id/{id}',[UserController::class,'userByOrder'])->name('userByOrder');
    });

    Route::get('feedback', [MedicalController::class, 'feedback'])->name('feedback');
    Route::post('feedback/store', [MedicalController::class, 'feedbackStore'])->name('feedbackStore');

    Route::get('/chats', [ChatController::class,'index']);
    Route::get('/messages', [ChatController::class,'fetchAllMessages']);
    Route::post('/medi/messages',[ChatController::class,'sendMessage']);
    Route::view('chat','chat.chats')->name('messanger');

});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('mark/read',function(){
  auth()->user()->unreadNotifications->markAsRead();
  return redirect()->back();
})->name('mark.read');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


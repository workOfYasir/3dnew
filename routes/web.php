<?php

use App\Models\Invoice;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ChatController;
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
use App\Http\Controllers\PublicServiceController;
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

Route::get('/', [RegisterController::class, 'homepage'])->name('/');
// Route::get('/', function () {
//     $about = AboutUs::first();
//     $con = ContactUs::first();
//     $tech = Tech::first();
//     $profile = ImageSlider::first();
//     $order = Medical::orderBy('id', 'DESC')->first();
//     $side = SideLogo::first();
//     $logos =Logo::first();
//     dd($logos);
//     $orders = [];
//     // dd($side);
//     return view('pages.user.index.index', compact('about', 'con', 'tech', 'profile', 'order', 'orders', 'side','logos'));
// });
Auth::routes();

Route::group(['middleware' => 'auth', 'varify','cors'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/vieworder/{id}', [App\Http\Controllers\HomeController::class, 'vieworder'])->name('vieworder');
    Route::get('/vieworderpublic/{id}', [App\Http\Controllers\HomeController::class, 'vieworderpublic'])->name('vieworderpublic');
  
    //Resource Route

    Route::resource('about', AboutUsController::class);
    Route::resource('contact', ContactControllers::class);
    Route::resource('client', ClientController::class);
    Route::resource('image', ImageSlideController::class);
    Route::resource('publics', PublicServiceController::class);
    Route::resource('social', SocialMediaController::class);
    Route::resource('tech', TechController::class);
    Route::resource('medical', MedicalController::class);
    Route::resource('title', TitleController::class);
    Route::resource('map', MapimageController::class);
    Route::resource('youtubeurl', YoutubeurlController::class);
    Route::resource('counter', CounterController::class);
    Route::resource('invoicess', InvoiceController::class);
    Route::resource('perposal', PerposalController::class);

    Route::get('payment', [MedicalController::class, 'payment'])->name('payment');
    Route::get('ProfileUpdate/view', [HomeController::class, 'viewSetting'])->name('profileupdate.view');
    Route::post('profile/setting', [HomeController::class, 'updateprofile'])->name('profile.setting');
    Route::get('editpassword', [HomeController::class, 'passView'])->name('editpassword');
    Route::get('medi/index', [MedicalController::class, 'index'])->name('medi.index');
    Route::get('medi/show/{id}', [MedicalController::class, 'show'])->name('medi.show');
    Route::post('updated.status', [MedicalController::class, 'updated'])->name('updated.status');
    Route::post('public/updated/status', [MedicalController::class, 'updatedpublic'])->name('public.updated.status');
    Route::post('password/updates', [HomeController::class, 'password_updates'])->name('password_updates');
    Route::resource('side', SideImageController::class);

    Route::resource('logo', LogoController::class);
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
    Route::post('edituser_profile/{id}', [HomeController::class, 'edituser'])->name('edituser_profile');
    Route::get('view/{id}', [ImageSlideController::class, 'view'])->name('view');
    Route::get('register_profile', [HomeController::class, 'register_profile'])->name('register_profile');
    Route::post('send/question', [MedicalController::class, 'askQuestion'])->name('ask.question');
    Route::get('feedback', [MedicalController::class, 'feedback'])->name('feedback');
    Route::post('feedback/store', [MedicalController::class, 'feedbackStore'])->name('feedbackStore');

    Route::get('pdf/proposal', [PerposalController::class,'pdfProposal'])->name('proposel.pdf');
    Route::get('pdf/invoice', [ InvoiceController::class,'pdfInvoice'])->name('invoice.pdf');
    
    
    Route::get('/chats', [ChatController::class,'index']);
    Route::get('/messages', [ChatController::class,'fetchAllMessages']);
    Route::post('/medi/messages',[ChatController::class,'sendMessage']);
    Route::view('chat','chat.chats')->name('messanger');
    
// Route::get('/chat',[MessagesController::class,'userChat'])->name('user.chat');
// Route::post('/send/chat',[MessagesController::class,'sendMessage'])->name('send.chat');



});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('mark/read',function(){
  auth()->user()->unreadNotifications->markAsRead();
  return redirect()->back();
})->name('mark.read');



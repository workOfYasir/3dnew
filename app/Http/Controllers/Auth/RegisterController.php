<?php

namespace App\Http\Controllers\Auth;

use App\Models\Logo;
use App\Models\Tech;
use App\Models\User;
use App\Models\Title;
use App\Models\AboutUs;
use App\Models\Counter;
use App\Models\Medical;
use App\Models\Mapimage;
use App\Models\SideLogo;
use App\Models\ContactUs;
use App\Models\Youtubeurl;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use App\Models\PublicService;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function homepage()
    {

        if (Auth::id() == null) {
            $about = AboutUs::first();
            $con = ContactUs::first();
            $tech = Tech::first();
            $profile = ImageSlider::all();
            $order = Medical::orderBy('id', 'DESC')->first();
            $public = PublicService::orderBy('id', 'DESC')->first();
            $side = SideLogo::first();
            $logos = Logo::first();
            $map = Mapimage::first();
            $title = Title::first();
            $links = Youtubeurl::first();
            $orders = [];
            $publics = [];
            $counter = Counter::first();
            return view('pages.user.index.index', compact('counter', 'links', 'about', 'con', 'tech', 'profile', 'order', 'side', 'orders', 'logos', 'public', 'publics', 'title', 'map'));
        } elseif (auth()->user()->role == 'admin') {
            $title = Title::first();
            return view('pages.admin.dashboard.dashboard', compact('title'));
        } else {
            $about = AboutUs::first();
            $con = ContactUs::first();
            $tech = Tech::first();
            $profile = ImageSlider::all();
            $order = Medical::find(auth()->user()->order_id);
            $public = PublicService::orderBy('id', 'DESC')->first();
            $side = SideLogo::first();
            $title = Title::first();
            $orders = Medical::where('user_id', Auth::id())->get();
            $publics = PublicService::where('user_id', Auth::id())->get();
            $logos = Logo::first();
            $map = Mapimage::first();
            $links = Youtubeurl::first();
            $counter = Counter::first();
            return view('pages.user.index.index', compact('counter','links', 'about', 'con', 'tech', 'profile', 'order', 'side', 'orders', 'logos', 'public', 'publics', 'title', 'map'));
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);
        if (isset($data['profile']) && !empty($data['profile'])) {
            $datas = $data['profile']->getClientOriginalName();

             $data['profile']->move(public_path('upload/'), $data['profile']);
            // $datas = Storage::disk('public')->put('upload/', $data['profile']);
        } else {
            $datas = null;
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $roleData = Crypt::decrypt($data['role']);
        if (isset($data['profile']) && !empty($data['profile'])) {
            $fdata = ($data['profile'])->getClientOriginalName();
            $data['profile']->move(public_path('upload/'), $fdata);
            $datas = 'upload/'.$fdata;
            // $datas = Storage::disk('public')->put('upload/', $data['profile']);
        } else {
            $datas = null;
        }

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $roleData,
                'profile' => $datas,
            ]);
   
       $user->assignRole($roleData);
        return $user;
    }
    protected function createDesigner(Request $data)
    {
        
        $roleData = Crypt::decrypt($data->role);
        if (isset($data->profile) && !empty($data->profile)) {
            $fdata = ($data->profile)->getClientOriginalName();
            $data->profile->move(public_path('upload/'), $fdata);
            $datas = 'upload/'.$fdata;
        } else {
            $datas = null;
        }

            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => Hash::make($data->password),
                'role' => 'designer',
                'profile' => $datas,
            ]);
        $user->assignRole($roleData);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $title = Title::first();

            return view('pages.admin.dashboard.dashboard', compact('title'));
        } else {
            // $user = User::where('id',Auth::user()->id)->with('invoices')->first();
            $user =  User::where('id',Auth::user()->id)->with(['invoices' => function ($query) { 
                return $query->orderBy('id', 'desc')->limit(1);
              }])->with(['purposals' => function ($query) { 
                return $query->orderBy('id', 'desc')->limit(1);
              }])->first();
           
            $about = AboutUs::first();
            $con = ContactUs::first();
            $tech = Tech::first();
            $profile = ImageSlider::all();
            $order = Medical::find(auth()->user()->order_id);
            $public = PublicService::orderBy('id', 'DESC')->first();
            $side = SideLogo::first();
            $logos = Logo::first();
            $orders = Medical::where('user_id', Auth::id())->get();
            $publics = PublicService::where('user_id', Auth::id())->get();
            $title = Title::first();
            $map = Mapimage::first();
            $links = Youtubeurl::first();
            $counter = Counter::first();
            return view('pages.user.index.index', compact('counter', 'links', 'about', 'con', 'tech', 'profile', 'order', 'side', 'orders', 'logos', 'public', 'publics', 'title', 'map','user'));
        }
    }
    public function vieworder($id)
    {

        $order = Medical::find($id);
        User::find(Auth::id())->update([
            'order_id' => $id,
        ]);
        $orders = Medical::where('user_id', Auth::id())->get();
        return view('pages.user.showorderdata', compact('order'));
    }
    public function vieworderpublic($id)
    {

        $public = PublicService::find($id);
        $publics = PublicService::where('user_id', Auth::id())->get();
        return view('pages.user.showorderdatapublic', compact('public',  'publics'));
    }
    public function viewSetting()
    {

        return view('pages.admin.dashboard.ProfileUpdate.setting');
    }
    public function updateprofile(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
        ]);

        if ($request->hasFile('profile')) {
            if (isset($request->profile) && !empty($request->profile)) {
                if (!empty(auth()->user()->profile)) {

                    Storage::disk('public')->delete(auth()->user()->profile);
                }
                $profile = $request->profile->move(storage_path('app/upload/'), $request->profile);
                $profile  = Storage::disk('public')->put('upload/', $request->profile);
            }
        } else {
            $profile  = (auth()->user()->profile);
        }
        //  dd($request->all());
        //dd($request->all());
        User::find(auth()->user()->id)->update([
            'profile' => $profile,
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('home');
        //return redirect()->route('ProfileUpdate/view');
        //return redirect()->back();

    }
    public function password_updates(Request $request)
    {
        // dd($request->all());
        $request->validate([

            'newpassword' => 'required',
        ]);
        if (Hash::check($request->password, auth()->user()->password)) {
            User::find(auth()->user()->id)->update([
                'password' => Hash::make($request->newpassword),
            ]);
            return redirect()->route('home');
        }
    }
    public function passView()
    {
        return view('pages.admin.dashboard.ProfileUpdate.edit_password');
    }
    public function edituser(Request $request, $id)
    {
        // if ($request->hasFile('profile')) {
        //     if (isset($request->profile) && !empty($request->profile)) {
        //         if (!empty(auth()->user()->profile)) {
        //             Storage::disk('public')->delete(auth()->user()->profile);
        //         }
        //         $profile  = Storage::disk('public')->put('upload/', $request->profile);
        //         $filePath = 'public/storage/upload/'.$profile;
        //     }
        // } else {
        //     $profile  = (auth()->user()->profile);
        // }
        $imageName = time().'.'.$request->profile->extension();  
        $request->profile->move(public_path('upload/images'), $imageName);
        $filePath = 'upload/images/'.$imageName;
        User::find(auth()->user()->id)->update([
            'profile' => $filePath,
            'name' => $request->name,
            'email' => $request->email,
            'field' => $request->field,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('/');
        
       
    }
}

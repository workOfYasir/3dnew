<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medical;
use App\Models\Identity;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Models\TempUpdateProfile;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role','user')->get();
        return view('pages.admin.dashboard.users.index', compact('users'));
    }
    public function designer()
    {
        $users = User::where('role','designer')->get();
        return view('pages.admin.dashboard.users.index', compact('users'));
    }
    public function approval(Request $request,$id)
    {
        
        User::find($id)->update([
            'approve' => $request->approve,
        ]);
        if($request->approve==1){
            return 1;
        }else{
            return 0;
        }
    }
    public function identity(Request $request)
    {
       
        $folderPath = public_path('upload/');
	  
	    $image_parts = explode(";base64,", $request->signed);
	        
	    $image_type_aux = explode("image/", $image_parts[0]);
	      
	    $image_type = $image_type_aux[1];
	      
	    $image_base64 = base64_decode($image_parts[1]);
	      
	    $file = $folderPath . uniqid() . '.'.$image_type;

        $identity = Identity::create([
            'invoice_id'=>$request->invoice_id,
            'user_id'=>$request->user_id,
            'signature'=>$file,
            'ip'=>$request->ip()
        ]);
     
	    file_put_contents($file, $image_base64);

        return redirect()->back();
        
    }
    public function profileUpdate(Request $request)
    {

    $tempProfile = TempUpdateProfile::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'user_id'=>$request->id,
        'printing_technology'=>$request->printing_technology,
        'software_type'=>$request->software_type,
    ]);
    $details = [
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'subject'=>'update profile',
        'user_id'=>$request->id,
        'printing_technology'=>$request->printing_technology,
        'software_type'=>$request->software_type,
    ];
    $admins = User::where('role','admin')->get();
        foreach ($admins as $key => $admin) {
            \Mail::to($admin->email)->send(new \App\Mail\UpdateUser($details));
        }
        return redirect()->back();
    }
    public function profileApprove($id)
    {
      
            // dd($id);
            $user = TempUpdateProfile::where('user_id',$id)->get();
            $user_exist = UserDetail::where('user_id',$id)->exists();
            if($user_exist){
              UserDetail::where('user_id',$id)->update([
                    'user_id'=>$id,
                    'printing_technology'=>'$user->printing_technology',
                    'software_type'=>'$user->software_type'
                ]);
         
            }else{
                UserDetail::create([
                    'user_id'=>$id,
                    'printing_technology'=>'$user->printing_technology',
                    'software_type'=>'$user->software_type'
                ]);
            }
          
       
        return 'approved';
    }
    public function profileList()
    {
        $users = TempUpdateProfile::with('userDetail')->get();
        return view('pages.admin.dashboard.ProfileUpdate.index', compact('users'));
    }
    public function userByOrder($id)
    {
        $user = Medical::with('user')->find($id);

        return $user->user;
    }
}

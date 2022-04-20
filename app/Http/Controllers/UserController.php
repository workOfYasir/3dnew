<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Models\TempUpdateProfile;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
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
}

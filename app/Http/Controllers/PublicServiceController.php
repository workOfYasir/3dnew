<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\PublicNotification;
use App\Models\User;

class PublicServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publics = PublicService::orderBy('id', 'DESC')->get();
        return view('pages.admin.dashboard.publicservice.index', compact('publics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.dashboard.publicservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // dd($request->all());
        if (isset($request->myfile) && !empty($request->myfile)) {
            $images = $request->myfile->move(storage_path('app/upload/'), $request->myfile);
            $images = Storage::disk('public')->put('upload/', $request->myfile);
        } else {
            $images = null;
        }

        PublicService::create([
            'status' => 1,
            'user_id' => Auth::id(),
            'full_name' => $request->name,
            'phone_num' => $request->phone,
            'email' => $request->email,
            'specialization' => $request->spec,
            'gender' => $request->gender,
            'print_type' => $request->pr_type,
            'print_color' => $request->pr_clr,
            'print_resolution' => $request->pr_res,
            'print_img' => $images,
        ]);
        $users = User::where('role','admin')->first();
        $users->notify(new PublicNotification($users));
        return redirect()->route('home')->with('error_code', 6);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = PublicService::find($id);
        $order->update([
            'seen' => 1,
        ]);
        $notification = auth()->user()->notifications()->where('type', 'App\Notifications\PublicNotification')->latest()->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return view('pages.admin.dashboard.publicservice.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publics = PublicService::find($id);
        return view('pages.admin.dashboard.publicservice.edit', compact('publics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'full_name' => 'required',
            'phone_num' => 'required',
            'email' => 'required',
            'specialization' => 'required',
            'gender' => 'required',
            'print_type' => 'required',
            'print_color' => 'required',
            'print_resolution' => 'required',
            'print_img' => 'required',
        ]);
        if (isset($request->print_img) && !empty($request->print_img)) {
            $image = $request->print_img->move(storage_path('app/upload/'), $request->print_img);
            $image = Storage::disk('public')->put('upload/', $request->print_img);
        } else {
            $print_img = null;
        }
        PublicService::find($id)->update([
            'full_name' => $request->full_name,
            'phone_num' => $request->phone_num,
            'email' => $request->email,
            'specialization' => $request->specialization,
            'gender' => $request->gender,
            'print_type' => $request->print_type,
            'print_color' => $request->print_color,
            'print_resolution' => $request->print_resolution,
            'print_img' => $image,
        ]);
        return redirect()->route('public.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PublicService::find($id)->delete();
        return redirect()->route('public.index');
    }
}

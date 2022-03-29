<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::all();
        return view('pages.admin.dashboard.Logo.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.dashboard.Logo.create');
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
        $request->validate([
            'logo1' => 'required',
            'logo2' => 'required',

            'logo3' => 'required',

            'logo4' => 'required',

            'logo5' => 'required',

            'logo6' => 'required',


            'logo7' => 'required',


            'logo8' => 'required',

        ]);
        if (isset($request->logo1) && !empty($request->logo1)) {
            $image1 = Storage::disk('public')->put('upload/', $request->logo1);
        } else {
            $image1 = null;
        }
        if (isset($request->logo2) && !empty($request->logo2)) {
            $image2 = Storage::disk('public')->put('upload/', $request->logo2);
        } else {
            $image2 = null;
        }
        if (isset($request->logo3) && !empty($request->logo3)) {
            $image3 = Storage::disk('public')->put('upload/', $request->logo3);
        } else {
            $image3 = null;
        }
        if (isset($request->logo4) && !empty($request->logo4)) {
            $image4 = Storage::disk('public')->put('upload/', $request->logo4);
        } else {
            $image4 = null;
        }
        if (isset($request->logo5) && !empty($request->logo5)) {
            $image5 = Storage::disk('public')->put('upload/', $request->logo5);
        } else {
            $image5 = null;
        }
        if (isset($request->logo6) && !empty($request->logo6)) {
            $image6 = Storage::disk('public')->put('upload/', $request->logo6);
        } else {
            $image6 = null;
        }

        if (isset($request->logo7) && !empty($request->logo7)) {
            $image7 = Storage::disk('public')->put('upload/', $request->logo7);
        } else {
            $image7 = null;
        }


        if (isset($request->logo8) && !empty($request->logo8)) {
            $image8 = Storage::disk('public')->put('upload/', $request->logo8);
        } else {
            $image8 = null;
        }




        Logo::create([
            'logo1' => $image1,
            'logo2' => $image2,
            'logo3' => $image3,
            'logo4' => $image4,
            'logo5' => $image5,
            'logo6' => $image6,
            'logo7' => $image7,
            'logo8' => $image8,

        ]);
        return redirect()->route('logo.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logos = Logo::find($id);
        return view('pages.admin.dashboard.Logo.edit', compact('logos'));
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
        // $request->validate([
        //     'logo1' => 'required',
        //     'logo2' => 'required',

        //     'logo3' => 'required',

        //     'logo4' => 'required',

        //     'logo5' => 'required',

        // ]);
        //dd($request->all());
        // if (isset($request->logo1) && !empty($request->logo1)) {
        //     $image1 = Storage::disk('public')->put('upload/', $request->logo1);
        // } else {
        //     $logo1 = null;
        // }
        // if (isset($request->logo2) && !empty($request->logo2)) {
        //     $image2 = Storage::disk('public')->put('upload/', $request->logo2);
        // } else {
        //     $logo2 = null;
        // }
        // if (isset($request->logo3) && !empty($request->logo3)) {
        //     $image3 = Storage::disk('public')->put('upload/', $request->logo3);
        // } else {
        //     $logo3 = null;
        // }
        // if (isset($request->logo4) && !empty($request->logo4)) {
        //     $image4 = Storage::disk('public')->put('upload/', $request->logo4);
        // } else {
        //     $logo4 = null;
        // }
        // if (isset($request->logo5) && !empty($request->logo5)) {
        //     $image5 = Storage::disk('public')->put('upload/', $request->logo5);
        // } else {
        //     $logo5 = null;
        // }

        // Logo::find($id)->update([
        //     'logo1' => $image1,
        //     'logo2' => $image2,
        //     'logo3' => $image3,
        //     'logo4' => $image4,
        //     'logo5' => $image5,
        // ]);
        // return redirect()->route('logo.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Logo::find($id)->delete();
        return redirect()->route('logo.index');
    }
}

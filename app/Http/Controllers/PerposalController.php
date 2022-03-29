<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medical;
use App\Models\Perposal;
use Illuminate\Http\Request;
use App\Notifications\ProposelNotification;
use PDF;
use Auth;
use App\Mail\ProposelMail;

class PerposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Perposal::all();
        return view('pages.admin.dashboard.perposal.index', compact('invoices'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Medical::all();
        return view('pages.admin.dashboard.perposal.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $med = Medical::find($request->order_id);
        $user = User::find($med->user_id);
        Perposal::create([
            'tax' => $request->tax,
            'price_model' => $request->price_model,
            'price_design' => $request->price_design,
            'qty_model' => $request->qty_model,
            'user_id' => $user->id,
            'qty_design' => $request->qty_design,
            'validtill' => $request->validtill,
            'date' => $request->date,
        ]);
        $details = [
            'title' =>$user->name,
            'body' => 'Your medical request have been created',
        ];
        \Mail::to($user->email)->send(new \App\Mail\ProposelMail($details));
        return redirect()->route('perposal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Perposal::find($id);
     
        $user = User::find($invoice->user_id);
        return view('pages.admin.invoice', compact('invoice', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Perposal::find($id);
        return view('pages.admin.dashboard.perposal.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Perposal::find($id)->update([
            'tax' => $request->tax,
            'price_model' => $request->price_model,
            'price_design' => $request->price_design,
            'qty_model' => $request->qty_model,
            'qty_design' => $request->qty_design,
            'validtill' => $request->validtill,
            'date' => $request->date,
        ]);
        return redirect()->route('perposal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Perposal::find($id)->delete();
        return redirect()->route('perposal.index');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfProposal(Request $request)
    {
        $items = Perposal::where('user_id',Auth::user()->id)->get();
        view()->share('items',$items);
        if($request->has('download')){
            $pdf = PDF::loadView('proposel');
            return $pdf->download('proposel.pdf');
        }
        return view('pdfview');
    }
}

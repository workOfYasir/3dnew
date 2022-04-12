<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medical;
use App\Models\Perposal;
use Illuminate\Http\Request;
use App\Notifications\ProposelNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
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
        $image = $request->image->getClientOriginalName();
        $request->image->move(public_path('upload/'), $image);
        $pathimage ='upload/'.$image;
        $med = Medical::find($request->order_id);
        $user = User::find($med->user_id);
        $perposals = Perposal::create([
            'tax' => $request->tax,
            'price_model' => $request->price_model,
            'price_design' => $request->price_design,
            'qty_model' => $request->qty_model,
            'order_id' => $request->order_id,
            'manufacturing' => $request->manufacturing,
            'concept_design' => $request->concept_design,
            'user_id' => $user->id,
            'image'=> $pathimage,
            'address' =>$request->address,
            'deliverable_model'=>$request->deliverable_model,
            'deliverable_design'=>$request->deliverable_design,
            'qty_design' => $request->qty_design,
            'validtill' => $request->validtill,
            'date' => $request->date,
        ]);
          $details = [
            'subject' =>"'".$med->id ."' تم اصدار فاتورة رقم",
            'name' =>$user->name ,
            'body1' => "'".$med->id ."' بناء على موافقتكم على عرض السعر للطلب رقم ",
            'body2'=> "'".$med->request ."'فقد تم اصدار الفاتورة بمبلغ",
            'body3'=>'للدفع برجاء الضغط على الرابط التالي:',
            'linkText' => 'Link is being here to go to website to pay the invoice',
            'thanks' => 'شكراً جزيلاً',
            'orderNumber' =>$med->id ,
        ];
        $perposal = Perposal::where('id',$perposals->id)->get()->first();
        $user = User::find($perposal->user_id);
        // if($request->has('download')){
            $pdf = PDF::loadView('pages.admin.proposel',compact('perposal', 'user'));

        \Mail::send('emails.invoice', $details, function($message)use($details,$user, $pdf) {
            $message->to($user->email)
                    ->subject($details["subject"])
                    ->attachData($pdf->output(), "Propsal.pdf");
        });
        // \Mail::to($user->email)->send(new \App\Mail\ProposelMail($details));
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
    public function pdfProposal($id)
    {
        $invoice = Perposal::find($id);
        $user = User::find($invoice->user_id);

        // if($request->has('download')){
            $pdf = PDF::loadView('pages.admin.invoice',compact('invoice', 'user'));
            return $pdf->download('proposel.pdf');
        // }
        // return  $pdf->download('pages.admin.invoice');
    }
}

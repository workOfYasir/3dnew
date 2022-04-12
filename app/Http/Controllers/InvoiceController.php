<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvoiceNotification;
use Barryvdh\DomPDF\Facade\Pdf ;
// use PDF;
use App\Mail\InvoiceMail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('pages.admin.dashboard.invoice.index', compact('invoices'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Medical::all();
        return view('pages.admin.dashboard.invoice.create', compact('orders'));
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
        $invoices = Invoice::create([
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
            'subject' =>"'".$invoices->id ."' تم اصدار فاتورة رقم",
            'name' =>$user->name ,
            'body1' => "'".$invoices->id ."' بناء على موافقتكم على عرض السعر للطلب رقم ",
            'body2'=> "'".$invoices->request ."'فقد تم اصدار الفاتورة بمبلغ",
            'body3'=>'للدفع برجاء الضغط على الرابط التالي:',
            'linkText' => 'Link is being here to go to website to pay the invoice',
            'thanks' => 'شكراً جزيلاً',
            'orderNumber' =>$invoices->id ,
        ];
        
        $invoice = Invoice::where('id',$invoices->id)->get()->first();
        $user = User::find($invoice->user_id);
        // if($request->has('download')){
            $pdf = PDF::loadView('pages.admin.invoice',compact('invoice', 'user'));

        \Mail::send('emails.invoice', $details, function($message)use($details,$user, $pdf) {
            $message->to($user->email)
                    ->subject($details["subject"])
                    ->attachData($pdf->output(), "invoice.pdf");
        });
        // \Mail::to($user->email)->send(new \App\Mail\InvoiceMail($details));
        return redirect()->route('invoicess.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);
        $user = User::find($invoice->user_id);
        // dd($invoice);
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
        $invoice = Invoice::find($id);
        return view('pages.admin.dashboard.invoice.edit', compact('invoice'));
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
        Invoice::find($id)->update([
            'tax' => $request->tax,
            'price_model' => $request->price_model,
            'price_design' => $request->price_design,
            'qty_model' => $request->qty_model,
            'qty_design' => $request->qty_design,
            'validtill' => $request->validtill,
            'date' => $request->date,
        ]);
        return redirect()->route('invoicess.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::find($id)->delete();
        return redirect()->route('invoicess.index');
    }


    
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfInvoice($id)
    {
        $invoice = Invoice::find($id);
        $user = User::find($invoice->user_id);
        // if($request->has('download')){
            $pdf = PDF::loadView('pages.admin.invoice',compact('invoice', 'user'));
            return $pdf->download('invoice.pdf');
        // }
        // return $pdf->stream();
    }
}

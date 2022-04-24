<div class="h5 p-3 text-center" >
    PAYMENT RECIEPT
</div>
<div class="row p-3">
    <div class="col-4"></div>
    <div class="col-8">
    
        <div class="col-12">
            
        
                
                <div class="row">
                    
                    <div class="col-6">
                        {{ $invoice->payment }}
                    </div>
                    <div class="col-6 text-left" style="direction: ltr">
                        Payment Mode:
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        {{ date('Y-m-d') }}
                    </div>
                    <div class="col-6 text-left " style="direction: ltr">
                        Payment Date:
                    </div>
                </div>
                @php
                $total = ($invoice->price_model*$invoice->qty_model)+($invoice->price_design*$invoice->qty_design);
                $totaltex = $total*($invoice->tax/100);
                $t = $totaltex + $total;
                @endphp
                
            
            <button class="w-100 p-3 btn bg-success"  data-bs-toggle="modal"
            data-bs-target="#convertModal" >Total {{ $t }}</button>
        </div>
    
    </div>
    <div class="col-12 p-3">
        <div class="h5 pt-3 pb-3" style="text-align: end">
            Payment For
        </div>
        <table class="table table-light" style="direction: ltr">
            <thead class="thead-light">
                <tr>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th>Invoice Amount</th>
                    <th>Payment Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->date }}</td>
                    <td>{{ $t }}</td>
                    <td>{{ $t }}</td>
                </tr>
            </tbody>
        
        </table>
    </div>
</div>
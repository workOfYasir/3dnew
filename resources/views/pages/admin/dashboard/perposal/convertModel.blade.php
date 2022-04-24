<div id="convertModal" style="direction: ltr" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Convert to Invoice</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('convertToInvoice') }}" method="post">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="perposal_id" value="{{ $invoice->id }}" >
                               <strong class="text-primary">How total is Calculated?</strong>
                <div class="row">
                    <div class="col-6">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="my-select">Customer</label>
                                <select id="my-select" class="form-control" name="user">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{$invoice->user->id == $user->id ? 'selected': ''}}
                                            >{{ $user->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="my-select">Projects</label>
                                <select id="my-select" class="form-control" name="project">
                                    @foreach ($medicals as $medical)
                                    <option value="{{ $medical->id }}" {{$invoice->order_id == $medical->id ?
                                        'selected': ''}} >{{ $medical->id }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <strong>Bill To</strong><br>
                                <span>{{ $invoice->address }}</span><br>
                                <span>{{ $invoice->city.', '.$invoice->country }}</span><br>
                                <span>{{ $invoice->zip_code }}</span><br>
                            </div>
                            <div class="col-6">
                                <strong>Ship To</strong><br>
                                <span>--</span><br>
                                <span>--,--</span><br>
                                <span>--,--</span><br>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInput">Invoice Number</label>
                            <input type="text" class="form-control" name="invo_no" id="exampleInput" value="{{ $invoice->id }}"
                                placeholder="Example input placeholder">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInput">Invoice Date</label>
                                <input type="date" class="form-control" id="exampleInput" value="{{ $invoice->date }}"
                                    placeholder="Example input placeholder">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInput">Due Date</label>
                                <input type="date" class="form-control" id="exampleInput" value="{{ $invoice->validtill }}"
                                    placeholder="Example input placeholder">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="my-select">Allowed Payment modes for this invoice</label>
                                <select id="my-select" class="form-control" name="payment">
                                    <option>Text</option>
                                    <option>Text</option>
                                    <option>Text</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="my-select">Currency</label>
                                    <select id="my-select" class="form-control" name="currency">
                                        <option>Text</option>
                                        <option>Text</option>
                                        <option>Text</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="my-select">Sale Agent</label>
                                    <select id="my-select" class="form-control" name="sale_agent">
                                        <option>Text</option>
                                        <option>Text</option>
                                        <option>Text</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="my-select">Recurring Invoice</label>
                                    <select id="my-select" class="form-control" name="">
                                        <option>Text</option>
                                        <option>Text</option>
                                        <option>Text</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="my-select">Discount Type</label>
                                    <select id="my-select" class="form-control" name="discount">
                                        <option>Text</option>
                                        <option>Text</option>
                                        <option>Text</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="my-textarea">Admin Note</label>
                                <textarea id="my-textarea" class="form-control" name="admin_note" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <table class="table light">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td><textarea class="form-control" name="title1" id="" cols="30" rows="10">Concept Design</textarea></td>
                            <td> <textarea class="form-control" name="description1" id="" cols="30" rows="10"> {{ $invoice->concept_design }}</textarea>
                            </td>
                            <td><input type="number" name="qty1" class="form-control" value="{{ $invoice->qty_design }}"></td>
                            <td><input type="number" name="price1"  class="form-control" value="{{ $invoice->price_design }}"></td>

                        </tr>
                        <tr>

                            <td><textarea class="form-control" name="title2" id="" cols="30" rows="10">Manufacturing</textarea></td>
                            <td> <textarea class="form-control" name="description2" id="" cols="30" rows="10"> {{ $invoice->manufacturing }}</textarea>
                            </td>
                            <td><input type="number" name="qty2" class="form-control" value="{{ $invoice->qty_model }}"></td>
                            <td><input type="number" name="price2" class="form-control" value="{{ $invoice->price_model }}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Tax</td>
                            <td>{{ $invoice->tax }}</td>
                        </tr>
                        <tr>
                            
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            @php
                            $total = ($invoice->price_model*$invoice->qty_model)+($invoice->price_design*$invoice->qty_design);
                            $totaltex = $total*($invoice->tax/100);
                            $t = $totaltex + $total;
                            @endphp
                            <td> {{$total}}SR</td>
    
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>VAT Rate</td>
                            <td>{{$invoice->tax}}%</td>
    
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>VAT Amount</td>
                            @php
    
                            @endphp
                            <td>{{$totaltex}} SR</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total Quote</td>
                            <td class="total-amount"> {{$t}}SR</td>
                        </tr>
                    </tbody>

                </table>
                <div class="form-group">
                    <label for="my-textarea">Client Note</label>
                    <textarea id="my-textarea" class="form-control" name="client_note" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="my-textarea">Terms and Condition</label>
                    <textarea id="my-textarea" name="terms" class="form-control" rows="3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, sapiente sit, dolorum natus illo nisi quas repellendus dicta aspernatur praesentium porro dolores blanditiis velit debitis molestias, laudantium itaque. Enim, corporis?
                    </textarea>
                </div>
               
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn bg-success" value="Save">
            </div>
        </form>
        </div>
    </div>
</div>
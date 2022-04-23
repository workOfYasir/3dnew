@extends('layouts.user.index')
@section('content')
<style>
    html{
        direction: ltr !important;
    }
    .nav-tabs .nav-link.active {
        border: none;
        background-color:rgb(245 247 251);
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #0d79e5 !important;
    }
    .nav-tabs{
        border-bottom: 0px;
    }
</style>
            <div class="container">
                <div class="col-12 p-5">
                    <img src="{{ asset('invoice/assets/logo.svg') }}" />
                </div>
                <div class="col-12 d-flex">
                    <div class="col-6">
                        <h1>
                            #P-000{{ $user->purposals->order_id }}
                        </h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('purposal',$user->purposals->id) }}" target="_blank"
                            class="btn btn-sm btn-light">View</a>
                        <a href="{{ route('purposal.pdf',$user->purposals->id) }}"
                            class="btn btn-sm btn-light">PDF</a>
                        <a href="{{ route('sendViaMail',$user->purposals->id) }}"
                            class="btn btn-sm btn-light">Mail</a>
                            <button class="btn btn-sm btn-light perposalNotAccepted " data-id="{{$user->purposals->id}}">Declined</button>                    
                            <button class="btn btn-sm bg-success text-light perposalAccepted " data-id="{{$user->purposals->id}}">Accept</button>

                            
                    </div>
                </div>
                <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body p-4">
                           
                            <p class="card-text">
                                <table class="table">
                                    <thead class="bg-dark text-light ">
                                        <tr>      
                                            <th scope="col"class="text-light">Description</th>
                                            <th scope="col"class="text-light">Quantity</th>
                                            <th scope="col"class="text-light">Rate</th>
                                            <th scope="col"class="text-light">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="tbox1">
                                                <label>Concept Design:</label>
                                                <p class="muted"> {{ $invoice->concept_design }}</p>
                                            </td>
                                            <td>{{$invoice->qty_design}}</td>
                                            <td>{{$invoice->price_design}} SR</td>
                                            <td>{{$invoice->price_design}} SR</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="4"></td>
                                            <td colspan="2">Total</td>
                                            @php
                                            $total = ($user->purposals->price_model*$user->purposals->qty_model)+($user->purposals->price_design*$user->purposals->qty_design);
                                            $totaltex = $total*($user->purposals->tax/100);
                                            $t = $totaltex + $total;
                                            @endphp
                                            <td> {{$total}}SR</td>
                    
                                        </tr>
                                        <tr>
                                            <td colspan="2">VAT Rate</td>
                                            <td>{{$user->purposals->tax}}%</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">VAT Amount</td>
                                            @php
                    
                                            @endphp
                                            <td>{{$totaltex}} SR</td>
                                        </tr>
                                        <tr>
                    
                                            <td colspan="2">Total Quote</td>
                                            <td class="total-amount"> {{$t}}SR</td>
                                        </tr>
                                    </tbody>
                                   
                                </table>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-body col-4">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link text-black active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Proposal</button>
                            <button class="nav-link text-black" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Comments</button>
                        </div>
                    </nav>
                    <div class="tab-content pt-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <strong>
                                {{ $user->name }}
                            </strong><br/>
                            <span>{{ @$user->purposals->address }}</span><br/>
                            <span>{{ $user->purposals->city }}</span><br/>
                            <span>{{ $user->purposals->country.', '.$user->purposals->zip_code }}</span>
                            <hr>
                            <strong>
                                Perposal Information
                                <span>{{ $user->name }}</span><br/>
                                <span>{{ $user->email }}</span><br/>
                                <span>{{ $user->purposals->phone }}</span><br/>
                                <span>{{ @$user->purposals->address }}</span><br/>
                            <span>{{ $user->purposals->city }}</span><br/>
                            <span>{{ $user->purposals->country.', '.$user->purposals->zip_code }}</span>
                            </strong><br/>
                            <br/>
                            @php
                            $total = ($user->purposals->price_model*$user->purposals->qty_model)+($user->purposals->price_design*$user->purposals->qty_design);
                            $totaltex = $total*($user->purposals->tax/100);
                            $t = $totaltex + $total;
                            @endphp
                            <h5> Total {{$total}} SR</h5>
                           
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">2
                            @if($invoice->comments==1)
                            @livewire('chats',['user_id' =>
                            $invoice->user_id,'request_id'=>$invoice->order_id,'request_type'=>'App\Models\Medical']))
                            @endif
                        </div>
    
                    </div>
                </div>
            </div>
            </div>
  
@endsection
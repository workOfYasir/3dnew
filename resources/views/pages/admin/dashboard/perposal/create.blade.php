@extends('layouts.admin.app')
@section('content')
<div class="content-main">
    <h3>وضع اليد</h3>
    <div class="breadcrumb-main">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">الصفحة الرئيسية</a></li>

            <li><a href="{{ route('perposal.index') }}">وضع اليد</a></li>

        </ol>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 panelwrapper">
                <div class="card medical-card">
                    <div class="card-body p-0">
                        <a class="btn btn-primary mb-2" href="{{
                            route('perposal.create') }}"> جديد +</a>
                        <div class="table-responsive medical-datatable">
                            <table class="display" style="width:100%" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>Purposal</th>
                                        <th>Subject</th>
                                        <th>To</th>
                                        <th>Total</th>
                                  
                                    </tr>
                                </thead>
                                @foreach ($invoices as $key => $invoice)
                                <tr>
                                    <td style="cursor: pointer" onclick="panel({{ $key }})"{{ $invoice->id }}></td>
                                    <td style="cursor: pointer" onclick="panel({{ $key }})">{{$invoice->subject}}</td>
                                    <td style="cursor: pointer" onclick="panel({{ $key }})">{{$invoice->user->name}}</td>
                                    @foreach ($invoice->pdf as $key => $pdf)
                                        @php
                                        $total = 0;
                                            $total += ($pdf->rate*$pdf->quantity);
                                            $totaltex = $total*($pdf->tax/100);
                                            $t = $totaltex + $total;
                                        @endphp
                                    @endforeach
                                    <td>{{ $t }}</td>
                                    <td>
                                        <div class="invoice-btns d-flex">
                                            {{-- <form action="{{
                                            route('perposal.destroy', $invoice->id)
                                            }}" method="POST">
                                                <a class="btn btn-primary" href="{{
                                                route('perposal.edit',
                                                $invoice->id) }}">يحرر</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn
                                                btn-danger">حذف</button>
                                            </form>
                                            <a class="btn btn-primary" href="{{
                                            route('perposal.show', $invoice->id)
                                            }}">فاتورة</a> --}}
                                            @if($invoice->assigned)
                                            <a class="btn btn-success">Accepted</a>
                                            @else
                                            <a class="btn btn-secondary">Open</a>
                                            @endif
                                        </div>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($invoices as $key => $invoice)
            <div class="col-6 panel_view panel_view_{{ $key }} d-none">
                <div class="col-12 card">
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
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="col-12 d-flex">
                                <div class="col-6">
                                    <a href="{{ route('purposal',$invoice->id) }}" target="_blank"
                                        class="btn btn-sm btn-light">View</a>
                                    <a href="{{ route('purposal.pdf',$invoice->id) }}"
                                        class="btn btn-sm btn-light">PDF</a>
                                    <a class="btn btn-sm btn-light"
                                        data-bs-toggle="modal"
                                        data-bs-target="#convertModal_{{ $key }}"
                                        >Convert</a>
                                    <a href="{{ route('sendViaMail',$invoice->order_id) }}"
                                        class="btn btn-sm btn-light">Mail</a>
                                        @include('pages.admin.dashboard.perposal.convertModel')
                                </div>
                                
                                <div class="col-6">
                                    @if($invoice->assigned==0)
                                    <button type="button" class="btn btn-sm btn-danger">Not Accepted</button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-success">Accepted</button>
                                    @endif

                                </div>

                            </div>
                            
                            <hr>
                            <div class="col-12 d-flex">
                                <div class="col-6">
                                    <div class="col-6 p-3">
                                        <strong>To</strong><br>
                                        <span class="text-primary">{{ $invoice->user->name }}</span><br>
                                        <span>{{ $invoice->address }}</span><br>
                                        <span>{{ $invoice->city }}</span><br>
                                        <span>{{ $invoice->country }}</span><br>
                                        <span class="text-primary">{{ $invoice->phone }}</span>
                                        <span class="text-primary">{{ $invoice->email }}</span>
                                    </div>
                                </div>
                                <div class="col-6 text-start p-3">
                                    <h3>{{ $invoice->order_id }}</h3>
                                    <span>{{ $invoice->user->name }}</span><br>
                                    <span>{{ $invoice->address }}</span><br>
                                    <span>{{ $invoice->city .', '. $invoice->country }}</span>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            {{-- @if($invoice->comments==1) --}}
                            @livewire('chats',['user_id' =>
                            $invoice->user_id,'request_id'=>$invoice->order_id,'request_type'=>'App\Models\Medical'])
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
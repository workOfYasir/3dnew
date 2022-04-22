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
            <div class="col-sm-12">
                <div class="card medical-card">
                    <div class="card-body p-0">
                        <a class="btn btn-primary mb-2" href="{{
                            route('perposal.create') }}"> جديد +</a>
                        <div class="table-responsive medical-datatable">
                            <table class="display" style="width:100%"
                                id="basic-2">
                                <thead>
                                    <tr>
                                        <th>السعر_نموذج</th>
                                        <th>السعر_تصميم</th>
                                        <th>نموذج_الكمية</th>
                                        <th>الكمية التصميم</th>
                                        <th>صالح لغاية</th>
                                        <th>تاريخ</th>
                                        <th>ضريبة</th>
                                        <th>أجراءات</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                @foreach ($invoices as $invoice)
                                <tr>

                                    <td>{{$invoice->price_model}}</td>
                                    <td>{{$invoice->price_design}}</td>
                                    <td>{{$invoice->qty_model}}</td>
                                    <td>{{$invoice->qty_design}}</td>
                                    <td>{{$invoice->validtill}}</td>
                                    <td>{{$invoice->date}}</td>
                                    <td>{{$invoice->tax}}</td>

                                    <td>
                                    <div class="invoice-btns d-flex">
                                        <form action="{{
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
                                            }}">فاتورة</a>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actionModal">
                                            Launch demo modal
                                          </button> --}}
                                          <button type="button" class="btn
                                                btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#actionModal">
                                         More
                                            </button>
                                          
                                          @include('pages.admin.dashboard.perposal.actionModal')
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

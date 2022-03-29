@extends('layouts.admin.app')
@section('content')
<div class="content-main">
    <h3>فاتورة</h3>
    <div class="breadcrumb-main">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">الصفحة الرئيسية</a></li>

            <li><a href="{{ route('invoicess.index') }}">فاتورة</a></li>

        </ol>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card medical-card">
                    <div class="card-body p-0">
                        <a class="btn btn-primary mb-2" href="{{
                            route('invoicess.create') }}"> جديد +</a>
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
                                        <form class="px-3" action="{{
                                            route('invoicess.destroy',
                                            $invoice->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{
                                                route('invoicess.edit',
                                                $invoice->id) }}">يحرر</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn
                                                btn-danger">حذف</button>
                                        </form>
                                        <a class="btn btn-primary" href="{{
                                            route('invoicess.show', $invoice->id)
                                            }}">فاتورة</a>
                                            </div>
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
@extends('layouts.admin.app')
@section('content')
<div class="content-main">
    <h3>يزيد</h3>
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
                        <form method="POST" action="{{ route('invoicess.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1
                                            invoice-field">ترتيب </label>
                                        <select class="form-select
                                            invoice-field" required
                                            name="order_id" aria-label="Default
                                            select example">
                                            <option selected disabled>اختر طلبا</option>
                                            @foreach($orders as $order)
                                            <option value="{{$order->id}}">{{$order->id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">تاريخ
                                        </label>
                                        <input type="date" class="form-control
                                            invoice-field" required name="date"
                                            id="" aria-describedby="emailHelp"
                                            placeholder="أدخل التاريخ">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">صالح لغاية </label>
                                        <input type="number" class="form-control
                                            invoice-field" required
                                            name="أدخل صالح حتى" id=""
                                            aria-describedby=""
                                            placeholder="أدخل صالح حتى">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">كمية التصميم ثلاثي الأبعاد </label>
                                        <input type="number" class="form-control
                                            invoice-field" required
                                            name="qty_design" id=""
                                            aria-describedby=""
                                            placeholder="كمية التصميم ثلاثي الأبعاد">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">سعر / وحدة تصميم ثلاثي الأبعاد</label>
                                        <input type="number" class="form-control
                                            invoice-field" required
                                            name="price_design" id=""
                                            aria-describedby=""
                                            placeholder="سعر / وحدة تصميم ثلاثي الأبعاد">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">كمية النموذج ثلاثي الأبعاد </label>
                                        <input type="number" class="form-control
                                            invoice-field" required
                                            name="qty_model" id=""
                                            aria-describedby=""
                                            placeholder=" كمية النموذج ثلاثي الأبعاد">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">سعر النموذج ثلاثي الأبعاد / الوحدة </label>
                                        <input type="number" class="form-control
                                            invoice-field" required
                                            name="price_model" id=""
                                            aria-describedby=""
                                            placeholder="سعر النموذج ثلاثي الأبعاد / الوحدة">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">قيمة الضريبة
                                        </label>
                                        <input type="number" class="form-control
                                            invoice-field" required name="tax"
                                            id="" aria-describedby=""
                                            placeholder="قيمة الضريبة">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">تصميم التسليم</label>
                                        <input type="text" class="form-control
                                            invoice-field" required
                                            name="deliverable_design" id=""
                                            aria-describedby=""
                                            placeholder="تصميم التسليم">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> نموذج التسليم
                                        </label>
                                        <input type="text" class="form-control
                                            invoice-field" required name="deliverable_model"
                                            id="" aria-describedby=""
                                            placeholder="نموذج التسليم">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                              
                                <div class="invoice-field-12  d-flex">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">صورة
                                        </label>
                                        <input type="file" class="form-control
                                            invoice-field" required name="image"
                                            id="" aria-describedby=""
                                            placeholder="">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان
                                        </label>
                                        <input type="text" class="form-control
                                          " required name="address"
                                            id="" aria-describedby=""
                                            placeholder="">
                                        <small id="" class="form-text
                                            text-muted"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="exampleInputEmail1"> مفهوم التصميم
                                    </label>
                                    <textarea name="concept_design" class="form-control" id="concept_design" cols="30" rows="10"></textarea>
                                    <small id="" class="form-text
                                    text-muted"></small>
                                </div>
                           
                                <div class="col-md-6 mb-4">
                                    <label for="exampleInputEmail1"> تصنيع
                                    </label>
                                    <textarea name="manufacturing" class="form-control" id="manufacturing" cols="30" rows="10"></textarea>
                                    <small id="" class="form-text
                                    text-muted"></small>
                                </div>                                
                            </div>
                            
                            <button type="submit" class="btn btn-primary ">يقدم</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin.app')
@section('content')
<div class="content-main">
    <h3>قائمة المستخدمين</h3>
    <div class="breadcrumb-main">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">الصفحة الرئيسية</a></li>

            <li><a href="{{ route('user.list') }}">قائمة المستخدمين</a></li>
        </ol>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card medical-card">
                    <div class="card-body p-0">
                        <div class="table-responsive medical-datatable">
                            <table class="display" style="width:100%"
                                id="basic-2">
                                <thead>
                                    <tr>
                                        <th>لقب</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الحالة
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->address }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        @if($product->status == 1)
                                        <div class="flex items-center justify-center text-theme-9" data-id="{{$product->id}}" > <input type="checkbox"  data-id="{{$product->id}}" data-status="0" data-toggle="toggle" data-on="Active" class="productApproved w-4 h-4 mr-2" checked="checked" /> <div class="text-{{$product->id}}"> Approved</div>
                                        @else
                                        <div class="flex items-center justify-center text-theme-6" data-id="{{$product->id}}" > <input type="checkbox"   data-id="{{$product->id}}" data-status="1"  data-value="{{$product->status}}" class="productApproved w-4 h-4 mr-2"/> <div class="text-{{$product->id}}"> Not Approved </div></div>
                                        @endif
                                      
                                    </td>
                                    <td><a href="{{ route('product.delete',$product->id) }}"> Delete </a></td>
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

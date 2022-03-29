@extends('layouts.admin.app')
@section('content')
<div class="content-main">
    <h3>صور البانر المتحرك</h3>
    <div class="breadcrumb-main">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">الصفحة الرئيسية</a></li>

            <li><a href="#">إعدادات الموقع</a></li>
            <li><a href="{{ route('image.index') }}">صور البانر المتحرك</a></li>
        </ol>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card medical-card">
                    <div class="card-body p-0">
                        <a class="btn btn-primary mb-2" href="{{
                            route('image.create') }}">+أضف شريط التمرير</a>
                        <div class="table-responsive medical-datatable">
                            <table class="display" style="width:100%"
                                id="basic-2">
                                <thead>
                                    <tr>
                                        <th>صورة</th>
                                        <th>العنوان الفرعي</th>
                                        <th>عنوان</th>
                                        <th>محتوى</th>
                                        <th></th>
                                    </tr>

                                </thead>

                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <td><img src="{{ asset($slider->images)
                                            }}" style="height:60px;width:60px;"></td>
                                            <td>{{$slider->sub_heading}}</td>
                                        <td>{{$slider->heading}}</td>
                                       
                                        <td>{{$slider->body_text}}</td>
                                        <td><a href="{{route('view',$slider->id)}}"
                                                class="btn btn-primary">رأي</a>
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
        </div>
    </div>
</div>

@endsection

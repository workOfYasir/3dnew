@extends('layouts.admin.app')
@section('content')
<div class="content-main">
    <h3>الشعارات</h3>
    <div class="breadcrumb-main">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">الصفحة الرئيسية</a></li>

            <li><a href="#">إعدادات الموقع</a></li>
            <li><a href="{{ route('logo.index') }}">الشعارات</a></li>
        </ol>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card medical-card">
                    <div class="card-body p-0">
                        <form method="POST" action="{{ route('logo.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">شعار </label>
                                        <input type="file" class="form-control"
                                            name="logo1" id="" accept="image/*"
                                            type="file"
                                            id="download-cv-file-name" name="logo1"
                                            id="logo1" aria-describedby=""
                                            placeholder="Enter sub heading">
                                        <small id="" class="form-text text-muted">
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">شعار </label>
                                        <input type="file" class="form-control"
                                            name="logo2" id="" accept="image/*"
                                            type="file"
                                            id="download-cv-file-name" name="logo2"
                                            id="logo2" aria-describedby=""
                                            placeholder="Enter sub heading">
                                        <small id="" class="form-text text-muted">
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">شعار </label>
                                        <input type="file" class="form-control"
                                            name="logo3" id="" accept="image/*"
                                            type="file"
                                            id="download-cv-file-name" name="logo3"
                                            id="logo3" aria-describedby=""
                                            placeholder="Enter sub heading">
                                        <small id="" class="form-text text-muted">
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">شعار </label>
                                        <input type="file" class="form-control"
                                            name="logo4" id="" accept="image/*"
                                            type="file"
                                            id="download-cv-file-name" name="logo4"
                                            id="logo4" aria-describedby=""
                                            placeholder="Enter sub heading">
                                        <small id="" class="form-text text-muted">
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     
                            <div class="form-group">
                                <label for="exampleInputEmail1">شعار </label>
                                <input type="file" class="form-control"
                                    name="logo5" id="" accept="image/*"
                                    type="file"
                                    id="download-cv-file-name" name="logo5"
                                    id="logo5" aria-describedby=""
                                    placeholder="Enter sub heading">
                                <small id="" class="form-text text-muted">
                                </small>
                            </div>
                                </div>
                                <div class="col-md-6">
                                    
                            <div class="form-group">
                                <label for="exampleInputEmail1">شعار </label>
                                <input type="file" class="form-control"
                                    name="logo6" id="" accept="image/*"
                                    type="file"
                                    id="download-cv-file-name" name="logo6"
                                    id="logo6" aria-describedby=""
                                    placeholder="Enter sub heading">
                                <small id="" class="form-text text-muted">
                                </small>
                            </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">شعار </label>
                                        <input type="file" class="form-control"
                                            name="logo7" id="" accept="image/*"
                                            type="file"
                                            id="download-cv-file-name" name="logo7"
                                            id="logo7" aria-describedby=""
                                            placeholder="Enter sub heading">
                                        <small id="" class="form-text text-muted">
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">شعار </label>
                                        <input type="file" class="form-control"
                                            name="logo8" id="" accept="image/*"
                                            type="file"
                                            id="download-cv-file-name" name="logo8"
                                            id="logo8" aria-describedby=""
                                            placeholder="Enter sub heading">
                                        <small id="" class="form-text text-muted">
                                        </small>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">يقدم</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

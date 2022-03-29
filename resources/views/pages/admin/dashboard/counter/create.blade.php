@extends('layouts.admin.app')
@section('content')
<div class="content-main">
  <h3>عدادات</h3>
  <div class="breadcrumb-main">
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}">الصفحة الرئيسية</a></li>

      <li><a href="#">إعدادات الموقع</a></li>
      <li><a href="{{ route('counter.index') }}"> عدادات</a></li>
    </ol>
  </div>
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-sm-12">
        <div class="card medical-card">
          <div class="card-body p-0">
            <form method="POST" action="{{route('counter.store')}}">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">يبدأ </label>
                    <input type="text" class="form-control" name="start" id=""
                      aria-describedby="emailHelp" placeholder="أدخل رقم">
                    <small id="" class="form-text text-muted"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">نهاية </label>
                    <input type="text" class="form-control" name="end" id=""
                      aria-describedby="" placeholder="أدخل رقم">
                    <small id="" class="form-text text-muted"></small>
                  </div>
                </div>

              </div>



              <button type="submit" class="btn btn-primary">إرسال</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

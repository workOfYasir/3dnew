
<div class="modal fade page register" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-header border-0">
                            <div class="ahs-member-model-box member-cross-btn">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="ahs-member-model-box">
                                <span class="outline dot">اهلاً وسهلاً بكم</span>
                                <h1 class="modal-title right" style="color: black;">
                                    <span class="btm-line"></span><span class="inner-line"></span> معلومات العضوية
                                </h1>
                            </div>
                            <div class="profile ahs-member-model-box">
                                <button  class="btn btn-sky edit-profile--ahs"   data-bs-toggle="modal"
                                                        data-bs-target="#productdesignModal">المنتجات</button>
                                <button class="btn btn-sky edit-profile membership-edit">تعديل</button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="ahs-img-uploder-cam__holder">
                                <input type="hidden" name="_token" value="p2TteENBnXmCNv1w9tEpQy6RpYxRAWKo1snBkO2f"> <img id="blah1" src="https://zen-boyd.161-97-115-110.plesk.page/3dorgans/public/upload/images/1648128609.png" alt="dashboard_logo" class="mx-auto d-block imageupload1" style="clip-path: circle() !important ;height:150% !important;" width="150">
                                <img src="{{ asset('user/assets/images/camera.png') }}" alt="camera" class="ahs-img-uploder-cam">
                                <input id="imgInp1" type="file" class="chose1" value="upload/images/1648128609.png" name="profile" accept="image/*" style="display: none;">
                            </div>
                            <div class="ahs-form-box1-box">
                                <a href="#" class="btn btn-form ahs-form-btn1">مستخدم</a>
                            </div>
                            <div class="wrapper al-center ahs-form-box1">
                                <span class="ahs-form-head1"> الرصيد الحالي </span>
                                <span class="ahs-form-head2"> 750 ريال </span>
                                <img src="{{ asset('user/assets/images/ar.png') }}" alt="" class="ahs-form-img1">
                            </div>
                            <div class="ff">
                                <div class="star-reating star-s-30">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
@if(Auth::check())
<form class="gy-4 gx-5" method="get" action="{{ route('profileUser') }}">
                                
    <input type="text" name="id" value="{{ Auth::user()->id }}">
    <input type="text" name="role" value="{{ Auth::user()->role }}">
    
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3 mt-4">
            <label class="form-label dot">الاسم</label>
            <input type="text" class="form-control name " name="name" value="{{ Auth::user()->name }}" placeholder="الاسم هنا .." value="">
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3 mt-4">
            <label class="form-label dot">رقم الجوال</label>
            <input type="text" class="form-control " name="field" value="{{ Auth::user()->field }}" placeholder="رقم الجوال هنا .." value="">
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3 mt-4">
            <label class="form-label dot">الايميل</label>
            <input type="text" name="email"  name="email" value="{{ Auth::user()->email }}" class="form-control email " placeholder="الايميل هنا .." value="">
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3 mt-4">
            <label class="form-label dot">كلمة المرور</label>
            <input type="text" name="password" class="form-control pass " placeholder="كلمة المرور هنا .." value="">
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3 mt-4 ahs-from-box">
            <label class="form-label dot">تقنية الطباعة</label>
            <select class="form-select"  name="printing_technology" aria-label="Default select example">
                <option></option>
                <option>اختيار التقنية</option>
            </select>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-3 mt-4 ahs-from-box">
            <label class="form-label dot">أنواع البرامج المستخدمة</label>
            <select class="form-select "  name="software_type" aria-label="Default select example">
                <option></option>
                <option>اختاير البرامج المستخدمة</option>
            </select>
        </div>
    </div>
    <div class="almuntjat-form-error d-none">
        <img src="assets/images/warning.png" alt="" class="almuntjat-form-error__img"> بعد إضافة المنتج سيذهب الى الإدارة للمراجعة للقبول أو الرفض
    </div>
    <div class="almuntjat-form-error almuntjat-form-error-2">
        <img src="{{ asset('/user/assets/images/warning.png')}}" alt="" class="almuntjat-form-error__img"> بعد إضافة المنتج سيذهب الى الإدارة للمراجعة للقبول أو الرفض
    </div>
    <div class="form-action">
        <button type="submit">حفظ</button>
        <p>تعديل بيانات التسجيل</p>
    </div>
</form>
@endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- designer pro update end -->
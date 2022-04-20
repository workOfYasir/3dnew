<div class="modal fade page register animate__animated animate__fadeInRight onTab" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div>
                                <span class="outline dot">اهلاً وسهلاً بكم</span>
                                <h1 class="modal-title right" style="color: black;">
                                    <span class="btm-line">
                                        <span class="inner-line"></span>
                                    </span>
                                    تسجيل عضوية جديدة
                                </h1>
                            </div>
                            <div></div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 p-4">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="medical-tab" data-bs-toggle="tab" data-bs-target="#userloginModal2" type="button" role="tab" aria-selected="true">
                                                مستخدم
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="public-tab" data-bs-toggle="tab" data-bs-target="#designerloginModal2" type="button" aria-controls="profile" aria-selected="false">
                                                مصمم
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="userloginModal2" role="tabpanel">
                                            <form class="row gy-4 gx-5 p-l-0" action="{{route('register')}}" method="post" style="padding-top: 20px;">
                                                @csrf
                                                <input type="hidden" name="role" value="{{Crypt::encrypt('user')}}">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                                        <img id="blah" src="https://zen-boyd.161-97-115-110.plesk.page/3dorgans/public/user/assets/icons/edit-avatar.svg" class="mx-auto d-block imageupload" width="100" alt="avatar" style="clip-path: circle() !important ;height: 100% !important;">
                                                        <input id="imgInp" type="file" class="chose" name="profile" accept="image/*" style="display: none;">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center mb-4  padd-l-0">
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                                        <label class="form-label dot">الاسم</label>
                                                        <input type="text" name="name" class="form-control " placeholder=".. الاسم هنا" value="">
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                                        <label class="form-label dot">رقم الجوال</label>
                                                        <input type="text" name="field" class="form-control " placeholder="الجهة هنا .." value="">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center padd-l-0">
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-4">
                                                        <label class="form-label dot">الايميل</label>
                                                        <input type="email" name="email" class="form-control email" placeholder="الايميل هنا .." value="">
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-4">
                                                        <label class="form-label dot">كلمة المرور</label>
                                                        <input type="password" name="password" class="form-control pass" placeholder="كلمة المرور هنا .." value="">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center padd-l-0">
                                                    <div class="container container-x container-x2">
                                                        <div class="almuntjat-form-error almuntjat-form-error-2">
                                                            <img src="{{ asset('user/assets/images/warning.png') }}" alt="" class="almuntjat-form-error__img"> بعد إضافة المنتج سيذهب الى الإدارة للمراجعة للقبول أو الرفض
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrapper terms-wrapper">
                                                    <p class="term-cond">
                                                        بتسجيلك فأنت توافق على الشروط والأحكام
                                                    </p>
                                                    <a href="#" class="terms-link">الشروط والأحكام</a>
                                                </div>
                                                <div class="form-action ahs-from-action">
                                                    <button class="btn btn-form mx-3 with-arrow disabled" type="submit">تسجيل</button>
                                                    <p>بيانات التسجيل</p>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade " id="designerloginModal2" role="tabpanel" aria-labelledby="profile-tab">
                                            <form class="row gy-4 gx-5" action="{{route('register')}}" method="post" style="padding-top: 20px;">
                                                @csrf
                                                <input type="hidden" name="role" value="{{Crypt::encrypt('designer')}}">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                                        <img id="blah" src="https://zen-boyd.161-97-115-110.plesk.page/3dorgans/public/user/assets/icons/edit-avatar.svg" class="mx-auto d-block imageupload" width="100" alt="avatar" style="clip-path: circle() !important ;height: 100% !important;">
                                                        <input id="imgInp" type="file" class="chose" name="profile" accept="image/*" style="display: none;">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center tab-justify-right padd-l-0">
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                                        <label class="form-label dot">الاسم</label>
                                                        <input type="text" class="form-control" name="name" placeholder="الاسم هنا .." value="">
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                                        <label class="form-label dot">رقم الجوال</label>
                                                        <input type="text" class="form-control "  name="field" placeholder="رقم الجوال هنا .." value="">
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                                        <label class="form-label dot">الايميل</label>
                                                        <input type="email" name="email" class="form-control email" placeholder="الايميل هنا ..">
                                                    </div>
                                                <!-- </div>
                                                <div class="row justify-content-center mb-5 tab-justify-right"> -->
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                                        <label class="form-label dot">كلمة المرور</label>
                                                        <input type="password" name="password" class="form-control pass " placeholder="كلمة المرور هنا .." value="">
                                                    </div>

                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4 ahs-from-box">
                                                        <label class="form-label dot">تقنية الطباعة</label>
                                                        <select class="form-select" required name="printing_technology" aria-label="Default select example">
                                                            <option selected>اختيار التقنية</option>
                                                            <option>اختيار</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4 ahs-from-box">
                                                        <label class="form-label dot">أنواع البرامج المستخدمة</label>
                                                        <select class="form-select" required name="software_type" aria-label="Default select example">
                                                            <option selected>اختاير البرامج المستخدمة</option>
                                                            <option>اختاير البرامج</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center padd-l-0">
                                                    <div class="container container-x">
                                                        <div class="almuntjat-form-error almuntjat-form-error-2">
                                                            <img src="{{ asset('user/assets/images/warning.png') }}" alt="" class="almuntjat-form-error__img"> بعد إضافة المنتج سيذهب الى الإدارة للمراجعة للقبول أو الرفض
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrapper terms-wrapper">
                                                    <p class="term-cond">
                                                        بتسجيلك فأنت توافق على الشروط والأحكام
                                                    </p>
                                                    <a href="#" class="terms-link">الشروط والأحكام</a>
                                                </div>
                                                <div class="form-action ahs-from-action">
                                                    <button class="btn btn-form mx-3 with-arrow disabled" type="submit">تسجيل</button>
                                                    <p>بيانات التسجيل</p>
                                                </div>
                                            </form>
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
</div>
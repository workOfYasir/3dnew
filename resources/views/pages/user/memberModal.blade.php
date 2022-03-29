<div class="modal fade page register" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div>
                                <span class="outline dot">اهلاً وسهلاً بكم</span>
                                <h1 class="modal-title right">
                                    <span class="btm-line"><span class="inner-line"></span>
                                        معلومة العضوية
                                    </span>
                                </h1>
                            </div>
                            {{-- @if($var != ) --}}
                            <div class="profile">
                                <button class="btn btn-sky edit-profile">تعديل</button>
                            </div>
                        </div>
                        <div class="modal-body">

                            @auth
                            <form class="gy-4 gx-5" method="post" action="{{route('edituser_profile',auth()->user()->id)}}" enctype="multipart/form-data">
                                @csrf
                                @auth
                                @if (Auth::user()->profile == null)
                                <img id="blah1" src="{{asset('user/assets/icons/edit-avatar.svg')}}" class="mx-auto d-block imageupload1" width="150" alt="avatar" style="clip-path: circle() !important ;height: 150% !important;" alt="dashboard_logo" />
                                @else
                                <img id="blah1" src="{{ asset(Auth::user()->profile) }}" alt="dashboard_logo" class="mx-auto d-block imageupload1" style="clip-path: circle() !important ;height:150% !important;" width="150" />
                                @endif
                                @endauth
                                <input id="imgInp1" type="file" class="chose1" value="{{Auth::user()->profile}}" name="profile" accept="image/*" style="display: none;">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 mt-4">
                                        <label class="form-label dot">الاسم</label>
                                        <input type="text" name="name" class="form-control " placeholder=".. الاسم هنا" value="{{auth()->user()->name}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 mt-4">
                                        <label class="form-label dot">الجهه</label>
                                        <input type="text" name="field" class="form-control " placeholder=".. التخصص هنا" value="{{auth()->user()->field}}">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 mt-4">
                                        <label class="form-label dot">الايميل</label>
                                        <input type="email" name="email" class="form-control " placeholder=".. الايميل هنا" value="{{auth()->user()->email}}">
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 mt-4">
                                        <label class="form-label dot">كلمة المرور</label>
                                        <input type="password" name="password" class="form-control " placeholder=".. كلمة المرور">
                                    </div>
                                </div>
                                <div class="form-action">
                                    <button class="btn btn-form mx-3 with-arrow " type="submit">حفظ</button>
                                    <p>تعديل بيانات التسجيل</p>
                                </div>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
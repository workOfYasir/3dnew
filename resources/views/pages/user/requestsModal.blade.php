 <div class="modal fade page" id="requestsModal" tabindex="-1" aria-labelledby="requestsModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-fullscreen">
         <div class="modal-content">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="modal-header border-0">
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             <div>
                                 <span class="outline dot">اهلاً وسهلاً بكم</span>
                                 <h1 class="modal-title right"><span class="btm-line d-flex">طلباتي<span class="inner-line"></span></span></h1>
                             </div>
                          
                             <div class="profile">
                                    <button class="btn btn-sky profile-btn invert">
                                        المصمم
                                    </button>
                                 @if(@auth()->user()->profile == null)
                                 <a href="#profile">
                                     <img src="{{asset('user/assets/icons/avatar.svg')}}" alt="avatar">
                                 </a>
                                 @else
                                 <a href="#profile">
                                     <img src="{{ asset( auth()->user()->profile) }}" style="height:40px; width:40px; border-radius: 50%">
                                 </a>
                                 @endif
                             </div>
                         </div>
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col-md-12">
                                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                                         <li class="nav-item" role="presentation">
                                             @auth
                                             <button class="nav-link active" id="medical-tab" data-bs-toggle="tab" data-bs-target="#medical-services" type="button" role="tab" aria-selected="true"><span class="notification">{{$orders->count()}}</span> الخدمات الطبية</button>
                                             @else
                                             <button class="nav-link active" id="medical-tab" data-bs-toggle="tab" data-bs-target="#medical-services" type="button" role="tab" aria-selected="true"><span class="notification">0</span> الخدمات الطبية</button>
                                             @endauth
                                         </li>
                                         <li class="nav-item" role="presentation">
                                             @auth
                                             <button class="nav-link" id="public-tab" data-bs-toggle="tab" data-bs-target="#public-services" type="button" role="tab" aria-controls="profile" aria-selected="false"><span class="notification">{{$publics->count()}}</span>الخدمات العامة</button>
                                             @else
                                             <button class="nav-link active" id="medical-tab" data-bs-toggle="tab" data-bs-target="#medical-services" type="button" role="tab" aria-selected="true"><span class="notification">0</span> الخدمات الطبية</button>
                                             @endauth

                                         </li>
                                         <!-- designer -->
                                         <li class="nav-item" role="presentation">
                                             @auth
                                             <button class="nav-link" id="public-tab" data-bs-toggle="tab" data-bs-target="#public-services" type="button" role="tab" aria-controls="profile" aria-selected="false"><span class="notification">{{$publics->count()}}</span>مجتمع المصممين</button>
                                             @else
                                             <button class="nav-link active" id="medical-tab" data-bs-toggle="tab" data-bs-target="#medical-services" type="button" role="tab" aria-selected="true"><span class="notification">0</span>  مجتمع المصممين</button>
                                             @endauth

                                         </li>
                                         <!-- designer-end -->
                                     </ul>
                                     <div class="tab-content" id="myTabContent">
                                         <div class="tab-pane fade show active" id="medical-services" role="tabpanel">
                                             <div class="row">
                                                 @foreach($orders as $orde)
                                                 <a class="nav-link" href="{{route('vieworder',$orde->id)}}">
                                                     <div class="col-md-12">
                                                         <div data-id='{{$orde->id}}' class="request-box editProduct">
                                                             <div class="heading">
                                                                 <h5>رقم الطلب:</h5>
                                                                 <span>{{$orde->id}}</span>
                                                             </div>
                                                             <div class="data">
                                                                 <p>حالة الطلب:</p>
                                                                 <span> {{$orde->status}}</span>
                                                                 <p>اسم المريض:</p>
                                                                 <span> {{$orde->pa_name}}</span>
                                                                 <p>اسم الطبيب:</p>
                                                                 <span> {{$orde->dr_name}}</span>
                                                                 <p>تاريخ الطلب:</p>
                                                                 <span class="dateTime">{{$orde->created_at}}</span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </a>
                                                 @endforeach
                                             </div>

                                         </div>
                                         <div class="tab-pane fade" id="public-services" role="tabpanel" aria-labelledby="profile-tab">
                                             <div class="row">
                                                 @foreach($publics as $orde)
                                                 <a class="nav-link" href="{{route('vieworderpublic',$orde->id)}}">
                                                     <div class="col-md-12">
                                                         <div class="request-box" data-bs-toggle="modal" data-bs-target="#publicServiesFinalModal">
                                                             <div class="heading">
                                                                 <h5>رقم الطلب:</h5>
                                                                 <span>{{$orde->id}}</span>
                                                             </div>
                                                             <div class="data">
                                                                 <p>حالة الطلب:</p>
                                                                 <span> عرض السعر</span>
                                                                 <p>الاسم كامل:</p>
                                                                 <span> {{$orde->full_name}}</span>
                                                                 <p>التخصص:</p>
                                                                 <span> {{$orde->specialization}}</span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </a>
                                                 @endforeach
                                             </div>
                                         </div>
                                         <div class="tab-pane fade" id="designer-service" role="tabpanel" aria-labelledby="profile-tab">
                                             <div class="row">
                                                 @foreach($publics as $orde)
                                                 <a class="nav-link" href="{{route('vieworderpublic',$orde->id)}}">
                                                     <div class="col-md-12">
                                                         <div class="request-box" data-bs-toggle="modal" data-bs-target="#publicServiesFinalModal">
                                                             <div class="heading">
                                                                 <h5>رقم الطلب:</h5>
                                                                 <span>{{$orde->id}}</span>
                                                             </div>
                                                             <div class="data">
                                                                 <p>حالة الطلب:</p>
                                                                 <span> عرض السعر</span>
                                                                 <p>اسم العميل:</p>
                                                                 <span> {{$orde->full_name}}</span>
                                                                <p>المنتج المطلوب:</p>
                                                                 <span> {{$orde->specialization}}</span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </a>
                                                 @endforeach
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                             <!-- chat  -->
                            
                                <div id="app">
                                    <div class="container">
                                        <chat-component :user="{{ auth()->user() }}"></chat-component>
                                    </div>
                                </div>
                             
                         </div>
                         <div class="modal-footer">
                             <div class="footer">
                                 قائمة الطلبات
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


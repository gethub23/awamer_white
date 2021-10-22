@extends('admin.layout.master')
<x-admin.breadcrumb singleName='عميل' addbutton='false' deletebutton="false" >
    <x-slot name="moreButtons">
        {{-- <button class="btn btn-purple  btn-sm mr-1 box-shadow-2"><i class="ft-bell white"></i>  ارسال اشعار</button> --}}
     </x-slot> 
 </x-admin.breadcrumb >
@section('content')


    <section class="content settings">
        <div class="card page-body">
            <div class="card card-primary card-tabs m-2">
                <div class="card-header p-0 pt-1 border-bottom-0">
                  <ul class="nav nav-tabs text-md" id="custom-tabs-two-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#main-tab" role="tab" aria-controls="to-main" aria-selected="true">{{awtTrans('إعدادات التطبيق')}}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  data-toggle="pill" href="#terms-tab" role="tab" aria-controls="to-terms" aria-selected="false">{{awtTrans('الشروط والاحكام')}}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  data-toggle="pill" href="#about-tab" role="tab" aria-controls="to-about" aria-selected="false">{{awtTrans('من نحن')}}</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-two-tabContent">

                    <!---------------- Main ------------------>
                    <div class="tab-pane fade show active" id="main-tab" role="tabpanel" aria-labelledby="to-main" >

                      <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                          @method('put')
                          @csrf

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('اسم التطبيق بالعربي')}}</label>
                                  <input type="text" name="name_ar" class="form-control" value="{{$data['name_ar']}}" required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('اسم التطبيق بالانجليزية')}}</label>
                                      <input type="text" name="name_en" class="form-control" value="{{$data['name_en']}}"  required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('البريد الالكتروني')}}</label>
                                  <input type="email" name="email" class="form-control" value="{{$data['email']}}"  required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('رقم الهاتف')}}</label>
                                      <input type="text" name="phone" class="form-control" value="{{$data['phone']}}" required>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <label>{{awtTrans('رقم الواتس')}}</label>
                                      <input type="text" name="whatsapp" class="form-control" value="{{$data['whatsapp']}}" required>
                                  </div>
                              </div>
                              
                              <div class="col-sm-3">
                                <div class="">
                                      <label>{{awtTrans('صوره اللوجو')}}</label>
                                      <div class="dropBox">
                                          <div class="textCenter">
                                              <div class="imagesUploadBlock">
                                                  <label class="uploadImg">
                                                      <span><i class="la la-image"></i></span>
                                                      <input type="file" accept="image/*" name="logo" class="imageUploader">
                                                  </label>
                                                  <div class="uploadedBlock">
                                                    <img src="{{asset('/storage/images/settings/logo.png')}}">
                                                    <button class="close">
                                                      <i class="la la-times"></i>
                                                    </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="">
                                      <label>{{awtTrans('صوره المستخدم الافتراضيه')}}</label>
                                      <div class="dropBox">
                                          <div class="textCenter">
                                              <div class="imagesUploadBlock">
                                                  <label class="uploadImg">
                                                      <span><i class="la la-image"></i></span>
                                                      <input type="file" accept="image/*" name="default_user" class="imageUploader">
                                                  </label>
                                                  <div class="uploadedBlock">
                                                    <img src="{{asset('/storage/images/users/default.png')}}">
                                                    <button class="close">
                                                      <i class="la la-times"></i>
                                                    </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-12 mt-2 text-center">
                                <div class="form-group"><button type="submit" class="btn btn-primary saveFormBtn">{{awtTrans('حفظ')}}</button></div>
                              </div>
                    
                          </div>
                      </form>
                    </div>

                    <!---------------- Terms ------------------>
                    <div class="tab-pane fade" id="terms-tab" role="tabpanel" aria-labelledby="to-terms">

                      <form accept="{{route('admin.settings.update')}}" method="post">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>{{awtTrans('الشروط والاحكام بالعربية')}}</label>
                                <textarea name="terms_ar" class="form-control" rows="10">{{$data['terms_ar']}}</textarea>
                              </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('الشروط والاحكام بالانجليزية')}}</label>
                                  <textarea name="terms_en" class="form-control" rows="10">{{$data['terms_en']}}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2 text-center">
                              <div class="form-group"><button type="submit" class="btn btn-primary saveFormBtn">{{awtTrans('حفظ')}}</button></div>
                            </div>
                        </div>

                      </form>
                    </div>

                    <!---------------- About ------------------>
                    <div class="tab-pane fade" id="about-tab" role="tabpanel" aria-labelledby="to-about">
                      <form accept="{{route('admin.settings.update')}}" method="post">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>{{awtTrans('من نحن بالعربية')}}</label>
                                <textarea name="about_ar" class="form-control" rows="10">{{$data['about_ar']}}</textarea>
                              </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('من نحن بالانجليزية')}}</label>
                                  <textarea name="about_en" class="form-control" rows="10">{{$data['about_en']}}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2 text-center">
                              <div class="form-group"><button type="submit" class="btn btn-primary saveFormBtn">{{awtTrans('حفظ')}}</button></div>
                            </div>
                        </div>
                      </form>
                    </div>


                  </div>
                </div>
              </div>
        </div>
    </section>
@endsection


<x-admin.scripts >
    <x-slot name='moreScript'>
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >

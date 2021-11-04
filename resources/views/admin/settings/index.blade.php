@extends('admin.layout.master')

@section('content')
  
<div class="content-body">
  <!-- account setting page start -->
  <section id="page-account-settings">
      <div class="row">
          <!-- left menu section -->
          <div class="col-md-3 mb-2 mb-md-0">
              <ul class="nav nav-pills flex-column mt-md-0 mt-1">

                  <li class="nav-item">
                      <a class="nav-link d-flex py-75 active" id="account-pill-main" data-toggle="pill" href="#account-vertical-main" aria-expanded="true">
                          <i class="feather icon-globe mr-50 font-medium-3"></i>
                          {{awtTrans('إعدادات التطبيق')}}
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link d-flex py-75" id="account-pill-terms" data-toggle="pill" href="#account-vertical-terms" aria-expanded="false">
                          <i class="feather icon-globe mr-50 font-medium-3"></i>
                          {{awtTrans('الشروط والاحكام')}}
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link d-flex py-75" id="account-pill-about" data-toggle="pill" href="#account-vertical-about" aria-expanded="false">
                          <i class="feather icon-globe mr-50 font-medium-3"></i>
                          {{awtTrans('عن التطبيق')}}
                      </a>
                  </li>

              </ul>
          </div>
          <!-- right content section -->
          <div class="col-md-9">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <div class="tab-content">

                              <div role="tabpanel" class="tab-pane active" id="account-vertical-main" aria-labelledby="account-pill-main" aria-expanded="true">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                  @method('put')
                                  @csrf
                                <div class="row">
                                  <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name">{{awtTrans('اسم التطبيق بالعربي')}}</label>
                                                <input type="text" class="form-control" name="name_ar" id="account-name" placeholder="{{awtTrans('اسم التطبيق بالعربي')}}" value="{{$data['name_ar']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name">{{awtTrans('اسم التطبيق بالعربي')}}</label>
                                                <input type="text" class="form-control" name="name_en" id="account-name" placeholder="{{awtTrans('اسم التطبيق بالعربي')}}" value="{{$data['name_en']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name">{{awtTrans('البريد الالكتروني')}}</label>
                                                <input type="text" class="form-control" name="email" id="account-name" placeholder="{{awtTrans('البريد الالكتروني')}}" value="{{$data['email']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name">{{awtTrans('رقم الهاتف')}}</label>
                                                <input type="text" class="form-control" name="phone" id="account-name" placeholder="{{awtTrans('رقم الهاتف')}}" value="{{$data['phone']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name">{{awtTrans('رقم الواتس اب')}}</label>
                                                <input type="text" class="form-control" name="whatsapp" id="account-name" placeholder="{{awtTrans('رقم الواتس اب')}}" value="{{$data['whatsapp']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="row">
                                
                                        <div class="imgMontg col-2 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-lg-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="logo" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{asset('/storage/images/settings/logo.png')}}">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span>{{awtTrans('صورة لوجو الموقع')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="imgMontg col-2 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-lg-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="fav_icon" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{asset('/storage/images/settings/fav_icon.png')}}">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span>{{awtTrans('صورة ال fav icon')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="imgMontg col-2 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-lg-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="login_background" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{asset('/storage/images/settings/login_background.png')}}">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span>{{awtTrans('صورة خلفية صفحة تسجيل الدخول')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="imgMontg col-2 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-lg-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="default_user" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{asset('/storage/images/users/default.png')}}">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span>{{awtTrans('صورة المستخدم الافتراضية')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{awtTrans('حفظ التغييرات')}}</button>
                                        <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{awtTrans(' رجوع ')}}</a>
                                    </div>
                                </div>
                                </form>
                              </div>
                              
                              <div role="tabpanel" class="tab-pane" id="account-vertical-terms" aria-labelledby="account-pill-terms" aria-expanded="false">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{awtTrans('الشروط والاحكام بالعربية')}}</label>
                                                    <textarea class="form-control" name="terms_ar" id="" cols="30" rows="10" placeholder="{{awtTrans('الشروط والاحكام')}}">{{$data['terms_ar']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{awtTrans('الشروط والاحكام  بالانجليزية')}}</label>
                                                    <textarea class="form-control" name="terms_en" id="" cols="30" rows="10" placeholder="{{awtTrans('الشروط والاحكام')}}">{{$data['terms_en']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center mt-3">
                                          <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{awtTrans('حفظ التغييرات')}}</button>
                                          <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{awtTrans(' رجوع ')}}</a>
                                      </div>
                                    </div>
                                </form>
                              </div>

                              <div role="tabpanel" class="tab-pane" id="account-vertical-about" aria-labelledby="account-pill-about" aria-expanded="false">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{awtTrans('عن التطبيق بالعربية')}}</label>
                                                    <textarea class="form-control" name="about_ar" id="" cols="30" rows="10" placeholder="{{awtTrans('عن التطبيق بالعربية')}}">{{$data['about_ar']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{awtTrans('عن التطبيق بالانجليزية')}}</label>
                                                    <textarea class="form-control" name="about_en" id="" cols="30" rows="10" placeholder="{{awtTrans('عن التطبيق بالانجليزية')}}">{{$data['about_en']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center mt-3">
                                          <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{awtTrans('حفظ التغييرات')}}</button>
                                          <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{awtTrans(' رجوع ')}}</a>
                                      </div>
                                    </div>
                                </form>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- account setting page end -->

</div>

@endsection
@section('js')
  {{-- show selected image script --}}
    @include('admin.shared.addImage')
  {{-- show selected image script --}}
@endsection


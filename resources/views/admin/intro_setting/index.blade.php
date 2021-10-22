@extends('admin.layout.master')
<x-admin.breadcrumb singleName='عميل' addbutton='false' deletebutton="false" >
    <x-slot name="moreButtons">
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
                      <a class="nav-link" id="custom-tabs-two-texts-tab" data-toggle="pill" href="#texts-tab" role="tab" aria-controls="to-texts" aria-selected="true">{{awtTrans('نصوص متكررة')}}</a>
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

                      <form action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                          @method('put')
                          @csrf

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('اسم الموقع التعريفي بالعربي')}}</label>
                                  <input type="text" name="intro_name_ar" class="form-control" value="{{$data['intro_name_ar']}}" required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('اسم الموقع التعريفي بالانجليزية')}}</label>
                                      <input type="text" name="intro_name_en" class="form-control" value="{{$data['intro_name_en']}}"  required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('البريد الالكتروني')}}</label>
                                  <input type="email" name="intro_email" class="form-control" value="{{$data['email']}}"  required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('رقم الهاتف')}}</label>
                                      <input type="text" name="intro_phone" class="form-control" value="{{$data['phone']}}" required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('العنوان')}}</label>
                                      <input type="text" name="intro_address" class="form-control" value="{{$data['intro_address']}}" required>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>{{awtTrans('لون الموقع الرئيسي')}}</label>
                                          <input type="color" name="color" class="form-control" value="{{$data['color']}}" required>
                                      </div>
                                  </div>
                                  
                                  <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>{{awtTrans('لون الButtons')}}</label>
                                          <input type="color" name="buttons_color" class="form-control" value="{{$data['buttons_color']}}" required>
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>{{awtTrans('لون ال hover')}}</label>
                                          <input type="color" name="hover_color" class="form-control" value="{{$data['hover_color']}}" required>
                                      </div>
                                  </div>
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
                                                      <input type="file" accept="image/*" name="intro_logo" class="imageUploader">
                                                  </label>
                                                  <div class="uploadedBlock">
                                                    <img src="{{asset('/storage/images/settings/intro_logo.png')}}">
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
                                      <label>{{awtTrans('صوره ال loader')}}</label>
                                      <div class="dropBox">
                                          <div class="textCenter">
                                              <div class="imagesUploadBlock">
                                                  <label class="uploadImg">
                                                      <span><i class="la la-image"></i></span>
                                                      <input type="file" accept="image/*" name="intro_loader" class="imageUploader">
                                                  </label>
                                                  <div class="uploadedBlock">
                                                    <img src="{{asset('/storage/images/settings/intro_loader.png')}}">
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

                    <!---------------- About ------------------>
                      <div class="tab-pane fade" id="about-tab" role="tabpanel" aria-labelledby="to-about">
                        <form enctype="multipart/form-data" action="{{route('admin.settings.update')}}" method="post">
                          @method('put')
                          @csrf

                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('من نحن بالعربية')}}</label>
                                  <textarea name="intro_about_ar" class="form-control" rows="10">{{$data['intro_about_ar']}}</textarea>
                                </div>
                              </div>

                              <div class="col-sm-12">
                                  <div class="form-group">
                                    <label>{{awtTrans('من نحن بالانجليزية')}}</label>
                                    <textarea name="intro_about_en" class="form-control" rows="10">{{$data['intro_about_en']}}</textarea>
                                  </div>
                              </div>

                              <div class="col-sm-3">
                                  <div class="">
                                        <label>{{awtTrans('الصوره الاولي')}}</label>
                                        <div class="dropBox">
                                            <div class="textCenter">
                                                <div class="imagesUploadBlock">
                                                    <label class="uploadImg">
                                                        <span><i class="la la-image"></i></span>
                                                        <input type="file" accept="image/*" name="about_image_1" class="imageUploader">
                                                    </label>
                                                    <div class="uploadedBlock">
                                                      <img src="{{asset('/storage/images/settings/about_image_1.png')}}">
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
                                        <label>{{awtTrans('الصوره الثانية')}}</label>
                                        <div class="dropBox">
                                            <div class="textCenter">
                                                <div class="imagesUploadBlock">
                                                    <label class="uploadImg">
                                                        <span><i class="la la-image"></i></span>
                                                        <input type="file" accept="image/*" name="about_image_2" class="imageUploader">
                                                    </label>
                                                    <div class="uploadedBlock">
                                                      <img src="{{asset('/storage/images/settings/about_image_2.png')}}">
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
                    <!---------------- texts ------------------>
                    <div class="tab-pane fade" id="texts-tab" role="tabpanel" aria-labelledby="to-texts">
                      <form enctype="multipart/form-data" action="{{route('admin.settings.update')}}" method="post">
                        @method('put')
                        @csrf

                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم خدماتنا بالعربية')}}</label>
                                  <textarea name="services_text_ar" class="form-control" rows="10">{{$data['services_text_ar']}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم خدماتنا بالانجليزية')}}</label>
                                  <textarea name="services_text_en" class="form-control" rows="10">{{$data['services_text_en']}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم كيف يعمل الموقع بالعربية')}}</label>
                                  <textarea name="how_work_text_ar" class="form-control" rows="10">{{$data['how_work_text_ar']}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم كيف يعمل الموقع  بالانجليزية')}}</label>
                                  <textarea name="how_work_text_en" class="form-control" rows="10">{{$data['how_work_text_en']}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم الاسئلة الشائعه بالعربية')}}</label>
                                  <textarea name="fqs_text_ar" class="form-control" rows="10">{{$data['fqs_text_ar']}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم الاسئلة الشائعه  بالانجليزية')}}</label>
                                  <textarea name="fqs_text_en" class="form-control" rows="10">{{$data['fqs_text_en']}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم شركائنا بالعربية')}}</label>
                                  <textarea name="parteners_text_ar" class="form-control" rows="10">{{$data['parteners_text_ar']}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم شركائنا  بالانجليزية')}}</label>
                                  <textarea name="parteners_text_en" class="form-control" rows="10">{{$data['parteners_text_en']}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم تواصل بالعربية')}}</label>
                                  <textarea name="contact_text_ar" class="form-control" rows="10">{{$data['contact_text_ar']}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('عنوان قسم تواصل  بالانجليزية')}}</label>
                                  <textarea name="contact_text_en" class="form-control" rows="10">{{$data['contact_text_en']}}</textarea>
                                </div>
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
        
    </x-slot >
</x-admin.scripts >

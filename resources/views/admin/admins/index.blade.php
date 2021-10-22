@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("مشرف")}}' deletebutton="true" addbutton="true" >

 </x-admin.breadcrumb >
@section('content')
    <section class="content">
        {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                     <th>
                       <div class="form-checkbox">
                           <input type="checkbox" value="value1" name="name1" id="checkedAll">
                           <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                       </div>
                   </th>
                    <th>{{awtTrans('الصوره')}}</th>
                    <th>{{awtTrans('الاسم')}}</th>
                    <th>{{awtTrans('البريد الالكتروني')}}</th>
                    <th>{{awtTrans('رقم الهاتف')}}</th>
                    <th>{{awtTrans('الحالة')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($admins as $row)
                        <tr class="delete_row_{{$row->id}}">
                            @if($row->id == 1 )
                                <td>#</td>
                            @else
                                <td class="text-center">
                                   <div class="form-checkbox">
                                       <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                       <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                                   </div>
                                </td>
                            @endif

                            <td><img src="{{asset($row->avatar)}}" alt=""></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>
                                @if($row->block)
                                    <span class="btn btn-sm btn-outline-danger">
                                        {{awtTrans('محظور')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                @else
                                     <span class="btn btn-sm btn-outline-success">
                                        {{awtTrans('نشط')}}  <i class="la la-check font-medium-2"></i>
                                    </span>
                                @endif
                            </td>
                            <td>
                            <x-admin.edit-button>
                                  <x-slot name="data">
                                        data-id       = '{{$row->id}}'
                                        data-route    = '{{route('admin.admins.update' , [$row->id])}}'
                                        data-name     = '{{$row->name}}'
                                        data-avatar   = '{{$row->avatar}}'
                                        data-phone    = '{{$row->phone}}'
                                        data-email    = '{{$row->email}}'
                                        data-role_id  = '{{$row->role_id}}'
                                        data-block    = '{{$row->block}}'
                                  </x-slot>
                            </x-admin.edit-button>
                            <x-admin.show-button>
                                  <x-slot name="data">
                                        data-id       = '{{$row->id}}'
                                        data-name     = '{{$row->name}}'
                                        data-avatar   = '{{$row->avatar}}'
                                        data-phone    = '{{$row->phone}}'
                                        data-email    = '{{$row->email}}'
                                        data-role_id  = '{{$row->role_id}}'
                                        data-block    = '{{$row->block}}'
                                  </x-slot>
                            </x-admin.show-button>
                            <x-admin.delete route="{{route('admin.admins.delete' , [$row->id])}}" />
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.admins.store")}}' singleName='{{awtTrans("مشرف")}}' >
        <x-slot name="inputs">

            <div class="col-12">
                <div class="imgMontg col-12 text-center">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="la la-image"></i></span>
                                    <input type="file" accept="image/*" name="avatar" class="imageUploader">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5> {{awtTrans("الاسم")}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans("رقم الهاتف")}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}}" minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}} ">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('البريد الالكتروني  ')}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="email" name="email" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-email-message="{{awtTrans('صيغة الايميل غير صحيحة')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('كلمه السر ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="password" name="password" class="form-control" required  minlength="6" data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-minlength-message="{{awtTrans('يجب الا تقل كلمه السر عن 6 حروف او ارقام')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الحاله')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id=""  name="block" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر الحاله')}}</option>
                            <option value="0">{{awtTrans('نشط')}}</option>
                            <option value="1">{{awtTrans(' محظور ')}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الصلاحيه')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id=""  name="role_id" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر الصلاحية')}}</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-admin.AddModel >
 <!-- add model -->


  <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("مشرف")}}' >
        <x-slot name="inputs">
            
           <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="la la-image"></i></span>
                                    <input type="file" accept="image/*" name="icon" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  id="avatar">
                                    <button class="close">
                                        <i class="la la-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5> {{awtTrans("الاسم")}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans("رقم الهاتف")}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}}" minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}} ">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('البريد الالكتروني  ')}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="email" name="email" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-email-message="{{awtTrans('صيغة الايميل غير صحيحة')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('كلمه السر ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="password" name="password" class="form-control" required  minlength="6" data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-minlength-message="{{awtTrans('يجب الا تقل كلمه السر عن 6 حروف او ارقام')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الحاله')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id="block"  name="block" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر الحاله')}}</option>
                            <option value="0">{{awtTrans('نشط')}}</option>
                            <option value="1">{{awtTrans('محظور ')}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الصلاحيه')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id="role_id"  name="role_id" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر الصلاحية')}}</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->



  <!-- edit model -->
    <x-admin.show-model  singleName='{{awtTrans("مشرف")}}' >
        <x-slot name="inputs">

           <div class="col-sm-12">
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="la la-image"></i></span>
                                    <input type="file" accept="image/*" name="avatar" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  class="avatar">
                                    <button class="close">
                                        <i class="la la-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-sm-6">
                <div class="form-group">
                    <h5> {{awtTrans("الاسم")}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <h5>{{awtTrans("رقم الهاتف")}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}}" minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}} ">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <h5>{{awtTrans('البريد الالكتروني  ')}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="email" name="email" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-email-message="{{awtTrans('صيغة الايميل غير صحيحة')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <h5>{{awtTrans('كلمه السر ')}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="password" name="password" class="form-control" required  minlength="6" data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-minlength-message="{{awtTrans('يجب الا تقل كلمه السر عن 6 حروف او ارقام')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <h5>{{awtTrans('الحاله')}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select block" id=""  name="block" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر الحاله')}}</option>
                            <option value="0">{{awtTrans('نشظ')}}</option>
                            <option value="1">{{awtTrans('محظور')}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <h5>{{awtTrans('الصلاحيه')}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select role_id" id=""  name="role_id" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر الصلاحية')}}</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.show-model >
 <!-- add model -->
{{-- delete all model--}}
    <x-admin.delete-all route="{{route('admin.admins.deleteAll')}}" />
{{-- #delete all model--}}
@endsection

<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
    </x-slot >
</x-admin.scripts >

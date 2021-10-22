@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("نسخة")}}' deletebutton="true" addbutton="true" >
    <x-slot name="moreButtons">
    </x-slot> 
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
                    <th>التحكم</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td class="text-center">
                               <div class="form-checkbox">
                                   <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                   <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                               </div>
                            </td>
                            <td><img src="{{$row->image}}" alt=""></td>
                            <td>{{$row->name}}</td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id       = '{{$row->id}}'
                                            data-route    = '{{route('admin.copys.update' , [$row->id])}}'
                                            {{-- data-name_ar  = '{{$row->getTranslations('name')['ar']}}'
                                            data-name_en  = '{{$row->getTranslations('name')['en']}}' --}}
                                            data-avatar   = '{{$row->avatar}}'
                                    </x-slot>
                                </x-admin.edit-button>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            {{-- data-name_ar  = '{{$row->getTranslations('name')['ar']}}'
                                            data-name_en  = '{{$row->getTranslations('name')['en']}}' --}}
                                            data-avatar   = '{{$row->avatar}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.copys.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.copys.store")}}' singleName='{{awtTrans("نسخة")}}' >
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
                    <h5>{{awtTrans('الاسم')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

             <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الهاتف ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('البريد الالكتروني')}}
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
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الوصف ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <textarea name="description" class="form-control" id="" cols="30" required rows="10" data-validation-required-message="{{awtTrans('الحقل مطلوب')}}"></textarea>
                    </div>
                </div>
            </div>

            {{-- <div class="col-sm-6"> 
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
            </div> --}}
        </x-slot>
    </x-admin.AddModel >
 <!-- add model -->

 <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("نسخة")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="icon" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  id="avatar">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->
 
 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("نسخة")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="icon" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  class="avatar">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.clients.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >
@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("خطوه")}}' deletebutton="true" addbutton="true" >
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
                    <th>{{awtTrans('العنوان')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
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
                            <td>{{$row->title}}</td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id        = '{{$row->id}}'
                                            data-route     = '{{route('admin.introhowworks.update' , [$row->id])}}'
                                            data-title_ar  = '{{$row->getTranslations('title')['ar']}}'
                                            data-title_en  = '{{$row->getTranslations('title')['en']}}'
                                            data-image     = '{{$row->image}}'
                                    </x-slot>
                                </x-admin.edit-button>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-title_ar  = '{{$row->getTranslations('title')['ar']}}'
                                            data-title_en  = '{{$row->getTranslations('title')['en']}}'
                                            data-image     = '{{$row->image}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.introhowworks.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.introhowworks.store")}}' singleName='{{awtTrans("خطوه")}}' >
        <x-slot name="inputs">
           <div class="col-12">
                <div class="imgMontg col-12 text-center">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="la la-image"></i></span>
                                    <input type="file" accept="image/*" name="image" class="imageUploader">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('لعنوان بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_ar" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('العنوان بالانجليزية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_en" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.AddModel >
 <!-- add model -->

 <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("خطوه")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="image" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  id="image">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('لعنوان بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_ar" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('العنوان بالانجليزية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_en" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->
 
 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("خطوه")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="image" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  class="image">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('لعنوان بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_ar" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('العنوان بالانجليزية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_en" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.introhowworks.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >
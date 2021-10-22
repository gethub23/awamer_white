@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("سؤال")}}' deletebutton="true" addbutton="true" >
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
                    <th>{{awtTrans('السؤال')}}</th>
                    <th>{{awtTrans('القسم')}}</th>
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
                            <td>{{$row->title}}</td>
                            <td>{{$row->category->id}}</td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id                         = '{{$row->id}}'
                                            data-route                      = '{{route('admin.introfqs.update' , [$row->id])}}'
                                            data-title_ar                   = '{{$row->getTranslations('title')['ar']}}'
                                            data-title_en                   = '{{$row->getTranslations('title')['en']}}'
                                            data-description_ar             = '{{$row->getTranslations('description')['ar']}}'
                                            data-description_en             = '{{$row->getTranslations('description')['en']}}'
                                            data-intro_fqs_category_id      = '{{$row->intro_fqs_category_id}}'
                                    </x-slot>
                                </x-admin.edit-button>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-route                      = '{{route('admin.introfqs.update' , [$row->id])}}'
                                            data-title_ar                   = '{{$row->getTranslations('title')['ar']}}'
                                            data-title_en                   = '{{$row->getTranslations('title')['en']}}'
                                            data-description_ar             = '{{$row->getTranslations('description')['ar']}}'
                                            data-description_en             = '{{$row->getTranslations('description')['en']}}'
                                            data-intro_fqs_category_id      = '{{$row->intro_fqs_category_id}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.introfqs.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.introfqs.store")}}' singleName='{{awtTrans("سؤال")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('السؤال بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_ar" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('السؤال بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_en" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاجابة بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <textarea name="description_ar" id="" cols="30" rows="10" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاجابة بالانجليزية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <textarea name="description_en" id="" cols="30" rows="10" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاقسام')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id=""  name="intro_fqs_category_id" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر القسم')}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-admin.AddModel >
 <!-- add model -->

 <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("سؤال")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('السؤال بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_ar" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('السؤال بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_en" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاجابة بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <textarea name="description_ar" id="description_ar" cols="30" rows="10" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاجابة بالانجليزية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <textarea name="description_en" id="description_en" cols="30" rows="10" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاقسام')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id="intro_fqs_category_id"  name="intro_fqs_category_id" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر القسم')}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->
 
 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("سؤال")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('السؤال بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_ar" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('السؤال بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="title_en" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاجابة بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <textarea name="description_ar" id="" cols="30" rows="10" class="form-control description_ar" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاجابة بالانجليزية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <textarea name="description_en" id="" cols="30" rows="10" class="form-control description_en" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاقسام')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select intro_fqs_category_id" id=""  name="intro_fqs_category_id" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر القسم')}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.introfqs.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >
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
                            <td>{{$row->title}}</td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id       = '{{$row->id}}'
                                            data-route    = '{{route('admin.introfqscategories.update' , [$row->id])}}'
                                            data-title_ar  = '{{$row->getTranslations('title')['ar']}}'
                                            data-title_en  = '{{$row->getTranslations('title')['en']}}'
                                    </x-slot>
                                </x-admin.edit-button>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-title_ar  = '{{$row->getTranslations('title')['ar']}}'
                                            data-title_en  = '{{$row->getTranslations('title')['en']}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.introfqscategories.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.introfqscategories.store")}}' singleName='{{awtTrans("سؤال")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('العنوان بالعربية')}} 
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
    <x-admin.edit-model singleName='{{awtTrans("سؤال")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('العنوان بالعربية')}} 
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
    <x-admin.show-model  singleName='{{awtTrans("سؤال")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('العنوان بالعربية')}} 
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
    <x-admin.delete-all route="{{route('admin.introfqscategories.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >
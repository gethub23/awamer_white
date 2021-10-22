@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("وسيلة")}}' deletebutton="true" addbutton="true" >
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
                    <th>{{awtTrans('اسم الموقع')}}</th>
                    <th>{{awtTrans(' نص الايقونه')}}</th>
                    <th>{{awtTrans('الرابط')}}</th>
                    <th>{{awtTrans(' التحكم')}}</th>
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
                            <td>{{$row->key}}</td>
                            <td>{{$row->icon}}</td>
                            <td>{{$row->url}}</td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id    = '{{$row->id}}'
                                            data-route = '{{route('admin.introsocials.update' , [$row->id])}}'
                                            data-icon  = '{{$row->icon}}'
                                            data-key   = '{{$row->key}}'
                                            data-url   = '{{$row->url}}'
                                    </x-slot>
                                </x-admin.edit-button>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-icon  = '{{$row->icon}}'
                                            data-key   = '{{$row->key}}'
                                            data-url   = '{{$row->url}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.introsocials.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
        {{-- table --}}
            <hr>
            <h1 style="background: white; font-size: 20px; padding: 8px; text-align: center; font-family: 'LineAwesome'; margin-bottom: 12px; border-radius: 8px;">{{awtTrans('امثله علي الايقونات للمزيد اضغط')}}   <a target="_blank" href="https://fontawesome.com">{{awtTrans('هنا')}}</a></h1>
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>{{awtTrans('اسم الموقع')}}</th>
                    <th>{{awtTrans('  الايقونه')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    <tr>
                        <td>facebook</td>
                        <td>fab fa-facebook-f</td>
                    </tr>
                    <tr>
                        <td>twitter</td>
                        <td>fab fa-twitter</td>
                    </tr>
                    <tr>
                        <td>google plus</td>
                        <td>fab fa-google-plus-g</td>
                    </tr>
                    <tr>
                        <td>instagram</td>
                        <td>fab fa-instagram</td>
                    </tr>
                    <tr>
                        <td>linkedin</td>
                        <td>fab fa-linkedin-in</td>
                    </tr>
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.introsocials.store")}}' singleName='{{awtTrans("وسيلة")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم الموقع')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="key" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

             <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الرابط')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="url" name="url" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
             <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الايقونة')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="icon" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
        </x-slot>
    </x-admin.AddModel >
 <!-- add model -->

 <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("وسيلة")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم الموقع')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="key" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

             <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الرابط')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="url" name="url" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
             <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الايقونة')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="icon" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->
 
 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("وسيلة")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم الموقع')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="key" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

             <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الرابط')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="url" name="url" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
             <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('الايقونة')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="icon" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.introsocials.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >
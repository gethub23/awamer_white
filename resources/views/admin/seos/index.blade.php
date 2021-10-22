@extends('admin.layout.master')
@section('content')
    <x-admin.breadcrumb singleName='{{awtTrans("سيو")}}' deletebutton="false" addbutton="true" >
        <x-slot name="moreButtons">
        </x-slot>
    </x-admin.breadcrumb >

    <section class="content">
        {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>Key</th>
                    <th>العنوان</th>
                    <th>التحكم</th>
                </x-slot>
                <x-slot name="tableBody">
                     @foreach($rows as $row)
                        <tr>
                            <td>{{$row->key}}</td>
                            <td>{{$row->meta_title}}</td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id                    = '{{$row->id}}'
                                            data-route                 = '{{route('admin.seos.update' , [$row->id])}}'
                                            data-key                   = '{{$row->key}}'
                                            data-meta_title_en         = '{{$row->getTranslations('meta_title')['en']}}'
                                            data-meta_title_ar         = '{{$row->getTranslations('meta_title')['ar']}}'
                                            data-meta_description_ar   = '{{$row->getTranslations('meta_description')['en']}}'
                                            data-meta_description_en   = '{{$row->getTranslations('meta_description')['ar']}}'
                                            data-meta_keywords_ar      = '{{$row->getTranslations('meta_keywords')['ar']}}'
                                            data-meta_keywords_en      = '{{$row->getTranslations('meta_keywords')['en']}}'
                                    </x-slot>
                                </x-admin.edit-button>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

    <!-- add model -->
    <x-admin.AddModel route='{{route("admin.seos.store")}}' singleName='{{awtTrans("سيو")}}' >
        <x-slot name="inputs">
             <div class="col-sm-12">
                <div class="form-group">
                    <label>Key</label>
                    <input type="text" name="key" class="form-control">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>meta title بالعربيه</label>
                    <input type="text" name="meta_title_ar" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>meta title بالانجليزيه</label>
                    <input type="text" name="meta_title_en" class="form-control">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>meta description بالعربيه</label>
                    <textarea name="meta_description_ar" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>meta description بالانجليزيه</label>
                    <textarea name="meta_description_en" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>meta keywords بالعربيه</label>
                    <textarea name="meta_keywords_ar" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>meta keywords بالانجليزيه</label>
                    <textarea name="meta_keywords_en" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </x-slot>
    </x-admin.AddModel  >
    <!-- add model -->

 <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("سيو")}}' >
        <x-slot name="inputs">
           <div class="col-sm-12">
                <div class="form-group">
                    <label>Key</label>
                    <input type="text" name="key" id="key" class="form-control">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>meta title بالعربيه</label>
                    <input type="text" name="meta_title_ar" id="meta_title_ar" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>meta title بالانجليزيه</label>
                    <input type="text" name="meta_title_en" id="meta_title_en" class="form-control">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>meta description بالعربيه</label>
                    <textarea name="meta_description_ar" id="meta_description_ar" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>meta description بالانجليزيه</label>
                    <textarea name="meta_description_en" id="meta_description_en" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>meta keywords بالعربيه</label>
                    <textarea name="meta_keywords_ar" id="meta_keywords_ar" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>meta keywords بالانجليزيه</label>
                    <textarea name="meta_keywords_en" id="meta_keywords_en" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->


@endsection

<x-admin.scripts >
    <x-slot name='moreScript'>
        <script>

        </script>
    </x-slot >
</x-admin.scripts >

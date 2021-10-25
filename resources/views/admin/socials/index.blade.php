@extends('admin.layout.master')
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table  addbutton="{{route('admin.socials.create')}}" deletebutton="{{route('admin.socials.deleteAll')}}">
                <x-slot name="tableHead">
                    <th>
                       <div class="form-checkbox">
                           <input type="checkbox" value="value1" name="name1" id="checkedAll">
                           <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                       </div>
                    </th>
                    <th>{{awtTrans('الصوره')}}</th>
                    <th>{{awtTrans('الاسم')}}</th>
                    <th>{{awtTrans('الرابط')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr class="delete_row">
                            <td class="text-center">
                               <div class="form-checkbox">
                                   <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                   <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                               </div>
                            </td>
                            <td><img src="{{$row->icon}}" width="50px" height="50px" alt=""></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->link}}</td>
                            <td class="open">
                                <div class="position-relative">
                                    <div class="main-nav"><i class="fas fa-bars icons"></i></div>
                                    <ul class="open_ul" style="display: none;">
                                        <li><a href="{{route('admin.socials.edit' , ['id' => $row->id])}}">{{awtTrans('edit')}}</a></li>
                                        <li><a href="{{route('admin.socials.show', ['id' => $row->id])}}">{{awtTrans('show')}}</a></li>
                                        <li><a class="delete-row" data-url="{{url('admin/socials/'.$row->id)}}">{{awtTrans('delete')}}</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.socials.deleteAll')}}" />
{{-- #delete all model  --}}


@section('js')
<script>
    $('.delete_all_button').hide()
            $("#checkedAll").change(function(){
                if(this.checked){
                    $(".checkSingle").each(function(){
                        this.checked=true;
                        $('.delete_all_button').show()
                    })
                }else{
                    $(".checkSingle").each(function(){
                        this.checked=false;
                        $('.delete_all_button').hide()
                    })
                }
            });
            $(".checkSingle").click(function () {
                if ($(this).is(":checked")){
                    var isAllChecked = 0;
                    $(".checkSingle").each(function(){
                        if(!this.checked)
                            isAllChecked = 1;
                    })
                    if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }
                     $('.delete_all_button').show()
                }else {
                    var count = 0;
                    $(".checkSingle").each(function(){
                        if(this.checked)
                            count ++;
                    })
                    if (count > 0 ) {
                        $('.delete_all_button').show()
                    }else{
                          $('.delete_all_button').hide()
                    }
                    $("#checkedAll").prop("checked", false);
                }
            });
            $('.delete_all_button').on('click', function (e) {
                e.preventDefault()
                var result = confirm("{{__('هل انت متأكد انك تريد استكمال عملية الحذف')}}");
                if (result) {
                    e.preventDefault()
                    var usersIds = [];
                    $('.checkSingle:checked').each(function () {
                        var id = $(this).attr('id');
                        usersIds.push({
                            id: id,
                        });
                    });

                    var requestData = JSON.stringify(usersIds);
                    if (usersIds.length > 0) {
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: $(this).data('route'),
                            data: {data : requestData},
                            
                            success: function( msg ) {
                                if (msg == 'success') {
                                    $('.delete_all_button').hide()
                                    toastr.error("{{awtTrans('تم الحذف بنجاح')}}")
                                    $('.checkSingle:checked').each(function () {
                                        $('#example').DataTable().row( $(this).parents('.delete_row')).remove().draw();
                                    });
                                }
                            }
                        });
                    }
                }
            });

</script>
    <script>
        $(document).on('click' , '.delete-row', function (e) {
            e.preventDefault()
            var result = confirm("{{__('هل انت متأكد انك تريد استكمال عملية الحذف')}}");
            if (result) {
                $.ajax({
                    type: "delete",
                    url: $(this).data('url'),
                    data: {},
                    dataType: "json",
                    success:  (response) => {
                        toastr.error('{{awtTrans('تم الحذف بنجاح')}}')
                        $('#example').DataTable().row( $(this).parents('.delete_row')).remove().draw();
                    }
                });

            }
        });
    </script>
@endsection

@endsection
{{-- <x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts > --}}
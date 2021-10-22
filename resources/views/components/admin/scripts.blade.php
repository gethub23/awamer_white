@section('script')
    {{-- toaster options --}}
        <script>
            toastr.options = {
                "closeButton"  : true,
                // "positionClass": "toast-top-center",
                "progressBar"  : true,
            }
        </script>
    {{-- toaster options --}}
    {{-- uploade image script --}}
        <script>
        // ADD IMAGE
            $('.imageUploader').change(function (event){
                $(this).parents('.imagesUploadBlock').append('<div class="uploadedBlock"><img src="'+ URL.createObjectURL(event.target.files[0]) +'"><button class="close"><i class="la la-times"></i></button></div>');
            });

             $('.dropBox').on('click', '.close',function (){
                $(this).parent().remove();
            });

            $(".clickAdd").click(function (b){
                b.preventDefault();
                $('.dropBox').append('<div class="textCenter">' + '<div class="imagesUploadBlock">' + '<label class="uploadImg">' + '<span><i class="far fa-image"></i></span>' + '<input type="file" accept="image/*" class="imageUploader">' + '</label>' + '</div>' + '</div>');

                $('.imageUploader').change(function (event){
                    $(this).parents('.imagesUploadBlock').append('<div class="uploadedBlock"><img src="'+ URL.createObjectURL(event.target.files[0]) +'"><button class="close"><i class="fas fa-times"></i></button></div>');
                });
                $('.dropBox').on('click', '.close',function (){
                    $(this).parents('.textCenter').remove();
                });

            });

        </script>
    {{-- #uploade image script --}}

    {{-- ajax header and success --}}
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script>
            $( document ).ajaxSuccess(function( event, request, settings ,response ) {
                if (response.type == 'notAuth') {
                    toastr.error(response.msg)
                }
            });
        </script>
    {{-- #ajax header --}}

    {{$moreScript}}

    {{-- image uploade --}}
        <script>
            $('.imageUploader').change(function (event){
                $(this).parents('.imagesUploadBlock').append('<div class="uploadedBlock"><img src="'+ URL.createObjectURL(event.target.files[0]) +'"><button class="close"><i class="fas fa-times"></i></button></div>');
            });

            // REMOVE IMAGE
            $('.dropBox').on('click', '.close',function (){
                $(this).parents('.dropBox').html('<div class="textCenter">' + '<div class="imagesUploadBlock">' + '<label class="uploadImg">' + '<span><i class="far fa-image"></i></span>' + '<input type="file" accept="image/*" name="avatar" class="imageUploader">' + '</label>' + '</div>' + '</div>');

                $('.imageUploader').change(function (event){
                    $(this).parents('.imagesUploadBlock').append('<div class="uploadedBlock"><img src="'+ URL.createObjectURL(event.target.files[0]) +'"><button class="close"><i class="fas fa-times"></i></button></div>');
                });
            });
        </script>
    {{-- image uploade  --}}

    {{-- add form submit --}}
        <script>
            $(document).ready(function(){
                $(document).on('submit','#add_form_submit',function(e){
                    e.preventDefault();
                    var url = $(this).attr('action')
                    $.ajax({
                        url: url,
                        method: 'post',
                        data: new FormData($(this)[0]),
                        dataType:'json',
                        processData: false,
                        contentType: false,
                        beforeSend: function(){
                            $(".loader").removeClass('d-none');
                        },
                        success: function(response){
                            toastr.success("{{awtTrans('تمت الاضافه بنجاح')}}")
                            setTimeout(function(){
                                $(".loader").addClass('d-none');
                            }, 1000);
                            location.reload();
                        },
                        error: function (xhr) {
                            $(".loader").addClass('d-none');
                            $.each(xhr.responseJSON.errors, function(key,value) {
                                toastr.error(value)
                                $('#add_form_submit input[name='+key+'] , #add_form_submit select[name='+key+'] ,#add_form_submit textarea[name='+key+']').parent().parent().removeClass('validate').addClass('issue')
                                $('#add_form_submit input[name='+key+'] , #add_form_submit select[name='+key+'] ,#add_form_submit textarea[name='+key+']').nextAll('.help-block:first').html(`<ul role="alert"><li>${value}</li></ul>`);
                            });
                        },
                    });

                });
            });
        </script>
    {{-- #add form submit --}}

    {{-- edit form submit --}}
        <script>
            $(document).on('click','.edit',function(e){
                e.preventDefault();
                var data  = $(this).data();
                $('#editForm').attr('action', data.route);
                $.each(data, function (key, value) {
                    var type = $('#'+key).prop("tagName");

                    if (type == 'SELECT') {

                        $('#editForm select[name='+key+']').val(value);

                    }else if (type == 'TEXTAREA') {
                        $('#editForm textarea[name='+key+']').val(value);
                        // $("textarea#"+key).val(value);

                    }else if (type == 'IMG') {

                       $("#"+key).attr('src',value);

                    }else{

                        if ($('#editForm input[name='+key+']').attr('type') == 'checkbox') { 
                            if(value == 1){     
                                $('#editForm input[name='+key+']').prop('checked' , true)
                            }else{
                                $('#editForm input[name='+key+']').prop('checked' , false)
                            }
                        }else{
                            $('#editForm input[name='+key+']').val(value);
                        }    

                    }
                });
            }); 

            $(document).on('submit','#editForm',function(e){
                e.preventDefault();
                var url = $(this).attr('action')
                $.ajax({
                    url: url,
                    method: 'post',
                    data: new FormData($(this)[0]),
                    dataType:'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $(".edit-loader").removeClass('d-none');
                    },
                    success: (response)=>{
                        toastr.success("{{awtTrans('تم التعديل بنجاح')}}")
                        setTimeout(function(){
                           $(".edit-loader").addClass('d-none');
                        }, 1000);
                        location.reload();
                    },
                    error: function (xhr) {
                        $(".edit-loader").addClass('d-none');
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            toastr.error(value)
                            $('#editForm input[name='+key+'] , #editForm select[name='+key+'] ,#editForm textarea[name='+key+']').parent().parent().removeClass('validate').addClass('issue')
                            $('#editForm input[name='+key+'] , #editForm select[name='+key+'] ,#editForm textarea[name='+key+']').nextAll('.help-block:first').html(`<ul role="alert"><li>${value}</li></ul>`);
                        });
                    },
                });

            });
        </script>
    {{-- #edit form submit --}}
    
      {{-- show form  --}}
        <script>
            $(document).on('click','.showButton',function(e){
                e.preventDefault();
                $('.error_meassages').remove();
                
                var data  = $(this).data();
                $('#showForm input , #showForm textarea , #showForm select').attr('disabled' , 'true');
                $.each(data, function (key, value) {
                    var type = $('#'+key).prop("tagName");

                    if (type == 'SELECT') {
                        $('#showForm select[name='+key+']').val(value);
                    }else if (type == 'TEXTAREA') {
                        $('#showForm textarea[name='+key+']').val(value);
                    }else if (type == 'IMG') {
                        $("."+key).attr('src',value);
                    }else{

                        if ($('#showForm input[name='+key+']').attr('type') == 'checkbox') { 
                            if(value == 1){     
                                $('#showForm input[name='+key+']').prop('checked' , true)
                            }else{
                                $('#showForm input[name='+key+']').prop('checked' , false)
                            }
                        }else{
                            $('#showForm input[name='+key+']').val(value);
                        }    

                    }
                });
            }); 
        </script>
    {{-- #show form  --}}

    {{-- delete  --}}
        <script>
            //
            function confirmDelete(url){
                $('#confirm-delete-form').attr('action',url);
            }

            $(document).ready(function(){
                $(document).on('submit','#confirm-delete-form',function(e){
                    e.preventDefault();
                    var url = $(this).attr('action')
                    $.ajax({
                        url: url,
                        method: 'post',
                        data: new FormData($(this)[0]),
                        dataType:'json',
                        processData: false,
                        contentType: false,
                        beforeSend: function(){
                            $(".delete-loader").removeClass('d-none');
                        },
                        success: (response)=> {
                            $(".delete-loader").addClass('d-none');
                            $('#delete-model').modal('hide');
                            toastr.success("{{awtTrans('تمت الحذف بنجاح')}}")
                            $('.dataex-html5-selectors').DataTable().row( $('.delete_row_'+response.id)).remove().draw();
                        },
                    });

                });
            });
        </script>

    {{-- #delete  --}}

    {{--  delete all  --}}
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

            $('#send-delete-all').on('submit', function (e) {
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
                        url: $(this).attr('action'),
                        data: {data : requestData},
                        beforeSend: function(){
                            $(".loader_div").css('display','block');
                        },
                        success: function( msg ) {
                            $(".loader_div").css('display','none');

                            if (msg == 'success') {
                                $('#delete-all-model').modal('hide');
                                toastr.error("{{awtTrans('تم الحذف بنجاح')}}")

                                $('.checkSingle:checked').each(function () {
                                    $('.dataex-html5-selectors').DataTable().row( $(this).parents('tr') ).remove().draw();
                                });
                            }
                        }
                    });
                }
            });

        </script>
    {{-- # delete all  --}}

@endsection
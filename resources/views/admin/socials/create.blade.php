@extends('admin.layout.master')
@section('content')
<div class="box_tabs">
    <div class="form_box">
        <form method="POST" action="{{route('admin.socials.store')}}" class="store" >
            @csrf
            <div class="profilimg form-group">
                <div class="imgcontainer">
                    <img class="profile-pic-Edit" src="{{asset('admin/assets/images/file.png')}}" alt="">
                    <input type="file" class="editprof" name="icon">
                    <div class="icone">
                        <i class="fas fa-edit"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>{{awtTrans('الاسم')}}</label>
                <input class="form-control" placeholder="{{awtTrans('اكتب الاسم')}}" name="name" type="text">
            </div>
            <div class="form-group">
                <label>{{awtTrans('الرابط')}}</label>
                <input class="form-control" placeholder="{{awtTrans('اكتب الرابط')}}" name="link" type="text">
            </div>
            
            <button type="submit"  class="submit_button btn-main m-0">{{awtTrans('اضافة')}}</button>
        </form>
    </div>

</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(document).on('submit','.store',function(e){
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
                    $(".submit_button").html('<i class="fas fa-spinner"></i>').attr('disable',true)
                },
                success: function(response){
                    $(".text-danger").remove()
                    $('.store input').removeClass('border-danger')
                    $(".submit_button").html("{{awtTrans('اضافة')}}").attr('disable',false)
                    toastr.success('{{awtTrans("تمت الاضافة بنجاح")}}')
                    setTimeout(function(){
                        window.location.replace(response.url)
                    }, 1000);
                },
                error: function (xhr) {
                    $(".submit_button").html("{{awtTrans('اضافة')}}").attr('disable',false)
                    $(".text-danger").remove()
                    $('.store input').removeClass('border-danger')

                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('.store input[name='+key+']').addClass('border-danger')
                        $('.store input[name='+key+']').after(`<span class="mt-5 text-danger">${value}</span>`);
                        $('.store select[name='+key+']').after(`<span class="mt-5 text-danger">${value}</span>`);
                    });
                },
            });

        });
    });
</script>
@endsection
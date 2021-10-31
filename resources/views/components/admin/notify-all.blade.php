<div class="modal fade text-left" id="notify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel160">{{awtTrans('ارسال اشعار')}}</h5>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <form action="{{$route}}" method="POST" enctype="multipart/form-data" class="notify-form">
                    @csrf
                    <input type="hidden" name="id" class="notify_id">
                    <input type="hidden" name="notify" class="notify">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="first-name-column">{{awtTrans('النص الكتابي للأشعار')}}</label>
                            <div class="controls">
                                <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >{{awtTrans('ارسال')}}</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{awtTrans('الفاء')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="mail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel160">{{awtTrans('ارسال بريد الكتروني')}}</h5>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <form action="{{$route}}" method="POST" enctype="multipart/form-data" class="notify-form">
                    @csrf
                    <input type="hidden" name="id" class="notify_id">
                    <input type="hidden" name="notify" class="email">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="first-name-column">{{awtTrans('النص الكتابي للايميل')}}</label>
                            <div class="controls">
                                <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >{{awtTrans('ارسال')}}</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{awtTrans('الفاء')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
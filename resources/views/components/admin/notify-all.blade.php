<div class="modal fade" id="messageAllModel">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header"><h6 class="modal-title"> {{awtTrans('مراسلة الجميع')}}</h6></div>


            <div class="card card-primary card-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs text-md notify-ul" id="custom-tabs-two-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#email-all-tab" role="tab" aria-controls="to-email" aria-selected="true">{{awtTrans('ايميل')}}</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="pill" href="#sms-all-tab" role="tab" aria-controls="to-sms" aria-selected="false">{{awtTrans('رساله')}} SMS</a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#notify-all-tab" role="tab" aria-controls="to-notify" aria-selected="false">{{awtTrans('اشعار')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">


                    <div class="tab-content" id="custom-tabs-two-tab">

                        <!---------------- Email ------------------>
                        <div class="tab-pane fade show active" id="email-all-tab" role="tabpanel"
                             aria-labelledby="to-main">
                            <form action="{{$route}}" method="POST">
                                @csrf

                                <input type="hidden" name="id" class="typeInput">
                                <input type="hidden" name="type" value="email">

                                <div>
                                    <textarea rows="15" name="message" class="form-control" placeholder="{{awtTrans('نص رسالة الـ')}} Email "  required></textarea>
                                </div>
                                <div class="modal-footer justify-content-between px-0 pb-0">
                                    <button type="submit" class="btn btn-primary addCategory">{{awtTrans('ارسال')}}</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{awtTrans('أغلاق')}}</button>
                                </div>
                            </form>
                        </div>

                        <!---------------- SMS ------------------>
                        <div class="tab-pane fade" id="sms-all-tab" role="tabpanel" aria-labelledby="to-social">

                            <<form action="{{$route}}" method="POST">
                                @csrf

                                <input type="hidden" name="id" class="typeInput">
                                <input type="hidden" name="type" value="sms">
                                <div>
                                    <textarea rows="15" name="message" class="form-control" placeholder="نص رسالة الـ SMS "></textarea>
                                </div>
                                <div class="modal-footer justify-content-between px-0 pb-0">
                                    <button type="submit" class="btn btn-primary addCategory">{{awtTrans('ارسال')}}</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{awtTrans('أغلاق')}}</button>
                                </div>
                            </form>
                        </div>

                        <!---------------- Notification ------------------>
                        <div class="tab-pane fade" id="notify-all-tab" role="tabpanel" aria-labelledby="to-social">
                            <form action="{{$route}}" method="POST">
                                @csrf

                                <input type="hidden" name="id" class="typeInput">
                                <input type="hidden" name="type" value="notify">
                                <div>
                                    <textarea rows="15" name="message" class="form-control" placeholder="{{awtTrans('نص رسالة الـ')}} Notification " required></textarea>
                                </div>
                                <div class="modal-footer justify-content-between px-0 pb-0">
                                    <button type="submit" class="btn btn-primary addCategory">{{awtTrans('ارسال')}}</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{awtTrans('أغلاق')}}</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="table-content">

    <div class="add_box">
        @if (isset($addbutton))
            <a href="{{$addbutton}}" class="add">
                <span>{{awtTrans('اضافة')}}</span>
                <i class="fas fa-plus"></i>
            </a>
        @endif
        @if (isset($deletebutton))
            <a data-route="{{$deletebutton}}" class="delete_all delete_all_button">
                <span>{{awtTrans('حذف المحدد')}}</span>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>

    <table id="example" class="w-100">
        <thead>
            <tr>
                {{$tableHead}}
            </tr>
        </thead>
        <tbody>
            {{$tableBody}}
        </tbody>
    </table>

</div>
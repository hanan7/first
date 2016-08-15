<div id="details-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="#" id='details-form' method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title bold">تفاصيل المنتج</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    @if(!empty($pro))
                    <a href="{{URL('products/'.'delete/'.$pro->id)}}" id="delete" class="btn btn red"><li class="fa fa-trash"></li> مسح</a>
                    @endif
                    <button type="button" class="btn btn default" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
                </div>
            </form>
        </div>

    </div>
</div>
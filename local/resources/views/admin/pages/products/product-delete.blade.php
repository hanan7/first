<div id="deletemodal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title bold">مسح عنصر</h4>
            </div>
            <div class="modal-body">
                <p>هل تريد تأكيد عملية المسح ؟</p>
            </div>
            <div class="modal-footer">
                @if(!empty($pro))
                <a href="{{URL('products/'.'delete/'.$pro->id)}}" id="delete" class="btn btn red"><li class="fa fa-trash"></li> مسح</a>
                @endif
                <button type="button" class="btn btn-dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>

            </div>
            </form>
        </div>

    </div>
</div>
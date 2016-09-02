<tr>   
    <td class="text-center"> {number} </td>             
    <td class="text-center"> {note_book} </td>
    <td class="text-center"> {date} </td>
    <td class="text-center"> {name} </td>
    <td class="text-center"> {payment_method} </td>

    <td class="text-center">
        <a href=" {{ url('orders/order') }}/{id}"  class="btn green btnedit" data-original="">
            <li class="fa fa-pencil"> تفاصيل او تعديل</li>
        </a>
        <a href="#deletemodal" data-toggle="modal" class="btn btn-danger btndelet"  >
            <li class="fa fa-trash">  مسح</li>
        </a>
        <a class="btn blue btn-print" data-order-id="{id}">
            <li class="fa fa-printer">  طباعه</li>
        </a>
    </td>
</tr>
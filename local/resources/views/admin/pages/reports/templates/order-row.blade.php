<tr>   
    <td class="text-center"> {code} </td>             
    <td class="text-center"> {name} </td>

    <td class="text-center">

        @if(Auth::guard('admins')->user()->flag==0 )
        <a href="#deletemodal" data-toggle="modal" class="btn btn-danger btndelet"  >
            <li class="fa fa-trash">  مسح</li>
        </a>
        @endif
        @if(Auth::guard('admins')->user()->flag==0  || Auth::guard('admins')->user()->flag==1 || Auth::guard('admins')->user()->flag==4 )
        <a  href="{{URL('orders/'.'invoice')}}/{id}" class="btn yellow" target="_blank">
            <li class="fa fa-check"> الفاتورة</li>
        </a>
        @endif
    </td>
</tr>
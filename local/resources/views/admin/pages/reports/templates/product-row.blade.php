<tr role="row">
    <td>{code}</td>
    <td>{name}</td>
    <td>{points}</td>
    <td>{s_price}</td>
    <td><img src="{{ url('uploads/products') }}/{image}" style="width:100px; height:100px; "></td>
    <td>{quantity}</td>
    <td>{b_price}</td>
    <td>{company}</td>
    <td>{store}</td>
    <td>
        <a href="{{ url('products/edit') }}/{id}" class="btn green btnedit" data-original="">
            <li class="fa fa-pencil"> تعديل</li>
        </a>
        <a href="#deletemodal" data-toggle="modal" class="btn btn-danger btndelet">
            <li class="fa fa-trash">  مسح</li>
        </a>
        <button type="button" class="btn-details btn btn-dafault" data-product-id="{id}">تفاصيل</button>
    </td>
</tr>
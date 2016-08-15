$(function () {

    var base_url = '/sohil';
    //box fields calculations
    var box_count = $('#box-count');

    var box_items_count = $('#box-items-count');

    $("#btn-print").click(function () {
        $inputs = $('input:checked');
        $inputs.each(function (i, o) {
            $(this).after('<span class="dot">&bigstar;</span>').css({
                padding: '5px',
                background: '#CCC',
            });
        });
        window.print();
    });

    $('#box-count,#box-items-count').on('change', function () {
        $('#box-total').text(Number(box_count.val()) * Number(box_items_count.val()));
    });

    var btnDetails = $(".btn-details");
    var productDetailsTemplate = $('#product-details-template').html();
    btnDetails.on('click', function () {
        var id = $(this).data('productId');
        req(base_url + '/products/details/' + id, new FormData($('#details-form')[0]), function (data) {
            if (data) {
                var txt = productDetailsTemplate;
                for (var key in data) {
                    txt = txt.replace(new RegExp('{' + key + '}', 'g'), data[key]);
                }
                $('#details-modal').modal('toggle').find('.modal-body').html(txt);
            }
        }, function () {
            alert('Error');
        });
    });

    /**
     * Ajax for bill product details
     * @type {*|jQuery|HTMLElement}
     */

    $(document).on('click', '.btn-new-product', function () {
        var $row = $(this).closest('tr');
        $row.after($row.clone());
    });

    $(document).on('click', '.btn-del-product', function () {
        if ($('.table tr').length > 2) {
            $(this).closest('tr').remove();
        }
    });

    $(document).on('change click', '.table .product-total,.table tr input,.table tr .btn-new-product,.table tr .btn-del-product', function () {
        calcBillSubTotal();
    });

    var billTot = $('#bill-sub-total');

    function calcBillSubTotal() {
        var tot = 0;
        $('input.product-total').each(function (i, o) {
            tot += Number($(this).val());
        });
        billTot.val(tot);
    }

    $('body,.product-id').on('change', '.product-id', function () {
        var $this = $(this);
        var $row = $this.closest('tr');
        var $price = $row.find('.price');
        var $code = $row.find('.code');
        var $quantity = $row.find('.quantity');
        var id = $this.val();
        req(base_url + '/products/details/' + id, new FormData($('#bill-form')[0]), function (data) {
            if (data) {
                $code.val(data.code);
                $price.val(data.s_price);
                $quantity.val(data.quantity);
                $row.find('.product-total').val(Number(data.s_price) * Number(data.quantity));
                calcBillSubTotal();
            }
        }, function () {
            alert('Error');
        });

    });
    $('.first-update').change();

    $('body,#bill-form .quantity').on('change', '#bill-form .price,#bill-form .quantity', function () {
        var $row = $(this).closest('tr');
        var $price = $row.find('.price').val();
        var $quantity = $row.find('.quantity').val();
        $row.find('.product-total').val(Number($price) * Number($quantity));
    });

    $(document).on('click', ".btn-old-prices", function () {
        $(this).closest('section').find('.prices-list').slideDown(300);
    });


    var categoryTemplate = $('#category-template').html();
    $(document).on('click', '.new-sub-cat', function () {
        $(this).closest('.row').after(categoryTemplate);
    });

    $(document).on('click', '.del-sub-cat', function () {
        $(this).closest('.row').remove();
    });

    var table = $('#search').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": base_url + "/admin/search"
    });

    $('#search_filter input').attr('placeholder','Type + Press Enter').unbind();
    $(document).on('keyup','#search_filter input', function (e) {
        if (e.keyCode == 13) {
            table.fnFilter($(this).val());
        }
    });
    
    /**
     * Reports
     */
    var rowTemplate = $('#row-template').html();
    $('.report-submit').on('click', function (evt) {
        var form = $(this).closest('.report-form');
        req(form.attr('action'), new FormData(form[0]), function (data) {
            if (data) {
                var tbody = ''
                for (var report in data) {
                    var txt = rowTemplate;
                    for (var key in data[report]) {
                        txt = txt.replace(new RegExp('{' + key + '}', 'g'), data[report][key]);
                    }
                    tbody += txt;
                }
                $('table tbody').html(tbody);
            }
        }, function () {
            alert('Error');
        });
        evt.preventDefault();
    });

    var filterOptions = $(".filter-drop-down li");
    var filterHidden = $('#filter-hidden');
    filterOptions.on('click', function () {
        var filterVal = $(this).addClass('active').data('filter');
        filterHidden.val(filterVal);
        filterOptions.not(this).removeClass('active');
    });
    /**
     * Custom logging function
     * @param mixed data
     * @returns void
     */
    function _(data) {
        console.log(data);
    }

    /**
     * Custom Ajax request function
     * @param string url
     * @param mixed|FormData data
     * @param callable(data) completeHandler
     * @param callable errorHandler
     * @param callable progressHandler
     * @returns void
     */
    function req(url, data, completeHandler, errorHandler, progressHandler) {
        $.ajax({
            url: url, //server script to process data
            type: 'POST',
            xhr: function () {  // custom xhr
                myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // if upload property exists
                    myXhr.upload.addEventListener('progress', progressHandler, false); // progressbar
                }
                return myXhr;
            },
            // Ajax events
            success: completeHandler,
            error: errorHandler,
            // Form data
            data: data,
            // Options to tell jQuery not to process data or worry about the content-type
            cache: false,
            contentType: false,
            processData: false
        }, 'json');

    }

});

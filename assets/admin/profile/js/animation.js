$(document).ready(function () {

    $('.card').slideDown(900 , function () {
       
        $('.card-header').slideDown(1000 , function (){
           $('.data ul .first').slideDown(1000 , function () {
                    $(this).next().slideDown(1000 , function () {
                        $(this).next().slideDown(1000 , function () {
                            $(this).next().slideDown(1000 ,function() {
                                $(this).nextAll().slideDown(1000);
                            })
                        })
                    })
                });
        });
    });
    
});


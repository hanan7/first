$(document).ready(function(){
   $('.carousel').carousel({
    
    interval:3000
    });
   $('.gear-check').click(function(){
      $('.colors').fadeToggle();
   });
//   Change Color Theme

   var colorLi = $(".colors ul li");
   
   colorLi
   .eq(0).css("backgroundColor","#81B441").end()
   .eq(1).css("backgroundColor","#e03e25").end()
   .eq(2).css("backgroundColor","#0a9fd8").end()
   .eq(3).css("backgroundColor","#2997ab").end()
   .eq(4).css("backgroundColor","#0bb586").end()
   .eq(5).css("backgroundColor","#38cbcb").end()
   .eq(6).css("backgroundColor","#8d57d1").end()
   .eq(7).css("backgroundColor","#f8ba01").end()
   .eq(8).css("backgroundColor","#034cb3").end()
   .eq(9).css("backgroundColor","#1e90ff").end()
   .eq(10).css("backgroundColor","#0f997e");
   
   colorLi.click(function()
                 
   {
      $("link[href*='theme']").attr("href",$(this).attr("data-value"));
   });

   //cashing scroll button
   var scrollButton=$("#scroll-top");
      $(window).scroll(function(){
         if ($(this).scrollTop()>=700 )
         {
            scrollButton.show();
         }
         else{
            scrollButton.hide();
         }
         
      });
   scrollButton.click(function()
            
         {
            $("html,body").animate({scrollTop:0} , 1500);
            
         });

         $("html").niceScroll();
         
         
         //ÚSmooth Scroll
         $('nav li a').click(function(){
            $('html ,body').animate({
               scrollTop: $('#'+ $(this).data('value')).offset().top   
               
            },1000);
            });

});
//LOADING PAGE
   
   $(window).load(function()
   {
      $("body").css("overflow","auto");
      
      $(".load-page").fadeOut(1000),
      $(this).remove();
   });
   
   
   
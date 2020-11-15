jQuery.noConflict();

   $(function(){
      setInterval(function(){
         $(".slideshow2 ul").animate({marginLeft:-380},1500,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
         })
      }, 10000);
   });
   
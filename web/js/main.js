$(function() {

	 //show hide slider - adv two scroll;
	 function widthFunction(){
		var widthWrap = 1000;
		var widthViewsport = $(window).width();
		var rs = (widthViewsport - widthWrap)/2;
		
		if(widthViewsport < 1350) {
		$('.slideads').css('display','none');
		} 
		else{
			$('.slideads').css('display','block');
			if(rs > 180){
			$('.slideads img.img-scale').removeClass('img-style2');
			$('.slideads img.img-scale').addClass('img-style1');
			}
			else{
				$('.slideads img.img-scale').removeClass('img-style1');
				$('.slideads img.img-scale').addClass('img-style2');
			}
		}
		
		// toggle menu footer
		if(widthViewsport < 768)
		{
			 $('.menu-footer .content').hide();
			$('.menu-footer span.droptabs:first').addClass('first');
			$('.menu-footer .content:first').show().addClass('active');
			$('.menu-footer span.droptabs:last').addClass('last');
			$(".menu-footer span.droptabs").click(function(){
				var parent = $(this).parent();

				if(!$(this).hasClass('active')){
					$('.menu-footer span.droptabs').removeClass('active');
					$(this).addClass('active');
					$('.content').hide().removeClass('active');
					$('.content', parent).show().addClass('active');
				} else {
					$(this).removeClass('active');
					$('.content', parent).hide().removeClass('active');
				}
			});



            $('.box-search').hide();
            $(".control-search").click(function(){
                $('.box-search').toggle();
                $(".slide").toggleClass('open-search');
                $('input.in-keyword').focus();
                if($('.navbar-collapse').hasClass('in')){
                    $('.navbar-collapse').removeClass('in');

                }
            });
            $('.navbar-toggle').click(function(){
                $('.box-search').hide();
                $(".slide").removeClass('open-search');
            });



            // show hide search
            $('.box-suggestions').hide();
            $(".box-search .in-keyword").focus(function(){
                $('.box-suggestions').show();
            });


		}
		else
		{
		$('.menu-footer .content').show();
            $('.box-search').show();
		}







     }




	 //show hide nav tabs
    $('.box-nav-tabs .tab-panel').hide();
    $('.box-nav-tabs .tab-panel:first').show();
    $('.box-nav-tabs ul.nav-tabs li:first').addClass('active');
    $('.box-nav-tabs ul.nav-tabs li').click(function(){
        var currentTab = $(this).attr('href');
        $('.box-nav-tabs .tab-panel').hide();
        $('.box-nav-tabs ul.nav-tabs li').removeClass('active');
        $(this).addClass('active');
        $(currentTab).show();
    });





	// call function
	window.onload =widthFunction;
	window.onresize =widthFunction;


});
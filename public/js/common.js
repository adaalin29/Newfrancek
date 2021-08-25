$( document ).ready(function() {


    //aici initializez libraria de animatii AnimateOnScroll
    AOS.init();

    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 200) {
            $(".header-francek").addClass("darkHeader");
        } else {
            $(".header-francek").removeClass("darkHeader");
        }
    });

    $('.sidenav-element-special-left').click(function () {
        $('.sidenav-element-special-right').removeClass('sidenav-active');
        $('.sidenav-element-special-right').css('height','0px');
        if($(this).parent().find('.sidenav-element-special-right').hasClass('sidenav-active')){
            $(this).parent().find('.sidenav-element-special-right').removeClass('sidenav-active');
            $(this).parent().find('.sidenav-element-special-right').css('height','0px');
            if(screen.width<=1024){
                $(this).parent().find('.sidenav-element-special-right-modificat').css('margin-top','0px');
            }
        }
        else{
            $(this).parent().find('.sidenav-element-special-right').addClass('sidenav-active');
           if(screen.width>768){
            $(this).parent().find('.sidenav-element-special-right').css('height','175px');
            $(this).parent().find('.sidenav-element-special-right-modificat').css('height','330px');
           }else{
            $(this).parent().find('.sidenav-element-special-right').css('height','120px');
            $(this).parent().find('.sidenav-element-special-right-modificat').css('height','210px');
           }
        }
    });

    $(".menu").click(function() {
		if($('.sidenav').hasClass('afisat')) {
			$('.sidenav').removeClass('afisat');

			$(".sidenav").css( {
					left: -100+'%'
				}
			);
		}

		else {
			$('.sidenav').addClass('afisat');

			$(".sidenav").css( {
					left:'0%'
				}

			);
		}
    });
    $(".time").click(function() {
		if($('.appointment-sidenav').hasClass('afisat')) {
			$('.appointment-sidenav').removeClass('afisat');

			$(".appointment-sidenav").css( {
					right: -100+'%'
				}
			);
		}

		else {
			$('.appointment-sidenav').addClass('afisat');

			$(".appointment-sidenav").css( {
					right:'30%'
				}

			);
		}
    });
    
    $(".close-sidenav").click(function() {
        if($('.sidenav').hasClass('afisat')) {
            $('.sidenav').removeClass('afisat');
    
            $(".sidenav").css( {
                    left:'-100%'
                }
    
            );
        }
    });
    $(".appointment-close").click(function() {
        if($('.appointment-sidenav').hasClass('afisat')) {
            $('.appointment-sidenav').removeClass('afisat');
    
            $(".appointment-sidenav").css( {
                    right:'-100%'
                }
    
            );
        }
    });
});




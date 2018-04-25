jQuery(document).ready(function(){
 	$(document).mouseup(function (e){
 		var container = $("header,.popup > div > div,.popups .pop");
		if (!container.is(e.target) // if the target of the click isn't the container...
		&& container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			$(".on").removeClass("on");
			$(".subcontent").css({"z-index":"-1","left":"-100%"});
			$(".tabs .ativo").removeClass("ativo");
			$(".tabs li:first-child").addClass("ativo");
			$(".tabs-content > *").css({"z-index":"-1","opacity":"0"});
			$(".tabs-content > *:first-child").css({"z-index":"50","opacity":"1"});
			$(".popups .pop,.popups").css({"z-index":"-1","opacity":"0"});
		}
	});
 	$(window).resize(function(){
 		$(".on").removeClass("on");
 		$(".subcontent").css({"z-index":"-1","left":"-100%"});
			$(".tabs .ativo").removeClass("ativo");
			$(".tabs li:first-child").addClass("ativo");
			$(".tabs-content > *").css({"z-index":"-1","opacity":"0"});
			$(".tabs-content > *:first-child").css({"z-index":"50","opacity":"1"});
			$(".popups .pop,.popups").css({"z-index":"-1","opacity":"0"});
		$(".slider_wrapper").animate({"left": "0px"}, 2);
 		if ($(window).width() <= 990) {
		$(".slider_wrapper .item").each(function() {
			var dynWidth = $(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).outerWidth();
			var itemLength = $(this).parent().find(".item").length;
			var slideWidth = (dynWidth/2)*itemLength;
			$(this).parentsUntil( $( ".slider_parent" ), ".slider_wrapper"  ).outerWidth(slideWidth);
			$(this).css("width",dynWidth/2);
			var render = (dynWidth/2)-slideWidth;
			if(slideWidth<$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).outerWidth()){
				$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).find(".button").css("display","none");
			} else {
				$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).find(".button").css("display","inline-block");
			}
			$(".slider .button").click(function(){
				if($(this).is(".next")){
					$(this).parent().find(".slider_wrapper").animate({"left": "-="+dynWidth/2}, 2);
					if($(this).parent().find(".slider_wrapper").css("left")<=render+"px"){
						$(this).parent().find(".slider_wrapper").animate({"left": "0px"}, 2);
						$(this).prev("a").addClass("disable");
					} else {
						$(this).prev("a").removeClass("disable");
					}
				} else if($(this).is(".prev")){
					if($(this).parent().find(".slider_wrapper").css("left")!="0px"||$(this).parent().find(".slider_wrapper").css("left")>"0px"){
						$(this).parent().find(".slider_wrapper").animate({"left": "+="+dynWidth/2}, 2);
					} 
					if($(this).parent().find(".slider_wrapper").css("left")=="-"+dynWidth/2+"px"){
						$(this).addClass("disable");
					}
				}
			});
		});	 
 		} else {
		$(".slider_wrapper .item").each(function() {
			var dynWidth = $(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).outerWidth();
			var itemLength = $(this).parent().find(".item").length;
			var slideWidth = (dynWidth/3)*itemLength;
			$(this).parentsUntil( $( ".slider_parent" ), ".slider_wrapper"  ).outerWidth(slideWidth);
			$(this).css("width",dynWidth/3);
			var render = (dynWidth/3)-slideWidth;
			if(slideWidth<$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).outerWidth()){
				$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).find(".button").css("display","none");
			} else {
				$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).find(".button").css("display","inline-block");
			}
			$(".slider .button").click(function(){
				if($(this).is(".next")){
					$(this).parent().find(".slider_wrapper").animate({"left": "-="+dynWidth/3}, 2);
					if($(this).parent().find(".slider_wrapper").css("left")<=render+"px"){
						$(this).parent().find(".slider_wrapper").animate({"left": "0px"}, 2);
						$(this).prev("a").addClass("disable");
					} else {
						$(this).prev("a").removeClass("disable");
					}
				} else if($(this).is(".prev")){
					if($(this).parent().find(".slider_wrapper").css("left")!="0px"||$(this).parent().find(".slider_wrapper").css("left")>"0px"){
						$(this).parent().find(".slider_wrapper").animate({"left": "+="+dynWidth/3}, 2);
					} 
					if($(this).parent().find(".slider_wrapper").css("left")=="-"+dynWidth/3+"px"){
						$(this).addClass("disable");
					}
				}
			});
		});	  			
 		}		
 	});	
 	$("header #header .wrap > .flex > :last-child > .flex100:last-child > :first-child").click(function(){
 		if ($(window).width() <= 990) {
 			$(this).toggleClass("on");
 			$("#mobileNav").toggleClass("on");
 		}
 	}); 
 	$(".popup > div > div").append('<a href="javascript:void(0)" role="close"><!-- --></a>');
 	$("[role='popup']").click(function(){
 		if($(this).text()=="Dados cadastrais da Tilicon"){
 			$(".popup #dadosCadastrais").addClass("on");
 		} else if($(this).text()=="Cadastre aqui a sua empresa"){
 			$(".popup #cadastreEmpresa").addClass("on");
 		}
 		if($('.popup').find('div.on').length != 0){
 			$(".popup,body").addClass("on");
 		}
 	}); 
 	$("[role='close']").click(function(){
 		$(".on").removeClass("on");
		$(this).closest(".popup").removeClass("on");
		$(".popups .pop,.popups").css({"z-index":"-1","opacity":"0"});
		$(".tabs .ativo").removeClass("ativo");
		$(".tabs li:first-child").addClass("ativo");
		$(".tabs-content > *").css({"z-index":"-1","opacity":"0"});
		$(".tabs-content > *:first-child").css({"z-index":"50","opacity":"1"});
 	}); 
    $('.slide').slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1
    });
	$("[class*='slick'].carousel .slick-dots,[class*='slick'].carousel .slick-arrow").wrapAll("<div class='slick-controls' />");
	$( ".tabs li a" ).each(function() {
		$(this).click(function(){
			var tab = $(this).text();
			$(this).parent().addClass("ativo");
			$(this).closest("ul").find(".ativo").not($(this).closest("li")).removeClass("ativo");
			$(".tabs-content > *").css({"z-index":"-1","opacity":"0"});
			for(i = 0; i < 6; i++) { 
				if($(this).parent().is(':nth-child('+i+')')){
					$(".tabs-content > *:nth-child("+i+")").css({"z-index":"50","opacity":"1"});
				}
			}
			// $("[data-type='tab']").css("opacity",0).removeClass("show");
	 	// 	$("[data-type='tab'][data-title='"+tab+"']").css("opacity",1).addClass("show");
	 	}); 
	});
	$(".item [class*='btn']").click(function(){
 		$(".popups .pop").not("."+$(this).parentNth(3).attr("id")).css({"z-index":"-1","opacity":"0"});
 		$(".popups,.popups .pop."+$(this).parentNth(3).attr("id")).css({"opacity":"1","z-index":"50"});
	});
	// own slide
	$(".slider .button.prev").addClass("disable");
	if ($(window).width() <= 990) {
		$(".slider_wrapper .item").each(function() {
			var dynWidth = $(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).outerWidth();
			var itemLength = $(this).parent().find(".item").length;
			var slideWidth = (dynWidth/2)*itemLength;
			$(this).parentsUntil( $( ".slider_parent" ), ".slider_wrapper"  ).outerWidth(slideWidth);
			$(this).css("width",dynWidth/2);
			var render = (dynWidth/2)-slideWidth;
			if(slideWidth<$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).outerWidth()){
				$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).find(".button").css("display","none");
			} else {
				$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).find(".button").css("display","inline-block");
			}
			$(".slider .button").click(function(){
				if($(this).is(".next")){
					$(this).parent().find(".slider_wrapper").animate({"left": "-="+dynWidth/2}, 2);
					if($(this).parent().find(".slider_wrapper").css("left")<=render+"px"){
						$(this).parent().find(".slider_wrapper").animate({"left": "0px"}, 2);
						$(this).prev("a").addClass("disable");
					} else {
						$(this).prev("a").removeClass("disable");
					}
				} else if($(this).is(".prev")){
					if($(this).parent().find(".slider_wrapper").css("left")!="0px"||$(this).parent().find(".slider_wrapper").css("left")>"0px"){
						$(this).parent().find(".slider_wrapper").animate({"left": "+="+dynWidth/2}, 2);
					} 
					if($(this).parent().find(".slider_wrapper").css("left")=="-"+dynWidth/2+"px"){
						$(this).addClass("disable");
					}
				}
			});
		});	 
	} else {
		$(".slider_wrapper .item").each(function() {
			var dynWidth = $(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).outerWidth();
			var itemLength = $(this).parent().find(".item").length;
			var slideWidth = (dynWidth/3)*itemLength;
			$(this).parentsUntil( $( ".slider_parent" ), ".slider_wrapper"  ).outerWidth(slideWidth);
			$(this).css("width",dynWidth/3);
			var render = (dynWidth/3)-slideWidth;
			if(slideWidth<$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).outerWidth()){
				$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).find(".button").css("display","none");
			} else {
				$(this).parentsUntil( $( ".slider_parent" ), ".slider"  ).find(".button").css("display","inline-block");
			}
			$(".slider .button").click(function(){
				if($(this).is(".next")){
					$(this).parent().find(".slider_wrapper").animate({"left": "-="+dynWidth/3}, 2);
					if($(this).parent().find(".slider_wrapper").css("left")<=render+"px"){
						$(this).parent().find(".slider_wrapper").animate({"left": "0px"}, 2);
						$(this).prev("a").addClass("disable");
					} else {
						$(this).prev("a").removeClass("disable");
					}
				} else if($(this).is(".prev")){
					if($(this).parent().find(".slider_wrapper").css("left")!="0px"||$(this).parent().find(".slider_wrapper").css("left")>"0px"){
						$(this).parent().find(".slider_wrapper").animate({"left": "+="+dynWidth/3}, 2);
					} 
					if($(this).parent().find(".slider_wrapper").css("left")=="-"+dynWidth/3+"px"){
						$(this).addClass("disable");
					}
				}
			});
		});	 			
	}		
});

(function($) {
    $.fn.parentNth = function(n) {
        var el = $(this);
        for(var i = 0; i < n; i++)
            el = el.parent();
        
        return el;
    };
})(jQuery);
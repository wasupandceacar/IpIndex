var CommonLib = function(){
	window.BREAK_POINT = 750;
}
Math.seed = 0;
Math.seededRandom = function(min, max) {
    max = max || 1;
    min = min || 0;
    Math.seed = (Math.seed * 9301 + 49297) % 233280;
    var rnd = Math.seed / 233280.0;
    return Math.round(min + rnd * (max - min));
};
CommonLib.prototype = {

	init:function(){
		var wid = jQuery(window).innerWidth();
		var scope = this;

		if(window.BREAK_POINT < wid) {
			this.background = new Background();
		}

		jQuery('#menu_btn a').on('click.common',function(event){
			//jQuery('header#masthead').slideToggle(500);
			jQuery('header#masthead, header#header_sub').toggleClass('open');
			jQuery('#menu_btn').toggleClass('close');
			(event.preventDefault) ? event.preventDefault():event.returnValue=false;
			return false;
		});

		//sns
		jQuery('header .sns ul li').on('mouseenter',function(event){
        	jQuery(event.currentTarget).find('.icon').addClass('hvr');
        }).on('mouseleave',function(event){
        	jQuery(event.currentTarget).find('.icon').removeClass('hvr');
        });

		//to top
		jQuery('#to_top').on('click.top',function(){
			jQuery('body, html').stop(true,false).animate({'scrollTop':'0px'},750,'easeInOutExpo');
			(event.preventDefault) ? event.preventDefault():event.returnValue=false;
			return false;
		});
		jQuery('#to_top').on('mouseenter',function(event){
			jQuery('#to_top .icon').addClass('hvr');
		}).on('mouseleave',function(event){
			jQuery('#to_top .icon').removeClass('hvr');
		});

		var scope = this;
		jQuery(window).on('scroll.top',function(){
			scope.scroll();
        });
		var num = Math.round(1+Math.random()*18);
		jQuery('#top_pic').append('<img id="top_pic" src="img/top/'+num+'.png" width="220"/>');
		var Now=new Date();
		var year=Now.getFullYear();
		var month=Now.getMonth()+1;
		var day=Now.getDate();
		jQuery('#date_span').html(year+"年"+month+"月"+day+"日");
		var work=["红魔乡", "妖妖梦", "永夜抄", "风神录", "地灵殿", "星莲船", "大战争", "神灵庙", "辉针城", "绀珠传", "天空璋"]
		num = Math.round(Math.random()*10);
		$.getJSON('//freegeoip.net/json/?callback=?', function(data) {
			var iparr=data.ip.split(".");
			Math.seed=7*parseInt(iparr[0])+6*parseInt(iparr[1])+5*parseInt(iparr[2])+4*parseInt(iparr[3])+3*year+2*month+day;
			var workpt=Math.seededRandom(0, 10);
			jQuery('#neta_span').html("今日宜打"+work[workpt]);
		});
		jQuery(".panel-default>.panel-heading").css("background-image", "");
	},
	onStart:function(){
		if(jQuery('#header_sub').length > 0){
			setTimeout(function(){jQuery('#header_sub .navigation-top .pickup_news .line:eq(0) .bg').addClass('anim');},50);
			setTimeout(function(){jQuery('#header_sub .navigation-top .pickup_news .line:eq(0) .txt').addClass('anim');},250);
			setTimeout(function(){jQuery('#header_sub .navigation-top .pickup_news .line:eq(1) .bg').addClass('anim');},250);
			setTimeout(function(){jQuery('#header_sub .navigation-top .pickup_news .line:eq(1) .txt').addClass('anim');},500);

			if(jQuery('.page-header .title_area').length > 0){
				setTimeout(function(){
					jQuery('.page-header .title_area h3.poppin_l').addClass('anim');
				},750);
				setTimeout(function(){
					jQuery('.page-header .title_area .jp').addClass('anim');
				},1250);

				setTimeout(function(){
					jQuery('.in-site-content #primary').addClass('anim');
				},1500);

			}
		}
	},
	load:function(){
		var scope = this;
		if(jQuery('#loader').length > 0){
			jQuery('#loader').stop(true,false)
				.delay(250)
				.animate({opacity: 0},1000,'linear',function(){
					jQuery('#page').css({display: 'block', opacity: 0});
					if(window.Index){
						jQuery('body, html').scrollTop(250);
						window.Index.load();
					}

					jQuery('#page').stop(true, false)
						.delay(50)
						.animate({opacity: 1}, 500, 'linear', function(){
							jQuery('#loader').remove();
							if(window.Index){
								jQuery('body, html').delay(250).
									animate({'scrollTop':0},750,'easeOutExpo');
								
							}
							scope.onStart();
						});
				});
			}else{
				this.onStart();
			}
	},
	scroll:function(){
		var scTop = jQuery(window).scrollTop();
        if(scTop > 250 && !jQuery('#to_top').hasClass('show')){
        	jQuery('#to_top').addClass('show');
        }
        if(scTop < 250 && jQuery('#to_top').hasClass('show')){
        	jQuery('#to_top').removeClass('show');
        }
	}
};
var _common;
document.addEventListener("DOMContentLoaded", function(event) {
	_common = new CommonLib();
	_common.init();
});
window.addEventListener('load',function(){
	_common.load();
});
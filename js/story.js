(function(){
var News = function(){}
News.prototype = {
	init:function(){

		var scope = this;
		
		jQuery('#btn_cat_open a, #btn_cat_close a').on('click.news',function(event){
			jQuery('#content .wrap .content-area .site-main .story_list').slideToggle();
			jQuery('#btn_cat_close').toggleClass('open');
			jQuery('#btn_cat_open').toggleClass('open');
			(event.preventDefault) ? event.preventDefault():event.returnValue=false;
			return false;
		});


		jQuery('.story_content .slide_list .slide_list ul li').on('mouseenter',function(event){
			jQuery(event.currentTarget).addClass('hover');
		});
		jQuery('.story_content .slide_list .slide_list ul li').on('mouseleave',function(event){
			jQuery(event.currentTarget).removeClass('hover');
		});

		//slide
		jQuery('.story_content .slide_wrpr .slide_list ul li a').on('click.story',function(){
			var slide_id = jQuery(event.currentTarget).attr('href').replace('#','');
			scope.changeSlide(slide_id);
			(event.preventDefault) ? event.preventDefault():event.returnValue=false;
            return false;
		});

		//popup
		jQuery('#content .wrap .content-area .site-main .story_content .next_scene .thumbnail a').on('click.index',function(event){
			var movie_id = jQuery(event.currentTarget).attr('href').replace('#','');
			
			scope.showPop(movie_id,true);

			(event.preventDefault) ? event.preventDefault():event.returnValue=false;
            return false;
		});
		jQuery('#popup_movie .movie_bg, #popup_movie .btn_close a').on('click.index',function(event){
			jQuery('#popup_movie .movie_frame iframe').remove();
			jQuery('#popup_movie').fadeOut();
			(event.preventDefault) ? event.preventDefault():event.returnValue=false;
			return false;
		});
	},
	changeSlide:function(id){
		var num = Number(id)-1;
		var url = jQuery('.story_content .slide_wrpr .slide_list ul li').eq(num).find('img').attr('src');
		jQuery('.story_content .slide_wrpr .slide_main').css({'opacity':0});
		jQuery('.story_content .slide_wrpr .slide_main img').attr('src',url);
		jQuery('.story_content .slide_wrpr .slide_main').animate({'opacity':1},500,'linear');
	},
	showPop:function(id,is_auto){
		var autoPlayTag = '';
		if(is_auto){
			autoPlayTag = '&autoplay=1';
		}

		jQuery('#popup_movie .movie_frame').append('<iframe width="640" height="360" src="https://www.youtube.com/embed/'+id+'?rel=0&amp;showinfo=0'+autoPlayTag+'" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>');
		jQuery('#popup_movie').fadeIn();
	},
	scroll:function(){
		
	}
};
var news = new News();
news.init();
})();
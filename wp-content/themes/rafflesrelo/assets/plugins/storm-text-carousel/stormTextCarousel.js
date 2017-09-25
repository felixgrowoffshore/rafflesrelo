
(function ( $ ) {
	$.fn.stormTextCarousel = function( options ) {

		var settings = $.extend({
			slideInterval : 5000,
			fadeDuration : 500,
			backgroundColor : '#fff',
			width : '100%',
			height : '100px'
		}, options );

		return this.each(function(){

			var current = -1;
			var timer;
			var cont = $(this);
			var slides = cont.children('.tc-slide');
			
			// setup css
			cont.css({
				position : 'relative',
				backgroundColor : settings.backgroundColor,
				width : settings.width,
				height : settings.height
			});
			
			slides.css({
				opacity : '0',
				position : 'absolute',
				top : '0',
				left : '0',
				'z-index' : '-100',
				width : '100%',
				height : '100%'
			});
			
			function tick(){
				var slide;
				
				if(current > -1){
					slide = $(slides[current]);
					
					slide.removeClass('tc-active');
					slide.fadeTo(settings.fadeDuration, 0, function(){
						$(this).css('z-index', '-100');
					});
				}
				
				if(current+1 == slides.length){
					current = 0;
				} else {
					current++;
				}
				
				slide = $(slides[current]);
				slide.css('z-index', '100');
				slide.fadeTo(settings.fadeDuration, 1, function(){
					var lines = 3;
					
					var isWebkit = 'WebkitAppearance' in document.documentElement.style
					if(isWebkit){
						lines = 2;
					}
					
					$(slide.find('p')).trunk8({
					  lines: lines,
					  fill: "&hellip;",
					  tooltip : false
					});
					
				});
				slide.addClass('tc-active');
			}
			
			tick();
			timer = setInterval(tick, settings.slideInterval);		
		});
	};
}( jQuery ));
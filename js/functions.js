$(function(){
	
	
	function init_isotope(){
		var $container = $('#content');
			
		// update columnWidth on window resize
		$(window).smartresize(function(){
		   $container.isotope({
		     resizable: false, // disable normal resizing
		     masonryHorizontal: { columnWidth: $container.width() / 40000 }
		   });
		   // trigger resize to trigger isotope
		}).smartresize();
		
		// trigger isotope again after images have loaded
		$container.imagesLoaded( function(){
		  $(window).smartresize();
		});
	}
	
	function init_categories(){
		
		//Menswear
		$('.cat-item-10 a').attr('data-filter','outerwear');
		$('.cat-item-11 a').attr('data-filter','besposke');
		$('.cat-item-12 a').attr('data-filter','shirts');
		$('.cat-item-13 a').attr('data-filter','trousers');
		$('.cat-item-14 a').attr('data-filter','shoes');
		$('.cat-item-15 a').attr('data-filter','accesories');
		
		//Art & Design
		$('.cat-item-16 a').attr('data-filter','painting');
		$('.cat-item-17 a').attr('data-filter','sculpture');
		$('.cat-item-18 a').attr('data-filter','industrial-design');
		
		//Architecture
		$('.cat-item-19 a').attr('data-filter','facade');
		$('.cat-item-20 a').attr('data-filter','interior-design');
		
		//Photography
		$('.cat-item-21 a').attr('data-filter','color');
		$('.cat-item-22 a').attr('data-filter','black-white');
		
	}
	
	init_isotope();
	init_categories();
	
	function assign_size(){
		var slug = $('.white-popup').attr('data-size');

		if(slug == '136x96' || slug == '272x192'){
			$('.white-popup').removeClass('second-style third-style');
			$('.white-popup').addClass('first-style');
		}else{
			$('.white-popup').removeClass('first-style second-style');
			$('.white-popup').addClass('second-style');
		}
	}
	
	function url_change(e){
		var url = $(this).attr('data-href');
		window.history.pushState(null, null, url);

		return false;
	}
	
	var link = $('.click');

	link.click(url_change);
	
	$('.open-popup-link').magnificPopup({
		type:'inline',
		callbacks: {
			open: function() {
		      assign_size();
		    },
			close: function() {
			    window.history.back();
			}

		}
	});
	
	//Click en social buttons
	$('.social_button .facebook').popupWindow({ 
		centerBrowser:1 
	});

	$('.social_button .twitter').popupWindow({ 
		centerBrowser:1 
	});

	$('.social_button .pinterest').popupWindow({ 
		centerBrowser:1 
	});
	
	$('.social_button .mail').popupWindow({ 
		centerBrowser:1 
	});
	
	$('.redirect').on('click', function(){
		$('#introduction').fadeOut('slow', function(){
			
			
			
		});
		$('#primary').css({'visibility':'visible'});
	});
	
	$('#pull_menu').on('click', function(){
		
		$('#pull_menu').animate({
			opacity: 0
		}, 500);
		
		// Animation complete.
		$('#menu').animate({
			opacity: 1,
			bottom: '80px'
		}, 1500, function(){
			//Animation complete.
			$('.menu_items').animate({
				opacity: 1
			}, 500);
		});
		
		
		
	});
	
	$('#push_menu').on('click', function(){
		//Reset menu
		$('.menu_items_childs').fadeOut( "fast", function() {
			// Animation complete.
			$('.menu_items').animate({
				marginLeft: '80px',
				opacity: 0
			}, 1500, function() {
				$('#menu').animate({
					bottom: '-236px'
				}, 1500, function() {
					// Animation complete.
					$(this).animate({opacity: 0});
					
					$('#menswear_ul').css({'display':'none'});
					$('#architecture_ul').css({'display':'none'});
					$('#art-design_ul').css({'display':'none'});
					$('#photography_ul').css({'display':'none'});
					
					$('#pull_menu').animate({
						opacity: 1
					}, 200);
				});
			});
		});
		
		
			
		
	});
	
	$('#menswear').on('click', function(event){
		event.preventDefault()
		
		$('.menu_items').animate({
			marginLeft: '0px'
		}, 500, function() {
			// Animation complete.
			
			
			
			$('#art-design_ul').css({'display':'none'});
			$('#architecture_ul').css({'display':'none'});
			$('#photography_ul').css({'display':'none'});
			
			$('.menu_items_childs').css({'display':'inline-block'});
			$('#menswear_ul').css({'display':'block'});
		});
		
	});
	
	$('#art-design').on('click', function(event){
		event.preventDefault()
		
		$('.menu_items').animate({
			marginLeft: '0px'
		}, 500, function() {
			// Animation complete.
			$('#menswear_ul').css({'display':'none'});
			$('#architecture_ul').css({'display':'none'});
			$('#photography_ul').css({'display':'none'});
			
			$('.menu_items_childs').css({'display':'inline-block'});
			$('#art-design_ul').css({'display':'block'});
		});
		
	});
	
	$('#architecture').on('click', function(event){
		event.preventDefault()
		
		$('.menu_items').animate({
			marginLeft: '0px'
		}, 500, function() {
			// Animation complete.
			$('#menswear_ul').css({'display':'none'});
			$('#art-design_ul').css({'display':'none'});
			$('#photography_ul').css({'display':'none'});
			
			$('.menu_items_childs').css({'display':'inline-block'});
			$('#architecture_ul').css({'display':'block'});
		});
		
	});
	
	$('#photography').on('click', function(event){
		event.preventDefault();
		
		$('.menu_items').animate({
			marginLeft: '0px'
		}, 500, function() {
			// Animation complete.
			$('#menswear_ul').css({'display':'none'});
			$('#architecture_ul').css({'display':'none'});
			$('#art-design_ul').css({'display':'none'});
			
			$('.menu_items_childs').css({'display':'inline-block'});
			$('#photography_ul').css({'display':'block'});
		});
		
	});
	
	$('.cat-item a').click(function(event){
		event.preventDefault();
		
		var selector = '.'+$(this).attr('data-filter');
	  	
	  	$('#content').isotope({ filter: selector });

	});
	
	$('.logo').click(function(event){
		event.preventDefault();
		
		var selector = '*';
	  	
	  	$('#content').isotope({ filter: selector });

	});
	
	$( "#image_day" ).click(function() {
		$( "#image_day_content" ).toggle();
	});
	
	/* Login */
	$('#login_link').magnificPopup({
		type:'inline'
	});
	
});
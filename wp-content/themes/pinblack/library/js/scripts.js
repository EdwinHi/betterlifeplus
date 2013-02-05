(function($){	 

		var $pinblack_container = $('#boxes');
		$pinblack_container.imagesLoaded(function(){
		  $pinblack_container.masonry({
			itemSelector : '.item',
			isFitWidth: 'true'
		  });
		});
		
		/* prepend menu icon */
		$('div.menu').prepend('<div id="menu-icon">Menu</div>');
		
		/* toggle nav */
		$("#menu-icon").on("click", function(){
			$("div.menu ul").slideToggle();
			$(this).toggleClass("active");
		});
	
})(jQuery); 
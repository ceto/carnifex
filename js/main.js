/* Sample scripts for RWD nav patterns 
   (c) 2012 Maggie Wachs, Filament Group, Inc - http://filamentgroup.com/examples/rwd-nav-patterns/GPL-LICENSE.txt
   Last updated: March 2012
   Dependencies: jQuery
*/

   

jQuery(function($){

	$('.expander').bind('click focus', function() {
		$('.main-navigation').toggleClass('expanded')
	});




   $('.main-navigation')
      // test the menu to see if all items fit horizontally
      .bind('testfit', function(){
            var nav = $(this),
                items = nav.find('a');
                  
            $('body').removeClass('nav-menu');                    
                  
            // when the nav wraps under the logo, or when options are stacked, display the nav as a menu              
            if ( (nav.offset().top > nav.prev().offset().top) || ($(items[items.length-1]).offset().top > $(items[0]).offset().top) ) {
            
               // add a class for scoping menu styles
               $('body').addClass('nav-menu');
               
            };                    
         })
      

   
   // ...and update the nav on window events
   $(window).bind('load resize orientationchange', function(){
      $('.main-navigation').trigger('testfit');
   });

});
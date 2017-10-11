/* Sample scripts for RWD nav patterns 
   (c) 2012 Maggie Wachs, Filament Group, Inc - http://filamentgroup.com/examples/rwd-nav-patterns/GPL-LICENSE.txt
   Last updated: March 2012
   Dependencies: jQuery
*/jQuery(function(e){e(".expander").bind("click focus",function(){e(".main-navigation").toggleClass("expanded")});e(".main-navigation").bind("testfit",function(){var t=e(this),n=t.find("a");e("body").removeClass("nav-menu");(t.offset().top>t.prev().offset().top||e(n[n.length-1]).offset().top>e(n[0]).offset().top)&&e("body").addClass("nav-menu")});e(window).bind("load resize orientationchange",function(){e(".main-navigation").trigger("testfit")})});
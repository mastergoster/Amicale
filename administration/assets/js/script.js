jQuery.fn.liScroll = function(settings) {
	settings = jQuery.extend({
		travelocity: 0.03
		}, settings);		
		return this.each(function(){
				var $strip = jQuery(this);
				$strip.addClass("newsticker")
				var stripHeight = 1;
				$strip.find("li").each(function(i){
					stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
				});
				var $mask = $strip.wrap("<div class='mask'></div>");
				var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");								
				var containerHeight = $strip.parent().parent().height();	//a.k.a. 'mask' width 	
				$strip.height(stripHeight);			
				var totalTravel = stripHeight;
				var defTiming = totalTravel/settings.travelocity;	// thanks to Scott Waye		
				function scrollnews(spazio, tempo){
				$strip.animate({top: '-='+ spazio}, tempo, "linear", function(){$strip.css("top", containerHeight); scrollnews(totalTravel, defTiming);});
				}
				scrollnews(totalTravel, defTiming);				
				$strip.hover(function(){
				jQuery(this).stop();
				},
				function(){
				var offset = jQuery(this).offset();
				var residualSpace = offset.top + stripHeight;
				var residualTime = residualSpace/settings.travelocity;
				scrollnews(residualSpace, residualTime);
				});			
		});	
};

$(function(){
    $("ul#ticker01").liScroll();
});


var defile;// l'element a deplacer 
var psinit = 580; // position horizontale de depart 
var pscrnt = psinit; 		
function texteDefile() { 
	if (!defile) defile = document.getElementById('defile'); 
	if (defile) { 
    	if(pscrnt < ( - defile.offsetWidth) ){ 
        pscrnt = psinit; 
                } else { 
         pscrnt+= -1; // pixel par deplacement 
    	} 
    	defile.style.left = pscrnt+"px"; 
	} 
} 
setInterval("texteDefile()",20); // delai de deplacement 


/* Datatable */

$(document).ready( function () {
	$('#iddatatableadmin').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
		}
	});
} );


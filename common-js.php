<script type="text/javascript">
jQuery(document).ready(function($){

	/* prepend menu icon */
	$('#nav-wrap').prepend('<div id="menu-icon">Menu</div>');
	
	/* toggle nav */
	$("#menu-icon").on("click", function(){
		$("#navMobile").slideToggle();
		$(this).toggleClass("active");
	});
	
	function imgsize() {
    var W = $(window).width(),
        H = $(window).height();
		
		$('.hw').html("width:"+W+"..height:"+H)
}
$(window).bind('resize', function() { imgsize(); });

});
</script>
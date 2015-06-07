<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>


<footer>

	<?php echo $footer_info; ?>
	<?php doAction('index_footer'); ?>
</footer>
<a href="#" id="to-top" title="我要飞到最高">
	<div class="to-top-wrap"></div>
</a>

<script src="<?php echo TEMPLATE_URL; ?>jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>jquery.lazyload.mini.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<script>
$(function(){
	$(window).scroll(function(){  
		if($(document).scrollTop()>300){
			$("#to-top").stop().show();
			
		}else(
			$("#to-top").stop().hide()
		);
	})
	
	$("#to-top").click(function(){
        $('body,html').animate({scrollTop:0},600,'swing');
        return false;
    });
	
	$("#article-comment-btn").click(function(){
		$(this).fadeOut()
		$("#article-comment").addClass("fadeInx")
	})
	
	addlazy();
	$("img").lazyload({effect: "fadeIn"});
	
	function addlazy(){
		var len = $("#aa img").length;
		for(var i=0;i<len;i++){
		var temp = $($("#aa img")[i]).attr('src');
			$($("#aa img")[i]).attr("data-original",temp);   
		}
	}
})
</script>
</body>
</html>
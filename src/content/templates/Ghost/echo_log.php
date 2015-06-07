<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//获取摘要的第一张大图

?>
<header class="x-mask" style="background-image:url(<?php echo getBigImg($logid) ;?>)">
	<div id="header-wrap">
		<div id="header-info" class="echo-log">
			<h1><?php echo $log_title; ?></h1>
			<h4><?php echo gmdate('Y-n-j', $date); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php blog_author($author); ?></h4>
			<h4 class="tag"><?php blog_tag($logid); ?></h4>
			<p class="back-home"><a href="<?php echo BLOG_URL;?>">首页</a></p>
		</div>
	</div>
</header>
<div id="content" class="echo-log">
	<?php echo $log_excerpt; ?>
	<div class="article">
		<img class="post-top-img lazy" data-original="<?php echo getSmallImg($logid);?>" src="<?php echo getSmallImg($logid);?>">
		<div id="aa">
		<?php
		echo $log_content; 
		?>
		</div>
		<?php doAction('log_related', $logData); ?>
		<div class="nextlog"><?php neighbor_log($neighborLog); ?></div>
	</div>
	<div class="author-info">
		<div class="author-img">
			<?php
			global $CACHE;
			$user_cache = $CACHE->readCache('user');
			$authorname = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];
			if (!empty($user_cache[1]['photo']['src'])){
				$authorimg= BLOG_URL.$user_cache[1]['photo']['src'];
			}
			?>
			<a href="#"><img class="lazy" data-original="<?php echo $authorimg;?>" src="<?php echo $authorimg; ?>"></a>	
		</div>
		<p><?php echo $authorname?></p>
		<div class="author-des">
			<p><?php echo $user_cache[1]['des']; ?></p>
		</div>
	</div>
	<!--div id="article-comment-shareBtn"><span>分了个享</span></div>
	<div id="article-share"></div-->
	<div id="article-comment-btn"><span>评了个论</span></div>
	<div id="article-comment">
		<div id="article-comment-padding">
			<div class="article-comment">
				<?php blog_comments($comments); ?>
				<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
			</div>
		</div>
	</div>
</div>
<?php
 include View::getView('footer');
?>
<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<header class="x-mask">
	<div id="header-wrap">
		<div id="header-info" class="index">
			<h1><?php echo $blogname; ?></h1>
			<h4><?php echo $bloginfo; ?></h4>
		</div>
	</div>
</header>

<div id="content">
	<?php 
	doAction('index_loglist_top'); 
	if (!empty($logs)):
	foreach($logs as $value): 
	?>
	<div class="article">
		<a href="<?php echo Url::log($value['logid']);?>">
		<?php
		preg_match_all("/<img([^>]+)src=\"([^>\"]+)\"?([^>]*)>/i",$value['log_description'],$matches);//从摘要找缩略图
		if($matches[2]){
			$imgsrc=$matches[2][1]?$matches[2][1]:$matches[2][0];
		}else{
			$imgsrc=TEMPLATE_URL."img/bgtest.png";
		}
		?>
			<img class="lazy" data-original="<?php echo $imgsrc;?>" src="<?php echo $imgsrc;?>">
		</a>
		<div class="article-info">
			<h2><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
			<p ><span class="time"><?php echo gmdate('Y-n-j', $value['date']); ?></span><span class="tag"> <?php blog_tag($value['logid']); ?></span></p>
		</div>
	</div>
		
	<?php 
	endforeach;
	else:
	?>
		<h2>未找到</h2>
		<p>抱歉，没有符合您查询条件的结果。</p>
	<?php endif;?>

	<div id="pagenavi">
		<?php 
		global $CACHE;
		$page = isset($params[1]) && $params[1] == 'page' ? abs(intval($params[2])) : 1;
		$sta_cache = $CACHE->readCache('sta');
		$lognum = $sta_cache['lognum'];
		$pageurl = Url::logPage();
		$total_pages = ceil($lognum / $index_lognum);
		if ($page > $total_pages) {
			$page = $total_pages;
		}
		$page_url = newpagenav($lognum, $index_lognum, $page, $pageurl);
		echo $page_url;
		?>
	</div>
</div>

<?php

 include View::getView('footer');
?>
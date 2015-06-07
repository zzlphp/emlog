<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class='maxOut'>

 <div class="container-fluid out">
  <div class="row-fluid" >
<?php doAction('index_loglist_top'); ?>

	<?php include View::getView('side'); ?>  	

    <div class="span9" style='padding:0;'>
	     <!-- left -->
	    <div class="span6 lcr_out" style='margin-left:0;'>
		    <?php 
			if (!empty($logs)):
			foreach($logs as $value):
			?>
	    		<!-- 文章内容 -->
	            <div class="thumbnail content_box">
	            	<!-- 文章标题 AND Tags -->
					<div style="margin-bottom: 18px" class="tabbable">
					  <ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#tab11<?php echo $value['gid'] ?>	">TITLE</a></li>
					    <li><a data-toggle="tab" href="#tab21<?php echo $value['gid'] ?>">TAGS</a></li>
					  </ul>
					  <div  class="tab-content">
					    <div id="tab11<?php echo $value['gid'] ?>" class="tab-pane active"  style='padding-bottom:0;'>
					         <blockquote style='margin-bottom:0px;'>
					              <p><strong><a href="<?php echo $value['log_url']; ?>" title='<?php echo $value['log_title']; ?>' terget='_blank' class='styleA'><?php echo $value['log_title']; ?><?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?></a></strong></p>
					              <small><a href="" class='muted'><?php blog_author($value['author']); ?> </a> | <a href="" class='muted'><?php blog_sort($value['logid']); ?></a> | <?php echo gmdate('Y-n-j', $value['date']); ?> | <?php echo $value['views']; ?> <i class='icon-eye-open'></i> | <?php editflg($value['logid'],$value['author']); ?></small>
					        </blockquote>
					    </div>
					    <div id="tab21<?php echo $value['gid'] ?>" class="tab-pane">
					      <p>
					      	<?php blog_tag($value['logid']); ?>
					      </p>
					    </div>
					  </div>
					</div>
	            	<!-- 文章标题 AND Tags -->

	            	<?php
	            		$search_pattern = '%<img[^>]*?src=[\'\"]((?:(?!\/admin\/|>).)+?)[\'\"][^>]*?>%s';
	            		preg_match($search_pattern,$value['content'],$img);
	            	?>
	            	<?php if(!empty($img[1])): ?>
	              		<a href="<?php echo $value['log_url'] ?>" title="<?php echo $value['title'] ?>" class="thumbnail"><img src='<?php echo $img[1] ?>' class="img-rounded" alt="<?php echo $value['title'] ?>"></a>
	          		<?php endif; ?>
	              	<p class="muted content_box_p">&nbsp;&nbsp;&nbsp;&nbsp;
		              <a href="<?php echo $value['log_url'] ?>" class='muted'>
		              	<?php echo mb_substr(strip_tags($value['log_description']),0,300,'utf-8') ?>
		              </a>
	              </p>

	              <!-- 评论  -->
	              <div class='comment_out'>
		              <div><a class='comment_info' href="<?php echo $value['log_url']; ?>#comments"><?php echo $value['comnum']; ?> 条评论</a></div>
		              <?php getIndexComment($value['gid'],2) ?>
	              </div>
	            </div>
	    	<?php endforeach; else:?>
				<h2>未找到</h2>
				<p>抱歉，没有符合您查询条件的结果。</p>
			<?php endif;?>

	    </div>
	    <!-- left END -->

	    <!-- center -->
	    <div class="span6 lcr_out"  style='float:right;'>
	   		
	   		<!-- 轮播 -->
	   		<?php $pageBlog = getPageBlog(); ?>
	   		<?php if(!empty($pageBlog)): ?>

	   		<div id="myCarousel" class="carousel slide" style='height:320px;'>
			  <ol class="carousel-indicators">
			  <?php $a = 0;foreach($pageBlog as $v): ?>
			    <li data-target="#myCarousel" data-slide-to="<?php echo $a;$a++; ?>"></li>
			    <?php endforeach; ?>
			  </ol>
			  <!-- Carousel items -->
			  <div class="carousel-inner">
			  <?php
			  		foreach($pageBlog as $v):
			  			$search_pattern = '%<img[^>]*?src=[\'\"]((?:(?!\/admin\/|>).)+?)[\'\"][^>]*?>%s';
			  			preg_match($search_pattern,$v['content'],$img);
		  		?>
				    <div class="item"  style='height:320px;overflow:hidden'>
				    	<a  title="<?php echo $v['title'] ?>" target="_blank" href="<?php echo Url::log($v['gid']) ?>">
				    		<img src="<?php echo (!empty($img[1]))?$img[1]:''; ?>" class='container'>
				    	</a>
				    	<div class="carousel-caption">
	                      <a target="_blank" href="<?php echo Url::log($v['gid']) ?>" title="<?php echo $v['title'] ?>">
	                      	<h4><?php echo $v['title'] ?></h4>
	                      </a>
	                    </div>
				    </div>
			<?php endforeach; ?>
			   
			  </div>
			  <!-- Carousel nav -->
			  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			  <a class="carousel-control right clickkkk" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
		<?php endif; ?>
		<script type="text/javascript">$('.clickkkk').click();</script>

	   		<!-- 轮播 END -->

	   		<!-- 文章内容区域 -->
	   		<?php 
			if (!empty($logs)):
			foreach($logs as $value):
			?>
	    		<!-- 文章内容 -->
	            <div class="thumbnail content_box">
	            	<!-- 文章标题 AND Tags -->
					<div style="margin-bottom: 18px" class="tabbable">
					  <ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#tab11<?php echo $value['gid'] ?>	">TITLE</a></li>
					    <li><a data-toggle="tab" href="#tab21<?php echo $value['gid'] ?>">TAGS</a></li>
					  </ul>
					  <div  class="tab-content">
					    <div id="tab11<?php echo $value['gid'] ?>" class="tab-pane active"  style='padding-bottom:0;'>
					         <blockquote style='margin-bottom:0px;'>
					              <p><strong><a href="<?php echo $value['log_url']; ?>" title='<?php echo $value['log_title']; ?>' terget='_blank' class='styleA'><?php echo $value['log_title']; ?><?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?></a></strong></p>
					              <small><a href="" class='muted'><?php blog_author($value['author']); ?> </a> | <a href="" class='muted'><?php blog_sort($value['logid']); ?></a> | <?php echo gmdate('Y-n-j', $value['date']); ?> | <?php echo $value['views']; ?> <i class='icon-eye-open'></i> | <?php editflg($value['logid'],$value['author']); ?></small>
					        </blockquote>
					    </div>
					    <div id="tab21<?php echo $value['gid'] ?>" class="tab-pane">
					      <p>
					      	<?php blog_tag($value['logid']); ?>
					      </p>
					    </div>
					  </div>
					</div>
	            	<!-- 文章标题 AND Tags -->

	            	<?php
	            		$search_pattern = '%<img[^>]*?src=[\'\"]((?:(?!\/admin\/|>).)+?)[\'\"][^>]*?>%s';
	            		preg_match($search_pattern,$value['content'],$img);
	            	?>
	            	<?php if(!empty($img[1])): ?>
	              		<a href="<?php echo $value['log_url'] ?>" title="<?php echo $value['title'] ?>" class="thumbnail"><img src='<?php echo $img[1] ?>' class="img-rounded" alt="<?php echo $value['title'] ?>"></a>
	          		<?php endif; ?>
	              	<p class="muted content_box_p">&nbsp;&nbsp;&nbsp;&nbsp;
		              <a href="<?php echo $value['log_url'] ?>" class='muted'>
		              	<?php echo mb_substr(strip_tags($value['log_description']),0,300,'utf-8') ?>
		              </a>
	              </p>

	              <!-- 评论  -->
	              <div class='comment_out'>
		              <div><a class='comment_info' href="<?php echo $value['log_url']; ?>#comments"><?php echo $value['comnum']; ?> 条评论</a></div>
		              <?php getIndexComment($value['gid'],2) ?>
	              </div>
	            </div>
	    	<?php endforeach; else:?>
				<h2>未找到</h2>
				<p>抱歉，没有符合您查询条件的结果。</p>
			<?php endif;?>

	   		<!-- 文章内容区域 END -->
	    </div>


    </div>
  </div>
  <div class="pagination pagination-mini pagination-centered" style="background-color:#fff;padding-top:5px;margin-bottom:0">
	<?php echo $page_url;?>
</div>
</div>

</div>

<?php echo include View::getView('footer'); ?>
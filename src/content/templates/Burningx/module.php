<?php 
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<strong><?php echo $title; ?></strong>
	<ul id="bloggerinfo">
	<div id="bloggerinfoimg">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
	<p><b><?php echo $name; ?></b>
	<?php echo $user_cache[1]['des']; ?></p>
	</ul>
    <hr>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<strong><?php echo $title; ?></strong>
    <center>
	<div id="calendar">
	</div>
    </center>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
    <hr>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<strong ><?php echo $title; ?></strong>
    <li>
    <?php foreach($tag_cache as $value): ?>
	    <a class="tagBgcolor" href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"  style="display: inline; margin: 0">
	    <span class="label label-success"><?php echo $value['tagname']; ?></span>
	    </a>
    <?php endforeach; ?>
    </li>
    <hr>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<strong ><?php echo $title; ?></strong>
		<?php
		foreach($sort_cache as $value):
			if ($value['pid'] != 0) continue;
		?>
	    <li>
	    	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	    </li>

	    <?php if (!empty($value['children'])): ?>
	    	<ul>
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
		<li>
			<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
		</li>
		<?php endforeach; ?>
		</ul>

	    <?php endif;endforeach; ?>
	    <hr>
<?php }?>


<?php
//widget：最新微语
function widget_twitter($title){

	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<strong ><?php echo $title; ?></strong>
		<?php foreach($newtws_cache as $value): ?>
			<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
            <div class='newcomment_out'>
                <table>
                    <tr>
                        <td><?php echo $img;?></td>
                        <td>
                            <div>
                                <span class="muted"><small><?php echo smartDate($value['date']); ?>&nbsp;</small></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="newcomment_content" style="">
                            <a  style="styleA"><?php echo $value['t']; ?> </a>
                        </td>
                    </tr>
                </table>
            </div>
          <?php endforeach; ?>
          <br>
          <?php if ($istwitter == 'y') :?>
	<p><a href="<?php echo BLOG_URL . 't/'; ?>">更多&raquo;</a></p>
	<?php endif;?>
        <hr>	
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
	<strong ><?php echo $title; ?></strong>
	<?php
		foreach($com_cache as $value):
		$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
	    <div class='newcomment_out'>
	        <table >
	            <tr>
	                <td >
                    <?php if($isGravatar == 'y'): ?><img src="<?php echo getGravatar($comment['mail']); ?>" >
                    <?php else: ?>
                        <img src="<?php echo TEMPLATE_URL; ?>images/mm_img.jpg" >
                    <?php endif; ?>
                    <!-- <img data-src="holder.js/300x200" src='./mm_img.jpg' class="img-rounded" alt=""> -->
                    </td>
	                <td>
	                    <div>
	                        <span class="nike pointer"><?php echo $value['name']; ?> </span><br>
	                        <span class="muted"><small><?php echo date('Y-m-d H:i',$value['date']) ?>&nbsp;</small></span>
	                    </div>
	                </td>
	            </tr>
	            <tr>
	                
	                <td colspan="2" class="newcomment_content" style="">
	                    <a href="<?php echo $url; ?>" style="styleA"><?php echo $value['content']; ?></a>
	                </td>
	            </tr>
	        </table>
	    </div>
	  <?php endforeach; ?>
	<hr>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<strong ><?php echo $title; ?></strong>
	<?php foreach($newLogs_cache as $value): ?>

            <li><a
                href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
    <?php endforeach; ?>
            <hr>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<strong ><?php echo $title; ?></strong>
	<?php foreach($randLogs as $value): ?>
            <li><a
                href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
            <hr>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>

	<strong ><?php echo $title; ?></strong>
	<?php foreach($randLogs as $value): ?>
            <li><a
                href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
    <?php endforeach; ?>
            <hr>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>

		<form class="input-append "  name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
			<input class="span9" id="appendedInputButton" type="text" name="keyword">
			<button type="submit" class="btn  btn-success"><b>搜索</b></button>
		</form>

<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<li>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<strong><?php echo $title; ?></strong>
    <li>
	<?php echo $content; ?>
	</li>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>

    <strong><?php echo $title; ?></strong>
    <?php foreach($link_cache as $value): ?>
    	<li><a target="_blank" href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" class="tagBgcolor" style="display:inline;margin:0"><span class="label label-info"><?php echo $value['link']; ?></span></a>&nbsp;</li>
    <?php endforeach; ?>
    <hr>
<?php }?> 
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<?php
	foreach($navi_cache as $value):

        if ($value['pid'] != 0) {
            continue;
        }

		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
			<li><a tabindex="-1" href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			<li><a tabindex="-1" href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
		<li><a tabindex="-1" href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
			<?php if (!empty($value['children'])) :?>
                <?php foreach ($value['children'] as $row){
                        echo '<li><a tabindex="-1" href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
            <?php endif;?>

            <?php if (!empty($value['childnavi'])) :?>
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a tabindex="-1" href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
            <?php endif;?>

	<?php endforeach; ?>
<?php }?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {

       echo $top == 'y' ? "<span class='label label-important' title=\"首页置顶文章\">首页置顶</span>" : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<span class='label label-important' title=\"分类置顶文章\">分类置顶</span>" : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
    <a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\"><span class='label label-success'>".$value['tagname'].'</span></a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<li><a href="<?php echo Url::log($prevLog['gid']) ?>">← <?php echo $prevLog['title'];?></a></li>
	<?php endif;?>
	<?php if($nextLog && $prevLog):?>
		|
	<?php endif;?>
	<?php if($nextLog):?>
		 <li><a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?> →</a></li>
	<?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments){
    // 获取评论内容
    $commentData =$comments['comments'];

    $isGravatar = Option::get('isgravatar');
    ?>
     <div style="margin-bottom:10px;"><a style="font-size:12px;" >评论</a></div>
        <div  class='comment_content_xq'>
    
    <?php foreach($commentData as $v):  ?>
        <?php if($v['pid'] == 0): ?>
        <div class='commentout'>
            <div class="comment_picxq" style="">
                <?php if($isGravatar == 'y'): ?><img src="<?php echo getGravatar($v['mail']); ?>" >
                <?php else: ?>
                    <img src="<?php echo TEMPLATE_URL; ?>images/mm_img.jpg" >
                <?php endif; ?>
            </div> 
            <div class='comment_usxq reply_f'>
              <div>
              <span class='nike pointer'><?php echo $v['poster']; ?></span>
                <span class="muted"><small><?php echo $v['date']; ?></small></span>
              </div>
              <div class='comment_text'>
                <?php echo $v['content']; ?>
                <a  class="label label-success pull-right " onclick="commentReply(<?php echo $v['cid']; ?>,this)">&nbsp;回复&nbsp;</a>
              </div>
            </div>
         </div>

         <?php blog_comments_children($commentData,$v['cid']); ?>
    <?php endif; endforeach; ?>
   
<?php 
   }?>
<?php
//blog：子评论列表
function blog_comments_children($comments,$cid){
    foreach($comments as $v):
        if($v['pid'] == $cid):
?>
        <div class="comment_r_out reply_f">
            <div class='comment_pic_r'><img src="./gg_img.jpg"></div> 
            <div class='comment_us_r'>
              <div>
                <span class='nike_r pointer'><?php echo $v['poster'] ?></span>
                <span class="muted"><small><?php echo $v['date'] ?></small></span>
              </div>
              <div class='comment_text_r'>
                <?php echo $v['content']; ?>
                <a  class="label label-success pull-right" onclick="commentReply(<?php echo $v['cid']; ?>,this)">&nbsp;回复&nbsp;</a>
              </div>
            </div>
        </div>
        <?php blog_comments_children($comments,$v['cid']); ?>

<?php endif;endforeach; ?>

<?php
    }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
    if($allow_remark == 'y'): ?>
    <div id="comment-place">
    <div class="comment-post text_comment" id="comment-post" >
        
        <p class="comment-header"><a name="respond"></a></p>
        <form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
            <input type="hidden" name="gid" value="<?php echo $logid; ?>" />

            <?php if(ROLE == ROLE_VISITOR): ?>
                <table style="margin:0 auto">
                    <tr>
                        <td> 昵 称：</td>
                        <td><input type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22" tabindex="1"></td>
                    </tr>
                    <tr>
                        <td>邮件地址 (选填)：</td>
                        <td><input type="text" name="commail"  maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="2"></td>
                    </tr>
                    <tr>
                        <td>个人主页 (选填)：</td>
                        <td><input type="text" name="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3"></td>
                    </tr>
                </table>
            <?php endif; ?>
            <p><textarea name="comment"rows="10" tabindex="4" class="text_area"></textarea></p>
            <p><?php echo $verifyCode; ?> <input class="btn btn-success" type="submit" id="comment_submit" value="发表评论" tabindex="6" /><span class="cancel-reply "id="cancel-reply" style="display:none;">&nbsp;<a class="btn btn-success" style='margin-top:10px;' href="javascript:void(0);" onclick="cancelReply()">取消回复</a></span></p>
            <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
        </form>
    </div>
    </div>
    <?php endif; ?>
<?php }?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}

// pageBlog
function getPageBlog()
{
    $db = MySql::getInstance();
    $sql = "SELECT gid,title,content FROM ".DB_PREFIX."blog WHERE type = 'page' AND hide = 'n' ORDER BY date DESC";
    $blog = $db -> query($sql);
    $logArr = array();
    while($row = $db -> fetch_array($blog))
        $logArr[] = $row;
    return $logArr;

}

//getIndexComment
 function getIndexComment($gid,$comNUm)
 {
    $db = MySql::getInstance();
    $sql = "SELECT * FROM ".DB_PREFIX."comment WHERE gid = {$gid} AND hide = 'n' ORDER BY date LIMIT {$comNUm}";
    $comm = $db -> query($sql);
    $str = '';
    $isGravatar = Option::get('isgravatar');
    while($row = $db->fetch_array($comm)):
?>
       
          <div class='comment_content'>
                <div class='comment_pic'>
                <?php if($isGravatar == 'y'): ?><img src="<?php echo getGravatar($row['mail']); ?>" >
                <?php else: ?>
                    <img src="<?php echo TEMPLATE_URL; ?>images/mm_img.jpg" >
                <?php endif; ?>
                </div>
                <div class='comment_us'>
                    <div>
                        <span class='nike pointer'><?php echo $row['poster'] ?> </span><span class='muted'><small><?php echo date('Y-m-d H:i', $row['date']); ?>&nbsp;</small></span>
                    </div>
                    <div class='comment_text'>
                        <a target='_blank' href='<?php echo Url::log($row['gid']) ?>#comment' class='styleA'>
                        <?php echo $row['comment'] ?></a>
                    </div>
                </div>
            </div>
<?php
    endwhile;

 }
?>

<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class='maxOut'>

 <div class="container-fluid out" style='margin-top:0;'>

  <div class="row-fluid">
    <div class="span1"></div>
      
    <div class="span10">
      <div class="span9 xq_out" style='padding:0;height:auto;overflow:hidden;'>
        <!-- 面包屑 -->
        <div style='margin-bottom:5px'>
          <ul class="breadcrumb" style='margin:0;background-color:#fff'>
            <li><a href="<?php echo BLOG_URL; ?>">首页</a> <span class="divider">/</span></li>
            <li><a href="#"><?php blog_sort($logid); ?></a> <span class="divider">/</span></li>
            <li class="active"><?php echo $log_title; ?></li>
          </ul>
        </div>
        <!-- 面包屑END -->

        <!-- 内容 -->
        <div style='width:auto;background-color:#fff;padding:10px;'>

          <div class="page-header">
            <h3><?php echo $log_title; ?></h3>

             <small class='muted'>
             作者：<a href="javascript:void(0)" class='muted'><?php blog_author($author); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发布于：<?php echo gmdate('Y-n-j', $date); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php editflg($logid,$author); ?>
             </small>
          </div>

          <!-- content -->
          <div class="thumbnail article_contont"><?php echo $log_content; ?></div>
          <!-- content END -->
          

        </div>
      </div>
    <?php include View::getView('side'); ?>
    </div>
  </div>
  </div>
</div>


<?php include View::getView('footer'); ?>

<script type="text/javascript">
/* 评论输入框隐藏显示操作 */
$('.text_input').focus(function(){
  $(this).parent().attr('style','display:none');
  $(this).parent().next().attr('style','display:block');
});
$('.comment_off').click(function(){
  $(this).parent().attr('style','display:none');
  $(this).parent().prev().attr('style','display:block');
});
//reply_f reply
$('.reply').click(function(){
  var str = '<div style="clear:both" id="comment_position"><div class="text_comment textContont1 textContont4"><input class="input-xlarge text_input" type="text" placeholder="评论内容">&nbsp;<a class="btn btn-success txsf" href="#myModal" title="不填写则以游客昵称发表评论" data-toggle="modal">填写身份</a></div><div class="text_comment textContont2 textContont3" style="display:none"><textarea class="text_area" rows="3" maxlength="100"  placeholder="评论内容"></textarea><br><button class="btn btn-success comment_submit" href="javascript:void(0)" >提交</button>&nbsp;<button class="btn btn-success comment_off" href="javascript:void(0)" >取消</button></div></div>';
  $('#comment_position').remove()
  $(this).parents('div .reply_f').append(str);
})

$(".commentxq_out").delegate(".text_input","focus",function(){
    $(this).parent().attr('style','display:none');
    $(this).parent().next().attr('style','display:block');
});
$(".commentxq_out").delegate(".comment_off","click",function(){
    $(this).parent().attr('style','display:none');
    $(this).parent().prev().attr('style','display:block');
});

</script>
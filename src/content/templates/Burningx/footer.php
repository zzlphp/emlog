<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>


<div class="foot">
    <?php echo $footer_info; ?><br>
    <?php doAction('index_footer'); ?>
    </p>
    </div>
  
<script>prettyPrint();</script>
</body>
</html>
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

<?php  if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
</div>
<div id="totop" class="totop"><i class="iconfont">&#404;</i>回顶部</div>
<script type="text/javascript">
	$(window).scroll(function () {
        var dt = $(document).scrollTop();
        var wt = $(window).height();
        if (dt <= 0) {
            $("#totop").hide();
            return;
        }
        $("#totop").show();
        if ($.browser.msie && $.browser.version == 6.0) {
            $("#totop").css("top", wt + dt - 110 + "px");
        }
    });
    $("#totop").click(function () { $("html,body").animate({ scrollTop: 0 }, 200) });
</script>
</div>
<div style="clear:both;"></div>
<div id="footer">
<p>Powered by <a href="http://www.emlog.net" title="emlog <?php echo Option::EMLOG_VERSION;?>">emlog</a> |
<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a></p>
<p>Theme by <a href="http://tangjie.me" title="产品经理@唐杰" target="_blank">TangStyle</a>.
And Transplant By <a href="http://ihaotian.me" title="Haotian" target="_blank">Haotian</a>.</p>
 <?php echo $footer_info; ?>
<?php doAction('index_footer'); ?>
</div>
</div>
</body>
</html>
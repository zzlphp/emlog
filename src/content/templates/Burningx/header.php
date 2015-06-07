<?php
/*
Template Name:简约风_Burningx(T)
Description:
Version:1.0
Author:Burningx
Author Url:http://ipy8.com
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $site_title; ?></title>
    <meta name="keywords" content="<?php echo $site_key; ?>" />
	<meta name="description" content="<?php echo $site_description; ?>" />
	<meta name="generator" content="emlog" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
	<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
	<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>css/main.css">
	<script src="<?php echo TEMPLATE_URL; ?>bootstrap/js/jquery.min.js"></script>
	<script src="<?php echo TEMPLATE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
	<!--[if IE 6]>
	<script src="<?php echo TEMPLATE_URL; ?>iefix.js" type="text/javascript"></script>
	<![endif]-->
	<?php doAction('index_head'); ?>
 </head>
 <body>
<!-- header -->
<div class="page-header header" style="min-width:1054px;">
<div class='maxOut'>

	<h1 class="pull-left" style="color:#448944;"><a style="color:#448944;" href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a> <small><?php echo $bloginfo; ?></small></h1>
	<h1 class="pull-right">
		<form class="form-search " name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
			<input type="text" class="input-medium search-query" id="appendedInputButton" name="keyword">
			<button type="submit" class="btn  btn-success"><b>搜索</b></button>
		</form>
	</h1>
    </div>
</div>
<!-- header END -->
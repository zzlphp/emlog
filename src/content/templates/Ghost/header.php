<?php
/*
Template Name:Ghost
Description:响应式，扁平化，单栏模板。原作 <a href="https://luolei.org">@罗磊</a> 移植<a href="http://blog.wdyun.cn">goodstudy</a>
Version:1.3
Author:原作<a href="https://luolei.org">@罗磊</a> 移植<a href="http://blog.wdyun.cn">goodstudy</a>
Author Url:
Sidebar Amount:0
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="" />
<link href="<?php echo TEMPLATE_URL; ?>main.css" rel="stylesheet" type="text/css" />
<?php doAction('index_head'); ?>
</head>
<body>
	
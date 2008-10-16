<?php 
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="<?php echo $sitekey; ?>" />
<meta name="generator" content="emlog" />
<title><?php echo $blogtitle;?></title>
<link rel="alternate" type="application/rss+xml" title="订阅我的博客"  href="./rss.php">
<link href="<?php echo $em_tpldir; ?>style.css" rel="stylesheet" type="text/css" />
<script src="./lib/js/common_tpl.js" type="text/javascript"></script>
</head>
<body>
<div id="shell">
<div id="header">
<ul>
<?php if(ISLOGIN): ?>
	<li><a href="./admin/add_log.php">写日志</a></li>
	<li><a href="./admin/">管理中心</a></li>
	<li><a href="./index.php?action=logout">退出</a></li>
<?php endif; ?>
</ul>
<h1><a href="./"><?php echo $blogname;?></a></h1>
<?php echo $bloginfo;?>

</div>
<div id="page">
<div id="content">
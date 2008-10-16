<?php 
if(!defined('EMLOG_ROOT')) {exit('error!');}
$att_img = getAttachment($att_img,350,300);
?>
	<div class="narrowcolumn">

		<div class="post" id="post-$logid">

		<h2><?php echo $log_title;?></h2>
		<div class="postdate"><?php echo $post_time;?></div>

			<div class="entry">
				<?php echo $log_content;?>
<a name="att"></a>
<p><?php echo $att_img;?></p>
<p><?php echo $attachment;?></p>	
<p><?php echo $tag;?></p>
<p>
<?php if($previousLog):?>
	&laquo; <a href="./?action=showlog&gid=<?php echo $previousLog['gid']; ?>"><?php echo $previousLog['title'];?></a>
<?php endif;?>
<?php if($nextLog && $previousLog):?>
	|
<?php endif;?>
<?php if($nextLog):?>
	<a href="./?action=showlog&gid=<?php echo $nextLog['gid']; ?>"><?php echo $nextLog['title'];?></a>&raquo;
<?php endif;?>
</p>
</div>
<?php
if($allow_tb == 'y'){
?>	
<div class="comments-template">
<h2 id="comments">引用:<a name="tb"></a></h2>
<input type="text" id="input" style="width:350px" value="<?php echo $blogurl;?>tb.php?sc=<?php echo $tbscode;?>&amp;id=<?php echo $logid;?>" /><a name="tb"></a>
</div>
<?php
}?>	
<div class="comments-template">
<h2 id="comments"><a name="comment"></a>评论</h2>

<p></p>

<ol id="commentlist">
<?php
foreach($com as $key=>$value):
$reply = $value['reply']?"<span style=\"color:#A1410E;\"><b>博主回复</b>：{$value['reply']}</span>":'';
?>
	<li id="comment-<?php echo $value['cid'];?>"><a name="<?php echo $value['cid'];?>"></a>
	<cite>Comment by <strong><?php echo $value['poster'];?></strong> 
	<?php if($value['mail']):?>
		<a href="mailto:<?php echo $value['mail']; ?>" title="发邮件给<?php echo $value['poster']; ?>">Email</a>
	<?php endif;?>
	<?php if($value['url']):?>
		<a href="<?php echo $value['url']; ?>" title="访问<?php echo $value['poster']; ?>的主页" target="_blank">主页</a>
	<?php endif;?>
	&#8212; <?php echo $value['addtime'];?></cite>
	<br /><?php echo $value['content'];?><br /><div id="replycomm<?php echo $value['cid']; ?>"><?php echo $reply;?></div>
	<?php if(ISLOGIN === true): ?>	
		<a href="javascript:void(0);" onclick="showhidediv('replybox<?php echo $value['cid']; ?>','reply<?php echo $value['cid']; ?>')">回复</a>
		<div id='replybox<?php echo $value['cid']; ?>' style="display:none;">
		<textarea name="reply<?php echo $value['cid']; ?>" class="input" id="reply<?php echo $value['cid']; ?>" style="overflow-y: hidden;width:360px;height:50px;"><?php echo $value['reply']; ?></textarea>
		<br />
		<a href="javascript:void(0);" onclick="postinfo('./admin/comment.php?action=doreply&cid=<?php echo $value['cid']; ?>&flg=1','reply<?php echo $value['cid']; ?>','replycomm<?php echo $value['cid']; ?>');">提交</a>
		<a href="javascript:void(0);" onclick="showhidediv('replybox<?php echo $value['cid']; ?>')">取消</a>
		</div>
	<?php endif; ?>	
	</li>
<?php endforeach; ?>
</ol>

<ol id="commentlist">
<?php foreach($tb as $key=>$value): ?>
	<li id="comment-<?php echo $value['cid'];?>">
	<cite>Trackback by <strong><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['blog_name'];?></a></strong> &#8212; <?php echo $value['date'];?></cite><br/>
	<a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a><br/>
	<?php echo $value['excerpt'];?>
	</li>
<?php endforeach; ?>
</ol>
<?php if($allow_remark == 'y'): ?>
<h2>发表评论</h2>
<p></p>
<form method="post" name="commentform" action="index.php?action=addcom" id="commentform">
<input type="hidden" name="gid" value="<?php echo $logid;?>" />
<p><input type="text" name="comname" id="author" value="<?php echo $ckname;?>" size="30" tabindex="1" />
姓名</p>

<p><input type="text" name="commail" id="email" value="<?php echo $ckmail;?>" size="30" tabindex="2" />
<label for="email"><small>电子邮件地址(选填)</small></label>
</p>
<p><input type="text" name="comurl" id="email" value="<?php echo $ckurl;?>" size="30" tabindex="2" />
<label for="email"><small>个人主页(选填)</small></label>
</p>
<p><textarea name="comment" id="comment" cols="55" rows="10" tabindex="4"></textarea></p>

<p><?php echo $cheackimg;?><input name="submit" type="submit" id="submit" tabindex="5" value="发布评论" onclick="return checkform()"/>
<input type="checkbox" name="remember" value="1" checked="checked" />记住我</td>
</p>
</form>
<?php endif; ?>
</div>
</div>
</div>
<?php
include getViews('obar');
include getViews('footer');
?>
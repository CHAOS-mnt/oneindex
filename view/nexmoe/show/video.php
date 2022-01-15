<?php view::layout('layout')?>
<?php
$item['thumb'] = onedrive::thumbnail($item['path']);
?>
<?php view::begin('content');?>
<link class="dplayer-css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dplayer/dist/DPlayer.min.css">
<script src="https://cdn.jsdelivr.net/npm/dplayer/dist/DPlayer.min.js"></script>
<div class="mdui-container-fluid">
	<div class="nexmoe-item">
	<div class="mdui-center" id="dplayer"></div>
	<div class="mdui-p-t-5 ">
		<button id="appplayers" class="mdui-btn mdui-ripple mdui-color-theme-accent">外部播放器播放</button>
		<ul class="mdui-menu mdui-menu-cascade" id="menu">
			<li class="mdui-menu-item">
			<a href="intent:<?php e($url);?>#Intent;package=com.mxtech.videoplayer.ad;end" class="mdui-ripple">MXPlayer(FREE)</a>
			</li>
			<li class="mdui-menu-item">
			<a href="vlc://<?php e($url);?>" class="mdui-ripple">VLC(PC)</a>
			</li>
			<li class="mdui-menu-item">
			<a href="potplayer://<?php e($url);?>" class="mdui-ripple">PotPlayer(PC)</a>
			</li>
			<li class="mdui-menu-item">
			<a href="nplayer-<?php e($url);?>" class="mdui-ripple">nPlayer(iOS)</a>
			</li>
			
		</ul>
	</div>
	<!-- 固定标签 -->
	<div class="mdui-textfield">
	  <label class="mdui-textfield-label">下载地址</label>
	  <input class="mdui-textfield-input" type="text" value="<?php e($url);?>"/>
	</div>
</div>
<script>
const dp = new DPlayer({
	container: document.getElementById('dplayer'),
	lang:'zh-cn',
	video: {
	    url: '<?php e($item['downloadUrl']);?>',
	    pic: '<?php @e($item['thumb']);?>',
	    type: '<?php e((pathinfo($item["name"], PATHINFO_EXTENSION) === 'flv') ? 'flv' : 'auto'); ?>'
	}
});
var inst = new mdui.Menu('#appplayers', '#menu');

// method
document.getElementById('appplayers').addEventListener('click', function () {
  inst.open();
});
</script>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>
<?php view::end('content');?>

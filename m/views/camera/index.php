<style>
	.line_bg{position: absolute; z-index: 1; width: 100%; height: 100%; background: #000; display: none;}
	.line_ct{position: absolute; z-index: 3; border: #FF6600 1px solid;}
	.line_an{width: 42px; overflow: hidden;}
	.line_an li{float: left; width: 42px; line-height: 42px; border-bottom: rgba(255,255,255,0.3) 1px solid; background-color: rgba(0,0,0,0.6);}
	.line_an li a{display: block; color: #FFF; text-align: center;}
</style>
<div id="Line" class="line_ct">
	<ul class="line_an">
		<li><a href="" class="camera">拍照</a></li>
		<li><a href="" class="upload">上传</a></li>
		<li><a href="" class="clear" onclick="ScameraNoDisplay();return false;">取消</a></li>
	</ul>
</div>
<div id="LineBG" class="line_bg"></div>
<div style="overflow: hidden;">
	<video id="Video" style="position: absolute; background-color: #000;"></video>
</div>
<canvas id="Camera" style="position: absolute; z-index: 2; display: none;"></canvas>
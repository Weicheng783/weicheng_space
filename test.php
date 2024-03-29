<!DOCTYPE html>
<html>
<head>
	<meta charset="gbk">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>html5调用摄像头实现拍照本地保存</title>
	
</head>
<body>
<video id="video" autoplay=""style='width:640px;height:480px'></video>
<button id="paizhao">拍照</button> 
<button onClick="saveFile(filename);" type="button">下载图片</button>
 
<canvas id="canvas" width="640" height="480"></canvas>
<script type="text/javascript">
	
	var video=document.getElementById("video");
	var context=canvas.getContext("2d");
	var errocb=function(){
		console.log("sth srong");
	}
	//调用电脑摄像头并将画面显示在网页
	if(navigator.getUserMedia){
		navigator.getUserMedia({"video":true},function(stream){
			video.src=stream;
			video.play();
		},errocb);
	}else if(navigator.webkitGetUserMedia){
		navigator.webkitGetUserMedia({"video":true},function(stream){
			video.src=window.webkitURL.createObjectURL(stream);
			video.play();
		},errocb);
	}
	//利用canvas 将当前video的画面画到canvas标签节点中
	document.getElementById("paizhao").addEventListener("click",function(){
		context.drawImage(video,0,0,640,480);
	});

	//下面的代码是保存canvas标签里的图片并且将其按一定的规则重命名
	var type = 'png';

	var _fixType = function(type) {
    type = type.toLowerCase().replace(/jpg/i, 'jpeg');
    var r = type.match(/png|jpeg|bmp|gif/)[0];
    return 'image/' + r;
};
/**
 * @param  {String} filename 文件名
 */
	var saveFile = function(filename){
	//获取canvas标签里的图片内容
	var imgData = document.getElementById('canvas').toDataURL(type);
	imgData = imgData.replace(_fixType(type),'image/octet-stream');
	
    var save_link = document.createElementNS('http://www.w3.org/1999/xhtml', 'a');
    save_link.href = imgData;
    save_link.download = filename;
   
    var event = document.createEvent('MouseEvents');
    event.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
    save_link.dispatchEvent(event);
};
   
    // 下载后的文件名规则
	var filename = (new Date()).getTime() + '.' + type;
	
</script>
</body>
</html>
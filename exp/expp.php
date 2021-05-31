<?php

if ($this-&gt;request-&gt;isAjax()) {
        $param = input('post.');
        $pic = isset($param['pic']) ? $param['pic'] : '';
        if($pic != ''){
           $pic_url = up_base64img($pic);
           return ['code' =&gt; 1, 'url' =&gt; $pic_url, 'msg' =&gt; '上传成功'];
        }    
}
function up_base64img($img_data) {
    $img_data = trim($img_data);
    if (!empty($img_data)) {
 
        $reg = '/data:image\/(\w+?);base64,(.+)$/si';
        preg_match($reg, $img_data, $match_result);
        $file_name = date("his") . '_' . rand(10000, 99999) . '.' . $match_result[1];
        //定义图片储存文件目录
        $dir = DIR_IMAGE . 'images/house/' . date('ym');
        $path = 'house/' . date('ym') . '/' . $file_name;
 
        if (!is_dir($dir)) {
            //如果不存在就创建该目录
            mkdir($dir, 0777, true);
        }
        $pic_path = $dir . '/' . $file_name;
        $num = file_put_contents($pic_path, base64_decode($match_result[2]));
        if (!empty($num)) {
            //上传成功之后，再进行缩放操作
            //$image = \think\Image::open($logo_path);
            // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
            //$image-&gt;thumb(102, 36)-&gt;save($logo_path);
            return $path;
        } else {
            return '';
        }
    } else {
        return '';
    }
}

?>
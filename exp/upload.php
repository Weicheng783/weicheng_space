<?php

  $str = $_POST['str'];
  $type = $_POST['type'];
 
  switch($type){
   case 'image/png':
    $ext='.png';
    break;
   case 'image/jpeg';
    $ext='.jpeg';
    break;
   case 'image/jpeg':
    $ext='.jpg';
    break;
   case 'image/bmp':
    $ext='.bmp';
    break;
   default:
    $ext='.jpg';
  }
  $file_path='./Uploads/'.date('Ymd').'/'.time().$ext;
  if(!file_exists(dirname($file_path))){
   mkdir(dirname($file_path),0777,true);
  }
  $img_content = str_replace('data:'.$type.';base64,','',$str);
  $img_content = base64_decode($img_content);
  $result =file_put_contents($file_path,$img_content);

?>
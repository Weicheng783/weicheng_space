
<?php
    const APP_ID = '24274364';
    const API_KEY = 'dFlggY9vGUbTPwvhhUGIsRhN';
    const SECRET_KEY = 'ETeqtySRqHzCqXxk3pEccTQbt1EXVaMI';
//  @ header("Content-Type:image/png");
    //  $imagespath = $_GET['imagespath'];

 $imagespath = "C:/wamp64/www/weicheng_space/face.jpg";

    //  $vms_ini_path=dirname(dirname(dirname(dirname(__FILE__)))).'\vms.ini';//vms.ini文件绝对路径
    //  $ini_array = parse_ini_file($vms_ini_path);
    //  $imagespath = $ini_array['CAPTURE_PATHNAME'].$imagespath;

//  echo "<script>alert('$imagespath');</script>";


    // $encode = base64_encode(file_get_contents($imagespath));
    $encode = $_REQUEST['facialid'];



//  echo file_get_contents($imagespath);
// echo $encode;

//  function isExist($path){
//      if (!is_dir($path)){
//          echo "<script>alert('false');</script>";
//          return false;
//      }else{
//          return true;
//      }
//  }
  
  
 //声明需要创建的图层的图片格式
 //@ header("Content-Type:image/png");
  
 //echo file_get_contents("C:\VMS_CAPTURE\hulu.png");
  
  
?>



<?php

    function request_post($url = '', $param = '' ) {
            if (empty($url) || empty($param)) {
                // var_dump($param);
                return false;
            }
            
            $postUrl = $url;
            $curlPost = $param;
            $curl = curl_init();//初始化curl
            
            curl_setopt($curl, CURLOPT_URL,$postUrl);//抓取指定网页
            curl_setopt($curl, CURLOPT_HEADER, 0);//设置header
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
            curl_setopt($curl, CURLOPT_POST, 1);//post提交方式
            curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

            $data = curl_exec($curl);//运行curl
            curl_close($curl);

            return $data;
        }

    $url = 'https://aip.baidubce.com/oauth/2.0/token';
    $post_data['grant_type']       = 'client_credentials';
    $post_data['client_id']      = 'UPGc3z7avSjUPiiOi2A1eBjZ';
    $post_data['client_secret'] = 'IsxXPnhY7ZBfaI5saH1vsyngLoCNMG66';
    $o = "";
    foreach ( $post_data as $k => $v ) 
    {
        $o.= "$k=" . urlencode( $v ). "&" ;
    }
    $post_data = substr($o,0,-1);

    $res = request_post($url, $post_data);

    var_dump($res);

    $transit = json_decode($res,1);
    $access_token = $transit['access_token'];

    var_dump($access_token);

    // echo "<script>alert('$aacc');</script>";


    // function checkPictureToCheckFace($image_path, $access_token) {
    //     $url = 'https://aip.baidubce.com/rest/2.0/face/v3/detect?access_token=' . $access_token;
    //     $param = array(
    //         'image' => base64EncodeImage($image_path),
    //         'image_type' => 'BASE64',
    //         'face_field' => 'quality'
    //     );
    //     $param = json_encode($param);
    //     $result = execCurl1($url, $param);
    //     if($result['result'] == false) return $result;
    //     $data = json_decode($result['data'], true);
    //     if($data['error_code'] != 0) return array('result' => false, 'err_msg' => '上传的人脸不符合要求，请重新上传五官清晰的真实头像');
    //     $err_result = array('result' => false, 'err_msg' => '上传的人脸不符合要求，请重新上传五官清晰的真实头像!');
    //     $quality = $data['result']['face_list'][0]['quality'];
    //     if($quality['occlusion']['left_eye'] > 0.6) return $err_result; // 左眼被遮挡的阈值
    //     if($quality['occlusion']['right_eye'] > 0.6) return $err_result; // 右眼被遮挡的阈值
    //     if($quality['occlusion']['nose'] > 0.7) return $err_result; // 鼻子被遮挡的阈值
    //     if($quality['occlusion']['mouth'] > 0.7) return $err_result; // 嘴巴被遮挡的阈值
    //     if($quality['occlusion']['left_cheek'] > 0.8) return $err_result; // 左脸颊被遮挡的阈值
    //     if($quality['occlusion']['right_cheek'] > 0.8) return $err_result; // 右脸颊被遮挡的阈值
    //     if($quality['occlusion']['chin_contour'] > 0.6) return $err_result; // 下巴被遮挡阈值
    //     if($quality['blur'] != 0 && $quality['blur'] > 0.7) return $err_result; // 模糊度范围 0是最清晰，1是最模糊
    //     if($quality['illumination'] < 40) return $err_result; // 光照范围 
    //     if($quality['completeness'] == 0) return $err_result; // 人脸完整度 0为人脸溢出图像边界，1为人脸都在图像边界内
    //     return array('result' => true);
    // }
     
    // function execCurl1($url, $param) {
    //     if (empty($url) || empty($param)) {
    //         return array('result' => false, 'err_msg' => 'url or param is null');
    //     }
    //     $curl = curl_init();//初始化curl
    //     curl_setopt($curl, CURLOPT_URL, $url);//抓取指定网页
    //     curl_setopt($curl, CURLOPT_HEADER, 0);//设置header
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
    //     curl_setopt($curl, CURLOPT_POST, 1);//post提交方式
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
    //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    //     $data = curl_exec($curl);//运行curl
    //     $curl_err_msg = curl_error($curl);
    //     curl_close($curl);
    //     if($data === false) {
    //         return array('result' => false, 'err_msg' => $curl_err_msg);
    //     }else {
    //         return array('result' => true, 'data' => $data);
    //     }
    // }
     
    // function base64EncodeImage($image_path) {
    //     $base64_image = '';
    //     $image_info = getimagesize($image_path);
    //     $image_data = fread(fopen($image_path, 'r'), filesize($image_path));
    //     $base64_image = chunk_split(base64_encode($image_data));
    //     return $base64_image;
    // }
     
    // $image_path = 'face.jpg';
    // // $access_token = '上一步的获取access token';
    // $result = checkPictureToCheckFace($image_path, $access_token);

?>


<?php
/**
 * 发起http post请求(REST API), 并获取REST请求的结果
 * @param string $url
 * @param string $param
 * @return - http response body if succeeds, else false.
 */
function detect_face($url = '', $param = '')
{
    if (empty($url) || empty($param)) {
        return false;
    }

    $postUrl = $url;
    $curlPost = $param;
    // 初始化curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $postUrl);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    // 要求结果为字符串且输出到屏幕上
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // post提交方式
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    // 运行curl
    $data = curl_exec($curl);
    curl_close($curl);

    return $data;
}

$token = $access_token;
// $url = 'https://aip.baidubce.com/rest/2.0/face/v3/detect?access_token=' . $token; //detect
$url = 'https://aip.baidubce.com/rest/2.0/face/v3/search?access_token=' . $token; //search
// $bodys = '{"image":"027d8308a2ec665acb1bdf63e513bcb9","image_type":"FACE_TOKEN","face_field":"faceshape,facetype"}';
// $bodys = '{"image":"'.$encode.'","image_type":"BASE64","face_field":"faceshape,facetype"}';
$bodys = "{\"image\":\"'.$encode.'\",\"image_type\":\"BASE64\",\"group_id_list\":\"figure\",\"quality_control\":\"NORMAL\",\"liveness_control\":\"NORMAL\"}";
$res = detect_face($url, $bodys);

var_dump($res);

$feedback1 = json_decode($res,1);
var_dump($feedback1['result']['user_list'][0]);
$feedback = json_encode($feedback1['result']['user_list'][0]);

$res_feed = json_decode($feedback,1);

if($feedback1['error_code'] == 0 & $res_feed['score'] > 60.00){
    var_dump($res_feed['user_id']);
    var_dump($res_feed['score']);
    //从这里开始 百度语音合成!
    //remove the music file.
    if(file_exists("audio.mp3")){
        unlink("audio.mp3");
    }

    include 'AipSpeech.php';

    // 你的 APPID AK SK

    // 这里结束
    $client1 = new AipSpeech(APP_ID, API_KEY, SECRET_KEY);

    
        $resultedsub = $client1->synthesis('人脸核验成功！用户：'.$res_feed['user_id'].'。 相似度得分：'.$res_feed['score'], 'zh', 1, array(
            'vol' => 5,
            // 'per' => 3,
        ));
        
        //科大讯飞语音合成
        // include './vendor/autoload.php';

        // $appId = '';// 需要填入app_id
        // $apiKey = '';// 需要填入api_key
        // $apiSecret = '';// 需要填入api_secret

        // $client = new IFlytek\Xfyun\Speech\TtsClient($appId, $apiKey, $apiSecret);
        // file_put_contents('./result.mp3', $client->request('欢迎使用科大讯飞语音能力，让我们一起用人工智能改变世界')->getBody());

        // 识别正确返回语音二进制 错误则返回json 参照下面错误码
        if(!is_array($resultedsub)){
            file_put_contents('audio.mp3', $resultedsub);
            // system("wmplayer.exe audio.mp3");
            // global $audio_var = 1; // This indicates a successful fetch.
            $myfile = fopen("audio_var.txt", "w") or die("Unable to open file!");
            // $txt = "Bill Gates\n";
            $txt = "1";
            fwrite($myfile, $txt);
            // $txt = "Steve Jobs\n";
            // fwrite($myfile, $txt);
            fclose($myfile);
            
        }else{
            echo "<script>alert('语音调用失败了。请重试试。');</script>";
        }
        echo "<script>location.href='index.php'</script>";
}else{
  //从这里开始 百度语音合成!
    //remove the music file.
    if(file_exists("audio.mp3")){
        unlink("audio.mp3");
    }

    include 'AipSpeech.php';

    // 你的 APPID AK SK

    // 这里结束
    $client1 = new AipSpeech(APP_ID, API_KEY, SECRET_KEY);


    $resultedsub = $client1->synthesis('人脸核验未通过！图片错误或分值低于60。错误码：'.$feedback1['error_code'].'。错误信息：'.$feedback1['error_msg'].'。可能的相似度得分'.$res_feed['score'].'。请重试。', 'zh', 1, array(
            'vol' => 5,
            // 'per' => 3,
        ));
        
        //科大讯飞语音合成
        // include './vendor/autoload.php';

        // $appId = '';// 需要填入app_id
        // $apiKey = '';// 需要填入api_key
        // $apiSecret = '';// 需要填入api_secret

        // $client = new IFlytek\Xfyun\Speech\TtsClient($appId, $apiKey, $apiSecret);
        // file_put_contents('./result.mp3', $client->request('欢迎使用科大讯飞语音能力，让我们一起用人工智能改变世界')->getBody());

        // 识别正确返回语音二进制 错误则返回json 参照下面错误码
        if(!is_array($resultedsub)){
            file_put_contents('audio.mp3', $resultedsub);
            // system("wmplayer.exe audio.mp3");
            // global $audio_var = 1; // This indicates a successful fetch.
            $myfile = fopen("audio_var.txt", "w") or die("Unable to open file!");
            // $txt = "Bill Gates\n";
            $txt = "1";
            fwrite($myfile, $txt);
            // $txt = "Steve Jobs\n";
            // fwrite($myfile, $txt);
            fclose($myfile);
            
        }else{
            echo "<script>alert('语音调用失败了。请重试试。');</script>";
        }
        echo "<script>location.href='index.php'</script>";  
}

?>
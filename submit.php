<?php
    const APP_ID = '24274364';
    const API_KEY = 'dFlggY9vGUbTPwvhhUGIsRhN';
    const SECRET_KEY = 'ETeqtySRqHzCqXxk3pEccTQbt1EXVaMI';
            //remove the music file.
            if(file_exists("audio.mp3")){
                unlink("audio.mp3");
            }

    header("content-type:text/html;charset=utf-8");
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "diary";
    $conn = new mysqli($servername,$db_username,$db_password,$db_name);

    if($conn -> connect_error){
        die("Connection Failed! Please Check your database.".$conn->connect_error);
    }else{
        // echo "<script>alert('登录成功咯~');</script>";
    }

    $conn -> query("set names utf8");

    $emotion = $_REQUEST['emotion'];
    $texts = $_REQUEST['texts'];
    $sql="INSERT INTO `daily_diary` (`no`, `emotion`, `texts`) VALUES (NULL, '$emotion', '$texts')";


    $re=mysqli_query($conn,$sql);
    if($re){
                //从这里开始 百度语音合成！  

                //remove the music file.
                if(file_exists("audio.mp3")){
                    unlink("audio.mp3");
                }

                include 'AipSpeech.php';

                // 你的 APPID AK SK
        
                // 这里结束
                $client1 = new AipSpeech(APP_ID, API_KEY, SECRET_KEY);
        
                if($re){
                    $resultedsub = $client1->synthesis('啦啦啦~。 新选项已添加成功！加油哦！', 'zh', 1, array(
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
    }else{
        echo "<script>alert('失败了。请重试试。');location.href='index.php'</script>";
    }
    // location.href='index.html'
    // $result = mysqli_query($conn,"SELECT * FROM daily_diary");
    // if($result != NULL){
    //     echo "<script>alert('查询成功咯~');</script>";
    // }else{
    //     echo "<script>alert('查询失败了。请重试试。');</script>";
    // }

    // echo "<table border='1'>
    //     <tr>
    //     <th>Emotion</th>
    //     <th>Memos</th>
    //     </tr>";

    // while($row = mysqli_fetch_assoc($result))
    // {
    //     echo "<tr>";
    //     echo "<td>".$row['emotion']."</td>";
    //     echo "<td>".$row['texts']."</td>";
    //     echo "</tr>";
    // }
    
    // echo "</table>";

    // mysql_close($con);

?>
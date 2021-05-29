<?php
    header("content-type:text/html;charset=utf-8");
    $flag = $_REQUEST['flag'];
    if($flag != 1 & $flag != null){
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
    
        $event = $_REQUEST['res1'];
        $event_date = $_REQUEST['res2'];
        $sql="INSERT INTO `events` (`id`, `name`, `date`) VALUES (NULL, '$event', '$event_date')";
    
        $re=mysqli_query($conn,$sql);
        if($re){
            echo "<script>location.href='index.php'</script>";
        }else{
            echo "<script>alert('失败了。请重试试。');location.href='index.php'</script>";
        }
    }else{
        echo "<script>alert('Flag Set to 1, 重新输入咯');location.href='index.php'</script>";    
    }



?>
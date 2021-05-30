<?php
    
    if($_REQUEST['checkedobj'] == null | $_REQUEST['checkedobj'] == ""){echo "<script>location.href='index.php'</script>";}
    else{
        $del_array = explode(",",$_REQUEST['checkedobj']);
        
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

        for($x=0; $x<count($del_array); $x++){
            $sql = "DELETE FROM `daily_diary` WHERE `daily_diary`.`no` = $del_array[$x]";
            $re=mysqli_query($conn,$sql);
        }

        if($re){
            echo "<script>location.href='index.php'</script>";
        }else{
            echo "<script>alert('列表中有项目失败了。请重试试。');location.href='index.php'</script>";
        }

    }
?>
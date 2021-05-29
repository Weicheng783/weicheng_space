<?php
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
        echo "<script>location.href='index.php'</script>";
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
<html>

<body>

<?php
    header("content-type:text/html;charset=utf-8");
    include ("index.html");
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "diary";
    $conn = new mysqli($servername,$db_username,$db_password,$db_name);

    $conn -> query("set names utf8");
    $result = mysqli_query($conn,"SELECT * FROM daily_diary");

    $number = mysqli_num_rows($result);

    echo "<table border='5' class='good' align='center' bordercolor='lightpurple'>
        <tr class='good'>
        <th class='good'>NO.</th>
        <th class='good'>Emotion</th>
        <th class='good'>Memos</th>
        </tr>";

    $curr_num = 0;
    while($row = mysqli_fetch_assoc($result))
    {
        $curr_num ++;
        echo "<tr>";
        echo "<td> <input type='checkbox' name='check_boxes' value='".$row['no']."' id='".$curr_num."'>".$row['no']."</td>";

        echo "<td>".$row['emotion']."</td>";
        echo "<td>".$row['texts']."</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    echo '<input type="button" style="align:center; " id="header_button" onclick="enumerate()">Delete Them all!</button>';
    // echo '<form action="delete.php" method="post">';
    // echo '<input type="submit" value="Delete" id="header_button" onclick="" />';
    // echo '</form>';

    echo "<script>";
    echo "var current_checked_obj = 0;";
    echo "function enumerate(){
        if(confirm('是否确认删除所选行？')){
            alert('点击了确定');
            current_checked_obj = 0;
            var array=new Array($number);
            var checked_obj = new Array();
            
            var text = '$number';
            console.dir(text);

            for(var i=0; i<$number; i++){
                // console.dir(i);
                var curr_obj = document.getElementsByName('check_boxes');
                array[i] = curr_obj[i].value;
                console.dir(array[i]);
                if(curr_obj[i].checked){
                    console.dir(array[i]+'checked!');
                    checked_obj[current_checked_obj]=array[i];
                    
                    location.href='index.php?str='+checked_obj[current_checked_obj];

                    console.dir(current_checked_obj);

                    del_process(current_checked_obj);
                    current_checked_obj ++;
                    
                }else{
                    // console.dir(array[i]+'unchecked!');
                }

            }
        }else{
            alert('点击了取消');
        }
    }";
    // echo "enumerate();";
    echo "</script>";


?>

<script>
    function del_process(no){
        console.dir('del_process start!');
        alert('<?php
            $curr= (int)$_GET["str"];
            $sql="DELETE FROM `daily_diary` WHERE `daily_diary`.`no` = '$curr'";
            $re=mysqli_query($conn,$sql);
            if($re){
                echo "更新成功咯~";
            }else{
                echo "失败了。请重试试。";
            }
            ?>');

        location.href='index.php';
 

    }
</script>
</body>

</html>
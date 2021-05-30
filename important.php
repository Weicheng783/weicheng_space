<html>
    <head></head>
    
    <body>
        <p class="narrator" style="font-size: x-large; text-align: left; color:brown;">Recent Important INFO：近期要事通知</p> 
        
        <!-- <table border='5' class='good1' align='center' bordercolor='lightpurple'>
        <tr class='good1'>
        <th class='good1'>Box</th>
        <th class='good1'>ID</th>
        <th class='good1'>Event</th>
        <th class='good1'>Goal Date</th>
        </tr> -->
        
        <p class="narrator" style="font-size: x-large; text-align: center; color:crimson;">2021.05-06进入期末考试期</p>
        <?php
            include ("table.html");
            $servername1 = "localhost";
            $db_username1 = "root";
            $db_password1 = "";
            $db_name1 = "diary";
            $conn1 = new mysqli($servername1,$db_username1,$db_password1,$db_name1);
        
            $conn1 -> query("set names utf8");
            $result1 = mysqli_query($conn1,"SELECT * FROM events");
        
            $number1 = mysqli_num_rows($result1);

            function diffBetweenTwoDays ($day1, $day2)
            {
                $second1 = strtotime($day1);
                $second2 = strtotime($day2);
                    
                // if ($second1 < $second2) { 取绝对值
                    $tmp = $second2;
                    $second2 = $second1;
                    $second1 = $tmp;
                // }
                return ($second1 - $second2) / 86400;
            }
        
            $curr_num = 0;
            while($row = mysqli_fetch_assoc($result1))
            {
                $curr_num ++;
                echo "<tr>";
                echo "<td><font size='5'> <input type='checkbox' name='event_boxes' value='".$row['id']."' id='".$curr_num."'>".$row['id']."</td>";
                echo "<td><font size='5'>".$row['id']."</td>";
                echo "<td><font size='5'>".$row['name']."</td>";
                $day2 = $row['date'];
                echo "<td><font size='5'>".$day2."</td>";
                $day1 = date("Y-m-d");
                $diff = diffBetweenTwoDays($day1, $day2);
                if ($diff <= 3 & $diff > 0){
                    echo "<td bgcolor='#E64558'><font size='5' color='white'>".$diff." Days</td>";
                }else if($diff > 3 & $diff <= 6){
                    echo "<td bgcolor='#F09E48'><font size='5' color='white'>".$diff." Days</td>";
                }else if($diff > 6 & $diff <= 10){
                    echo "<td bgcolor='#D9CD4C'><font size='5' color='white'>".$diff." Days</td>";
                }else if($diff > 10 & $diff <= 20){
                    echo "<td bgcolor='#48F04C'><font size='5' color='white'>".$diff." Days</td>";
                }else if($diff == 0){
                    echo "<td bgcolor='#E64558'><font size='5' color='white'>就在今天</td>";
                }else if($diff > 20){
                    echo "<td bgcolor='#4ADEEB'><font size='5' color='white'>".$diff." Days</td>";
                }else{
                    echo "<td bgcolor='#4ADEEB'><font size='5' color='white'>已完成</td>";
                }
                
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>
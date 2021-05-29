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

        
            $curr_num = 0;
            while($row = mysqli_fetch_assoc($result1))
            {
                $curr_num ++;
                echo "<tr>";
                echo "<td> <input type='checkbox' name='event_boxes' value='".$row['id']."' id='".$curr_num."'>".$row['id']."</td>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>
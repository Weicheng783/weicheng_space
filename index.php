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
    echo "<table border='5' class='good' align='center' bordercolor='lightpurple'>
        <tr class='good'>
        <th class='good'>NO.</th>
        <th class='good'>Emotion</th>
        <th class='good'>Memos</th>
        </tr>";

    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td> <input type='checkbox' name='".$row['no']."' value='0'>".$row['no']."</td>";

        echo "<td>".$row['emotion']."</td>";
        echo "<td>".$row['texts']."</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    // echo '<button type="button" style="align:center; " id="header_button" onclick="">Delete Them\' all!</button>';
    
    echo '<form action="delete.php" method="post">';
    echo '<input type="submit" value="Delete" id="header_button" />';
    echo '</form>'
?>


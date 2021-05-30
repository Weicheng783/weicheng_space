<html>

<body>

<?php

    header("content-type:text/html;charset=utf-8");
    $table_var = 0;
    include ("header.html");

    include ("important.php");
    
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

    echo '<input type="button" style="align:center; margin-left:25%;" id="header_button" onclick="enumerate()" value="Delete Them all!">';
    // echo '<form action="delete.php" method="post">';
    // echo '<input type="submit" value="Delete" id="header_button" onclick="" />';
    // echo '</form>';

    echo "<script>";
    echo "var current_checked_obj = 0;";
    echo "function enumerate(){
            current_checked_obj = 0;
            var array=new Array($number);
            var checked_obj = new Array();

            var text = '$number';
            console.dir(text);

            for(var i=0; i<$number; i++){
                // console.dir(i);
                    var curr_obj = document.getElementsByName('check_boxes');

                    // var curr_obj = document.getElementsByName('event_boxes');

                

                array[i] = curr_obj[i].value;
                console.dir(array[i]);
                if(curr_obj[i].checked){
                    console.dir(array[i]+'checked!');
                    checked_obj[current_checked_obj]=array[i];
                    console.dir(current_checked_obj);
                    current_checked_obj ++;
                    
                }else{
                    // console.dir(array[i]+'unchecked!');
                }
                
                var input_box = document.getElementById('fetch_obj');
                input_box.value = checked_obj;

            }
    }";

    echo "function enumerate2(){
        current_checked_obj = 0;
        var array=new Array($number1);
        var checked_obj = new Array();

        var text = '$number1';
        console.dir(text);

        for(var i=0; i<$number1; i++){
            // console.dir(i);
                // var curr_obj = document.getElementsByName('check_boxes');

                var curr_obj = document.getElementsByName('event_boxes');

            

            array[i] = curr_obj[i].value;
            console.dir(array[i]);
            if(curr_obj[i].checked){
                console.dir(array[i]+'checked!');
                checked_obj[current_checked_obj]=array[i];
                console.dir(current_checked_obj);
                current_checked_obj ++;
                
            }else{
                // console.dir(array[i]+'unchecked!');
            }
            
            var input_box = document.getElementById('fetch_obj2');
            input_box.value = checked_obj;

        }
}";
    // echo "enumerate();";
    echo "</script>";

    include ("delete.html");

?>

    <footer>
    <p style="font-family:'Trebuchet MS','Lucida Sans Unicode','Lucida Grande','Lucida Sans',Arial,sans-serif; text-align:center;">Weicheng Ao, Canary Edition 5/27|2021 - 5/28|2021 © All Rights Reserved.</p>
    <!-- <p>Contact information: <a href="mailto:someone@example.com">someone@example.com</a>.</p> -->
    </footer>

    <p style="background-color:#E64558; color:white; ">C1</p> 
    <p style="background-color:#F09E48; color:white; ">C2</p>
    <p style="background-color:#D9CD4C; color:white; ">C3</p>
    <p style="background-color:#48F04C; color:white; ">C4</p>
    <p style="background-color:#C64558; color:white; ">C5</p>
    <p style="background-color:#4ADEEB; color:white; ">C6</p>

    <audio autoplay="autoplay">
    <source src="audio.mp3" type="audio/mp3" id="audio_play">
        Your browser does not support the audio element. 您的浏览器不支持 audio 元素。
    </audio>
</body>

</html>
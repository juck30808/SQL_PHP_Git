﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> 學生成績管理系統 </title>
</head>

<body>
<h3>學生成績管理系統-查詢</h3>
<hr>

<?php
        $no1 = $_POST["no1"];
         // 建立MySQL的資料庫連接 
        $link = mysqli_connect("localhost","root","","class")
        or die("無法開啟MySQL資料庫連接!<br>");
        $sql = "SELECT * FROM `score` WHERE $no1 = no1"; 
        mysqli_query($link, 'SET NAMES utf8');
        $result = mysqli_query($link,$sql);
        $total_records = mysqli_num_rows($result);
        echo "</br>";  
        if($total_records!=0){
            // 顯示每一筆記錄
            $tableName = array("學號","姓名","考試成績","作業成績","專題成績",);
            // 一筆一筆的以表格顯示記錄
            echo "<table border=0>";
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td>".$tableName[0].": "."</td><td>" . $row[0] ."<br>". "</td></tr>";
                echo "<tr><td>".$tableName[1].": "."</td><td>" . $row[1] ."<br>". "</td></tr>";
                echo "<tr><td>".$tableName[2].": "."</td><td>" . $row[2] ."<br>". "</td></tr>";
                echo "<tr><td>".$tableName[3].": "."</td><td>" . $row[4] ."<br>". "</td></tr>";
                echo "<tr><td>".$tableName[4].": "."</td><td>" . $row[3] ."<br>". "</td></tr>";
                
            }

            echo "</table>";
            $result->close();    // 釋放佔用的記憶體  
            mysqli_close($link);  // 關閉資料庫連接
        }
        else{
            echo "學號:". $no1;
            echo "</br>";
            echo "</br>";
            echo "<font color='red'>!資料不存在!</font> </br>";
            echo "</br>";  
        }
        echo "</br>";  
        echo "<form name='info' method='post' action='search.php'>";
        echo "    <input type='submit' value='回查詢畫面' >";
        echo "</form>";
        echo "<form name='info' method='post' action='home.php'>";
        echo "    <input type='submit' value='回主畫面'>";
        echo "</form>";

?>
<hr>
</body>
</html>
<?php

include 'conn.php';
$pid="";
$parts="";
$return["lock"]="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = trim($_POST['pid']);
    $parts = trim($_POST['parts']);
    }
$sql=("SELECT `state` FROM `lock` where pid = '$pid' AND parts ='$parts'");
$result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        // 每跑一次迴圈就抓一筆值，最後放進data陣列中
        $return["lock"] = $row;
    }

  header('Content-Type: application/json');   //讓瀏覽器知道它是一個 json 的格式
  echo json_encode($return);  //將陣列轉換成JSON的格式
    
       

       









?>
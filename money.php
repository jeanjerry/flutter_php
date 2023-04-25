<?php

include 'conn.php';
$account="";
$return["coin"]="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = trim($_POST['account']);
    }
$sql=("SELECT `coin` from `co` WHERE account = '$account'");
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result)) {
        // 每跑一次迴圈就抓一筆值，最後放進data陣列中
        $return["coin"] = $row;
    }
}
  header('Content-Type: application/json');   //讓瀏覽器知道它是一個 json 的格式
  echo json_encode($return);  //將陣列轉換成JSON的格式
    
       

?>
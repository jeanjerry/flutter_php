<?php

include 'conn.php';
$password="";
$account="";
$return["error"]=false;
$return["test"]="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = trim($_POST['account']);
    $password = trim($_POST['password']);
    }
//$sql=$conn->query("SELECT * FROM `co` WHERE account LIKE '%$account%'");
$sql=("SELECT * FROM `co` where account = '$account' AND password = '$password'");
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    //echo "登录成功";
    $return["error"]= "登入成功";
    while ($row = mysqli_fetch_assoc($result)) {
        // 每跑一次迴圈就抓一筆值，最後放進data陣列中
        $return["test"] = $row;
    }
  } else {
    //echo "登录失败";// 登录失败
    $return["error"]= "登入失敗";
  }
  
  header('Content-Type: application/json');   //讓瀏覽器知道它是一個 json 的格式
  echo json_encode($return);  //將陣列轉換成JSON的格式
    
       

       









?>
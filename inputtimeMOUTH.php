<?php

include 'conn.php';
$time="";
$account="";
$action="";
$degree="";
$parts="";
$return["time"]="";
$return["action"]=false;
$return["times"]="";
$return["timeaction"]="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$time = trim($_POST['time']);
$account = trim($_POST['account']);
$action = trim($_POST['action']);
$degree = trim($_POST['degree']);
$parts = trim($_POST['parts']);
}



$sql=("SELECT * FROM `mouth` where action = '$action' AND account='$account'");
$result = mysqli_query($conn, $sql);
$result1=$conn->query("SELECT `time` FROM `mouth` where time= '$time' AND account='$account'");


$result2=$conn->query("SELECT `times` FROM `mouth` where  time= '$time' AND account='$account'AND action = '$action'");
$result3=$conn->query("SELECT `times` FROM `mouth` where  times= '1' AND account='$account'AND action = '$action'");
$result4=$conn->query("SELECT `times` FROM `mouth` where  times= '2' AND account='$account'AND action = '$action'");


if ($result->num_rows > 0) {
    $return["action"]= "有訓練";
  } 
else {
    $return["action"]= "沒訓練";
  }
if ($result1->num_rows > 0) {
    $return["time"]= "有時間";
  } 
else {
    $return["time"]= "沒時間";
  }
if ($result2->num_rows > 0) {
    $return["timeaction"]= "對";
  }
if ($result3->num_rows > 0) {
    $return["times"]= "1次";
  } 
if ($result4->num_rows > 0) {
    $return["times"]= "2次";
  } 


  header('Content-Type: application/json');   //讓瀏覽器知道它是一個 json 的格式
  echo json_encode($return);  //將陣列轉換成JSON的格式

?>
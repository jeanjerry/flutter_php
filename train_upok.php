<?php

include 'conn.php';
$time="";
$account="";
$action="";
$degree="";
$parts="";
$times="";
$coin_add="";
$return["time"]="";
$return["action"]=false;
$coin=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$time = trim($_POST['time']);
$account = trim($_POST['account']);
$action = trim($_POST['action']);
$degree = trim($_POST['degree']);
$parts = trim($_POST['parts']);
$times = trim($_POST['times']);
$coin_add = trim($_POST['coin_add']);
}


$sql2 = $conn->query("select * FROM `action` where account = '$account'AND action = '$action'AND time = '$time'");
if ($sql2->num_rows > 0){
    $conn->query("update action set times='2' where account ='$account'AND action = '$action'AND time = '$time'");
    $conn->query("update trainup set times='2' where account ='$account'AND action = '$action'AND time = '$time'");
}
else{
    $sql =$conn->query("insert into action(times,time,degree,parts,action,account) 
    values('".$times."','".$time."','".$degree."','".$parts."','".$action."','".$account."')");
    $sql1 =$conn->query("insert into trainup(times,time,degree,parts,action,account) 
    values('".$times."','".$time."','".$degree."','".$parts."','".$action."','".$account."')");
}

$sql3 = $conn->query("select coin FROM `co` where account = 'airehab_01'");
echo "ok";
if ($sql3->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($sql3)) {
            // 每跑一次迴圈就抓一筆值，最後放進data陣列中
            $coin = $row;
            echo "ook";
        }
        (int)$coin=(int)$coin+(int)$coin_add;
    $conn->query("update co set coin= $coin where account ='airehab_01'");
    echo "oook";
    }
  
  

?>
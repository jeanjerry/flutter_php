<?php

include 'conn.php';
$time="";
$account="";
$action="";
$degree="";
$parts="";
$times="";
$coin_add="";
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
    $conn->query("update traindown set times='2' where account ='$account'AND action = '$action'AND time = '$time'");
}
else{
    $sql =$conn->query("insert into action(times,time,degree,parts,action,account) 
    values('".$times."','".$time."','".$degree."','".$parts."','".$action."','".$account."')");
    $sql1 =$conn->query("insert into traindown(times,time,degree,parts,action,account) 
    values('".$times."','".$time."','".$degree."','".$parts."','".$action."','".$account."')");
    
}

$sql3 = $conn->query("select coin FROM `co` where account = '$account'");

if ($sql3->num_rows > 0) {
    $row = mysqli_fetch_assoc($sql3) ;
            // 每跑一次迴圈就抓一筆值，最後放進data陣列中
            $coin = $row['coin'];
            echo"$coin";        
        (int)$coin=(int)$coin+(int)$coin_add;
        
    $conn->query("update co set coin= $coin where account ='$account'");
   
    }
  
  

?>
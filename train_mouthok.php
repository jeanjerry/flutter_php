<?php

include 'conn.php';
$time="";
$account="";
$action="";
$degree="";
$parts="";
$times="";
$return["time"]="";
$return["action"]=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$time = trim($_POST['time']);
$account = trim($_POST['account']);
$action = trim($_POST['action']);
$degree = trim($_POST['degree']);
$parts = trim($_POST['parts']);
$times = trim($_POST['times']);
}


$sql2 = $conn->query("select * FROM `action` where account = '$account'AND action = '$action'AND time = '$time'");

if ($sql2->num_rows > 0){
    $conn->query("update action set times='2' where account ='$account'AND action = '$action'AND time = '$time'");
    $conn->query("update mouth set times='2' where account ='$account'AND action = '$action'AND time = '$time'");
}
else{
    $sql =$conn->query("insert into action(times,time,degree,parts,action,account) 
    values('".$times."','".$time."','".$degree."','".$parts."','".$action."','".$account."')");
    $sql1 =$conn->query("insert into mouth(times,time,degree,parts,action,account) 
    values('".$times."','".$time."','".$degree."','".$parts."','".$action."','".$account."')");
}




  
  

?>
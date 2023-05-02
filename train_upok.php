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
$coin=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$time = trim($_POST['time']);
$account = trim($_POST['account']);
$action = trim($_POST['action']);
$degree = trim($_POST['degree']);
$parts = trim($_POST['parts']);
$times = trim($_POST['times']);
$coin = trim($_POST['coin']);
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

/*$sql3 = ("select coin FROM `co` where account = '$account'");
$result = mysqli_query($conn, $sql3);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
            // 每跑一次迴圈就抓一筆值，最後放進data陣列中
            $coin = $row;
        }
        $coin=$coin+10;
    $conn->query("update co set coin= $coin where account ='$account'");
    }*/
  
  

?>
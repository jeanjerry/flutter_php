<?php

include 'conn.php';

$notice="";
$time="";
$account="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$notice = trim($_POST['notice']);
$time = trim($_POST['time']);
$account = trim($_POST['account']);
}

$conn->query("insert into notice(notice,time,account) values('".$notice."','".$time."','".$account."')");
 

?>
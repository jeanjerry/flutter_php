<?php

include 'conn.php';

$account="";
$name="";
$nickname="";
$phone="";
$urgenname="";
$urgenphone="";
$birthday="";
$gender="";
$diagnosis="";
$affectedside="";
$age="";
$joindate="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$account = trim($_POST['account']);
$name = trim($_POST['name']);
$nickname = trim($_POST['nickname']);
$phone = trim($_POST['phone']);
$urgenname = trim($_POST['urgenname']);
$urgenphone = trim($_POST['urgenphone']);
$birthday = trim($_POST['birthday']);
$gender = trim($_POST['gender']);
$diagnosis = trim($_POST['diagnosis']);
$affectedside = trim($_POST['affectedside']);
$age = trim($_POST['age']);
$joindate = trim($_POST['joindate']);
}

$conn->query("update co set name='$name',nickname='$nickname',phone='$phone',urgenname='$urgenname',urgenphone='$urgenphone',
birthday='$birthday',gender='$gender',diagnosis='$diagnosis',affectedside='$affectedside',age='$age',joindate='$joindate' where account ='$account'");
 

?>
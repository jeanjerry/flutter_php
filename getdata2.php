<?php

include 'conn.php';
$account="";
$time="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = trim($_POST['account']);
    $time = trim($_POST['time']);
    }
$sql = $conn->query("select * FROM `notice` where account = '$account'");
$sql1 = $conn->query("select * FROM `notice` where account = '$account'AND time = '$time'");

$res =array();
$res1 =array();
if ($sql1->num_rows > 0)
{
    while($row=$sql1->fetch_assoc())

    {
        $res[] = $row;
    }
    
    echo json_encode($res);
}
else
{
    while($row=$sql->fetch_assoc())

    {
        $res1[] = $row;
    }
    
    echo json_encode($res1);
}


?>
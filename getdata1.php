<?php

include 'conn.php';
$account="";
$action="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = trim($_POST['account']);
    $action = trim($_POST['action']);
    
    }
$sql = $conn->query("select * FROM `action` where account = '$account'");
$sql1 = $conn->query("select * FROM `action` where account = '$account'AND action = '$action'");

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
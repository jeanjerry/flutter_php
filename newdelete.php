<?php
    require_once('conn.php');

    $time="SELECT*FROM cycle ";
    $query=mysqli_query($conn,$time);
    $row=mysqli_fetch_row($query);

    date_default_timezone_set('Asia/Taipei');

    $now= date("Y-m-d H:i:s",strtotime('-8hours'));

    $minus=strtotime($now)-strtotime($row[1]);
    $minusdate=date("Y-m-d H:i:s",$minus);

    $d=strtotime("+7day",strtotime($row[1]));
    $nextdate=date("Y-m-d H:i:s",$d);

    if($minusdate>='1970-01-08 00:00:00'){
        $change="UPDATE cycle SET date ='$nextdate' where date='$row[1]'";
        if(mysqli_query($conn,$change)==FALSE ){
            echo 'ERROR';
            header("refresh:3;url=test.php");
        }else{
            $delete1="DELETE FROM mouth";
            $query1=$conn->query($delete1);
            $delete2="DELETE FROM trainup";
            $query2=$conn->query($delete2); 
            $delete3="DELETE FROM traindown";
            $query3=$conn->query($delete3); 
        }
    }
    
?>

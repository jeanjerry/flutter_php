<?php

include 'conn.php';
$account="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = trim($_POST['account']);
}
$conn->query("DELETE FROM trainup where account='$account'");
$conn->query("DELETE FROM traindown where account='$account'");
$conn->query("DELETE FROM mouth where account='$account'");
?>
<?php
include('server.php');
if (isset($_POST['email']) && connectdb())
{
$email = $_POST['email'];
$ip = $_SERVER['REMOTE_ADDR'];
$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM subscribe WHERE email='".$email."'"));
 if ($count[0]==0)
 {
 $res = mysql_query("INSERT INTO subscribe SET email='".$email."', ip='".$ip."'");
 if($res)
 {
 print 'true';
 }
 else
 {
 print 'false';
 }
 
 }
 else
 {
 print 'exists';
 }
}
?>
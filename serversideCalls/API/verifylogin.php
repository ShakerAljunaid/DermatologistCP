<?php
 header('Content-Type: application/json');
require_once('../../include/dbconfig.php');

if(isset($_REQUEST['phoneNo']) && isset($_REQUEST['password']) )
{	$parms=$_REQUEST;
$sql="select userID,userType,userName from useraccount where phoneNo='". $parms['phoneNo']."' and password='".md5($parms['password'])."' and usertype=18 and status=1;";
$res=current($pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC));
//echo $sql;
if($res)
 echo json_encode($res);
else
	echo $sql;
}
else echo 'Not set';
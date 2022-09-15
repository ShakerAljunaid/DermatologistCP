<?php
 header('Content-Type: application/json');
require_once('../../include/dbconfig.php');

if(isset($_REQUEST['phoneNo']) && isset($_REQUEST['password']) )
{	$parms=$_REQUEST;

$sql="select userID,userType,userName from useraccount where phoneNo='". $parms['phoneNo']."' ;";
$res=current($pdo->query($sql)->fetchAll());
if(!empty($res['userID']))
{	echo -1;}
else
{$sql="insert into useraccount(userType,userName,phoneNo,password,email)values(18,'".$parms['userName']."','".$parms['phoneNo']."','".md5($parms['password'])."','".$parms['email']."')";

$res=$pdo->query($sql);
if($res)
	echo 1;



}}
else echo 'Not set';
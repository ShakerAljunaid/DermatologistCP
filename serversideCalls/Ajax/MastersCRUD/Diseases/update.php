<?php
require_once('../../../../include/dbconfig.php');

if(isset($_POST['Id']) )
{	$parms=$_POST;
$sql="update skindisease
   set symptoms='".$parms['symptoms']."'
    ,treatment='".$parms['treatment']."'
	,	recommendations='".$parms['recommendations']."'
	,		definition='".$parms['definition']."'
        ,			causes='".$parms['causes']."'
	
	where Id=".$parms['Id'];

$res=$pdo->query($sql);
if($res)
{
	$sql="SELECT * FROM skindisease";
   $DocData = $pdo->query($sql)->fetchAll();
   echo json_encode($DocData);
}
else
	echo $sql;
}
else echo 'Not set';
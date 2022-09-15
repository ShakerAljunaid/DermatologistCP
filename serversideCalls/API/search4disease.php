<?php
require_once('../../include/dbconfig.php');

if(isset($_REQUEST['diseaseName']) ) 
{	$parms=$_REQUEST;
$sql="select  * from skindisease where name like '%".$_REQUEST['diseaseName']."%'";
$res=current($pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC));
//echo $sql;
if($res)
 echo json_encode($res);
else
	echo $sql;
}
else echo 'Not set';
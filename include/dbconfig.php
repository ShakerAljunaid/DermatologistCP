<?php

   
define('DB_SERVER', 'MYSQL5042.site4now.net');
define('DB_USERNAME', 'a78fdb_skindis');
define('DB_PASSWORD', 'Sa777304457');
define('DB_CHARSET', 'UTF8');
define('DB_DATABASE', 'db_a78fdb_skindis');



define('PDO_DSN', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE . ';charset=' . DB_CHARSET);
$pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
  session_start();   
	

?>
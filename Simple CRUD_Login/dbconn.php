<?php

$serverName = "UNSWEETENED\SQLEXPRESS";
$uid        = 'sa';
$pwd        = 'Mssql@123';

$connectionInfo = array( "UID"      =>  $uid        ,
                         "PWD"      =>  $pwd        ,
                         "Database" =>  "testDB"
                       );

$oConn = sqlsrv_connect( $serverName, $connectionInfo);
if( $oConn === false ) {
  print_r(sqlsrv_errors());
  die ('Unable to connect to the database'); # Unable to connect to the database
}

?>

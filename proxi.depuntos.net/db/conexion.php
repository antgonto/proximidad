<?php

function OpenCon()
 {
 $dbhost = "";
 $dbuser = "";
 $dbpass = "";
 $db = "";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". mysql_error());

 return $conn;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }

?>

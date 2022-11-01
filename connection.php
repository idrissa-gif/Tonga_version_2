<?php
session_start();
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass ="";
$dbname = "Tonga_travel_db";

/* You should enable error reporting for mysqli before attempting to make a connection */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);


/* Set the desired charset after establishing a connection */
$con->set_charset('utf8mb4');

///printf("Success... %s\n", $con->host_info);

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}


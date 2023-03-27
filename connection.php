<?php


// $servername = "sql309.epizy.com";
// $username = "epiz_33876600";
// $password = "sHPhJ3mmDpa";
// $dbname = "epiz_33876600_studentdb";
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//       }


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
      }
?>
<?php
$firstName= $_POST['firstName'];
$lastName= $_POST['lastName'];
$fatherName= $_POST['fatherName'];
$dob=$_POST['dob'];
$aadharNo=filter_input(INPUT_POST, "aadhar", FILTER_VALIDATE_INT);
$applicationNo=filter_input(INPUT_POST, "applicationNo", FILTER_VALIDATE_INT);
$email=filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$board12rollno=filter_input(INPUT_POST, "board12rollno", FILTER_VALIDATE_INT);
$mobile=filter_input(INPUT_POST, "mobile", FILTER_VALIDATE_INT);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
      }

$sql="INSERT INTO studtab1 (FirstName, LastName, fatherName, dob, aadharNo, ApplicationNo, Email, MobileNo, Board12rollno) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
  die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssiisii",
                     $firstName,
                     $lastName,
                     $fatherName,
                     $dob,
                     $aadharNo,
                     $applicationNo,
                     $email,
                     $mobile,
                     $board12rollno
                    );

mysqli_stmt_execute($stmt);
// echo ("$firstName,
// $lastName,
// $fatherName,
// $dob,
// $aadharNo,
// $applicationNo,
// $email,
// $mobile,
// $board12rollno");
echo "Record saved.";
?>
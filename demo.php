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

include 'connection.php';

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

echo "<p class='bg-success text-white' style='margin:1rem 10rem'>RECORD DATA SAVED<?p>
<div class='col-12 upload'>
<a href='upload.php' class='btn btn-lg btn-primary btn-block' type='submit'>Upload</a>
</div>
";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Block</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
      .table{
        width: 80%;
        margin: 0 8rem;
      }
      .h1{
        margin: 2rem 8rem;
        margin-top: 4rem;
      }
      .time{
        border-radius: 35px;
        position: absolute;
        display: inline-block;
        width: 300px;
        text-decoraradius: 40px;
        positiontion-line: none;
        padding: .7rem;
        top:5px;
        right: 5px;
      }
      .validate{
        display: inline-block;
        border-radius: 30px;
        width: 70px;
        height: 30px;
        text-align: center;
        text-decoration-line: none;
      }
      .upload{
        margin-left: 8rem;
      }
    </style>
</head>

<body>
</body>
</html>
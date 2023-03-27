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
    </style>
</head>

<body>
  <a href="#" class="time bg-dark text-light"><h4>Number of Registration: </h4><p class="text-center count">0</p></a>
  <h1 class="h1 text-primary">Student Registration details</h1>
  
  <?php
    include 'connection.php';
    
    $sql="select * from studtab1";
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Start table HTML
        echo "<table class='table table-bordered border-secondary table-hover table-success table-striped'>;
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Father's Name</th>
                <th>Date of Birth</th>
                <th>Aadhar Number</th>
                <th>Application Number</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>12 Roll Number</th>
                <th>Validation</th>
            </tr>";
        
        // Loop through rows and display data in table
        while($row = $result->fetch_assoc()) {
            echo "<tr class='tr'>
                <td class='sno fn'>" . $row["FirstName"] . "</td>
                <td>" . $row["LastName"] . "</td>
                <td>" . $row["fatherName"] . "</td>
                <td>" . $row["dob"] . "</td>
                <td>" . $row["aadharNo"] . "</td>
                <td>" . $row["ApplicationNo"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["MobileNo"] . "</td>
                <td>" . $row["Board12rollno"] . "</td>
                <td><a class='.btn validate bg-light text-dark' href='#'>Validate</a></td>
            </tr>";
        }
        
        // End table HTML
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>
<script>
    var c = document.querySelectorAll(".sno").length;
    document.querySelector(".count").innerHTML = c;

    for (let i = 0; i < document.querySelectorAll(".validate").length; i++) {
      document.querySelectorAll(".validate")[i].addEventListener("click", function () {
        
        if (confirm("Name: \nUID Number: \nGender: \nDOB: \nAddress: \n")) {
          document.querySelectorAll(".tr")[i].classList.add("border-warning");
        } else {
          document.querySelectorAll(".tr")[i].classList.add("border-danger");
        }
      });

    }
  </script>
</body>
</html>
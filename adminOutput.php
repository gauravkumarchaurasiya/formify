<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetching</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        th {
            background-color: #008CBA;
            color: white;
            font-weight: bold;
            text-align: left;
            padding: 8px;
        }
        td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentdb";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql="select * from studtab1";
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Start table HTML
        echo "<table>
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
            </tr>";
        
        // Loop through rows and display data in table
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["FirstName"] . "</td>
                <td>" . $row["LastName"] . "</td>
                <td>" . $row["fatherName"] . "</td>
                <td>" . $row["dob"] . "</td>
                <td>" . $row["aadharNo"] . "</td>
                <td>" . $row["ApplicationNo"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["MobileNo"] . "</td>
                <td>" . $row["Board12rollno"] . "</td>
            </tr>";
        }
        
        // End table HTML
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>
</body>
</html>

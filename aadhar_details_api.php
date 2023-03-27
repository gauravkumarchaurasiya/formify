<?php
echo 'api';
$aadhar_number=999955183433;
echo $aadhar_number;
function get_aadhar_details($aadhar_number) {
  // Remove all spaces and non-numeric characters from the Aadhar number
  $aadhar_number = preg_replace('/[^0-9]/', '', $aadhar_number);

  // Check if the Aadhar number is of the correct length and format
  if (strlen($aadhar_number) != 12 || !preg_match('/^[0-9]+$/', $aadhar_number)) {
    return array('status' => 'invalid', 'message' => 'Invalid Aadhar number');
  }

  // Simulate retrieving user details from a database based on the Aadhar number

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "studentdb";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
        }

    $sql="SELECT * FROM aadhar_details_api where aadhar=$aadhar_number;";
    // WHERE studtab1.aadharNo = $aadhar_number;";
    $result = $conn->query($sql);
    // echo $result;
    // Check if any rows were returned
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            $aadhar_details = array(
              'name' => $row['Name'],
              'dob' => $row['dob'],
              'gender' => $row['gender'],
              'address' => $row['address'],
              'aadhar_number' => $aadhar_number
            );
            
    } else {
        echo "0 results";
    }

  return array('status' => 'success', 'aadhar_details' => $aadhar_details);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['aadhar_number'])) {
    $aadhar_number = $_POST['aadhar_number'];
    $result = get_aadhar_details($aadhar_number);
    echo json_encode($result);

    // echo "<table>
    //         <tr>
    //             <th> Name</th>
    //             <th>Date of Birth</th>
    //             <th>Gender</th>
    //             <th>Address</th>
    //         </tr>";
        
    //     // Loop through rows and display data in table
    //     // while($row = $result->fetch_assoc()) {
    //   echo "<tr>
    //             <td>" . $result['aadhar_details']['name'] . "</td>
    //             <td>" . $result['aadhar_details']['dob'] . "</td>
    //             <td>" . $result['aadhar_details']['gender'] . "</td>
    //             <td>" . $result['aadhar_details']['address'] . "</td>

    //         </tr>";
    exit();
  }
}
?>


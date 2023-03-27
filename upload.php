<?php


error_reporting(E_ERROR | E_PARSE);
// Define the target directory where the PDF files will be saved
$target_dir = "pdfs/";

// Loop through each uploaded file
for($i = 1; $i <= 6; $i++) {
  $target_file = $target_dir . basename($_FILES["pdf{$i}"]["name"]);
  $uploadOk = 1;
  $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($target_file)) {
    // echo "<p class='bg-danger'>Sorry, file already exists.</p>";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["pdf{$i}"]["size"] > 5000000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($pdfFileType != "pdf") {
    // echo "<p class='bg-danger'>Sorry, only pdf are allowed.</p>";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["pdf{$i}"]["tmp_name"], $target_file)) {
      echo "<p class='bg-success text-white' style='margin:1rem 10rem'>The file ". basename( $_FILES["pdf{$i}"]["name"]). " has been uploaded.</p>";
    } else {
      // echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            background-color:#D5B4B4;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        .container {
            max-width: 960px;
        }
    </style>
</head>
<body class="bg-white">
    <div class="container">
        
        <div class="py-5 text-center">
            <h1>Upload Document</h1>
        </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- <input type="file" name="pdf_file"> -->
        <div class="col-12">
                                          <label for="registration_pdf" class="form-label">Fees Details<span
                                                  class="text-muted"> (Required)</span></label>
                                          <input  type="file" class="form-control" name="pdf1" accept = ".pdf" placeholder="Collective pdf" >
                                      </div>
                                      <div class="col-12">
                                          <label for="registration_pdf" class="form-label">Registration Form<span
                                                  class="text-muted"> (Downloaded from GGSIPU Website)</span></label>
                                          <input  type="file" class="form-control" name="pdf2" accept = ".pdf" placeholder="Registration pdf" >
                                      </div>
                                      
                                      <div class="col-12">
                                          <div class="col-12">
                                              <label for="address proof" class="form-label">Address proof<span
                                                  class="text-muted"> (Required)</span></label>
                                                  <input type="file" class="form-control" name="pdf3"accept = ".pdf" placeholder="pdf" >
                                              </div>
                                              <div class="col-12">
                                                  <label for="12 m" class="form-label">XII Marksheet/Certificate<span
                                                      class="text-muted"> (Required)</span></label>
                                      <input type="file" class="form-control" accept = ".pdf" name="pdf4" placeholder="12th marksheet pdf" >
                                  </div>
                                  <div class="col-12">
                                      <label for="10 m" class="form-label">X Marksheet/Certificate<span
                                              class="text-muted"> (Required)</span></label>
                                      <input type="file" class="form-control" name="pdf5" accept = ".pdf" placeholder="10th marksheet pdf" >
                                  </div>
                                  <div class="col-12">
                                      <label for="Migration" class="form-label">Migration Certificate<span
                                              class="text-muted"> (Required)</span></label>
                                      <input  type="file" class="form-control" name="pdf6" accept = ".pdf" placeholder="Migration Certificate pdf" >
                                  </div>
                                  <div class="col-12">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="Upload PDF">Submit</button>
                                </div>
      </form>
    </div>
</body>
</html>
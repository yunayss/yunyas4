<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Student Record - Home</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
      body {
        font-family: Arial Black, sans-serif;
        background-color: #ff69b4;
      }
      h1 {
        text-decoration: underline;
        text-align: center;
        padding: 20px;
        color: #000000;
      }
      .form-container {
        background-color: #ff69b4;
        padding: 30px;
        width: 50%;
        margin: 20px auto;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      }
      .form-group {
        margin-bottom: 15px;
      }
      .form-group label {
        text-align: left;
        display: block;
        font-size: 1.1em;
        color: #333;
      }
      .form-group input,
      .form-group select {
        width: 100%;
        padding: 10px;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      button {
        background-color: #131213;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1.1em;
      }
      button:hover {
        background-color: #45a049;
      }
      .success-message {
        text-align: center;
        color: #28a745;
        font-size: 1.2em;
      }
      .error-message {
        text-align: center;
        color: #d9534f;
        font-size: 1.2em;
      }
    </style>
  </head>
  <body>

    <?php
      include('dbconnect.php');

      $query = "SELECT * FROM students";
      $result = mysqli_query($con, $query);

      if (!$result) {
          die("Query failed: " . mysqli_error($con));
      }
    ?>

    <!-- Main container -->
    <div class="container" style="padding-left: 20px; padding-right: 20px;">
      <!-- Heading -->
      <h1 style="text-align: center; font-weight: 20px; padding-top: 10px">Student Record</h1>
      <hr>
      <!-- Breadcrumb navigation -->
      <ol class="breadcrumb bg-primary">
          <li><a href="home.html" style="color: hotpink;">Home</a></li>
          <li><a href="addsub.php" style="color: hotpink;">Add Student</a></li>
          <li class="active" style="color: hotpink;">View Student</li>
      </ol>
      <hr>
      <!-- Subheading for student records -->
      <h2 style="text-decoration: underline; text-align: center; color: hotpink;">All Student Records</h2>

      <!-- Table to display student records -->
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Student ID</th>
              <th>First Name</th>
              <th>Sur Name</th>
              <th>Year Entry</th>
              <th>Course</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <td><?php echo $row['studentid']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['surname']; ?></td>
                <td><?php echo $row['yentry']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td>
                  <a href="editsub.php?studentid=<?php echo $row['studentid']; ?>" class="btn btn-success" role="button">Edit Student</a>
                  <a href="delsub.php?studentid=<?php echo $row['studentid']; ?>" class="btn btn-danger" role="button" onClick="return confirm('Are You Sure You Want to Delete This Record?')"> Delete Student</a>
                </td>
              </tr>
            <?php
              }
              mysqli_close($con);
            ?>
          </tbody>
        </table>
      </div>
    </div> <!-- End of container -->

  </body>
</html>



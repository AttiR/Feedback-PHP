<?php
$insert = false;
if (isset($_POST['name'])) {
  // Set connection variables
  $server = "localhost";
  $username = "root";
  $password = "nHNA3-cP2HFRGzW/";

  // Create a database connection
  $con = mysqli_connect($server, $username, $password);

  // Check for connection success
  if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
  }
  // echo "Success connecting to the db";

  // Collect post variables
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $comments = $_POST['comments'];
  $sql = "INSERT INTO `players-feedback`. `feedback` (`Name`, `Email`, `age`, `Feedback`, `date & time`) VALUES ('$name', '$email', '$age', '$comments', current_timestamp());";
  // echo $sql;

  // Execute the query
  if ($con->query($sql) == true) {
    // echo "Successfully inserted";

    // Flag for successful insertion
    $insert = true;
  } else {
    echo "ERROR: $sql <br> $con->error";
  }

  // Close the database connection
  $con->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <title>Players Data</title>
</head>

<body>

  <div class="container">

    <header class="header">
      <h1 id="title" class="text-center">Helsinki Gymkhana Cricket Club</h1>
      <p id="description" class="description text-center">
        <?php
        if ($insert == true) {
          echo "<p class='submitMsg'>Thanks for submitting your Feedback. We valued your opinion!</p>";
        }
        ?>
      </p>
    </header>

    <form action="index.php" id="feebback-form" method="post">
      <div class="form-group">
        <label id="name-label" for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required />
      </div>
      <div class="form-group">
        <label id="email-label" for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" required />
      </div>
      <div class="form-group">
        <label id="number-label" for="number">Age<span class="clue">(optional)</span></label>
        <input type="number" name="age" id="age" min="10" max="99" class="form-control" placeholder="Age" />
      </div>



      <div class="form-group">
        <p>Any comments or suggestions?</p>
        <textarea name="comments" id="comments" class="input-textarea" name="comment" placeholder="Enter your comment here..."></textarea>
      </div>

      <div class="form-group">
        <button type="submit" id="submit" class="submit-button">
          Submit
        </button>
      </div>
    </form>


  </div>

</body>

</html>

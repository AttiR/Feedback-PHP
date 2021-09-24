<?php

// connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "players-feedback";

//Create a connection

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {

  die("oops we failed to connect: " . mysqli_connect_error());
} else {
  echo "connection is created<br>";
}

///// HOW TO FETCH THE DATA FROM A DATABASE  /////

$sql = "SELECT * FROM `feedback` WHERE age > '30'";
$result = mysqli_query($conn, $sql);

// how to find the numbers of entries/ records
$num = mysqli_num_rows($result);
echo "The numbers of entries are;" . $num;
echo "<br>";
// display all rows

if ($num > 0) {
  /* $row = mysqli_fetch_assoc($result); // return the next row, its shows only one row
  echo var_dump($row);
  echo "<br>";*/

  // We can fetch all arrays using while loop
  $no = 1;
  while ($row = mysqli_fetch_assoc($result)) {

    //echo var_dump($row);
    echo $no . " Name:" . $row['Name'] . "Email: " . $row['Email'] . " Feedback: " . $row['Feedback'];
    echo "<br>";
    $no = $no + 1;
  }
}

/////   Updating The Database  ////////

$sql = "UPDATE `feedback` SET `Name` = 'Updated Ali Farooq' WHERE `feedback`.`Serial-no` = 6";
$result = mysqli_query($conn, $sql);

echo var_dump($result); // resturn true false

// we can also check the affected rows

$check = mysqli_affected_rows($conn);
echo "<br>The effected rows are: " . $check;

if ($result) {



  echo "Successfully Updated";
} else {
  "Something went wrong";
}





////// DELETE DATA //////////////////


$sql = "DELETE FROM `feedback` WHERE `feedback`.`age` = '35';"; // Lets say we have 8 rows with age 35 we can LIMIT = '3';
$result = mysqli_query($conn, $sql);

// we can also check the Deleted rows

$check = mysqli_affected_rows($conn);
echo "<br>The number of Delete rows are:  $check <br>";

if ($result) {



  echo "Successfully Deleted";
} else {

  $error = mysqli_error($con);
  "Something went wrong due to:  $error";
}

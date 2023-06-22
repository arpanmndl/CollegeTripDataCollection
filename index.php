<?php
   // flag for successful insertion
   $insert = false;

   // set connection variables
   if(isset($_POST['name'])){
      $server = "localhost";
      $username = "root";
      $password = "";
      $db = "manali trip";

      // creating a database connection
      $con = mysqli_connect($server, $username, $password, $db);

      // check for connection success
      if(!$con){
         die("Database Connection Failed: " . mysqli_connect_error());
      }
      // echo "Database Connection Successful.";

      // collect post variables
      $name = $_POST['name'];
      $dept = $_POST['dept'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $phno = $_POST['phone'];

      // execute the query 
      $sql = "INSERT INTO `student_data` (`name`, `dept`, `gender`, `email`, `phno`, `dt`) VALUES ('$name', '$dept', '$gender', '$email', '$phno', current_timestamp());";
      // echo $sql;


      if($con->query($sql) == true){
         $insert = true;
         // echo "successful insertion";
      }

      // closing the databaase connection
      $con->close();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>College Trip</title>
   <link rel="stylesheet" href="style.css">
   <script src="index.js"></script>
</head>
<body>

   <?php include "header.php"; ?>

   <form action="index.php" method="post" autocomplete="off">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="eg. John Wick" required>

      <label for="dept">Department</label>
      <input type="text" name="dept" id="dept" placeholder="eg. CSE" required>

      <label for="gender">Gender</label>
      <input type="text" name="gender" id="gender" placeholder="eg. Male/Female/Others" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="eg. wick.john@gmail.com" required>

      <label for="phone">Phone</label>
      <input type="tel" pattern="[0-9]{10}" name="phone" id="phone" placeholder="eg. 9831876325" required>

      <div class="btn">
         <button type="submit" class="btn-s">Submit</button>
         <button type="reset" class="btn-r">Reset</button>
      </div>
   </form>

   <?php
      if($insert == true){
         echo "<p class='successMsg msg'>Response submitted successfully. Thanks for your participation.</p>";
      }
      // else{
      //    echo "<p class='errorMsg msg'>Error: $sql <br> $con->error</p>";
      // }
   ?>

   <?php include "footer.php"; ?>

</body>
</html>
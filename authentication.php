<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Secure Login Page</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'><link rel="stylesheet" href="./style.css">

</head>
<body>
<?php      
    include('connection.php');  
      
    // Prepare a statement for execution
    $stmt = mysqli_prepare($con, "SELECT * FROM login WHERE username = ? AND password = ?");
      
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
      
    // Set the variables
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
    // Execute the statement
    mysqli_stmt_execute($stmt);
      
    // Get the result
    $result = mysqli_stmt_get_result($stmt);  
      
    // Fetch the row
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      
    // Get the number of rows returned
    $count = mysqli_num_rows($result);  
          
    if($count == 1){  
        echo "<h1><center> Your Account Has Been Secured </center></h1>";  
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     
?> 
</body>
</html>







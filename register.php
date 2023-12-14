<?php
// Connect to database
$db = mysqli_connect("localhost", "root", "", "shop_db");

// Check if form is submitted
if(isset($_POST['register'])) {
  
  // Get form data
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  
  // Validate form data
  if(empty($username) || empty($password)) {
    $error = "Please enter username and password";
  } else {
  
    // Hash password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert user into database
    $query = "INSERT INTO users (username, password, role) 
              VALUES ('$username', '$password', '$role')";
              
    if(mysqli_query($db, $query)) {
      $message = "Registration successful!"; 
    } else {
      $error = "Error registering user";
    }

  }
  
}
?>

<html>
<head>
  <title>Register</title>
</head>
<body>

  <?php if(isset($error)) { ?>
    <p><?php echo $error; ?></p>
  <?php } ?>
  
  <?php if(isset($message)) { ?>
    <p><?php echo $message; ?></p>
  <?php } ?>

  <form method="post">
    <label>Username:</label>
    <input type="text" name="username"><br>
    
    <label>Password:</label>   
    <input type="password" name="password"><br>
    
    <label>Role:</label>
    <select name="role">
      <option value="customer">Customer</option>
      <option value="manager">Store Manager</option>
      <option value="logistics">Logistics</option>
    </select><br>
    
    <input type="submit" name="register" value="Register">
  </form>

</body>
</html>
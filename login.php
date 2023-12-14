<?php
// Start session 
session_start();

// Connect to database
$db = mysqli_connect("localhost", "root", "", "shop_db");

// Check if login form is submitted
if(isset($_POST['login'])) {

  // Get form data
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Validate form data
  if(empty($username)|| empty($password)) {
    $error = "Please enter username and password";
  } else {

    // Get user data from database 
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) > 0) {

      $user = mysqli_fetch_assoc($result);
      
      // Verify password
      if(password_verify($password, $user['password'])) {
        
        // Set session variables
        $_SESSION['user_id'] = $user['id']; 
        $_SESSION['username'] = $user['username'];
        $_SESSION['logged_in'] = true;

        header('Location: home.php');
        exit;

      } else {
        $error = "Invalid username or password";
      }

    } else {
      $error = "User not found"; 
    }

  }

}
?>

<html>
<head>
  <title>Login</title> 
</head>

<body>
  <?php if(isset($error)) { ?>
    <p><?php echo $error; ?></p>
  <?php } ?>

  <form method="post">
    <label>Username:</label>
    <input type="text" name="username">
    
    <label>Password:</label>
    <input type="password" name="password">
   
    <input type="submit" name="login" value="Login">
  </form>

</body>
</html>
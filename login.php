<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facebook Login</title>
  <style>
   
    body {
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .bg {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-image: url('https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg');
      background-size: 400px 200px;
      background-repeat: no-repeat;
      margin-top:210px;
      margin-left:270px;
      z-index: -1;
      
    }
    .bg h4 {
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      margin-top:150px;
      margin-left:40px;
      z-index: -1;
      
        
    }

    .login-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      padding-right: 40px;
      margin-left: 580px;
    }

    .logo {
      width: 150px;
      margin-bottom: 20px;
    }

    .login-form {
      display: flex;
      flex-direction: column;
    }

    input[type="email"],
    input[type="password"],
    button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      outline: none;
    }

    button {
      background-color: #1877f2;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #166fe5;
    }

    .forgot-password,
    .create-account {
      margin-top: 10px;
    }

    .create-account a {
      color: #1877f2;
    }

    .create-account a:hover {
      text-decoration: underline;
    }
  
  </style>
</head>
<body>
<?php
// Include the db_connection.php file
include 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Perform SQL query to check if the user exists
    $sql = "SELECT * FROM Users WHERE email = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $password]);
    
    // Check if user exists
    if ($stmt->rowCount() == 1) {
        // User authenticated successfully
        // Redirect to home page or any other page
        header("Location: home.php");
        exit();
    } else {
        // Authentication failed
        $error_message = "Invalid email or password. Please try again.";
    }
}
?>
<div class="bg">
  <h4>Connect with friends and the world <br>around you on Facebook.</h4>
</div>
<div class="login-container">
  <form action="" method="post" class="login-form">
    <input type="email" name="email" placeholder="Email or Phone" required>
    <input type="password" name="pass" placeholder="Password" required>
    <button type="submit">Log In</button>
  </form>
  <?php if(isset($error_message)): ?>
    <p style="color: red;"><?php echo $error_message; ?></p>
  <?php endif; ?>
  <a href="#" class="forgot-password">Forgot password?</a>
  <div class="create-account">
    <span>Don't have an account?</span>
    <a href="#">Sign up for Facebook</a>
  </div>
</div>
</body>
</html>

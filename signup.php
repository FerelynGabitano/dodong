<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facebook SignUp</title>
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

  

    .login-form {
      display: flex;
      flex-direction: column;
      padding: 15px;
    }

    input[type="username"],
    input[type="email"],
    input[type="password"],
    button {
      width: 100%;
      padding: 15px;
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
      margin-left: 15px;
    }

    button:hover {
      background-color: #166fe5;
    }


  </style>
</head>
<body>
<?php
// Database credentials
$host = "localhost"; 
$dbname = "finalexam"; 
$username = "root"; 
$password = ""; 

// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display error message if connection fails
    die("Failed to connect to the database: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Perform SQL query to insert user data into the database
    $sql = "INSERT INTO Users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);
    
    // Redirect to a success page or do something else
    header("Location: login.php");
    exit();
}
?>
  <div class="bg">
  
  <h4 >Connect with friends and the world <br>around you on Facebook.</h4></div>
  <div class="login-container">
    <form action="" method="post" class="login-form">
      <input type="username" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email or Phone" required>
      <input type="password" name="pass" placeholder="Password" required>
      <button type="submit">Sign In</button>
    </form>
   
  </div>

  
</body>
</html>

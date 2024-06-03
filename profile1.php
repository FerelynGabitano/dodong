<?php
session_start(); // Start the session if it's not already started

$host = "localhost";
$dbname = "finalexam";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Uncomment this line if you want to check if the connection is successful
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if the 'user_id' session variable and 'followed_user_id' POST parameter are set
if(isset($_SESSION['user_id']) && isset($_POST['followed_user_id'])) {
    // Check if 'user_id' session variable and 'followed_user_id' POST parameter are not empty
    if(!empty($_SESSION['user_id']) && !empty($_POST['followed_user_id'])) {
        try {
            // Check if the user is already following the target user
            $sql = "SELECT COUNT(*) FROM follows 
                    WHERE follower_id = :follower_id AND followed_id = :followed_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':follower_id', $_SESSION['user_id']);
            $stmt->bindParam(':followed_id', $_POST['followed_user_id']);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if($count == 0) {
                // If not following, insert a new follow relationship
                $sql = "INSERT INTO follows (follower_id, followed_id) VALUES (:follower_id, :followed_id)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':follower_id', $_SESSION['user_id']);
                $stmt->bindParam(':followed_id', $_POST['followed_user_id']);
                if($stmt->execute()) {
                    // Successfully followed user
                    // You can redirect or do any other action here
                    echo "Successfully followed user";
                    exit; // Terminate the script after successful execution
                } else {
                    echo "Error following user: " . $stmt->errorInfo()[2] . "<br>";
                }
            } else {
                echo "User is already being followed";
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "User ID or followed user ID is empty";
    }
} else {
    echo "User ID or followed user ID is missing";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
    /* styles.css */
    .cover-photo {
        position: relative;
        width: 100%;
        height: 100%;
        background-color: #f0f0f0;
        overflow: hidden;
    }

    .cover-photo img {
        width: 100%;
        height: 300px;
    }

    .btn-edit-cover {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }

    .profile-section {
        margin-top: -75px;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-photo {
        position: relative;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        border: 5px solid #fff;
        margin-right: 20px;
    }

    .profile-photo img {
        width: 100%;
        height: auto;
    }

    .btn-edit-profile {
        position: absolute;
        bottom: 5px;
        right: 5px;
    }

    .profile-details h2 {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
    }

    .profile-details small {
        font-size: 18px;
        color: #666;
    }

    .profile-actions button {
        margin-left: 10px;
    }

    .nav-tabs {
        margin-top: 20px;
    }
    </style>
    <div class="container">
        <!-- Cover Photo -->
        <div class="cover-photo">
            <img src="images/sheena.jpg" alt="Cover Photo">
            <!-- <button class="btn btn-light btn-edit-cover">Edit cover photo</button>-->
        </div>

        <!-- Profile Section -->
        <div class="profile-section d-flex align-items-end">
            <div class="profile-photo">
                <img src="images/sheena1.jpg" alt="Profile Photo">
                <!--<button class="btn btn-light btn-edit-profile">Edit profile</button>-->
            </div>
            <div class="profile-details">
                <h2>Sheena Jira B. Cadigoy </h2>
                <p>245 friends</p>
            </div>
            <div class="profile-actions ml-auto">
                <style>
                .follow-btn {
                    background-color: #0095f6;
                    color: white;
                    border: none;
                    padding: 8px 16px;
                    border-radius: 4px;
                    cursor: pointer;
                }

                /* Styles for the following state */
                .follow-btn.following {
                    background-color: #aaa;
                }
                </style>

                <button class="follow-btn" id="followBtn">Follow</button>
                <form id="followForm" method="POST" action="">
                    <!-- Replace 'TARGET_USER_ID' with the actual user ID you want to follow -->
                    <input type="hidden" name="followed_user_id" id="followedUserId" value="TARGET_USER_ID">
                </form>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <!-- Navigation tabs content -->
        </ul>
        <div class="tab-content" id="profileTabsContent">
            <!-- Tab content -->
        </div>
    </div>

    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function(){
        $('#followBtn').click(function(){
            $(this).attr('disabled', true);
            $('#followForm').submit(); // Submit the form when the button is clicked
        });
    });
</script>
</body>
</html>

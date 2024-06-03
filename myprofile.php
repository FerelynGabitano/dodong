<?php
session_start(); // Make sure session is started to track the current user

$servername = "localhost";
$username = "root";
$password = "";
$database = "finalexam";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Current user ID (replace with actual user ID management, e.g., session variable)
$current_user_id = 1;

// Fetch posts with their comments from the database
$sql_posts = "SELECT p.id AS post_id, p.content AS post_content, p.image AS post_image, p.created_at AS post_created_at, c.content AS comment_content FROM Posts p LEFT JOIN Comments c ON p.id = c.post_id WHERE p.user_id = '$current_user_id' ORDER BY p.created_at DESC";
$result_posts = $conn->query($sql_posts);

// Group comments by post
$posts_comments = array();
if ($result_posts->num_rows > 0) {
    while ($row = $result_posts->fetch_assoc()) {
        $post_id = $row['post_id'];
        if (!isset($posts_comments[$post_id])) {
            $posts_comments[$post_id] = array(
                'post_content' => $row['post_content'],
                'post_image' => $row['post_image'],
                'post_created_at' => $row['post_created_at'],
                'comments' => array()
            );
        }
        // Add comment to the corresponding post
        if (!empty($row['comment_content'])) {
            $posts_comments[$post_id]['comments'][] = $row['comment_content'];
        }
    }
}

$conn->close();
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
<style>/* styles.css */
.cover-photo {
    position: relative;
    width: 100%;
    height: 300px;
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
            <img src="images/ferelyn.jpg" alt="Cover Photo">
            <button class="btn btn-light btn-edit-cover">Edit cover photo</button>
        </div>
        
        <!-- Profile Section -->
        <div class="profile-section d-flex align-items-end">
            <div class="profile-photo">
                <img src="images/ferelyn1.jpg" alt="Profile Photo">
                <!--<button class="btn btn-light btn-edit-profile">Edit profile</button>-->
            </div>
            <div class="profile-details">
                <h2>Ferelyn Mae T. Gabitano</h2>
                <p>500 friends</p>
            </div>
            <div class="profile-actions ml-auto">
                <button class="btn btn-primary">Edit Profile</button>
                <button class="btn btn-secondary">Message</button>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Posts</a>
            </li>
            <!-- Other tabs -->
        </ul>
        <div class="tab-content" id="profileTabsContent">
            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                <?php foreach ($posts_comments as $post): ?>
                    <div class="card mt-3">
                        <div class="card-body">
                            <p class="card-text"><?php echo htmlspecialchars($post['post_content']); ?></p>
                            <?php if (!empty($post['post_image'])): ?>
                                <img src="<?php echo htmlspecialchars($post['post_image']); ?>" class="img-fluid" alt="Post Image">
                            <?php endif; ?>
                            <p class="text-muted"><?php echo htmlspecialchars($post['post_created_at']); ?></p>
                            <!-- Display comments -->
                            <?php if (!empty($post['comments'])): ?>
                                <div class="comments">
                                    <h5>Comments:</h5>
                                    <?php foreach ($post['comments'] as $comment): ?>
                                        <p><?php echo htmlspecialchars($comment); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Other tab panes -->
        </div>
    </div>

    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "finalexam";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_post'])) {
        if (!empty($_POST['post_content'])) {
            $post_content = $conn->real_escape_string($_POST['post_content']);
            // Assuming user_id is hardcoded for demo purposes, replace it with the actual user_id logic
            $user_id = 1;

            // Check if an image is uploaded
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];
                $fileSize = $_FILES['image']['size'];
                $fileType = $_FILES['image']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                $uploadDir = __DIR__ . "/uploads/"; // Directory to upload images
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $destPath = $uploadDir . $newFileName;

                // Move uploaded file to the uploads directory
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    // Image uploaded successfully, insert post into database
                    $sql = "INSERT INTO Posts (user_id, content, image) VALUES ('$user_id', '$post_content', '$destPath')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<p class='text-success'>Post added successfully.</p>";
                    } else {
                        echo "<p class='text-danger'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                    }
                } else {
                    echo "<p class='text-danger'>Error uploading file.</p>";
                }
            } else {
                // No image uploaded, insert post without image into database
                $sql = "INSERT INTO Posts (user_id, content) VALUES ('$user_id', '$post_content')";
                if ($conn->query($sql) === TRUE) {
                    echo "<p class='text-success'>Post added successfully.</p>";
                } else {
                    echo "<p class='text-danger'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            }
        } else {
            echo "<p class='text-danger'>Post content is required!</p>";
        }
    }
}

if (isset($_POST['submit_comment'])) {
    if (!empty($_POST['comment_content']) && isset($_POST['post_id'])) {
        $comment_content = $conn->real_escape_string($_POST['comment_content']);
        $post_id = $conn->real_escape_string($_POST['post_id']);
        $user_id = 1;

        $sql = "INSERT INTO Comments (post_id, user_id, content) VALUES ('$post_id', '$user_id', '$comment_content')";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='text-success'>Comment added successfully.</p>";
        } else {
            echo "<p class='text-danger'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    } else {
        echo "<p class='text-danger'>Comment content is required!</p>";
    }
}

if (isset($_POST['react_post'])) {
    $post_id = $conn->real_escape_string($_POST['post_id']);
    $user_id = 1;
    $reaction_type = 'like';

    $check_reaction_sql = "SELECT * FROM Reactions WHERE post_id='$post_id' AND user_id='$user_id' AND type='$reaction_type'";
    $check_result = $conn->query($check_reaction_sql);

    if ($check_result->num_rows > 0) {
        $delete_reaction_sql = "DELETE FROM Reactions WHERE post_id='$post_id' AND user_id='$user_id' AND type='$reaction_type'";
        if ($conn->query($delete_reaction_sql) === TRUE) {
            echo "<p class='text-success'>Reaction removed.</p>";
        } else {
            echo "<p class='text-danger'>Error: " . $conn->error . "</p>";
        }
    } else {
        $add_reaction_sql = "INSERT INTO Reactions (post_id, user_id, type) VALUES ('$post_id', '$user_id', '$reaction_type')";
        if ($conn->query($add_reaction_sql) === TRUE) {
            echo "<p class='text-success'>Reacted to the post.</p>";
        } else {
            echo "<p class='text-danger'>Error: " . $conn->error . "</p>";
        }
    }
}

$sql_posts = "SELECT Posts.id AS post_id, Posts.content AS post_content, Posts.image AS post_image,
             (SELECT GROUP_CONCAT(Comments.content SEPARATOR '||') FROM Comments WHERE Comments.post_id = Posts.id) AS comments,
             (SELECT COUNT(*) FROM Reactions WHERE Reactions.post_id = Posts.id AND Reactions.type='like') AS like_count
             FROM Posts
             ORDER BY Posts.created_at DESC LIMIT 10";
$result_posts = $conn->query($sql_posts);

if ($result_posts->num_rows > 0) {
    while ($row = $result_posts->fetch_assoc()) {
        echo "<div class='card mt-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>Post</h5>";
        echo "<p class='card-text'>" . $row['post_content'] . "</p>";
        if (!empty($row['post_image'])) {
            echo "<img src='" . $row['post_image'] . "' class='img-fluid' alt='Post Image'>";
        }
        echo "<div>";
        echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='post_id' value='" . $row["post_id"] . "'>";
        echo "<button type='submit' name='react_post' class='btn btn-primary mt-2'>Like (" . $row['like_count'] . ")</button>";
        echo "</form>";
        echo "</div>";
        echo "<h5 class='card-title'>Comments</h5>";
        echo "<ul class='list-group'>";
        if (!empty($row['comments'])) {
            $comments = explode('||', $row['comments']);
            foreach ($comments as $comment) {
                echo "<li class='list-group-item'>" . $comment . "</li>";
            }
        } else {
            echo "<li class='list-group-item'>No comments yet.</li>";
        }
        echo "</ul>";
        echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) ."'>";
        echo "<div class='form-group mt-2'>";
        echo "<textarea class='form-control' name='comment_content' rows='2' placeholder='Write a comment...'></textarea><br>";
        echo "<input type='hidden' name='post_id' value='" . $row["post_id"] . "'>";
        echo "<button type='submit' name='submit_comment' class='btn btn-primary'>Comment</button>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        }
        } else {
        echo "<p>No posts found.</p>";
        }
        
        $conn->close();
        ?>
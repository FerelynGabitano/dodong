

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook-like Interface</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <style>
    /* Add your existing styles here */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
   
  body {
    font-family: -apple-system, system-ui, "Segoe UI", Roboto, Oxygen, Ubuntu,
      Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    background: #fafafa;
  }
.navbar {
    position: relative;
    bottom: 15px;
    z-index: 100000;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgb(255, 255, 255);
    width: 100%;
    border: 1px solid rgb(218, 217, 217);
  }
   
  .navbar .container {
    /* background-color: #555; */
    padding: 20px 0;
    width: 75%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* margin: 0 auto; */
  }
   
  .container .logo {
    display: inline-block;
    cursor: default;
   
  }

  .container .logo .img-logo{
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      margin-top:-30px;
      margin-left:10px;
     width: 200px;
     height: 200px;
      
  }
   
  .searchbar {
    width: -10%;
    text-align: end;
  }
   
  .searchbar input {
    background-color: #fafafa;
    padding: 10px;
    text-indent: 21px;
    outline: none;
    border: 1px solid rgb(218, 217, 217);
    border-radius: 2px;
    color: rgb(77, 77, 77);
    margin-left: 5px;
  }
   
  .searchbar img {
    position: absolute;
    margin-left: -10.5rem; 
    top: 45px;
    left: 48%;
    right: -650;
    margin-top: 0.25rem;
    
  }
   
  .searchbar input::placeholder {
    font-weight: lighter;
    color: rgb(172, 172, 172);
  }
   
  .nav-links {
    font-weight: lighter;
    color: rgb(172, 172, 172);
    /* background: #333  ; */
  }
   
  .nav-group .nav-item {
    list-style-type: none;
    margin: 0 8px;
  }
   
  .nav-group .nav-item a {
    font-size: 22px;
    display: block;
    color: black;
  }
   
  .nav-group {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
    padding-left: 5px;
  }
   
  .action .profile {
    position: relative;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 25px;
  }
   
  .action .profile img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .card img {
        max-width: 100%;
        height: 200px; 
        object-fit: cover;
    }
</style>
<nav class="navbar">
            <div class="container">

                <div class="logo">
                        <img src="https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg" class= img-logo>
                   <!-- <svg xmlns="https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
</svg>-->
</div>
            <div class="searchbar">
                <input type="text"
                     placeholder="Search">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20220609093658/search-200x200.png"
                         height="18"
                         alt="img2">
                </div>

                <div class="nav-links">
                    <ul class="nav-group">
                                                                                            <li class="nav-item">
                                                                                                <a href="index.php">
                                                                                                <i class="bi bi-house-door-fill" alt="Home"></i>
                                                                                                </a>
                                                                                            </li>

                        <li class="nav-item">
                            <a href="messenger.php">
                            <i class="bi bi-messenger" alt="Messenger"></i>
                            </a>
                        </li>
                                                                                            <li class="nav-item">
                                                                                                <a href="login.php">
                                                                                                <i class="bi bi-box-arrow-right"></i>
                                                                                                </a>
                                                                                            </li>
                        
                                                        <li class="nav-item">
                                                            <div class="action">
                                                                <a href="myprofile.php">
                                                                <div class="profile"
                                                                    onclick="menuToggle()">
                                                                    <img src="ferelyn1.jpg"
                                                                        alt="user profile">
                                                                </div></a>
                                                            </div>
                                                        </li>
                    </ul>
                </div>
            </div>
        </nav>

   
    <style>
      body {
          background-color: #f0f2f5;
      }
      .sidebar {
          height: 100vh;
          overflow-y: auto;
      }
      .content {
          padding: 20px;
      }
      .story {
          width: 100px;
          height: 150px;
          background-color: #ddd;
          border-radius: 10px;
          overflow: hidden;
          text-align: center;
          margin-right: 10px;
      }
      .story img {
          width: 100%;
          height: 100%;
          object-fit: cover;
      }
      .story p {
          margin: 0;
          padding: 5px;
          background-color: rgba(0, 0, 0, 0.5);
          color: white;
          position: absolute;
          bottom: 0;
          width: 100%;
      }
      .post {
          background-color: white;
          padding: 15px;
          border-radius: 10px;
          margin-bottom: 20px;
      }
      .meme img {
        width:60px;
        height: 60px;
      }
    </style>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 sidebar bg-white p-3">
        <div class="d-flex align-items-center mb-3">
           <div class="meme">
    <img src="images/ferelyn1.jpg " class="rounded-circle me-2" alt="User" />
    <a href="myprofile.php">Ferelyn Mae T. Gabitano</a></div>
</div>

          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-people me-2"></i> Friends</li>
            <li class="mb-2"><i class="bi bi-clock-history me-2"></i> Memories</li>
            <li class="mb-2"><i class="bi bi-bookmark me-2"></i> Saved</li>
            <li class="mb-2"><i class="bi bi-people-fill me-2"></i> Groups</li>
            <li class="mb-2"><i class="bi bi-camera-video me-2"></i> Video</li>
            <li class="mb-2"><i class="bi bi-chevron-down me-2"></i> See more</li>
          </ul>
          <h6>Your shortcuts</h6>
          <ul class="list-unstyled">
            <li class="mb-2">
              <img src="https://placehold.co/20x20" class="me-2" alt="Shortcut" /> FRESHMEN
              2023-2024
            </li>
            <li class="mb-2">
              <img src="https://placehold.co/20x20" class="me-2" alt="Shortcut" /> JJC Surigao
              Ironwood
            </li>
            <li class="mb-2">
              <img src="https://placehold.co/20x20" class="me-2" alt="Shortcut" /> SK Capalayan
            </li>
            <li class="mb-2">
              <img src="https://placehold.co/20x20" class="me-2" alt="Shortcut" /> Blossom Blast
              Saga
            </li>
            <li class="mb-2">
              <img src="https://placehold.co/20x20" class="me-2" alt="Shortcut" /> Christian Youth
              Fellowship UCCP
            </li>
          </ul>
        </div>

        <div class="col-md-6 content">
          <div class="d-flex mb-3">
            <div class="story position-relative">
              <img src="images/ferelyn.jpg" alt="Story" />
              <p>Create story</p>
            </div> 
            <div class="story position-relative">
              <img src="images/malia.jpg" alt="Story" />
              <p>Sheena Cadigoy</p>
            </div>
            <div class="story position-relative">
              <img src="images/rezel.jpg" alt="Story" />
              <p> Ethyl C. Jamera</p>
            </div>
            <div class="story position-relative">
              <img src="images/sheena.jpg" alt="Story" />
              <p>Rhea Mae Colon Buico</p>
            </div>
            <div class="story position-relative">
              <img src="images/ronnel.jpg" alt="Story" />
              <p>UCCP</p>
            </div>
            <div class="story position-relative">
              <img src="images/sheena1.jpg" alt="Story" />
              <p>Princess</p>
            </div>
            <div class="story position-relative">
              <img src="images/rezel1.jpg" alt="Story" />
              <p>Rezel jane Cano</p>
            </div>
          </div>
          <div class="post">
    <div class="d-flex align-items-center mb-3">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="post_content">Post Content</label>
                <textarea class="form-control" name="post_content" id="post_content" cols="100" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label><br>
                <input type="file" class="form-control-file" name="image" id="image">
            </div><br>
            <button type="submit" name="submit_post" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<h5 class="card-title">Recent Posts</h5>

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

                $uploadDir =  'uploads/'; // Directory to upload images
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $destPath = $uploadDir . $newFileName;

                // Check if the directory doesn't exist
        if (!is_dir($uploadDir)) {
            // Create the directory
            if (!mkdir($uploadDir, 0777, true)) {
                die("Failed to create uploads directory");
            }
        }

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

// Retrieve recent posts
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
        </div>

        <div class="col-md-3 sidebar bg-white p-3">
          <h6>Your Pages and profiles</h6>
          <div class="d-flex align-items-center mb-3">
            <img src="https://placehold.co/40x40" class="rounded-circle me-2" alt="Page" />
            <div>
              <strong>Information Systems Community</strong><br />
              <a href="#">Switch to Page</a><br />
              <a href="#">Create promotion</a>
            </div>
          </div>
          <h6>Friend requests</h6>
          <div class="d-flex align-items-center mb-3">
            <img src="https://placehold.co/40x40" class="rounded-circle me-2" alt="Friend" />
            <div>
              <strong>Micaella Santie Eta</strong><br />
              <small>3 mutual friends</small><br />
              <button class="btn btn-primary btn-sm">Confirm</button>
              <button class="btn btn-secondary btn-sm">Delete</button>
            </div>
          </div>
          <h4>Friend Suggestions</h4>
        
        <div class="friend-card">
            <img src="images/sheena1.jpg" alt="Sheena">
            <div class="friend-info">
                <h6 class="mb-1">Sheena Jira B. Cadigoy </h6>
                <p class="mb-0 text-muted">14 mutual friends</p>
            </div>
            <button class="btn" ><a href="profile1.php">Visit</button></a>

        </div>
        <style>
        body {
            font-family: Arial, sans-serif;
        }
        .left_sidebar {
            position: static;
            top: 115px;
            left: 0;
            background-color: #f8f9fa;
            padding: 15px;
            
           
            
        }
        .friend-card {
            display: flex;
            align-items: center;
            padding: 10px;
            margin: 10px 0;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .friend-card img {
            border-radius: 50%;
            margin-right: 15px;
            width: 50px; 
            height: 50px;
        }
        .friend-card .friend-info {
            flex-grow: 1;
        }
        .friend-card .btn {
            background-color: #e7f3ff;
            color: #1877f2;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
        }
        .friend-card .btn:hover {
            background-color: #d8e8ff;
        }
        </style>
      
        <div class="friend-card">
            <img src="images/ronnel1.jpg" alt="Ijon Tavis Guiritan">
            <div class="friend-info">
                <h6 class="mb-1">Ronnel Tuquib  (Banjo)</h6>
                <p class="mb-0 text-muted">11 mutual friends</p>
            </div>
            <button class="btn"><a href="profile2.php">Visit</button></a>
        </div>
        <div class="friend-card">
            <img src="images/malia1.jpg" alt="Malia Elise">
            <div class="friend-info">
                <h6 class="mb-1">Malia Elise</h6>
                <p class="mb-0 text-muted">1 mutual friend</p>
            </div>
            <button class="btn"><a href="profile3.php">Visit</button></a>
        </div>
        <div class="friend-card">
            <img src="images/rezel1.jpg" alt="Jayson Bartolay Lambus">
            <div class="friend-info">
                <h6 class="mb-1">Rezel Jane B. Cano</h6>
                <p class="mb-0 text-muted">1 mutual friend</p>
            </div>
            <button class="btn"><a href="profile4.php">Visit</button></a>
        </div>
    </div>
          
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

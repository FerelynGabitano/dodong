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
            <img src="images/malia.jpg" alt="Cover Photo">
            <!--<button class="btn btn-light btn-edit-cover">Edit cover photo</button>-->
        </div>
        
        <!-- Profile Section -->
        <div class="profile-section d-flex align-items-end">
            <div class="profile-photo">
                <img src="images/malia1.jpg" alt="Profile Photo">
                <!--<button class="btn btn-light btn-edit-profile">Edit profile</button>-->
            </div>
            <div class="profile-details">
                <h2>Malia Elise </h2>
                <p>800 friends</p>
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
            <script>
        // JavaScript for toggling the follow/unfollow functionality
        const followBtn = document.getElementById('followBtn');
        let isFollowing = false;

        followBtn.addEventListener('click', () => {
            if (isFollowing) {
                followBtn.textContent = 'Follow';
                followBtn.style.backgroundColor = '#0095f6';
                isFollowing = false;
            } else {
                followBtn.textContent = 'Following';
                followBtn.style.backgroundColor = '#aaa';
                isFollowing = true;
            }
        });
    </script>
                <button class="btn btn-secondary">Message</button>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">Friends</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">Videos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reels-tab" data-toggle="tab" href="#reels" role="tab" aria-controls="reels" aria-selected="false">Reels</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="more-tab" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                <div class="dropdown-menu" aria-labelledby="more-tab">
                    <a class="dropdown-item" id="activity-tab" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Activity</a>
                    <a class="dropdown-item" id="likes-tab" data-toggle="tab" href="#likes" role="tab" aria-controls="likes" aria-selected="false">Likes</a>
                </div>
            </li>
        </ul>
        <div class="tab-content" id="profileTabsContent">
            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">Posts content...</div>
            <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">About content...</div>
            <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">Friends content...</div>
            <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">Photos content...</div>
            <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">Videos content...</div>
            <div class="tab-pane fade" id="reels" role="tabpanel" aria-labelledby="reels-tab">Reels content...</div>
            <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">Activity content...</div>
            <div class="tab-pane fade" id="likes" role="tabpanel" aria-labelledby="likes-tab">Likes content...</div>
        </div>
    </div>

    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

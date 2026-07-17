<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login");
    exit;
}

include 'global.php';
?>

<!-- 2016 Layout Wrapper -->
<div class="rbx-dark-theme pt-4 pb-5">
    <div class="container rbx-container">
        <div class="row">
            
            <!-- 2016 Left Navigation Sidebar -->
            <div class="col-lg-2 d-none d-lg-block">
                <div class="rbx-left-nav">
                    <!-- Nav User Info -->
                    <a href="#" class="rbx-nav-user d-flex align-items-center mb-4 text-decoration-none">
                        <div class="rbx-nav-avatar me-2 d-flex align-items-center justify-content-center text-white fw-bold">
                            <?php echo substr(htmlspecialchars($_SESSION["username"]), 0, 1); ?>
                        </div>
                        <span class="text-white fw-bold text-truncate" style="font-size: 15px;">
                            <?php echo htmlspecialchars($_SESSION["username"]); ?>
                        </span>
                    </a>
                    
                    <!-- Nav Links -->
                    <ul class="list-unstyled rbx-nav-list">
                        <li><a href="/dashboard.php" class="active"><i class="fas fa-home fw-bold"></i> Home</a></li>
                        <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> Messages</a></li>
                        <li><a href="#"><i class="fas fa-user-friends"></i> Friends</a></li>
                        <li><a href="#"><i class="fas fa-male"></i> Avatar</a></li>
                        <li><a href="#"><i class="fas fa-box"></i> Inventory</a></li>
                        <li><a href="#"><i class="fas fa-exchange-alt"></i> Trade</a></li>
                        <li><a href="#"><i class="fas fa-users"></i> Groups</a></li>
                        <li><a href="#"><i class="fas fa-comments"></i> Forum</a></li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-10">
                <div class="row">
                    
                    <!-- Middle Column: Status, Feed, Games -->
                    <div class="col-md-8">
                        <h1 class="rbx-page-title mb-3">Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
                        
                        <!-- 2016 Status Update Box -->
                        <div class="rbx-panel rbx-status-box mb-4 d-flex align-items-center">
                            <div class="rbx-status-avatar d-none d-sm-flex align-items-center justify-content-center me-3">
                                <?php echo substr(htmlspecialchars($_SESSION["username"]), 0, 1); ?>
                            </div>
                            <input type="text" class="form-control rbx-input me-3" placeholder="What are you up to?">
                            <button class="btn rbx-btn-secondary px-4">Share</button>
                        </div>

                        <!-- 2016 Recently Played -->
                        <div class="d-flex justify-content-between align-items-end mb-2">
                            <h3 class="rbx-section-title mb-0">Recently Played</h3>
                            <a href="#" class="rbx-link-blue small">See All</a>
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <!-- Game Card 1 -->
                            <div class="col-6 col-sm-4">
                                <div class="rbx-game-card">
                                    <div class="rbx-game-thumb">
                                        <img src="https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png" class="img-fluid w-100 h-100" alt="Game">
                                    </div>
                                    <div class="rbx-game-info p-2">
                                        <div class="rbx-game-title text-truncate">Work at a Pizza Place</div>
                                        <div class="rbx-game-creator text-truncate">By Dued1</div>
                                        <div class="rbx-game-stats mt-1 d-flex align-items-center">
                                            <i class="fas fa-thumbs-up text-success me-1" style="font-size: 11px;"></i> <span style="font-size: 11px; color: #b8b8b8;">92%</span>
                                            <i class="fas fa-user ms-2 me-1" style="font-size: 11px; color: #b8b8b8;"></i> <span style="font-size: 11px; color: #b8b8b8;">12K</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Game Card 2 -->
                            <div class="col-6 col-sm-4">
                                <div class="rbx-game-card">
                                    <div class="rbx-game-thumb">
                                        <img src="https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png" class="img-fluid w-100 h-100" alt="Game">
                                    </div>
                                    <div class="rbx-game-info p-2">
                                        <div class="rbx-game-title text-truncate">Natural Disaster Survival</div>
                                        <div class="rbx-game-creator text-truncate">By Stickmasterluke</div>
                                        <div class="rbx-game-stats mt-1 d-flex align-items-center">
                                            <i class="fas fa-thumbs-up text-success me-1" style="font-size: 11px;"></i> <span style="font-size: 11px; color: #b8b8b8;">88%</span>
                                            <i class="fas fa-user ms-2 me-1" style="font-size: 11px; color: #b8b8b8;"></i> <span style="font-size: 11px; color: #b8b8b8;">8K</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2016 Feed -->
                        <h3 class="rbx-section-title mb-2">My Feed</h3>
                        <div class="rbx-panel p-3">
                            <div class="d-flex mb-3 pb-3 border-bottom border-dark">
                                <div class="rbx-feed-avatar me-3 d-flex align-items-center justify-content-center fw-bold">S</div>
                                <div>
                                    <div>
                                        <a href="#" class="rbx-text-white fw-bold text-decoration-none">System</a> 
                                        <span class="rbx-text-light" style="font-size: 14px;">Welcome to the new dashboard! Feel free to explore.</span>
                                    </div>
                                    <div class="rbx-text-muted mt-1" style="font-size: 12px;">Just now</div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#" class="rbx-link-blue small">Load More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Friends & Ads -->
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="d-flex justify-content-between align-items-end mb-2">
                            <h3 class="rbx-section-title mb-0">Friends (0)</h3>
                            <a href="#" class="rbx-link-blue small">See All</a>
                        </div>
                        <div class="rbx-panel p-3 text-center mb-4 rbx-text-muted" style="font-size: 14px;">
                            You don't have any friends online right now.
                        </div>

                        <div class="d-flex justify-content-between align-items-end mb-2">
                            <h3 class="rbx-section-title mb-0">Favorites</h3>
                            <a href="#" class="rbx-link-blue small">See All</a>
                        </div>
                        <div class="rbx-panel p-3 text-center rbx-text-muted" style="font-size: 14px;">
                            No favorite places yet.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* 
   2016 Flat Dark Theme
   Uses solid colors, 3px border-radius, and specific font weights
*/
body {
    background-color: #232527 !important; /* Authentic 2016 Dark Mode background */
    font-family: "Source Sans Pro", Arial, Helvetica, sans-serif; /* 2016 standard font */
}

.rbx-dark-theme {
    background-color: #232527;
    min-height: 100vh;
    color: #F2F4F5;
}

.rbx-container {
    max-width: 1024px !important;
}

/* Page Typography */
.rbx-page-title {
    font-size: 28px;
    font-weight: 700;
    color: #F2F4F5;
}
.rbx-section-title {
    font-size: 18px;
    font-weight: 600;
    color: #F2F4F5;
}
.rbx-text-white { color: #FFFFFF !important; }
.rbx-text-light { color: #BDC1C6 !important; }
.rbx-text-muted { color: #8F959C !important; }
.rbx-link-blue { 
    color: #00A2FF !important; 
    text-decoration: none;
}
.rbx-link-blue:hover { text-decoration: underline; }

/* 2016 Left Navigation */
.rbx-left-nav {
    padding-right: 15px;
}
.rbx-nav-avatar {
    width: 32px;
    height: 32px;
    background-color: #393b3d;
    border-radius: 50%;
}
.rbx-nav-list li a {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    color: #BDC1C6;
    text-decoration: none;
    font-size: 15px;
    border-radius: 4px;
    margin-bottom: 2px;
    transition: background 0.1s, color 0.1s;
}
.rbx-nav-list li a:hover {
    background-color: #393b3d;
    color: #F2F4F5;
}
.rbx-nav-list li a.active {
    background-color: #393b3d;
    color: #FFFFFF;
    font-weight: 600;
}
.rbx-nav-list li a i {
    width: 24px;
    font-size: 16px;
    text-align: center;
    margin-right: 10px;
}

/* 2016 Flat Panels */
.rbx-panel {
    background-color: #393b3d;
    border-radius: 3px;
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.3);
}

/* Status Box */
.rbx-status-box {
    padding: 12px;
}
.rbx-status-avatar {
    width: 48px;
    height: 48px;
    background-color: #232527;
    border-radius: 50%;
    color: #FFF;
    font-weight: bold;
    font-size: 20px;
}
.rbx-input {
    background-color: #232527 !important;
    border: 1px solid #4f5459 !important;
    border-radius: 3px !important;
    color: #F2F4F5 !important;
    font-size: 15px;
    padding: 10px 12px;
}
.rbx-input:focus {
    border-color: #00A2FF !important;
    box-shadow: none !important;
}
.rbx-btn-secondary {
    background-color: #4f5459 !important;
    color: #FFF !important;
    border: none !important;
    border-radius: 3px !important;
    font-weight: 600;
    font-size: 15px;
    padding: 10px 16px;
}
.rbx-btn-secondary:hover {
    background-color: #63686d !important;
}

/* 2016 Game Cards */
.rbx-game-card {
    background-color: #393b3d;
    border-radius: 3px;
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.3);
    overflow: hidden;
    transition: transform 0.1s;
    cursor: pointer;
}
.rbx-game-card:hover {
    box-shadow: 0 2px 6px 0 rgba(0,0,0,0.5);
}
.rbx-game-thumb {
    aspect-ratio: 1/1;
    background-color: #232527;
}
.rbx-game-title {
    font-size: 15px;
    font-weight: 600;
    color: #F2F4F5;
}
.rbx-game-creator {
    font-size: 12px;
    color: #8F959C;
}

/* Feed Elements */
.rbx-feed-avatar {
    width: 48px;
    height: 48px;
    background-color: #232527;
    border-radius: 50%;
    color: #BDC1C6;
    font-size: 20px;
}
.border-dark {
    border-color: #232527 !important;
}
</style>

<?php include 'footer.php'; ?>
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

<div class="container my-4 roblox-dashboard-wrapper">
    <div class="row g-4">
        
        <!-- Left Column: Main Roblox Content Stream -->
        <div class="col-lg-9">
            
            <!-- Authentic Roblox User Profile Banner Panel -->
            <div class="roblox-home-header p-4 mb-4 rounded d-flex align-items-center gap-4">
                <div class="roblox-avatar-frame position-relative shadow-sm flex-shrink-0">
                    <!-- Standard Roblox Headshot placeholder frame matching theme colors -->
                    <div class="roblox-avatar-placeholder d-flex align-items-center justify-content-center fw-bold text-white uppercase">
                        <?php echo substr(htmlspecialchars($_SESSION["username"]), 0, 1); ?>
                    </div>
                </div>
                <div class="roblox-header-meta">
                    <h1 class="fw-bold text-white mb-1 roblox-username-title">
                        Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?>!
                    </h1>
                </div>
            </div>

            <!-- Roblox Carousel Header Category: Recently Played / Discover -->
            <div class="d-flex align-items-center justify-content-between mb-3 px-1">
                <h3 class="roblox-row-title text-white mb-0">Recently Played</h3>
                <a href="/games" class="text-purple-accent small text-decoration-none fw-semibold roblox-link-hover">See All <i class="fas fa-chevron-right ms-1 small"></i></a>
            </div>

            <!-- Mini Game Grid Loop matching layout rules -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card roblox-game-tile border-0 overflow-hidden h-100">
                        <div class="roblox-tile-thumb position-relative">
                            <img src="https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png" class="card-img-top img-fluid" alt="Game">
                            <div class="tile-hover-overlay d-flex align-items-center justify-content-center">
                                <button class="btn btn-roblox-play-sm shadow-sm" onclick="alert('Launching standard client wrapper...')"><i class="fas fa-play"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <h6 class="text-white text-truncate fw-semibold mb-0 small">Sword Fights on the Heights IV</h6>
                            <span class="text-secondary-emphasis font-xs">By Telamon</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3">
                    <div class="card roblox-game-tile border-0 overflow-hidden h-100">
                        <div class="roblox-tile-thumb position-relative">
                            <img src="https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png" class="card-img-top img-fluid" alt="Game">
                            <div class="tile-hover-overlay d-flex align-items-center justify-content-center">
                                <button class="btn btn-roblox-play-sm shadow-sm" onclick="alert('Launching standard client wrapper...')"><i class="fas fa-play"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <h6 class="text-white text-truncate fw-semibold mb-0 small">Crossroads</h6>
                            <span class="text-secondary-emphasis font-xs">By Roblox</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 d-none d-sm-block">
                    <div class="card roblox-game-tile border-0 overflow-hidden h-100">
                        <div class="roblox-tile-thumb position-relative">
                            <img src="https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png" class="card-img-top img-fluid" alt="Game">
                            <div class="tile-hover-overlay d-flex align-items-center justify-content-center">
                                <button class="btn btn-roblox-play-sm shadow-sm" onclick="alert('Launching standard client wrapper...')"><i class="fas fa-play"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <h6 class="text-white text-truncate fw-semibold mb-0 small">Natural Disaster Survival</h6>
                            <span class="text-secondary-emphasis font-xs">By Stickmasterluke</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 d-none d-md-block">
                    <div class="card roblox-game-tile border-0 overflow-hidden h-100">
                        <div class="roblox-tile-thumb position-relative">
                            <img src="https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png" class="card-img-top img-fluid" alt="Game">
                            <div class="tile-hover-overlay d-flex align-items-center justify-content-center">
                                <button class="btn btn-roblox-play-sm shadow-sm" onclick="alert('Launching standard client wrapper...')"><i class="fas fa-play"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <h6 class="text-white text-truncate fw-semibold mb-0 small">Work at a Pizza Place</h6>
                            <span class="text-secondary-emphasis font-xs">By Dued1</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Sidebar Feed System -->
        <div class="col-lg-3">
            
            <!-- Quick Actions Structural Panel -->
            <div class="roblox-sidebar-panel p-3 rounded mb-4">
                <h5 class="text-white fw-bold small text-uppercase mb-3 tracking-wide">Account Actions</h5>
                <div class="d-grid gap-2">
                    <a href="/reset-password.php" class="btn btn-roblox-secondary btn-sm text-start py-2">
                        <i class="fas fa-key me-2 text-muted"></i> Change Password
                    </a>
                    <a href="/logout.php" class="btn btn-danger-roblox btn-sm text-start py-2">
                        <i class="fas fa-sign-out-alt me-2 text-muted"></i> Sign Out Session
                    </a>
                </div>
            </div>

            <!-- Sidebar Friends List Stream Module Mockup -->
            <div class="roblox-sidebar-panel p-3 rounded">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="text-white fw-bold small text-uppercase mb-0 tracking-wide">Friends Online</h5>
                    <span class="badge bg-purple-accent-opaque font-xs text-purple-accent px-2 py-1">0 / 0</span>
                </div>
                <div class="py-4 text-center">
                    <div class="text-muted mb-2"><i class="fas fa-users fa-2x opacity-40"></i></div>
                    <p class="text-secondary-emphasis font-xs mb-0">No friends online right now.</p>
                </div>
            </div>

        </div>

    </div>
</div>

<style>
/* --- Roblox Dashboard Styling Variables --- */

.roblox-dashboard-wrapper {
    background-color: #0d0d12;
}

/* Profile Display Module */
.roblox-home-header {
    background-color: #19191f;
    border: 1px solid #2f2f3d;
}

.roblox-avatar-placeholder {
    width: 72px;
    height: 72px;
    background-color: #2c2c38;
    border-radius: 50%;
    border: 3px solid #6b21a8;
    font-size: 1.8rem;
    color: #ffffff;
}

.roblox-username-title {
    font-size: 1.65rem;
    letter-spacing: -0.3px;
}

/* Category Row Controls */
.roblox-row-title {
    font-size: 1.2rem;
    font-weight: 700;
}

.text-purple-accent {
    color: #a855f7 !important;
}

.roblox-link-hover:hover {
    color: #c084fc !important;
    text-decoration: underline !important;
}

/* Roblox Horizontal Grid Tiles */
.roblox-game-tile {
    background-color: #19191f !important;
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
    transition: transform 0.2s;
}

.roblox-game-tile:hover {
    transform: translateY(-3px);
    border-color: rgba(168, 85, 247, 0.3) !important;
}

.roblox-tile-thumb {
    aspect-ratio: 1 / 1;
    background-color: #121218;
    overflow: hidden;
}

.roblox-tile-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Hover play interaction layer */
.tile-hover-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: opacity 0.2s;
}

.roblox-game-tile:hover .tile-hover-overlay {
    opacity: 1;
}

.btn-roblox-play-sm {
    background-color: #0074e8 !important;
    color: #ffffff !important;
    border: none !important;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    font-size: 0.85rem;
}

/* Sidebar Utilities */
.roblox-sidebar-panel {
    background-color: #19191f;
    border: 1px solid #2f2f3d;
}

.tracking-wide {
    letter-spacing: 0.5px;
}

.font-xs {
    font-size: 0.75rem;
}

.text-secondary-emphasis {
    color: #b3b3cb !important;
}

.text-success-glow {
    color: #4ade80 !important;
}

/* Structural Button overrides matching Roblox UI system */
.btn-roblox-secondary {
    background-color: #2c2c38 !important;
    color: #ffffff !important;
    border: 1px solid #3f3f52 !important;
}
.btn-roblox-secondary:hover {
    background-color: #353544 !important;
}

.btn-danger-roblox {
    background-color: rgba(220, 53, 69, 0.1) !important;
    color: #ea868f !important;
    border: 1px solid rgba(220, 53, 69, 0.2) !important;
}
.btn-danger-roblox:hover {
    background-color: rgba(220, 53, 69, 0.2) !important;
}

.bg-purple-accent-opaque {
    background-color: rgba(168, 85, 247, 0.15);
}
</style>

<?php include 'footer.php'; ?>
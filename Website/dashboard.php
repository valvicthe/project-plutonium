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

<div class="custom-dashboard-wrapper py-5">
    <div class="container custom-container">
        
        <!-- Welcome Hero Banner -->
        <div class="welcome-banner p-4 p-md-5 mb-5 rounded-4 position-relative overflow-hidden shadow-lg">
            <div class="position-relative z-index-2">
                <h1 class="welcome-text display-5 fw-black mb-0">
                    Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?>!
                </h1>
            </div>
            <!-- Decorative background elements -->
            <div class="glow-orb orb-1"></div>
            <div class="glow-orb orb-2"></div>
        </div>

        <div class="row g-4">
            <!-- Left Column: Recently Played Games -->
            <div class="col-lg-8">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3 class="fw-bold text-white mb-0 d-flex align-items-center">
                        <i class="me-2 accent-text"></i> Recently Played
                    </h3>
                    <a href="#" class="btn btn-outline-accent btn-sm rounded-pill px-3">View All</a>
                </div>

                <div class="row g-3">
                    <!-- Custom Game Card 1 -->
                    <div class="col-md-6">
                        <div class="game-card card border-0 h-100 rounded-4 overflow-hidden">
                            <div class="game-thumb position-relative">
                                <img src="https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png" class="w-100 h-100 object-fit-cover" alt="Game">
                                <div class="game-overlay d-flex flex-column justify-content-center align-items-center">
                                    <button class="btn btn-play rounded-circle mb-2 shadow"><i class="fas fa-play ms-1"></i></button>
                                    <span class="text-white fw-semibold small tracking-wider text-uppercase">Play Now</span>
                                </div>
                            </div>
                            <div class="card-body p-3 glass-panel">
                                <h5 class="fw-bold text-white mb-1 text-truncate">Sword Fights on the Heights IV</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted small">By Telamon</span>
                                    <span class="badge bg-dark-subtle text-light rounded-pill px-2">Active</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Custom Game Card 2 -->
                    <div class="col-md-6">
                        <div class="game-card card border-0 h-100 rounded-4 overflow-hidden">
                            <div class="game-thumb position-relative">
                                <img src="https://images.rbxcdn.com/978000673ba7f27b7c259b13996f0e47.png" class="w-100 h-100 object-fit-cover" alt="Game">
                                <div class="game-overlay d-flex flex-column justify-content-center align-items-center">
                                    <button class="btn btn-play rounded-circle mb-2 shadow"><i class="fas fa-play ms-1"></i></button>
                                    <span class="text-white fw-semibold small tracking-wider text-uppercase">Play Now</span>
                                </div>
                            </div>
                            <div class="card-body p-3 glass-panel">
                                <h5 class="fw-bold text-white mb-1 text-truncate">Crossroads</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted small">By System</span>
                                    <span class="badge bg-dark-subtle text-light rounded-pill px-2">Active</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Friends Sidebar -->
            <div class="col-lg-4">
                <div class="friends-panel rounded-4 p-4 h-100 shadow">
                    <div class="d-flex align-items-center justify-content-between mb-4 border-bottom border-secondary-subtle pb-3">
                        <h4 class="fw-bold text-white mb-0">Friends</h4>
                        <span class="badge online-badge rounded-pill px-2 py-1">2 Online</span>
                    </div>

                    <!-- Friends List -->
                    <div class="friends-list d-flex flex-column gap-3">
                        
                        <!-- Friend Item (Online) -->
                        <div class="friend-item d-flex align-items-center p-2 rounded-3 transition-base">
                            <div class="position-relative me-3">
                                <div class="friend-avatar rounded-circle d-flex align-items-center justify-content-center text-white fw-bold bg-secondary">
                                    A
                                </div>
                                <span class="status-indicator bg-success position-absolute bottom-0 end-0 rounded-circle border border-2 border-dark"></span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="text-white mb-0 fw-semibold">Admin</h6>
                                <p class="text-success small mb-0">In Game: Crossroads</p>
                            </div>
                            <a href="#" class="btn btn-sm btn-icon text-muted"><i class="fas fa-comment"></i></a>
                        </div>

                        <!-- Friend Item (Online) -->
                        <div class="friend-item d-flex align-items-center p-2 rounded-3 transition-base">
                            <div class="position-relative me-3">
                                <div class="friend-avatar rounded-circle d-flex align-items-center justify-content-center text-white fw-bold bg-secondary">
                                    P
                                </div>
                                <span class="status-indicator bg-success position-absolute bottom-0 end-0 rounded-circle border border-2 border-dark"></span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="text-white mb-0 fw-semibold">Player123</h6>
                                <p class="text-muted small mb-0">Online</p>
                            </div>
                            <a href="#" class="btn btn-sm btn-icon text-muted"><i class="fas fa-comment"></i></a>
                        </div>

                        <!-- Friend Item (Offline) -->
                        <div class="friend-item d-flex align-items-center p-2 rounded-3 transition-base opacity-50">
                            <div class="position-relative me-3">
                                <div class="friend-avatar rounded-circle d-flex align-items-center justify-content-center text-white fw-bold bg-dark">
                                    G
                                </div>
                                <span class="status-indicator bg-secondary position-absolute bottom-0 end-0 rounded-circle border border-2 border-dark"></span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="text-white mb-0 fw-semibold">Guest001</h6>
                                <p class="text-muted small mb-0">Offline</p>
                            </div>
                        </div>

                    </div>
                    
                    <button class="btn btn-dark w-100 mt-4 rounded-3 text-muted border-0 py-2 custom-hover">Find More Friends</button>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
/* --- Modern Custom Dashboard Styling --- */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap');

body {
    background-color: #09090b !important; /* Deep modern dark zinc */
    font-family: 'Inter', sans-serif;
}

.custom-dashboard-wrapper {
    background-color: #09090b;
    min-height: 100vh;
}

.custom-container {
    max-width: 1100px;
}

/* Typography & Colors */
.fw-black { font-weight: 900; }
.tracking-wider { letter-spacing: 0.1em; }
.accent-text { color: #8b5cf6; } /* Vibrant purple accent */
.bg-dark-subtle { background-color: rgba(255, 255, 255, 0.05) !important; }
.border-secondary-subtle { border-color: rgba(255, 255, 255, 0.05) !important; }

/* Welcome Banner */
.welcome-banner {
    background: linear-gradient(135deg, #18181b 0%, #0f0f12 100%);
    border: 1px solid rgba(255, 255, 255, 0.08);
}
.welcome-text {
    background: linear-gradient(to right, #ffffff, #a78bfa);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.glow-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(60px);
    opacity: 0.15;
    z-index: 1;
}
.orb-1 {
    width: 200px;
    height: 200px;
    background-color: #8b5cf6;
    top: -50px;
    right: 10%;
}
.orb-2 {
    width: 300px;
    height: 300px;
    background-color: #3b82f6;
    bottom: -100px;
    left: 20%;
}

/* Custom Buttons */
.btn-outline-accent {
    color: #a78bfa;
    border-color: #8b5cf6;
    transition: all 0.2s ease;
}
.btn-outline-accent:hover {
    background-color: #8b5cf6;
    color: #fff;
}
.btn-play {
    width: 50px;
    height: 50px;
    background-color: #8b5cf6;
    color: white;
    border: none;
    transition: transform 0.2s, background-color 0.2s;
}
.btn-play:hover {
    background-color: #7c3aed;
    transform: scale(1.1);
    color: white;
}

/* Game Cards */
.game-card {
    background-color: transparent !important;
}
.game-thumb {
    aspect-ratio: 16 / 9;
    background-color: #18181b;
}
.glass-panel {
    background: rgba(24, 24, 27, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-top: none;
}
.game-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(9, 9, 11, 0.7);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.game-card:hover .game-overlay {
    opacity: 1;
}
.game-card:hover .glass-panel {
    border-color: rgba(139, 92, 246, 0.3);
}

/* Friends Panel */
.friends-panel {
    background-color: #18181b;
    border: 1px solid rgba(255, 255, 255, 0.05);
}
.online-badge {
    background-color: rgba(16, 185, 129, 0.15);
    color: #34d399;
    border: 1px solid rgba(16, 185, 129, 0.2);
}
.friend-avatar {
    width: 40px;
    height: 40px;
    font-size: 1.1rem;
}
.status-indicator {
    width: 12px;
    height: 12px;
    border-color: #18181b !important; /* Match panel background */
}
.transition-base {
    transition: all 0.2s ease;
}
.friend-item:hover {
    background-color: rgba(255, 255, 255, 0.03);
}
.custom-hover:hover {
    background-color: #27272a !important;
    color: #ffffff !important;
}
</style>

<?php include 'footer.php'; ?>
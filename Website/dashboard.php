<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login");
    exit;
}

// global.php handles DOCTYPE, head, navbar, and opening body/assets
include 'global.php'; 
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <!-- Dashboard Panel -->
            <div class="card dashboard-card border-0 shadow-lg rounded-4 overflow-hidden">
                
                <!-- Profile Decorative Banner -->
                <div class="dashboard-banner d-flex align-items-center justify-content-center">
                    <div class="avatar-wrapper">
                        <i class="fas fa-user-circle avatar-icon"></i>
                    </div>
                </div>
                
                <!-- Control Panel Body -->
                <div class="card-body p-5 text-center mt-4">
                    <h2 class="fw-bold mb-1 text-white">
                        hai <span class="text-purple-accent"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>!
                    </h2>
                    <p class="text-secondary-emphasis small mb-4">change ur settings</p>
                    
                    <hr class="border-secondary-light my-4">
                    
                    <!-- Quick Actions Grid -->
                    <div class="d-grid gap-3">
                        <a href="reset-password.php" class="btn btn-purple-outline btn-block py-2 mb-3">
                            <i class="fas fa-key mr-2"></i> reset ya password
                        </a>
                        
                        <a href="<?php echo SITEDOMAIN;?>/games" class="btn btn-purple btn-block py-2">
                            <i class="fas fa-gamepad mr-2"></i> play sum games
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Dashboard Card & Aesthetic */
.dashboard-card {
    background-color: #121218 !important;
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
}

/* Header Gradient */
.dashboard-banner {
    background: linear-gradient(135deg, #400060 0%, #150024 100%);
    height: 120px;
    border-bottom: 1px solid rgba(144, 0, 255, 0.15);
    position: relative;
}

/* Floating Avatar Icon */
.avatar-wrapper {
    position: absolute;
    bottom: -35px;
    background-color: #121218;
    border-radius: 50%;
    padding: 6px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.6);
}

.avatar-icon {
    font-size: 4.5rem;
    color: #a855f7;
    display: block;
}

.text-purple-accent {
    color: #a855f7 !important;
}

.text-secondary-emphasis {
    color: #b3b3cb !important;
}

.border-secondary-light {
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}

/* Custom Purple Button Variations */
.btn-purple {
    background-color: #6b21a8 !important;
    color: white !important;
    border: none !important;
    border-radius: 8px;
    transition: background 0.2s;
}

.btn-purple:hover {
    background-color: #581c87 !important;
}

.btn-purple-outline {
    border: 1px solid #6b21a8 !important;
    color: #c084fc !important;
    background: transparent !important;
    border-radius: 8px;
    transition: all 0.2s;
}

.btn-purple-outline:hover {
    background-color: rgba(107, 33, 168, 0.12) !important;
    border-color: #a855f7 !important;
}

.rounded-4 {
    border-radius: 1rem !important;
}
</style>

<?php include 'footer.php'; ?>
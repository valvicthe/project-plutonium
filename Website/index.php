<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /dashboard.php");
    exit;
}

include 'global.php';
?>

<div class="container my-5">
    <!-- Hero Jumbotron Section -->
    <div class="jumbotron p-5 text-white rounded-4 shadow-lg mb-4 text-center text-sm-start">
        <h1 class="display-4 fw-bold">Project Plutonium</h1>
        <p class="lead opacity-75">A transparent, community-driven 2013 Roblox revival</p>
    </div>

    <!-- Content Grid -->
    <div class="row align-items-center g-4">
        <!-- About / Description Column -->
        <div class="col-lg-6">
            <div class="card border-0 bg-dark text-white p-4 shadow h-100 rounded-4">
                <h3 class="fw-bold mb-3 text-purple-accent">Completely Public &amp; Open Source</h3>
                <p class="text-secondary-emphasis">Plutonium is a free-to-join, public revival designed without the usual drama or barriers. Everyone is welcome to play, build, and explore.</p>
                
                <hr class="border-secondary my-3">
                
                <div class="alert alert-warning border-0 bg-warning-subtle text-warning-emphasis rounded-3 mb-0">
                    <h5 class="fw-bold mb-1">Play Nice</h5>
                    <p class="small mb-0">To keep this space fun for everyone, please respect the community. No malicious attacks, DDOS attempts, or inappropriate content.</p>
                </div>
            </div>
        </div>

        <!-- Video Embed Column -->
        <div class="col-lg-6">
            <div class="ratio ratio-16x9 shadow-lg rounded-4 overflow-hidden border border-secondary border-opacity-25">
                <iframe src="<?php echo YOUTUBETRAILERLINK;?>" title="Project Plutonium Trailer" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<style>
/* Plutonium Custom Styling */
.jumbotron {
    background: linear-gradient(135deg, #400060 0%, #150024 100%);
    border: 1px solid rgba(144, 0, 255, 0.15);
}

.text-purple-accent {
    color: #a855f7;
}

.bg-dark {
    background-color: #1a1a24 !important;
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
}

.text-secondary-emphasis {
    color: #b3b3cb !important;
    line-height: 1.6;
}

/* Fallback for Bootstrap 4/5 compatibility on rounded-4 */
.rounded-4 {
    border-radius: 1rem !important;
}
</style>

<?php include 'footer.php';?>
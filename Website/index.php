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

<!-- Top Promotional Banner Notification -->
<div class="promo-banner text-center py-2 px-3 fw-bold">
    Welcome to Plutonium!
</div>

<!-- Full-Width Hero Section with Background Image -->
<div class="hero-carousel-section position-relative d-flex align-items-center justify-content-center text-center">
    <!-- Darkened Image Overlay Context -->
    <div class="hero-overlay"></div>
    
    <!-- Hero Content Layer -->
    <div class="hero-content position-relative px-3">
        <div class="mb-2">
            <!-- Dynamic Logo Title -->
            <img src="<?php echo FULLLOGOPATH;?>" class="hero-logo-img" alt="Plutonium">
        </div>
        <p class="hero-subtitle lead text-white opacity-90 mx-auto">
            Relive the 2013-2019 experience without being worried about security.
        </p>
    </div>
</div>

<!-- Main Call To Action / Information Area -->
<div class="info-section py-5 text-center">
    <div class="container py-4">
        <h2 class="fw-bold mb-3 text-white">How do I join?</h2>
        <p class="text-secondary-light mx-auto mb-4 max-w-xl">
            Plutonium is completely public and open source! To get started immediately, simply click the button below to register an account and jump straight into the revival without the usual drama.
        </p>
        <a href="<?php echo SITEDOMAIN;?>/register.php" class="btn btn-primary-blue btn-lg px-4 py-2 fw-semibold shadow rounded-3">
            Register Here!
        </a>
    </div>
</div>

<style>
/* 1. Promotional Accent Banner */
.promo-banner {
    background-color: #f59e0b; /* Bright orange notification accent */
    color: #ffffff;
    font-size: 0.95rem;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* 2. Full-Width Hero Container */
.hero-carousel-section {
    width: 100%;
    min-height: 480px;
    background-image: url(<?php echo SITEDOMAIN;?>/img/background.png);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    border-bottom: 2px solid #121218;
}

/* Darkening tint overlay matching the example image */
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.55);
    z-index: 1;
}

.hero-content {
    z-index: 2;
    max-width: 800px;
}

/* Dynamic Header Logo Scaling */
.hero-logo-img {
    max-width: 90%;
    height: auto;
    max-height: 120px;
    object-fit: contain;
    filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.5));
}

.hero-subtitle {
    font-size: 1.25rem;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.8);
    max-width: 600px;
}

/* 3. Lower Body Information Panel */
.info-section {
    background-color: #0d0d12; /* Sleek dark section base */
}

.text-secondary-light {
    color: #b3b3cb !important;
    font-size: 1.05rem;
    line-height: 1.6;
}

.max-w-xl {
    max-width: 650px;
}

/* 4. Custom Blue Button styling matching reference */
.btn-primary-blue {
    background-color: #0056cc !important;
    border-color: #0056cc !important;
    color: #ffffff !important;
    transition: background-color 0.2s, transform 0.2s;
}

.btn-primary-blue:hover {
    background-color: #0044aa !important;
    border-color: #0044aa !important;
    transform: translateY(-1px);
}
</style>

<?php include 'footer.php';?>
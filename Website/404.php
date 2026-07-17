<?php 
// 404.php
include 'global.php'; 
?>

<div class="container text-center mt-5 pt-5">
    <div class="card bg-dark border-secondary p-5 mx-auto" style="max-width: 500px;">
        <h1 class="display-1 font-weight-bold text-purple" style="color: #a855f7;">404</h1>
        <h3 class="text-light">Page Not Found</h3>
        <p class="text-muted">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        
        <div class="mt-4">
            <a href="<?php echo SITEDOMAIN; ?>" class="btn btn-purple">Return Home</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<footer class="footer mt-auto py-4">
    <div class="container text-center">
        <div class="card footer-card border-0 shadow">
            <div class="card-body py-4">
                <!-- Branding Link -->
                <p class="mb-2">
                    <a href="<?php echo SITEDOMAIN;?>" class="footer-brand-link fw-bold text-decoration-none">
                        <?php echo SITENAME;?> 2026
                    </a>
                </p>
                
                <!-- Legal / Terms Links -->
                <div class="footer-links mb-3">
                    <a href="<?php echo SITEDOMAIN;?>/Legal/Terms.php" class="text-secondary-emphasis mx-2 small text-decoration-none">Terms of Service</a>
                    <span class="text-muted">|</span>
                    <a href="<?php echo SITEDOMAIN;?>/Legal/Policy.php" class="text-secondary-emphasis mx-2 small text-decoration-none">Privacy Policy</a>
                    <span class="text-muted">|</span>
                    <a href="https://about:new" class="text-purple-accent mx-2 small text-decoration-none"><i class="fab fa-discord mr-1"></i> Discord Server</a>
                </div>

                <!-- Copyright Disclaimer -->
                <p class="text-muted small mb-0 px-3">
                    Copyright &copy; <a href="https://corp.roblox.com/" target="_blank" rel="noopener" class="text-muted text-decoration-underline">ROBLOX Corporation</a> 2026. 
                    We are not affiliated with, authorized, or endorsed by ROBLOX Corporation.
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
/* Footer Custom Styling */
.footer-card {
    background-color: #121218 !important;
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
    border-radius: 1rem !important;
}

.footer-brand-link {
    color: #a855f7 !important;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
    transition: color 0.2s;
}

.footer-brand-link:hover {
    color: #c084fc !important;
}

.text-secondary-emphasis {
    color: #b3b3cb !important;
    transition: color 0.2s;
}

.text-secondary-emphasis:hover {
    color: #a855f7 !important;
}

.text-purple-accent {
    color: #a855f7 !important;
}

.text-purple-accent:hover {
    color: #c084fc !important;
}
</style>